@extends('layouts.app')

@section('title', 'Contato - TMD English')

@section('content')
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="hero-title">Entre em Contato</h1>
                <p class="lead">Estamos prontos para ajudar você a conquistar a fluência em inglês</p>
            </div>
            <div class="col-lg-6 text-center">
                <img src="{{ asset('images/students-intercambio.jpg') }}" alt="Alunos TMD English" class="img-fluid rounded-4 shadow-lg" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">
                            <i class="bi bi-envelope me-2"></i>Envie sua Mensagem
                        </h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Nome Completo *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">E-mail *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Telefone</label>
                                    <input type="tel" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="interest" class="form-label">Interesse</label>
                                    <select class="form-select" id="interest" name="interest">
                                        <option value="">Selecione...</option>
                                        <option value="curso">Cursos de Inglês</option>
                                        <option value="intercambio">Intercâmbios</option>
                                        <option value="particular">Aulas Particulares</option>
                                        <option value="empresarial">Inglês Empresarial</option>
                                        <option value="outros">Outros</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Mensagem *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required
                                          placeholder="Conte-nos sobre seus objetivos com o inglês..."></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-tmd-primary btn-lg">
                                <i class="bi bi-send me-2"></i>Enviar Mensagem
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-geo-alt me-2"></i>Informações de Contato
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-envelope text-primary me-2"></i>
                                <strong>E-mail:</strong><br>
                                <a href="mailto:contato@tmdenglish.com.br">tmdenglish@tmdenglish.page</a>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <strong>Telefone:</strong><br>
                                <a href="tel:+5548999999999">(47) 98868-0101</a>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-whatsapp text-success me-2"></i>
                                <strong>WhatsApp:</strong><br>
                                <a href="https://wa.me/5548999999999" target="_blank">(47) 98868-0101</a>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <strong>Endereço:</strong><br>
                                Rio do Sul - SC<br>
                                Brasil
                            </li>
                        </ul>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="bi bi-clock me-2"></i>Horário de Atendimento
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mb-0">
                            <li class="mb-2">
                                <strong>Segunda a Sexta:</strong><br>
                                08:00 às 18:00
                            </li>
                            <li class="mb-2">
                                <strong>Sábado e Domingo</strong><br>
                                Fechado
                            </li>
                        </ul>
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
                            <i class="bi bi-book text-white fs-2"></i>
                        </div>
                        <h5 class="card-title" style="color: var(--tmd-navy);">Cursos Regulares</h5>
                        <p class="card-text">Turmas organizadas por nível, com metodologia comunicativa e materiais exclusivos.</p>
                        <a href="{{ route('courses.index') }}" class="btn btn-outline-primary">Ver Cursos</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-person text-white fs-2"></i>
                        </div>
                        <h5 class="card-title" style="color: var(--tmd-navy);">Aulas Particulares</h5>
                        <p class="card-text">Ensino personalizado, focado nas suas necessidades específicas e objetivos.</p>
                        <a href="#" class="btn btn-outline-success">Saiba Mais</a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 mb-4">
                <div class="card h-100 text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-gradient rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-airplane text-white fs-2"></i>
                        </div>
                        <h5 class="card-title" style="color: var(--tmd-navy);">Intercâmbios</h5>
                        <p class="card-text">Experiências únicas na Inglaterra, Escócia e Irlanda para vivenciar o inglês.</p>
                        <a href="#" class="btn btn-outline-warning">Conhecer Destinos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h2 class="mb-4" style="font-family: 'Cormorant Garamond', serif; font-weight: 600; color: var(--tmd-navy);">
                    Pronto para Começar?
                </h2>
                <p class="lead mb-4">
                    Faça parte da comunidade TMD English e transforme seu futuro através do aprendizado do inglês.
                </p>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Metodologia comprovada</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Professores qualificados</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Turmas reduzidas</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Materiais exclusivos</li>
                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Oportunidades de intercâmbio</li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="https://wa.me/5548999999999" target="_blank" class="btn btn-success btn-lg">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                    <a href="mailto:contato@tmdenglish.com.br" class="btn btn-outline-primary btn-lg">
                        <i class="bi bi-envelope me-2"></i>E-mail
                    </a>
                </div>
            </div>
            <div class="col-lg-6 text-center">
                <div class="bg-gradient rounded-4 p-5" style="background: linear-gradient(135deg, var(--tmd-navy) 0%, var(--tmd-navy-light) 100%);">
                    <i class="bi bi-chat-dots text-white" style="font-size: 6rem;"></i>
                    <h4 class="text-white mt-3">Vamos Conversar!</h4>
                    <p class="text-white-50">Estamos aqui para ajudar você a alcançar seus objetivos</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

