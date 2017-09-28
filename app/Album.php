<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $fillable = [
        'name', 'rapper_id', 'info', 'image', 'released_at', 'created_by',
    ];

    public function rapper()
    {
        return $this->hasOne(Rapper::class, 'id', 'rapper');
    }
}
