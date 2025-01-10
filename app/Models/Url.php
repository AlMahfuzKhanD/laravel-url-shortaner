<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $table = "urls";

    public static function generateShortUrl(){
        return substr(md5(uniqid(rand())),0,6);
    }
}
