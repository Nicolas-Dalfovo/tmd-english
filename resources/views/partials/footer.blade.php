<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('images/tmd-logo.jpg') }}" alt="TMD English" height="40" class="me-2">
                    <h5 class="mb-0" style="font-family: 'Cormorant Garamond', serif; font-weight: 600;">TMD English</h5>
                </div>
                <p class="mb-3">Transformando vidas através do aprendizado do inglês desde 2009. Metodologia personalizada e intercâmbios internacionais.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white-50 fs-5"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white-50 fs-5"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white-50 fs-5"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="text-white-50 fs-5"><i class="bi bi-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="mb-3" style="color: var(--tmd-gold);">Navegação</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-white-50 text-decoration-none">Início</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-white-50 text-decoration-none">Sobre</a></li>
                    <li class="mb-2"><a href="{{ route('courses.index') }}" class="text-white-50 text-decoration-none">Cursos</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}" class="text-white-50 text-decoration-none">Contato</a></li>
                </ul>
            </div>
            
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="mb-3" style="color: var(--tmd-gold);">Cursos</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><span class="text-white-50">Inglês Básico</span></li>
                    <li class="mb-2"><span class="text-white-50">Inglês Intermediário</span></li>
                    <li class="mb-2"><span class="text-white-50">Inglês Avançado</span></li>
                    <li class="mb-2"><span class="text-white-50">Preparatório IELTS</span></li>
                    <li class="mb-2"><span class="text-white-50">Business English</span></li>
                </ul>
            </div>
            
            <div class="col-lg-3 mb-4">
                <h6 class="mb-3" style="color: var(--tmd-gold);">Contato</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="bi bi-geo-alt me-2"></i>
                        <span class="text-white-50">Rio do Sul, SC</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-telephone me-2"></i>
                        <span class="text-white-50">(47) 98868-0101</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-envelope me-2"></i>
                        <span class="text-white-50">tmdenglish@tmdenglish.page</span>
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-clock me-2"></i>
                        <span class="text-white-50">Seg-Sex: 8h às 18h</span>
                    </li>
                </ul>
            </div>
        </div>
        
        <hr class="my-4" style="border-color: var(--tmd-navy-light);">
        
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-white-50">&copy; {{ date('Y') }} TMD English. Todos os direitos reservados.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0 text-white-50">Desenvolvido com <i class="bi bi-heart-fill text-danger"></i> para educação</p>
            </div>
        </div>
    </div>
</footer>

