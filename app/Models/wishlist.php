<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = "wishlist";
    protected $primaryKey = 'idWishlist';
    // protected $foreignKey = 'kodePost';



    protected $guarded = ['idWishlist'];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'kodeUser', 'idUser');
    }

    public function Wlist(): BelongsTo
    {
        return $this->belongsTo(Post::class, 'kodePost', 'idPost');
    }
}
