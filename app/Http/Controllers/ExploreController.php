<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('explore', [
            'users' => User::paginate(50),
        ]);
    }
}
