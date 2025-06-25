@extends('layouts.app')

@section('title', 'Novo Curso - TMD English')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="bi bi-plus-circle me-2"></i>Cadastrar Novo Curso
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('courses.store') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="name" class="form-label">Nome do Curso *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required
                                       placeholder="Ex: Inglês Básico, Business English...">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="level" class="form-label">Nível *</label>
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
                        </div>
                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrição *</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" 
                                      id="description" name="description" rows="3" required
                                      placeholder="Descreva o conteúdo e objetivos do curso...">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="duration_weeks" class="form-label">Duração (semanas) *</label>
                                <input type="number" class="form-control @error('duration_weeks') is-invalid @enderror" 
                                       id="duration_weeks" name="duration_weeks" value="{{ old('duration_weeks') }}" 
                                       min="1" max="52" required>
                                @error('duration_weeks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="price" class="form-label">Preço (R$) *</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror" 
                                       id="price" name="price" value="{{ old('price') }}" 
                                       min="0" step="0.01" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
                                <label for="max_students" class="form-label">Máximo de Alunos *</label>
                                <input type="number" class="form-control @error('max_students') is-invalid @enderror" 
                                       id="max_students" name="max_students" value="{{ old('max_students') }}" 
                                       min="1" max="50" required>
                                @error('max_students')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="start_date" class="form-label">Data de Início</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" 
                                       id="start_date" name="start_date" value="{{ old('start_date') }}">
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="end_date" class="form-label">Data de Término</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" 
                                       id="end_date" name="end_date" value="{{ old('end_date') }}">
                                @error('end_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <label for="schedule" class="form-label">Horário</label>
                                <input type="text" class="form-control @error('schedule') is-invalid @enderror" 
                                       id="schedule" name="schedule" value="{{ old('schedule') }}"
                                       placeholder="Ex: Seg/Qua/Sex - 19h às 21h">
                                @error('schedule')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-4 mb-3">
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
                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-tmd-primary">
                                <i class="bi bi-check-lg me-2"></i>Cadastrar Curso
                            </button>
                            <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    // Auto-calcular data de término baseada na duração
    document.getElementById('start_date').addEventListener('change', calculateEndDate);
    document.getElementById('duration_weeks').addEventListener('change', calculateEndDate);
    
    function calculateEndDate() {
        const startDate = document.getElementById('start_date').value;
        const durationWeeks = document.getElementById('duration_weeks').value;
        
        if (startDate && durationWeeks) {
            const start = new Date(startDate);
            const end = new Date(start.getTime() + (durationWeeks * 7 * 24 * 60 * 60 * 1000));
            document.getElementById('end_date').value = end.toISOString().split('T')[0];
        }
    }
</script>
@endsection
@endsection

