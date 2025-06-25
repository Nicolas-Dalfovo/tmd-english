@extends('layouts.app')

@section('title', 'Sobre a Escola - TMD English')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Nossa História</h1>
                <p class="lead">Transformando vidas através do aprendizado do inglês desde 2009</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/teachers-certificates.jpg') }}" alt="Professoras TMD English" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-body p-5">
                        <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600; color: var(--tmd-navy);">
                            A TMD English
                        </h2>
                        
                        <p class="lead mb-4">
                            A TMD English nasceu em 2009, inspirada por um grande sonho: levar o aprendizado do inglês para outro nível, combinando paixão, dedicação e um ensino realmente personalizado.
                        </p>
                        
                        <p class="mb-4">
                            Tudo começou quando nossa fundadora, <strong>Teacher Michele Dalfovo</strong>, graduada em Letras Inglês pela UFSC, decidiu transformar sua experiência como professora em cursos de idiomas em algo único. Assim, deixou seu antigo trabalho para iniciar uma jornada independente, oferecendo aulas particulares.
                        </p>
                        
                        <p class="mb-4">
                            De um projeto solo a uma empresa consolidada, a TMD English cresceu junto com seus alunos e chegou a 2025 com uma comunidade vibrante de <strong>quase 100 estudantes</strong>, de todas as idades e objetivos. Nosso sucesso está na combinação de uma metodologia própria baseada no <strong>Communicative Approach</strong>, materiais exclusivos elaborados internamente e atividades dinâmicas que tornam o aprendizado prático e envolvente.
                        </p>
                        
                        <p class="mb-4">
                            Além disso, a TMD English cria oportunidades únicas para seus alunos mergulharem de cabeça no idioma e na cultura, organizando intercâmbios para destinos como <strong>Inglaterra, Escócia e Irlanda</strong>, ajudando nossos estudantes a ganharem confiança e vivenciarem o inglês no mundo real.
                        </p>
                        
                        <p class="mb-4">
                            Mais do que ensinar inglês, nossa missão é <strong>transformar vidas por meio do aprendizado</strong>, preparando nossos alunos para alcançar sonhos e conquistar o mundo.
                        </p>
                        
                        <div class="text-center">
                            <p class="fs-5 fw-bold" style="color: var(--tmd-gold);">
                                Venha fazer parte dessa história!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-bullseye text-white fs-2"></i>
                        </div>
                        <h4 class="card-title" style="color: var(--tmd-navy);">Missão</h4>
                        <p class="card-text">Transformar vidas por meio do aprendizado do inglês, preparando nossos alunos para alcançar sonhos e conquistar o mundo com confiança e fluência.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-eye text-white fs-2"></i>
                        </div>
                        <h4 class="card-title" style="color: var(--tmd-navy);">Visão</h4>
                        <p class="card-text">Ser reconhecida como a melhor escola de inglês de Florianópolis, referência em ensino personalizado e experiências internacionais transformadoras.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-heart text-white fs-2"></i>
                        </div>
                        <h4 class="card-title" style="color: var(--tmd-navy);">Valores</h4>
                        <p class="card-text">Paixão pelo ensino, dedicação aos alunos, excelência acadêmica, inovação pedagógica e compromisso com o crescimento pessoal e profissional.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: 'Cormorant Garamond', serif; font-weight: 600; color: var(--tmd-navy);">
            Nossa Metodologia
        </h2>
        
        <div class="row align-items-center mb-5">
            <div class="col-lg-6">
                <div id="classroomCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#classroomCarousel" data-bs-slide-to="0" class="active"></button>
                        <button type="button" data-bs-target="#classroomCarousel" data-bs-slide-to="1"></button>
                        <button type="button" data-bs-target="#classroomCarousel" data-bs-slide-to="2"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('images/sala-aula-1.jpg') }}" alt="Sala de aula TMD English - Ambiente 1" class="d-block w-100 rounded-4 shadow" style="height: 350px; object-fit: cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/sala-aula-2.jpg') }}" alt="Sala de aula TMD English - Ambiente 2" class="d-block w-100 rounded-4 shadow" style="height: 350px; object-fit: cover;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('images/sala-aula-3.jpg') }}" alt="Sala de aula TMD English - Ambiente 3" class="d-block w-100 rounded-4 shadow" style="height: 350px; object-fit: cover;">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#classroomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#classroomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6">
                <h3 class="mb-3" style="color: var(--tmd-navy);">Communicative Approach</h3>
                <p class="mb-3">
                    Nossa metodologia é baseada no <strong>Communicative Approach</strong>, que prioriza a comunicação real e significativa desde o primeiro dia de aula.
                </p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Foco na comunicação prática</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Materiais exclusivos e atualizados</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Atividades dinâmicas e envolventes</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Ensino personalizado para cada aluno</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Integração de cultura e idioma</li>
                </ul>
                <div class="mt-4">
                    <p class="text-muted">
                        <i class="bi bi-camera me-2"></i>
                        <small>Conheça nossos ambientes de aprendizado modernos e acolhedores</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center mb-5" style="font-family: 'Cormorant Garamond', serif; font-weight: 600; color: var(--tmd-navy);">
            Intercâmbios Internacionais
        </h2>
        
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="bg-danger bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-flag text-white fs-4"></i>
                        </div>
                        <h5 class="card-title">Inglaterra</h5>
                        <p class="card-text">Berço da língua inglesa, oferece experiência cultural única e sotaque britânico autêntico.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="bg-primary bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-flag text-white fs-4"></i>
                        </div>
                        <h5 class="card-title">Escócia</h5>
                        <p class="card-text">Paisagens deslumbrantes e rica história proporcionam aprendizado imersivo inesquecível.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                            <i class="bi bi-flag text-white fs-4"></i>
                        </div>
                        <h5 class="card-title">Irlanda</h5>
                        <p class="card-text">Hospitalidade irlandesa e ambiente acolhedor criam experiência de aprendizado única.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('contact') }}" class="btn btn-tmd-primary btn-lg">
                <i class="bi bi-airplane me-2"></i>Saiba Mais Sobre Intercâmbios
            </a>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600; color: var(--tmd-navy);">
                    Teacher Michele Dalfovo
                </h2>
                <p class="mb-3">
                    <strong>Fundadora e Diretora Pedagógica da TMD English</strong>
                </p>
                <p class="mb-3">
                    Graduada em Letras Inglês pela UFSC, Michele possui mais de 15 anos de experiência no ensino de inglês. Sua paixão pela educação e dedicação aos alunos são os pilares que sustentam o sucesso da TMD English.
                </p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-mortarboard text-primary me-2"></i>Graduação em Letras Inglês - UFSC</li>
                    <li class="mb-2"><i class="bi bi-award text-primary me-2"></i>Certificações internacionais</li>
                    <li class="mb-2"><i class="bi bi-clock text-primary me-2"></i>15+ anos de experiência</li>
                    <li class="mb-2"><i class="bi bi-people text-primary me-2"></i>Centenas de alunos formados</li>
                </ul>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-gradient rounded-4 p-4" style="background: linear-gradient(135deg, var(--tmd-navy) 0%, var(--tmd-navy-light) 100%);">
                    <i class="bi bi-person-circle text-white" style="font-size: 8rem;"></i>
                    <h4 class="text-white mt-3">Teacher Michele</h4>
                    <p class="text-white-50">Fundadora TMD English</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

