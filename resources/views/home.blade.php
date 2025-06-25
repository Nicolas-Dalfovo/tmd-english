@extends('layouts.app')

@section('title', 'TMD English - Escola de Inglês')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Transforme seu futuro com o inglês</h1>
                <p class="lead mb-4">Há mais de 15 anos preparando alunos para conquistar o mundo através do inglês. Metodologia personalizada, professores qualificados e intercâmbios internacionais.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('courses.index') }}" class="btn btn-tmd-secondary btn-lg">
                        <i class="bi bi-book me-2"></i>Ver Cursos
                    </a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-info-circle me-2"></i>Sobre Nós
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/students-intercambio.jpg') }}" alt="Alunos TMD English" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-people text-white fs-4"></i>
                        </div>
                        <h3 class="card-title h2 text-primary">{{ $totalStudents }}</h3>
                        <p class="card-text text-muted">Alunos Ativos</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-book text-white fs-4"></i>
                        </div>
                        <h3 class="card-title h2 text-success">{{ $totalCourses }}</h3>
                        <p class="card-text text-muted">Cursos Disponíveis</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-play-circle text-white fs-4"></i>
                        </div>
                        <h3 class="card-title h2 text-warning">{{ $ongoingCourses }}</h3>
                        <p class="card-text text-muted">Turmas em Andamento</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center p-4">
                        <div class="bg-info bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-calendar-check text-white fs-4"></i>
                        </div>
                        <h3 class="card-title h2 text-info">15+</h3>
                        <p class="card-text text-muted">Anos de Experiência</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5">
                <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">Cursos em Destaque</h2>
                @forelse($featuredCourses as $course)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title mb-0">{{ $course->name }}</h5>
                                <span class="badge bg-primary">{{ $course->level_formatted }}</span>
                            </div>
                            <p class="card-text text-muted mb-2">{{ Str::limit($course->description, 100) }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">
                                    <i class="bi bi-people me-1"></i>{{ $course->students->count() }}/{{ $course->max_students }} alunos
                                </small>
                                <span class="fw-bold text-success">{{ $course->price_formatted }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Nenhum curso disponível no momento.</p>
                @endforelse
                
                <a href="{{ route('courses.index') }}" class="btn btn-tmd-primary">
                    <i class="bi bi-arrow-right me-2"></i>Ver Todos os Cursos
                </a>
            </div>
            
            <div class="col-lg-6">
                <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">Alunos Recentes</h2>
                <div class="row">
                    @forelse($recentStudents as $student)
                        <div class="col-md-6 mb-3">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="bg-secondary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 50px; height: 50px;">
                                        <i class="bi bi-person text-white"></i>
                                    </div>
                                    <h6 class="card-title mb-1">{{ $student->name }}</h6>
                                    <small class="text-muted">{{ $student->level_formatted }}</small>
                                    @if($student->courses->count() > 0)
                                        <div class="mt-2">
                                            <small class="badge bg-light text-dark">{{ $student->courses->count() }} curso(s)</small>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted">Nenhum aluno cadastrado ainda.</p>
                    @endforelse
                </div>
                
                <a href="{{ route('students.index') }}" class="btn btn-tmd-primary">
                    <i class="bi bi-arrow-right me-2"></i>Ver Todos os Alunos
                </a>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4">
                <img src="{{ asset('images/students-dublin.jpg') }}" alt="Intercâmbio Dublin" class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">Intercâmbios Internacionais</h2>
                <p class="lead mb-4">Proporcionamos experiências únicas de intercâmbio para Inglaterra, Escócia e Irlanda, onde nossos alunos vivenciam o inglês no mundo real.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Acompanhamento personalizado</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Parceiros internacionais confiáveis</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Suporte completo durante a viagem</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Certificação internacional</li>
                </ul>
                <a href="{{ route('about') }}" class="btn btn-tmd-secondary">
                    <i class="bi bi-airplane me-2"></i>Saiba Mais
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

