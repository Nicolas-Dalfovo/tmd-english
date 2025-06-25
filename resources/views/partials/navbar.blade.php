<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('home') }}">
            <img src="{{ asset('images/tmd-logo.jpg') }}" alt="TMD English" height="40" class="me-2">
            TMD English
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                        <i class="bi bi-house me-1"></i>Início
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        <i class="bi bi-info-circle me-1"></i>Sobre a Escola
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-book me-1"></i>Cursos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('courses.index') }}">
                            <i class="bi bi-list me-2"></i>Ver Todos os Cursos
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('courses.create') }}">
                            <i class="bi bi-plus-circle me-2"></i>Novo Curso
                        </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('students.*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown">
                        <i class="bi bi-people me-1"></i>Alunos
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('students.index') }}">
                            <i class="bi bi-list me-2"></i>Ver Todos os Alunos
                        </a></li>
                        <li><a class="dropdown-item" href="{{ route('students.create') }}">
                            <i class="bi bi-person-plus me-2"></i>Novo Aluno
                        </a></li>
                    </ul>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">
                        <i class="bi bi-envelope me-1"></i>Contato
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div style="height: 80px;"></div>

