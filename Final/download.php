<?php
include('navbar.php'); // Inclui a barra de navegação comum

?>
<!-- loading modal --->
<div class="modal fade" id="loadingModal" tabindex="-1" aria-labelledby="loadingModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loadingModal">Loading</h5>
            </div>
            <div class="modal-body">
                A sua requisição está a ser enviada...
            </div>
        </div>
    </div>
</div>


<title>Plataforma</title>
<!-- Conteúdo específico da página Plataforma -->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto" data-aos="fade-down">
            <h1 class="fw-light">Download</h1>
            <p class="lead">Transfere a nossa aplicação e usufrui do Manage Me! <br> Podes transferir a app tanto para 
            android como para IOS.
            </p>
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