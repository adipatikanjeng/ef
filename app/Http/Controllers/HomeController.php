<?php

namespace App\Http\Controllers;

use App\Course;

class HomeController extends Controller
{
    public function __construct()
    {
        \View::share('pageTitle', \Lang::get('global.home.title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchased_courses = NULL;
        if (\Auth::check()) {
            $purchased_courses = Course::whereHas('students', function($query) {
                $query->where('id', \Auth::id());
            })
            ->with('lessons')
            ->orderBy('id', 'desc')
            ->get();
        }
        $courses = Course::where('published', 1)->orderBy('id', 'desc')->get();
        return view('home', compact('courses', 'purchased_courses'));
    }
}
