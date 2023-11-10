<?php
include('navbar.php'); // Inclui a barra de navegação comum
?>

<style>
.animcontainer {
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	height: auto;
    width: auto;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}
</style>

<title>Home</title>
<!-- Conteúdo específico da página Home -->
<div class="animcontainer">
    <div class="col-md-5 p-lg-5 p-4 mx-auto text-light" data-aos="zoom-out-down">
            <h1 class="display-4 font-weight-normal">Bem-vindo à era do <b>Pocket School!</b></h1>
            <p class="lead font-weight-normal">Uma plataforma que pretende levar um sistema de informação implementável para</p>
            <a class="btn btn-secondary" href="#ftr1">Saber mais</a>
    
    </div>
</div>


<div class="container marketing my-lg-5 my-4">

    <!-- Three columns of text -->
    <div class="row">
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/autor.png" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Autor</h2>
        <p>Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#autorModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/cursologo.png" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Curso</h2>
        <p>Another exciting bit of representative placeholder content. This time, we've moved on to the second column.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cursoModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/ESENnoite.jpg" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Escola</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#escolaModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider" id="ftr1">

    <div class="row featurette">
      <div class="col-md-7" data-aos="fade-up">
        <h2 class="featurette-heading">Leva um sistema de informação <span class="text-muted">eficiente</span> para a tua escola</h2>
        <p class="lead">Some great placeholder content for the first featurette here. Imagine some exciting prose here.</p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/logo2.png" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2" data-aos="fade-up">
        <h2 class="featurette-heading">Só mais um projeto... Ou <span class="text-muted">o projeto?</span></h2>
        <p class="lead">Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/logo2.png" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7" data-aos="fade-up">
        <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
        <p class="lead">And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.</p>
      </div>
      <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/logo2.png" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div>

  <!-- Modal do autor (FAZER FUNÇÃO PARA RETORNAR ESTE CÓDIGO 3 VEZES, NOS 3 VIEW DETAILS--> 
  <div class="modal fade" id="autorModal" tabindex="-1" aria-labelledby="authorModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="authorModalLabel">Detalhes do Autor</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Conteúdo do modal -->
                  <div class="d-flex">
                      <img src="img/autor.png" class="img-fluid rounded-circle me-3" alt="Imagem do Autor" width="140" height="140">
                      <div class="my-2">
                        <h2 class="">Martim Loureiro</h2>
                        <h5 class="text-muted">Estudante de <a href="">GPSI<a></h2>
                      </div>
                  </div>
                  <p>Alguma informação sobre o autor.</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
  </div>


  <?php if (isset($_SESSION['username'])): ?>

  <?php else: ?>
    <div class="container my-0">
      <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1 class="display-4">Quer continuar a ler?</h1>
                <p class="lead">Faça login ou registe-se para continuar a ler.</p>
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