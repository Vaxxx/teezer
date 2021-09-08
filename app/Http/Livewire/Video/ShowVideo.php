<?php

namespace App\Http\Livewire\Video;

use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use App\Models\Channel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowVideo extends Component
{
    use WithFileUploads;

    public $channel;
    public $videoFile;
    //video properties
    public $title;
    public $description;
    public $visibility;
    public $video;
    public $videos;///show all videos

    public function mount(Channel $channel){
        $this->channel = $channel;
    }

    public function test(){
        dd('test');
    }

    public function render()
    {
        return view('livewire.video.show-video' );
    }

    /**
     * @return string[]
     * validation properties
     */
    public  function  rules (){
        return [
            'title' =>     'required|min:2|max:255',
            'description' => 'nullable|min:2|max:1000',
            'visibility' => 'required',
            'videoFile' => 'required|mimes:mp4|max:900000'
        ];
    }

    public function allChannelVideos(){
      //  dd($this->channel->id);
      //  return $this->channel->videos->get();
        //dd($this->videos);
    }

//    public function upload(){
//        $this->validate([
//           'videoFile' => 'required|mimes:mp4|max:900000'
//        ]);
//    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * save the video and its properties to db
     */
    public function store(){
        dd('here');
        //validate
      $this->validate();
      //store video file in folder
        $path = $this->videoFile->store('videos');
        //save to db
         $this->video =  $this->channel->videos()->create([
             'title' => $this->title,
            'description' => $this->description,
            'uid' => uniqid(true),
            'visibility' => $this->visibility,
            'path' => $path,

        ]);

        //dispatch jobs
        CreateThumbnailFromVideo::dispatch($this->video);
        ConvertVideoForStreaming::dispatch($this->video);

        //redirect
        session()->flash('success', 'Video Created successfully');
        return redirect()->to('/home');
    }

}
