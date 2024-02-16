<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // use PostFactory;
    protected $table = "post";
    protected $primaryKey = 'idPost';
    // protected $foreignKey = 'kodePost';



    protected $guarded = ['idPost'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Use the 'booted' event to dump and die the model
    //     static::booted(function ($model) {
    //         dd($model);
    //     });
    // }
}
