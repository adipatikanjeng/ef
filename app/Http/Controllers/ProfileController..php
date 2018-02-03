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
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
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
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        $request = $this->saveFiles($request);
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('profile.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id');$courses = \App\Course::whereHas('teachers',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'courses'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
