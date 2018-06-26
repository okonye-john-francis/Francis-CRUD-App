<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Student;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if (Auth::user()->id==3) {
            $students = Student::all()->toArray();
        }else{
            $students = Student::all()->where('userId', '=', Auth::user()->id)->toArray();
        }
        
        $student = null;
        return view('home',compact('students','student'));
    }
}
