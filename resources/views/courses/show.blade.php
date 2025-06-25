@extends('layouts.app')

@section('title', $course->name . ' - TMD English')

@section('content')
<div class="container py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">
                            <i class="bi bi-book me-2"></i>{{ $course->name }}
                        </h4>
                        <div class="d-flex gap-2">
                            @if($course->active)
                                <span class="badge bg-success fs-6">Ativo</span>
                            @else
                                <span class="badge bg-secondary fs-6">Inativo</span>
                            @endif
                            <span class="badge bg-info fs-6">{{ $course->level_formatted }}</span>
                            @if($course->start_date <= now() && $course->end_date >= now())
                                <span class="badge bg-warning fs-6">Em Andamento</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="text-muted mb-3">Descrição</h6>
                            <p class="mb-4">{{ $course->description }}</p>
                            
                            <h6 class="text-muted mb-2">Informações do Curso</h6>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="bi bi-mortarboard me-2 text-primary"></i>
                                    <strong>Nível:</strong> {{ $course->level_formatted }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-calendar-week me-2 text-primary"></i>
                                    <strong>Duração:</strong> {{ $course->duration_weeks }} semanas
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-currency-dollar me-2 text-primary"></i>
                                    <strong>Preço:</strong> {{ $course->price_formatted }}
                                </li>
                                <li class="mb-2">
                                    <i class="bi bi-people me-2 text-primary"></i>
                                    <strong>Capacidade:</strong> {{ $course->students->count() }}/{{ $course->max_students }} alunos
                                </li>
                                @if($course->schedule)
                                    <li class="mb-2">
                                        <i class="bi bi-clock me-2 text-primary"></i>
                                        <strong>Horário:</strong> {{ $course->schedule }}
                                    </li>
                                @endif
                                @if($course->start_date && $course->end_date)
                                    <li class="mb-2">
                                        <i class="bi bi-calendar-range me-2 text-primary"></i>
                                        <strong>Período:</strong> {{ $course->start_date->format('d/m/Y') }} - {{ $course->end_date->format('d/m/Y') }}
                                    </li>
                                @endif
                                <li class="mb-2">
                                    <i class="bi bi-calendar-plus me-2 text-primary"></i>
                                    <strong>Criado em:</strong> {{ $course->created_at->format('d/m/Y H:i') }}
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card bg-light">
                                <div class="card-body text-center">
                                    <h6 class="card-title">Ocupação do Curso</h6>
                                    @php
                                        $occupancy = $course->max_students > 0 ? ($course->students->count() / $course->max_students) * 100 : 0;
                                    @endphp
                                    <div class="progress mb-3" style="height: 20px;">
                                        <div class="progress-bar bg-success" style="width: {{ $occupancy }}%">
                                            {{ number_format($occupancy, 1) }}%
                                        </div>
                                    </div>
                                    <p class="mb-0">
                                        <strong>{{ $course->students->count() }}</strong> de <strong>{{ $course->max_students }}</strong> vagas ocupadas
                                    </p>
                                    @if($course->available_spots > 0)
                                        <p class="text-success mb-0">
                                            <i class="bi bi-check-circle me-1"></i>{{ $course->available_spots }} vagas disponíveis
                                        </p>
                                    @else
                                        <p class="text-danger mb-0">
                                            <i class="bi bi-x-circle me-1"></i>Curso lotado
                                        </p>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="d-flex gap-2 mt-4">
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-tmd-primary">
                                    <i class="bi bi-pencil me-2"></i>Editar
                                </a>
                                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
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
                        <i class="bi bi-people me-2"></i>Alunos Matriculados
                    </h5>
                </div>
                <div class="card-body">
                    @if($course->students->count() > 0)
                        @foreach($course->students as $student)
                            <div class="card mb-3">
                                <div class="card-body p-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                            <i class="bi bi-person text-white"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">{{ $student->name }}</h6>
                                            <small class="text-muted">{{ $student->level_formatted }}</small>
                                        </div>
                                        <span class="badge bg-primary">{{ $student->level_formatted }}</span>
                                    </div>
                                    
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <small class="text-muted">Status</small>
                                            <div>
                                                @php
                                                    $status = $student->pivot->status ?? 'enrolled';
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
                                                {{ $student->pivot->enrollment_date ? \Carbon\Carbon::parse($student->pivot->enrollment_date)->format('d/m/Y') : 'N/A' }}
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <small class="text-muted">Nota</small>
                                            <div class="small">
                                                {{ $student->pivot->grade ? number_format($student->pivot->grade, 1) : 'N/A' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @if($student->pivot->notes)
                                        <hr class="my-2">
                                        <small class="text-muted">
                                            <strong>Observações:</strong> {{ $student->pivot->notes }}
                                        </small>
                                    @endif
                                    
                                    <div class="mt-2">
                                        <a href="{{ route('students.show', $student) }}" class="btn btn-outline-primary btn-sm">
                                            <i class="bi bi-eye me-1"></i>Ver Aluno
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center py-4">
                            <i class="bi bi-people display-4 text-muted"></i>
                            <p class="text-muted mt-2">Nenhum aluno matriculado</p>
                            <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-plus me-1"></i>Matricular Alunos
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

