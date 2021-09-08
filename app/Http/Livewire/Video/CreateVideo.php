<?php

namespace App\Http\Livewire\Video;

use App\Models\Video;
use Livewire\Component;

class CreateVideo extends Component
{
    public Video $video;
    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.app')
            ;
    }

    public function fileCompleted(){

    }

    public function upload(){
       $this->validate([
           'videoFile' => 'required|mimes:mp4|max900000'
       ]);
    }
}
