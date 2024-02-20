<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    // use PostFactory;
    protected $table = "post";
    protected $primaryKey = 'idPost';
    // protected $foreignKey = 'kodePost';



    protected $guarded = ['idPost'];

    public function writer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kodeUser', 'idUser');
    }

    public function kat(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'postCategory', 'idKategori');
    }

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Use the 'booted' event to dump and die the model
    //     static::booted(function ($model) {
    //         dd($model);
    //     });
    // }
}
