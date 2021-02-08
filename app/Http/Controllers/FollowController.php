<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function store(User $user)
    {
        $message = auth()->user()->following($user) ? 'Unfollowed' : 'Following';
        auth()->user()->toggleFollow($user);
        return redirect()->back()->with('message', $message);
    }
}
