<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index(){
        return view('dashboard',[
            'links' => auth()
            ->user()
            ->links()
            ->withCount('redirects')
            ->latest()
            ->paginate(5),
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'target' => ['required'],
        ]);

        $url = filter_var($request->target, FILTER_SANITIZE_URL);
        do{
            $slug = strtolower(Str::random(6));
        } while(Link::where('slug',$slug)->exists());

        auth()->user()->links()->create([
                'slug' => $slug,
                'target' => $url,
        ]);

        return redirect('dashboard');
    }

    
}
