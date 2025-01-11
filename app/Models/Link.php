<?php

namespace App\Models;

use App\Models\User;
use App\Models\Redirect;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    /** @use HasFactory<\Database\Factories\LinkFactory> */
    use HasFactory;
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function redirects(){
        return $this->hasMany(Redirect::class);
    }
}
