@extends('layouts.app')

@section('title', 'Cursos - TMD English')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">
            <i class="bi bi-book me-2"></i>Cursos
        </h1>
        <a href="{{ route('courses.create') }}" class="btn btn-tmd-primary">
            <i class="bi bi-plus-circle me-2"></i>Novo Curso
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('courses.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Buscar</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Nome do curso...">
                </div>
                <div class="col-md-3">
                    <label for="level" class="form-label">Nível</label>
                    <select class="form-select" id="level" name="level">
                        <option value="">Todos os níveis</option>
                        <option value="beginner" {{ request('level') == 'beginner' ? 'selected' : '' }}>Iniciante</option>
                        <option value="elementary" {{ request('level') == 'elementary' ? 'selected' : '' }}>Básico</option>
                        <option value="pre_intermediate" {{ request('level') == 'pre_intermediate' ? 'selected' : '' }}>Pré-Intermediário</option>
                        <option value="intermediate" {{ request('level') == 'intermediate' ? 'selected' : '' }}>Intermediário</option>
                        <option value="upper_intermediate" {{ request('level') == 'upper_intermediate' ? 'selected' : '' }}>Intermediário Superior</option>
                        <option value="advanced" {{ request('level') == 'advanced' ? 'selected' : '' }}>Avançado</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">Todos</option>
                        <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Ativos</option>
                        <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Em Andamento</option>
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inativos</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-tmd-primary me-2">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-clockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if($courses->count() > 0)
        <div class="row">
            @foreach($courses as $course)
                <div class="col-lg-6 col-xl-4 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-book text-white fs-5"></i>
                                </div>
                                <div class="d-flex gap-1 flex-wrap">
                                    @if($course->active)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-secondary">Inativo</span>
                                    @endif
                                    <span class="badge bg-info">{{ $course->level_formatted }}</span>
                                    @if($course->start_date <= now() && $course->end_date >= now())
                                        <span class="badge bg-warning">Em Andamento</span>
                                    @endif
                                </div>
                            </div>
                            
                            <h5 class="card-title">{{ $course->name }}</h5>
                            <p class="card-text text-muted mb-3">{{ Str::limit($course->description, 100) }}</p>
                            
                            <div class="row text-center mb-3">
                                <div class="col-4">
                                    <small class="text-muted">Duração</small>
                                    <div class="fw-bold">{{ $course->duration_weeks }} sem</div>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">Alunos</small>
                                    <div class="fw-bold">{{ $course->students->count() }}/{{ $course->max_students }}</div>
                                </div>
                                <div class="col-4">
                                    <small class="text-muted">Preço</small>
                                    <div class="fw-bold text-success">{{ $course->price_formatted }}</div>
                                </div>
                            </div>
                            
                            @if($course->schedule)
                                <p class="card-text">
                                    <i class="bi bi-clock me-1"></i>
                                    <small class="text-muted">{{ $course->schedule }}</small>
                                </p>
                            @endif
                            
                            @if($course->start_date && $course->end_date)
                                <p class="card-text">
                                    <i class="bi bi-calendar-range me-1"></i>
                                    <small class="text-muted">
                                        {{ $course->start_date->format('d/m/Y') }} - {{ $course->end_date->format('d/m/Y') }}
                                    </small>
                                </p>
                            @endif
                            
                            <div class="progress mb-3" style="height: 6px;">
                                @php
                                    $occupancy = $course->max_students > 0 ? ($course->students->count() / $course->max_students) * 100 : 0;
                                @endphp
                                <div class="progress-bar bg-success" style="width: {{ $occupancy }}%"></div>
                            </div>
                            <small class="text-muted">{{ number_format($occupancy, 1) }}% ocupado</small>
                        </div>
                        
                        <div class="card-footer bg-transparent">
                            <div class="d-flex gap-2">
                                <a href="{{ route('courses.show', $course) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                    <i class="bi bi-eye me-1"></i>Ver
                                </a>
                                <a href="{{ route('courses.edit', $course) }}" class="btn btn-outline-warning btn-sm flex-fill">
                                    <i class="bi bi-pencil me-1"></i>Editar
                                </a>
                                <form action="{{ route('courses.destroy', $course) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Tem certeza que deseja excluir este curso?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center">
            {{ $courses->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-book display-1 text-muted"></i>
            <h3 class="mt-3 text-muted">Nenhum curso encontrado</h3>
            <p class="text-muted">Comece criando o primeiro curso da escola.</p>
            <a href="{{ route('courses.create') }}" class="btn btn-tmd-primary">
                <i class="bi bi-plus-circle me-2"></i>Criar Primeiro Curso
            </a>
        </div>
    @endif
</div>
@endsection

