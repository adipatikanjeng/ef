<?php

namespace App\Http\Controllers;

use App\Test;
use App\TestHeader;
use App\Course;
use App\TestsResult;
use Illuminate\Http\Request;
use App\Lesson;
use Stripe\Charge;
use Stripe\Customer;

class TestsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        \View::share('pageTitle', \Lang::get('global.tests.title'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = \Auth::user()->courses;
        return view('tests.index', compact('courses'));
    }

    public function show($id)
    {
        $course = \Auth::user()->courses()->findOrFail($id);
        $test = $course->test;

        return view('tests.show', compact('test'));
    }

    public function detail($courseId, $lessonId = null)
    {
        if($lessonId == 'null'){
            $lesson = Lesson::where('course_id', $courseId)->whereHas('test', function ($query) use($courseId) {
                $query->where('course_id', $courseId)->where('type', 'test');
            })->firstOrFail();
        }else{
            $lesson = Lesson::where('course_id', $courseId)->where('id', $lessonId)
            ->whereHas('test', function ($query) {
                $query->where('type', 'test');
            })->firstOrFail();
        }

        if (\Auth::check())
        {
            if ($lesson->students()->where('id', \Auth::id())->count() == 0) {
                $lesson->students()->attach(\Auth::id());
            }
        }

        $test_result = NULL;
        if ($lesson->test) {
            $test_result = TestsResult::where('test_id', $lesson->test->id)
                ->where('user_id', \Auth::id())
                ->first();
        }

        $previous_lesson = Lesson::where('course_id', $lesson->course_id)
            ->where('position', '<', $lesson->position)
            ->whereHas('test', function ($query) {
                $query->where('type', 'test');
            })
            ->orderBy('position', 'desc')
            ->first();
        $next_lesson = Lesson::where('course_id', $lesson->course_id)
            ->where('position', '>', $lesson->position)
            ->whereHas('test', function ($query) {
                $query->where('type', 'test');
            })
            ->orderBy('position', 'asc')
            ->first();

        $test_exists = FALSE;

        if ($lesson->test && $lesson->test->questions->count() > 0) {
            $test_exists = TRUE;
        }



        return view('tests.detail', compact('lesson', 'previous_lesson', 'next_lesson', 'test_result',
            'test_exists'));
    }

    public function rating($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->students()->updateExistingPivot(\Auth::id(), ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }

}
