<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapper extends Model
{
    public $fillable = ['first_name', 'last_name', 'nickname', 'born_at'];

    public static function findByNickname($nickname)
    {
        return self::where('nickname', '=', $nickname)->firstOrFail();
    } 
}