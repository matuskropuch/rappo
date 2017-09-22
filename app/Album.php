<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $fillable = [
        'name', 'artist', 'info', 'image', 'release_date', 'created_by',
    ];

    public function artist_name()
    {
        return $this->hasOne(Rapper::class, 'id', 'artist');
    }
}
