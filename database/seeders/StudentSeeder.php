<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'name' => 'Ana Carolina Silva',
                'email' => 'ana.silva@email.com',
                'phone' => '(48) 99999-1001',
                'birth_date' => '1995-03-15',
                'level' => 'intermediate',
                'goals' => 'Melhorar inglês para oportunidades de trabalho internacional',
                'active' => true,
            ],
            [
                'name' => 'Carlos Eduardo Santos',
                'email' => 'carlos.santos@email.com',
                'phone' => '(48) 99999-1002',
                'birth_date' => '1988-07-22',
                'level' => 'advanced',
                'goals' => 'Preparação para intercâmbio na Inglaterra',
                'active' => true,
            ],
            [
                'name' => 'Mariana Oliveira',
                'email' => 'mariana.oliveira@email.com',
                'phone' => '(48) 99999-1003',
                'birth_date' => '2000-11-08',
                'level' => 'beginner',
                'goals' => 'Começar do zero para viagem aos EUA',
                'active' => true,
            ],
            [
                'name' => 'João Pedro Costa',
                'email' => 'joao.costa@email.com',
                'phone' => '(48) 99999-1004',
                'birth_date' => '1992-05-30',
                'level' => 'pre_intermediate',
                'goals' => 'Inglês para negócios e apresentações',
                'active' => true,
            ],
            [
                'name' => 'Fernanda Lima',
                'email' => 'fernanda.lima@email.com',
                'phone' => '(48) 99999-1005',
                'birth_date' => '1985-12-12',
                'level' => 'upper_intermediate',
                'goals' => 'Certificação internacional IELTS',
                'active' => true,
            ],
        ];

        foreach ($students as $studentData) {
            Student::create($studentData);
        }
    }
}

