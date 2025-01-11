<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function __invoke(Link $link){
        $link->redirects()->create();
        return redirect($link->target);
    }
}
