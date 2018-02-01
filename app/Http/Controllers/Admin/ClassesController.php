<?php

namespace App\Http\Controllers\Admin;

use App\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreClassesRequest;
use App\Http\Requests\Admin\UpdateClassesRequest;

class ClassesController extends Controller
{
    public function __construct()
    {
        \View::share('pageTitle', \Lang::get('global.classes.title'));
    }

    /**
     * Display a listing of class.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('class_access')) {
            return abort(401);
        }

        $teachers = \App\Role::where('id', '2')->first()->roleUser()->get();

        return view('admin.classes.index', compact('teachers'));
    }

    /**
     * Show the form for creating new class.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('class_create')) {
            return abort(401);
        }

        $teachers = \App\Role::where('id', 3)->first()->roleUser()->pluck('name', 'id');
        $students = \App\Role::where('id', 4)->first()->roleUser()->pluck('name', 'id');

        return view('admin.classes.create', compact('students', 'teachers'));
    }

    /**
     * Store a newly created class in storage.
     *
     * @param  \App\Http\Requests\StoreclassesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassesRequest $request)
    {
        if (! Gate::allows('class_create')) {
            return abort(401);
        }

        foreach ($request->student_user_id as $key => $value) {
            $model = new Classes;
            $model->teacher_user_id = $request->teacher_user_id;
            $model->student_user_id = $value;
            $model->save();

        }


        return redirect()->route('admin.classes.index');
    }


    /**
     * Show the form for editing class.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('class_edit')) {
            return abort(401);
        }
        $teachers = \App\Role::where('id', 2)->first()->roleUser()->pluck('name', 'id');
        $students = \App\Role::where('id', 3)->first()->roleUser()->pluck('name', 'id');

        $user = \App\User::findOrFail($id);

        return view('admin.classes.edit', compact('user', 'teachers', 'students'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateclassesRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }

        $user = \App\User::findOrFail($id);
        // $user->update($request->all());
        $user->students()->sync(array_filter((array)$request->input('student_user_id')));

        return redirect()->route('admin.classes.index');
    }


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('class_view')) {
            return abort(401);
        }
        $roles = \App\Role::get()->pluck('title', 'id');$courses = \App\Course::whereHas('teachers',
                    function ($query) use ($id) {
                        $query->where('id', $id);
                    })->get();

        $class = Classes::findOrFail($id);

        return view('admin.classes.show', compact('class', 'courses'));
    }


    /**
     * Remove class from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (! Gate::allows('class_delete')) {
            return abort(401);
        }
        Classes::where('teacher_user_id', $id)->delete();

        return redirect()->route('admin.classes.index');
    }

    /**
     * Delete all selected class at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {

        if (! Gate::allows('class_delete')) {
            return abort(401);
        }

        if ($request->input('ids')) {
            $entries = Classes::whereIn('teacher_user_id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
