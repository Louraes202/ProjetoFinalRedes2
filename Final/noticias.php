<?php
include('navbar.php'); // Inclui a barra de navegação comum
?>
<title>Noticias</title>
<!-- Conteúdo específico da página Noticias-->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto" data-aos="fade-down">
            <h1 class="fw-light">Notícias</h1>
            <p class="lead"> 
                Queres saber como começou e como continua este projeto? <br>
                Esta página contempla o progresso do projeto Pocket School, desde o seu insight à
                sua implementação técnica.
            </p>
        </div>
        </div>
    </section>
</div>

<?php if (isset($_SESSION['username'])): ?>
    <!-- Section: Timeline -->
    <section class="container py-5">
        <ul class="timeline">
            <li class="timeline-item mb-5">
            <h5 class="fw-bold">Tudo começa com uma ideia</h5>
            <p class="text-muted mb-2 fw-bold">Agosto, 2023</p>
            <p class="text-muted">
                No verão de 2023, eu tive a ideia de criar uma plataforma com o intuito deste 
                projeto, mas não me sentia preparado para desenvolver as plataformas necessárias
                para dar vida ao projeto.
                Mesmo não tendo as bases, fiz uma pesquisa de mercado e tentei perceber de que 
                forma poderia implementar as minhas ideias e o meu projeto no mercado.
            </p>
            </li>

            <li class="timeline-item mb-5">
            <h5 class="fw-bold">Aplicação no contexto do Projeto de Aptidão Profissional</h5>
            <p class="text-muted mb-2 fw-bold">Setembro, 2023</p>
            <p class="text-muted">
                Quando a época de aulas voltou, decidi aplicar a ideia no meu projeto final de curso.
                À medida que ia passando o tempo, estando eu no 12.º ano do curso profissional de
                Gestão e Programação de Sistemas Informáticos, as aulas começaram a dar-me as bases 
                que eu precisava para começar o desenvolvimento de um projeto bem estruturado e
                desenvolvido a nível profissional.
                Comecei a sentir-me mais preparado e, como tal, entreguei o pré-projeto com a ideia
                do Pocket School, a explicar tudo o que eu queria fazer e a exequibilidade do mesmo,
                incluíndo que tecnologias tencionava utilizar.
            </p>
            </li>

            <li class="timeline-item mb-5">
            <h5 class="fw-bold">Início do desenvolvimento da plataforma de suporte web</h5>
            <p class="text-muted mb-2 fw-bold">Outubro, 2023</p>
            <p class="text-muted">
                Na disciplina de Redes de Comunicação, vi a oportunidade de desenvolver
                um projeto web que integrava o front-end (básico) e o back-end, e aproveitei
                este momento para desenvolver uma plataforma de apoio web ao que será o projeto 
                do Pocket School, uma aplicação móvel. 
                Nesta plataforma, está a ser avaliado maioritariamente o back-end, ou seja, tudo
                o que é feito do lado do servidor.
            </p>
            </li>

            <li class="timeline-item mb-5">
            <h5 class="fw-bold">Entrega da plataforma de suporte web</h5>
            <p class="text-muted mb-2 fw-bold">Novembro, 2023</p>
            <p class="text-muted">
                No dia 13 de novembro, entreguei este website como projeto para avaliaçáo, como 
                mencionado anteriormente. 
            </p>
            </li>
        </ul>
    </section>
<!-- Section: Timeline -->
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