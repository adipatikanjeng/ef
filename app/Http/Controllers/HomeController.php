<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        \View::share('pageTitle', \Lang::get('global.home.title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = isset($request->user_id) ? Post::whereUserId($request->user_id) : Post::all();
        return view('home', compact('posts'));
    }

    public function create()
    {
        return view('home.create');
    }
}
