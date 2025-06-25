@extends('layouts.app')

@section('title', 'Novo Aluno - TMD English')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-person-plus me-2"></i>Cadastrar Novo Aluno
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label">Nome Completo *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" 
                                       id="phone" name="phone" value="{{ old('phone') }}" placeholder="(48) 99999-9999">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="birth_date" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control @error('birth_date') is-invalid @enderror" 
                                       id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="level" class="form-label">Nível de Inglês *</label>
                                <select class="form-select @error('level') is-invalid @enderror" id="level" name="level" required>
                                    <option value="">Selecione o nível</option>
                                    <option value="beginner" {{ old('level') == 'beginner' ? 'selected' : '' }}>Iniciante</option>
                                    <option value="elementary" {{ old('level') == 'elementary' ? 'selected' : '' }}>Básico</option>
                                    <option value="pre_intermediate" {{ old('level') == 'pre_intermediate' ? 'selected' : '' }}>Pré-Intermediário</option>
                                    <option value="intermediate" {{ old('level') == 'intermediate' ? 'selected' : '' }}>Intermediário</option>
                                    <option value="upper_intermediate" {{ old('level') == 'upper_intermediate' ? 'selected' : '' }}>Intermediário Superior</option>
                                    <option value="advanced" {{ old('level') == 'advanced' ? 'selected' : '' }}>Avançado</option>
                                </select>
                                @error('level')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="active" class="form-label">Status</label>
                                <select class="form-select @error('active') is-invalid @enderror" id="active" name="active">
                                    <option value="1" {{ old('active', '1') == '1' ? 'selected' : '' }}>Ativo</option>
                                    <option value="0" {{ old('active') == '0' ? 'selected' : '' }}>Inativo</option>
                                </select>
                                @error('active')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="goals" class="form-label">Objetivos com o Inglês</label>
                            <textarea class="form-control @error('goals') is-invalid @enderror" 
                                      id="goals" name="goals" rows="3" 
                                      placeholder="Ex: Viagem internacional, trabalho, estudos...">{{ old('goals') }}</textarea>
                            @error('goals')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        @if($courses->count() > 0)
                            <div class="mb-3">
                                <label class="form-label">Cursos (opcional)</label>
                                <div class="row">
                                    @foreach($courses as $course)
                                        <div class="col-md-6 mb-2">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" 
                                                       id="course_{{ $course->id }}" name="courses[]" value="{{ $course->id }}"
                                                       {{ in_array($course->id, old('courses', [])) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="course_{{ $course->id }}">
                                                    {{ $course->name }}
                                                    <small class="text-muted">({{ $course->level_formatted }})</small>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-tmd-primary">
                                <i class="bi bi-check-lg me-2"></i>Cadastrar Aluno
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

