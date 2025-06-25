@extends('layouts.app')

@section('title', $student->name . ' - TMD English')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-person me-2"></i>{{ $student->name }}
                        </h4>
                        <div class="d-flex gap-2">
                            @if($student->active)
                                <span class="badge bg-success fs-6">Ativo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inativo</span>
                            @endif
                            <span class="badge bg-info fs-6">{{ $student->level_formatted }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-2">Informações Pessoais</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-envelope me-2 text-primary"></i>
                                    <strong>Email:</strong> {{ $student->email }}
                                </li>
                                @if($student->phone)
                                    <li class="mb-2">
                                        <i class="bi bi-telephone me-2 text-primary"></i>
                                        <strong>Telefone:</strong> {{ $student->phone }}
                                    </li>
                                @endif
                                @if($student->birth_date)
                                    <li class="mb-2">
                                        <i class="bi bi-calendar me-2 text-primary"></i>
                                        <strong>Data de Nascimento:</strong> {{ $student->birth_date->format('d/m/Y') }}
                                        @if($student->age)
                                            ({{ $student->age }} anos)
                                        @endif
                                    </li>
                                @endif
                                <li class="mb-2">
                                    <i class="bi bi-mortarboard me-2 text-primary"></i>
                                    <strong>Nível:</strong> {{ $student->level_formatted }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar-plus me-2 text-primary"></i>
                                    <strong>Cadastro:</strong> {{ $student->created_at->format('d/m/Y H:i') }}
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            @if($student->goals)
                                <h6 class="text-muted mb-2">Objetivos</h6>
                                <p class="mb-3">{{ $student->goals }}</p>
                            @endif
                            
                            <div class="d-flex gap-2 mt-4">
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-tmd-primary">
                                    <i class="bi bi-pencil me-2"></i>Editar
                                </a>
                                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                                    <i class="bi bi-arrow-left me-2"></i>Voltar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">
                        <i class="bi bi-book me-2"></i>Cursos
                    </h5>
                </div>
                <div class="card-body">
                    @if($student->courses->count() > 0)
                        @foreach($student->courses as $course)
                            <div class="card mb-3">
                                <div class="card-body p-3">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <h6 class="card-title mb-0">{{ $course->name }}</h6>
                                        <span class="badge bg-primary">{{ $course->level_formatted }}</span>
                                    </div>
                                    <p class="card-text small text-muted mb-2">
                                        {{ Str::limit($course->description, 80) }}
                                    </p>
                                    
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <small class="text-muted">Status</small>
                                            <div>
                                                @php
                                                    $status = $course->pivot->status ?? 'enrolled';
                                                    $statusLabels = [
                                                        'enrolled' => ['Matriculado', 'success'],
                                                        'completed' => ['Concluído', 'primary'],
                                                        'dropped' => ['Desistente', 'danger']
                                                    ];
                                                @endphp
                                                <span class="badge bg-{{ $statusLabels[$status][1] ?? 'secondary' }}">
                                                    {{ $statusLabels[$status][0] ?? 'N/A' }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Matrícula</small>
                                            <div class="small">
                                                {{ $course->pivot->enrollment_date ? \Carbon\Carbon::parse($course->pivot->enrollment_date)->format('d/m/Y') : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Nota</small>
                                            <div class="small">
                                                {{ $course->pivot->grade ? number_format($course->pivot->grade, 1) : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($course->pivot->notes)
                                        <hr class="my-2">
                                        <small class="text-muted">
                                            <strong>Observações:</strong> {{ $course->pivot->notes }}
                                        </small>
                                    @endif
                                    
                                    <div class="mt-2">
                                        <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Ver Curso
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-book display-4 text-muted"></i>
                            <p class="text-muted mt-2">Nenhum curso matriculado</p>
                            <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-plus me-1"></i>Matricular em Curso
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

