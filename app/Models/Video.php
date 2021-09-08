<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'uid';
    }


    public function channels(){
         return $this->belongsTo(Channel::class);
    }

    public function getThumbnailAttribute(){
//        return '/videos'. $this->uid.
    }
}
