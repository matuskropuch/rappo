<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapper extends Model
{
    public $fillable = [
        'first_name', 'last_name', 'nickname', 'born_at', 'image', 'bio',
    ];

    public static function findByNickname($nickname)
    {
        return self::where('nickname', '=', $nickname)->firstOrFail();
    }

    public function albums()
    {
        return $this->hasMany(Album::class);
    }
}
