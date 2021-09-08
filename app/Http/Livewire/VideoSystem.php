<?php

namespace App\Http\Livewire;

use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use App\Models\Channel;
use Livewire\Component;
use Livewire\WithFileUploads;

class VideoSystem extends Component
{
    use WithFileUploads;

    public $channel;
    public $video;
    //video properties
    public $title;
    public $description;
    public $visibility;
    public $videoFile;

    public function mount(Channel $channel){
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video-system');
    }

    /**
     * @return string[]
     */
    public  function  rules (){
        return [
            'title' =>     'required|min:2|max:255',
            'description' => 'nullable|min:2|max:1000',
            'visibility' => 'required',
            'videoFile' => 'required|mimes:mp4|max:900000'
        ];
    }

    public function store(){

        $this->validate();
        //store video file in folder
       // $path = $this->videoFile->store('videos', 'videos');
        $path = $this->videoFile->store('uploaded','videos');
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
