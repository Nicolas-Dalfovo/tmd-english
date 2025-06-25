@extends('layouts.app')

@section('title', 'Alunos - TMD English')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">
            <i class="bi bi-people me-2"></i>Alunos
        </h1>
        <a href="{{ route('students.create') }}" class="btn btn-tmd-primary">
            <i class="bi bi-person-plus me-2"></i>Novo Aluno
        </a>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('students.index') }}" class="row g-3">
                <div class="col-md-4">
                    <label for="search" class="form-label">Buscar</label>
                    <input type="text" class="form-control" id="search" name="search" 
                           value="{{ request('search') }}" placeholder="Nome ou email...">
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
                        <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inativos</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-tmd-primary me-2">
                        <i class="bi bi-search"></i>
                    </button>
                    <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-clockwise"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>

    @if($students->count() > 0)
        <div class="row">
            @foreach($students as $student)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-3">
                                <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="bi bi-person text-white fs-5"></i>
                                </div>
                                <div class="d-flex gap-1">
                                    @if($student->active)
                                        <span class="badge bg-success">Ativo</span>
                                    @else
                                        <span class="badge bg-secondary">Inativo</span>
                                    @endif
                                    <span class="badge bg-info">{{ $student->level_formatted }}</span>
                                </div>
                            </div>
                            
                            <h5 class="card-title">{{ $student->name }}</h5>
                            <p class="card-text text-muted mb-2">
                                <i class="bi bi-envelope me-1"></i>{{ $student->email }}
                            </p>
                            
                            @if($student->phone)
                                <p class="card-text text-muted mb-2">
                                    <i class="bi bi-telephone me-1"></i>{{ $student->phone }}
                                </p>
                            @endif
                            
                            @if($student->age)
                                <p class="card-text text-muted mb-2">
                                    <i class="bi bi-calendar me-1"></i>{{ $student->age }} anos
                                </p>
                            @endif
                            
                            @if($student->courses->count() > 0)
                                <div class="mb-3">
                                    <small class="text-muted">Cursos:</small>
                                    <div class="mt-1">
                                        @foreach($student->courses->take(2) as $course)
                                            <span class="badge bg-light text-dark me-1">{{ $course->name }}</span>
                                        @endforeach
                                        @if($student->courses->count() > 2)
                                            <span class="badge bg-light text-dark">+{{ $student->courses->count() - 2 }}</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                            
                            @if($student->goals)
                                <p class="card-text">
                                    <small class="text-muted">{{ Str::limit($student->goals, 80) }}</small>
                                </p>
                            @endif
                        </div>
                        
                        <div class="card-footer bg-transparent">
                            <div class="d-flex gap-2">
                                <a href="{{ route('students.show', $student) }}" class="btn btn-outline-primary btn-sm flex-fill">
                                    <i class="bi bi-eye me-1"></i>Ver
                                </a>
                                <a href="{{ route('students.edit', $student) }}" class="btn btn-outline-warning btn-sm flex-fill">
                                    <i class="bi bi-pencil me-1"></i>Editar
                                </a>
                                <form action="{{ route('students.destroy', $student) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm" 
                                            onclick="return confirm('Tem certeza que deseja excluir este aluno?')">
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
            {{ $students->links() }}
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-people display-1 text-muted"></i>
            <h3 class="mt-3 text-muted">Nenhum aluno encontrado</h3>
            <p class="text-muted">Comece cadastrando o primeiro aluno da escola.</p>
            <a href="{{ route('students.create') }}" class="btn btn-tmd-primary">
                <i class="bi bi-person-plus me-2"></i>Cadastrar Primeiro Aluno
            </a>
        </div>
    @endif
</div>
@endsection

