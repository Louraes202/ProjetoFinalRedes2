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
            <h1 class="display-4 font-weight-normal">Bem-vindo à era do <b>Manage Me!</b></h1>
            <p class="lead font-weight-normal">Uma plataforma que pretende levar um sistema de informação implementável para todas as escolas.</p>
            <a class="btn btn-secondary" href="#ftr1">Saber mais</a>
    
    </div>
</div>


<div class="container marketing my-lg-5 my-4">

    <!-- Three columns of text -->
    <div class="row">
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/autor.png" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Autor</h2>
        <p>Estudante do ensino secundário, do curso GPSI, na Emídio Navarro, em Viseu.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#autorModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/cursologo.png" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Curso</h2>
        <p>Informações sobre o curso de Gestão e Programação de Sistemas Informáticos.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#cursoModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-4" data-aos="fade-up">
        <img class="bd-placeholder-img rounded-circle" src="img/ESENnoite.jpg" width="140" height="140" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">

        <h2 class="my-2">Escola</h2>
        <p>Informações sobre a Escola Secundária Emídio Navarro, em Viseu.</p>
        <p><a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#escolaModal">Ver mais »</a></p>
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider" id="ftr1">

    <div class="row featurette">
      <div class="col-md-7" data-aos="fade-up">
        <h2 class="featurette-heading">Leva um sistema de informação <span class="text-muted">eficiente</span> para a tua escola</h2>
        <p class="lead">O PocketSchool redefine a forma como escolas se comunicam e gerem informações ao colocar toda a essência educativa na palma da mão, através de uma aplicação móvel inovadora. Focando-se na comunicação de eventos e informações escolares, esta app oferece uma revolução na interação entre a escola, alunos e encarregados de educação.
        A aplicação simplifica a gestão escolar, disponibilizando facilmente eventos, comunicados e informações essenciais. Em vez de procurar em várias fontes, tudo o que os pais e alunos precisam está centralizado numa plataforma móvel, tornando a comunicação transparente e eficiente.
        </p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/logo2.png" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2" data-aos="fade-up">
        <h2 class="featurette-heading">A importância da tecnologia na <span class="text-muted">educação</span></h2>
        <p class="lead">Num mundo em constante evolução, a educação é um campo que não pode ficar estagnado. À medida que a tecnologia avança, 
          é imperativo que as instituições educativas abracem as inovações para proporcionar aos alunos uma experiência de aprendizagem mais enriquecedora e eficaz. 
          Nesse contexto, a implementação de sistemas de informação em cada escola surge como uma peça-chave para impulsionar a transformação educativa.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/techineducation.jpg" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7" data-aos="fade-up">
        <h2 class="featurette-heading">Todos os serviços e recursos <span class="text-muted">numa única app</span></h2>
        <p class="lead">O PocketSchool não é apenas uma aplicação; é uma solução completa que redefine a comunicação e a gestão de informações escolares. O processo de implementação começa aqui, no website atual, onde as escolas podem fazer o pré-registo para adquirir esta inovadora plataforma educativa.
        Ao requisitar a plataforma neste site <a href="plataforma.php">(requisição)</a>, as escolas estão a dar o primeiro passo para uma experiência educativa transformadora. Este pré-registo funciona como um "pre-order", garantindo acesso prioritário à versão final assim que for lançada. A facilidade do processo permite que as escolas, num clique, iniciem o caminho para uma gestão escolar mais eficiente e uma comunicação mais transparente.</p>
      </div>
      <div class="col-md-5">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/mobile-app.jpg" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">
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
                      <img src="img/autor.png" class="bd-placeholder-img rounded-circle me-3 mb-3" alt="Imagem do Autor" width="140" height="140">
                      <div class="my-2">
                        <h2 class="">Martim Loureiro</h2>
                        <h5 class="text-muted">Estudante de GPSI</h2>
                      </div>
                  </div>
                  <p>
                    Estudante do ensino secundário (curso técnico-profissional), do curso GPSI, na Emídio Navarro, em Viseu. <br>
                    Programador júnior e entusiasta político e tecnológico. 
                    Programo desde os 8 anos de idade, e cada vez mais sinto vontade de aprender novos conceitos. 
                    Sou apaixonado por aprender coisas novas e por melhorar as minhas habilidades a cada dia que passa.
                  </p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
  </div>

    <!-- Modal do curso (FAZER FUNÇÃO PARA RETORNAR ESTE CÓDIGO 3 VEZES, NOS 3 VIEW DETAILS--> 
    <div class="modal fade" id="cursoModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="authorModalLabel">Detalhes do Curso</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Conteúdo do modal -->
                  <div class="d-flex">
                      <img src="img/cursologo.png" style=""class="bd-placeholder-img rounded-circle me-3 mb-3" alt="Imagem do Curso" width="140" height="140">
                      <div class="my-2">
                        <h2 class="">GPSI</h2>
                        <h5 class="text-muted">Gestão e Programação de Sistemas Informáticos</h2>
                      </div>
                  </div>
                  <p>Curso profissional da Escola Secundária Emídio Navarro. <br>
                  Definição do própria oferta formativa, relativamente ao curso:
                    O técnico de gestão e programação de sistemas informáticos é o profissional
                    qualificado apto a realizar, de forma autónoma ou integrado numa equipa, atividades
                    de conceção, especificação, projeto, implementação, avaliação, suporte e manutenção
                    de sistemas informáticos e de tecnologias de processamento e transmissão de dados
                    e informações.
                  </p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
              </div>
          </div>
      </div>
  </div>

    <!-- Modal da escola (FAZER FUNÇÃO PARA RETORNAR ESTE CÓDIGO 3 VEZES, NOS 3 VIEW DETAILS--> 
    <div class="modal fade" id="escolaModal" tabindex="-1" aria-labelledby="schoolModalLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="authorModalLabel">Detalhes da Escola</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <!-- Conteúdo do modal -->
                  <div class="d-flex">
                      <img src="img/esennoite.jpg" class="bd-placeholder-img rounded-circle me-3 mb-3 " alt="Imagem da Escola" width="140" height="140">
                      <div class="my-2">
                        <h2 class="">ESEN</h2>
                        <h5 class="text-muted">Escola secundária em Viseu</h2>
                      </div>
                  </div>
                  <p>Fundada em 1898 por Decreto Régio de 09/12/1898, no reinado do Rei Dom Carlos, com o nome de Escola de Desenho Industrial de Viseu, entrou em funcionamento no ano lectivo de 1899/1900. <br>
                    Ao longo de oito décadas, foi sofrendo alteração na sua estrutura e designação. O Decreto nº 2609-E, de 4 de Setembro de 1916, traz já a designação de Escola Industrial e Comercial Emídio Navarro de Viseu, pelo facto de ter sido introduzido o Curso Elementar do Comércio. <br>
                    A partir de 25 de Agosto de 1948, a Escola voltou a ser Escola Industrial e Comercial de Viseu e, em 29 de Outubro de 1979, pela Portaria nº 608, passou a adotar a sua designação atual, Escola Secundária de Emídio Navarro (muitas vezes referida abreviadamente por ESEN).
                    Fica localizada na Rua Mestre Teotónio Albuquerque perto do Teatro Viriato, em Viseu. <br>

                    Assegura, juntamente com a Escola Secundária Alves Martins e a Escola Secundária de Viriato, o ensino secundário na cidade de Viseu.
                  </p>
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