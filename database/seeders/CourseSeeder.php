<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $courses = [
            [
                'name' => 'Inglês Básico',
                'description' => 'Curso ideal para iniciantes que desejam começar do zero no aprendizado do inglês.',
                'level' => 'beginner',
                'duration_weeks' => 12,
                'price' => 299.90,
                'max_students' => 8,
                'start_date' => '2025-02-01',
                'end_date' => '2025-04-30',
                'schedule' => 'Terças e Quintas - 19:00 às 20:30',
                'active' => true,
            ],
            [
                'name' => 'Inglês Intermediário',
                'description' => 'Para alunos que já possuem conhecimento básico e desejam aprofundar suas habilidades.',
                'level' => 'intermediate',
                'duration_weeks' => 16,
                'price' => 399.90,
                'max_students' => 8,
                'start_date' => '2025-02-01',
                'end_date' => '2025-05-31',
                'schedule' => 'Segundas e Quartas - 19:00 às 20:30',
                'active' => true,
            ],
            [
                'name' => 'Inglês Avançado',
                'description' => 'Curso para alunos com bom domínio do idioma que buscam fluência e certificações.',
                'level' => 'advanced',
                'duration_weeks' => 20,
                'price' => 499.90,
                'max_students' => 6,
                'start_date' => '2025-02-01',
                'end_date' => '2025-06-30',
                'schedule' => 'Terças e Quintas - 20:30 às 22:00',
                'active' => true,
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}

