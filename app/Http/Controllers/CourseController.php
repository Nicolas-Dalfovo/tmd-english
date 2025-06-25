<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('active', true);
            } elseif ($request->status === 'ongoing') {
                $query->ongoing();
            }
        }

        $courses = $query->with('students')->paginate(12);

        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,elementary,pre_intermediate,intermediate,upper_intermediate,advanced',
            'duration_weeks' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'max_students' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'schedule' => 'required|string|max:255',
            'active' => 'boolean'
        ]);

        Course::create($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curso criado com sucesso!');
    }

    public function show(Course $course)
    {
        $course->load('students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'level' => 'required|in:beginner,elementary,pre_intermediate,intermediate,upper_intermediate,advanced',
            'duration_weeks' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'max_students' => 'required|integer|min:1',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'schedule' => 'required|string|max:255',
            'active' => 'boolean'
        ]);

        $course->update($request->all());

        return redirect()->route('courses.index')
            ->with('success', 'Curso atualizado com sucesso!');
    }

    public function destroy(Course $course)
    {
        if ($course->students()->count() > 0) {
            return redirect()->route('courses.index')
                ->with('error', 'Não é possível excluir um curso que possui alunos matriculados!');
        }

        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Curso excluído com sucesso!');
    }
}
