<?php

namespace App\Http\Livewire;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Intervention\Image\Facades\Image;
class ChannelSystem extends Component
{
    use AuthorizesRequests;
    use WithFileUploads;

    public $channel;
    public $image;
    public $user_id;
    public $name;
    public $slug;
    public $description;

    /**
     * @return string[]
     * validation properties
     */
    public  function  rules (){
        return [
        'name' => 'required|max:255',
        'slug' => 'requir ed|max:255',
        'description' => 'nullable|max:1000',
        'image' => 'required|image|max:2048'
            ];
    }

    /**
     * @param Channel $channel
     * constructor for a component
     */
    public function mount(Channel $channel){

          $this->channel = $channel;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * called immediately the component is called
     */
    public function render()
    {
        $this->user_id = auth()->user()->id;
        return view('livewire.channel-system');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * save the channel to the database
     */
    public function channelCreate(){
        //validate fields
        $this->validate();

        $uuid =  uniqid(true);//a unique id
        //store the image in an images dir
        $image = $this->image->storeAs('images' , $uuid . '.png');//encode image
        //get only the image name
        $explodedImage = explode('/', $image)[1];
        //resize the image
        Image::make(storage_path(). '/app/' . $image)
               ->encode('png')
               ->fit(80, 80, function ($constraint) {
                $constraint->upsize();
            })->save();
        //save the channel to db
        DB::table('channels')->insert([
            'name' => $this->name,
            'user_id' => $this->user_id,
            'uid' => $uuid,
            'slug' => $this->slug,
            'description' => $this->description,
            'image' => $explodedImage
        ]);
        //a flash message
        session()->flash('success', 'Channel Created Successfully');
        //redirect to dashboard
        return redirect()->route('home');
    }
}
