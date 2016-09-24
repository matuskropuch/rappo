<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapper extends Model
{
    public $fillable = ['first_name', 'last_name', 'nickname', 'date_of_birth'];
}