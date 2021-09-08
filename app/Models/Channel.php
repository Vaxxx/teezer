<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    public $table = 'channels';
    protected $fillable = [
        'name',
        'uid',
        'image',
        'slug',
        'description',
    ];
    public function getRouteKeyName()
    {
        return 'name';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }
}
