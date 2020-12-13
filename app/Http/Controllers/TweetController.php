<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', compact('tweets'));
    }

    public function store(){
        $attributes = request()->validate([
            'body' => 'required|min:3|max:500'
        ]);
        
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $attributes['body']
        ]);

        return redirect()->route('home');
    }
}
