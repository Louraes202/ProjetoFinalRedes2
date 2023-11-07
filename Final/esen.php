<?php
include('navbar.php'); // Inclui a barra de navegação comum
?>
<title>ESEN</title>
<!-- Conteúdo específico da página ESEN -->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto" data-aos="fade-down">
            <h1 class="fw-light">Escola Secundária Emídio Navarro</h1>
            <p class="lead">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        </div>
        </div>
    </section>
</div>

<?php if (isset($_SESSION['username'])): ?>

<?php else: ?>
    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1 class="display-4">Acesso Restrito</h1>
                <p class="lead">Tem de estar autenticado para aceder ao conteúdo desta página.</p>
                <hr class="my-4">
                <p>Faça o login ou registe-se para continuar.</p>
                <p class="lead">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Fazer Login</a>
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal">Registar-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
  <?php endif; ?>