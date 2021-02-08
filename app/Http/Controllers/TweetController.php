<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tweets = auth()->user()->timeline();
        return view('tweets.index', [
            'tweets' => $tweets,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body'=>'required|max:255'
        ]);
        $validated['user_id'] = auth()->id();
        if(request('tweetImage')){
            $validated['tweetImage'] = request('tweetImage')->store('tweetImages');
        }
        Tweet::create($validated);
        return redirect(route('tweets.index'));
    }
}
