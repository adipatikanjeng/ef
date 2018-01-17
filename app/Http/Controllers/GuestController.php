<?php

namespace App\Http\Controllers;

use App\Course;

class GuestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Auth::check()){
            return view('guest');
        }else{
            return redirect('/home');
        }

    }
}
