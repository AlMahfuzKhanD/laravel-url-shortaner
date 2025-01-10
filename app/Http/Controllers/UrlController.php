<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function createShortUrl(Request $request){
        $request->validate([
            'original_url' => 'required',
        ]);
        $url = Url::where('original_url',$request->original_url)->first();
        if(!$url){
            $short_url = Url::generateShortUrl();
            $url = new Url();
            $url->original_url = $request->original_url;
            $url->short_url = $short_url;
            $url->save();
        }
        return response()->json([
            'short_url' => url('/').'/'.$short_url,
        ]);
    }

    public function redirectToOriginalUrl($short_url){
        $url = Url::where('short_url',$short_url)->first();
        if(!$url){
            abort(404);
        }
        $url->increment('visits');
        return redirect($url->original_url);

    }

    public function stats($short_url){
        $url = Url::where('short_url',$short_url)->first();
        if(!$url){
            abort(404);
        }
        return response()->json([
            'original_url' => $url->original_url,
            'short_url' => url('/').'/'.$url->short_url,
            'visits' => $url->visits,
        ]);
    }
}
