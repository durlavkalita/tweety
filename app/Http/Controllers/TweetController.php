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
        $request->validate([
            'body'=>'required|max:255'
        ]);
        Tweet::create([
            'user_id' => auth()->id(),
            'body' => $request->body,
        ]);
        return redirect(route('tweets.index'));
    }
}
