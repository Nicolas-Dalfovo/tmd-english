<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($request->filled('level')) {
            $query->where('level', $request->level);
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('active', true);
            } else {
                $query->where('active', false);
            }
        }

        $students = $query->with('courses')->paginate(12);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $courses = Course::active()->get();
        return view('students.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'level' => 'required|in:beginner,elementary,pre_intermediate,intermediate,upper_intermediate,advanced',
            'goals' => 'nullable|string',
            'active' => 'boolean',
            'courses' => 'array',
            'courses.*' => 'exists:courses,id'
        ]);

        $student = Student::create($request->except('courses'));

        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }

        return redirect()->route('students.index')
            ->with('success', 'Aluno criado com sucesso!');
    }

    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $courses = Course::active()->get();
        $student->load('courses');
        return view('students.edit', compact('student', 'courses'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'nullable|string|max:20',
            'birth_date' => 'nullable|date',
            'level' => 'required|in:beginner,elementary,pre_intermediate,intermediate,upper_intermediate,advanced',
            'goals' => 'nullable|string',
            'active' => 'boolean',
            'courses' => 'array',
            'courses.*' => 'exists:courses,id'
        ]);

        $student->update($request->except('courses'));

        if ($request->has('courses')) {
            $student->courses()->sync($request->courses);
        } else {
            $student->courses()->detach();
        }

        return redirect()->route('students.index')
            ->with('success', 'Aluno atualizado com sucesso!');
    }

    public function destroy(Student $student)
    {
        $student->courses()->detach(); 
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Aluno excluído com sucesso!');
    }
}
