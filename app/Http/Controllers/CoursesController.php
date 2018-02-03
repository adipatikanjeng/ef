<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        \View::share('pageTitle', \Lang::get('global.courses.title'));
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
        return view('courses.index', compact('courses', 'purchased_courses'));
    }

    public function show($course_slug)
    {
        $course = Course::where('slug', $course_slug)->with('publishedLessons')->firstOrFail();
        $purchased_course = \Auth::check() && $course->students()->where('user_id', \Auth::id())->count() > 0;

        return view('courses.detail', compact('course', 'purchased_course'));
    }

    public function payment(Request $request)
    {
        $course = Course::findOrFail($request->get('course_id'));
        $this->createStripeCharge($request);

        $course->students()->attach(\Auth::id());

        return redirect()->back()->with('success', 'Payment completed successfully.');
    }

    private function createStripeCharge($request)
    {
        Stripe::setApiKey(env('STRIPE_API_KEY'));

        try {
            $customer = Customer::create([
                'email' => $request->get('stripeEmail'),
                'source'  => $request->get('stripeToken')
            ]);

            $charge = Charge::create([
                'customer' => $customer->id,
                'amount' => $request->get('amount'),
                'currency' => "usd"
            ]);
        } catch (\Stripe\Error\Base $e) {
            return redirect()->back()->withError($e->getMessage())->send();
        }
    }

    public function rating($course_id, Request $request)
    {
        $course = Course::findOrFail($course_id);
        $course->students()->updateExistingPivot(\Auth::id(), ['rating' => $request->get('rating')]);

        return redirect()->back()->with('success', 'Thank you for rating.');
    }

}
