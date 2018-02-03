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
        $posts = Post::wherePublished(1)->orderBy('updated_at', 'desc')->orderBy('created_at', 'desc')->get();
        return view('home', compact('posts'));
    }

}
