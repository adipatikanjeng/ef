<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Cmgmyr\Messenger\Models\Thread;
use App\Message;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function __construct()
    {
        $this->middleware('auth');
        \View::share('pageTitle', \Lang::get('global.profile.title'));
    }

    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = auth()->user();
        $posts = \App\Post::wherePublished(1)->where('user_id', \Auth::user()->id)->get();

        $threads = Thread::getAllLatest()->whereHas('participants', function ($query) {
            $query->where('user_id', auth()->user()->id);
        })->get();

        return view('profile.index', compact('profile', 'posts', 'threads'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('profile_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('profile.index');
    }

}
