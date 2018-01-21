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
        $posts = isset($request->user_id) ? Post::wherePublished(1)->whereUserId($request->user_id) : Post::wherePublished(1)->get();
        return view('home', compact('posts'));
    }

}
