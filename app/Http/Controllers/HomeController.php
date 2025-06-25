<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalStudents = Student::active()->count();
        $totalCourses = Course::active()->count();
        $ongoingCourses = Course::ongoing()->count();
        $recentStudents = Student::with('courses')->latest()->take(6)->get();
        $featuredCourses = Course::active()->with('students')->take(3)->get();

        return view('home', compact(
            'totalStudents',
            'totalCourses',
            'ongoingCourses',
            'recentStudents',
            'featuredCourses'
        ));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
