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
        <h2 class="featurette-heading">Leva um sistema de informação <span class="text-muted">eficiente</span> para a tua vida</h2>
        <p class="lead">O ManageMe redefine a abordagem à gestão pessoal, proporcionando ferramentas inovadoras que capacitam os utilizadores a assumirem o controle de sua organização e produtividade. Esta plataforma revolucionária, centrada na aplicação web principal e suporte adicional através do site, visa solucionar desafios comuns associados à má gestão pessoal, promovendo eficácia e bem-estar.
        <br>Ao contrário das abordagens convencionais, o ManageMe não se limita a resolver um único problema, mas integra diversas ferramentas destinadas a aprimorar vários aspectos da gestão pessoal. Desde a inteligente gestão do tempo até a organização de tarefas, eventos, compromissos, gestão financeira, hábitos e rotinas, os módulos fornecem aos utilizadores uma solução abrangente para otimizar sua vida diária.
        </p>
      </div>
      <div class="col-md-5">
        <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/manageme_logo.png" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">

      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2" data-aos="fade-up">
        <h2 class="featurette-heading">A importância da produtividade na <span class="text-muted">vida pessoal e profissional</span></h2>
        <p class="lead">Num mundo em constante evolução, a gestão pessoal é uma área que não pode ficar estagnada. À medida que a tecnologia avança, é imperativo que os indivíduos abracem inovações para proporcionar a si mesmos uma experiência de organização e produtividade mais enriquecedora e eficaz. Nesse contexto, a implementação de sistemas de informação pessoal surge como uma peça-chave para impulsionar a transformação na autogestão.</p>
      </div>
      <div class="col-md-5 order-md-1">
      <img class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" src="img/productivity.webp" width="500" height="500"  preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7" data-aos="fade-up">
        <h2 class="featurette-heading">Todos os serviços e recursos <span class="text-muted">numa única app</span></h2>
        <p class="lead">
          O ManageMe não é apenas uma aplicação; é uma solução completa que redefine a gestão pessoal e a organização diária. O processo de implementação começa aqui, no website atual, onde os utilizadores podem fazer o pré-registo para adquirir esta inovadora plataforma de autogestão. Ao solicitar o acesso à plataforma neste site (requisição), os utilizadores estão a dar o primeiro passo para uma experiência de gestão pessoal transformadora.</p>
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

  <div class="position-relative overflow-hidden bg-dark text-light">
    <section class="container py-5">
      <ul class="timeline">
          <li class="timeline-item mb-5">
              <h5 class="fw-bold">Génese do ManageMe</h5>
              <p class=" mb-2 fw-bold">Agosto, 2023</p>
              <p class="">
                  No verão de 2023, surgiu a ideia de criar uma plataforma inovadora chamada ManageMe,
                  dedicada a transformar a experiência de gestão pessoal. Embora eu ainda não tivesse todas as competências
                  necessárias, conduzi uma pesquisa de mercado para entender como poderia implementar as minhas ideias
                  e o meu projeto no mercado.
              </p>
          </li>

          <li class="timeline-item mb-5">
              <h5 class="fw-bold">Aplicação no contexto do Projeto de Aptidão Profissional</h5>
              <p class=" mb-2 fw-bold">Setembro, 2023</p>
              <p class="">
                  Quando a época de aulas voltou, decidi aplicar a ideia no meu projeto final de curso.
                  À medida que o tempo passava, estando eu no 12.º ano do curso profissional de
                  Gestão e Programação de Sistemas Informáticos, as aulas começaram a fornecer-me as bases
                  necessárias para começar o desenvolvimento de um projeto bem estruturado e
                  desenvolvido a nível profissional.
                  Comecei a sentir-me mais preparado e, como tal, entreguei o pré-projeto com a ideia
                  do ManageMe, explicando tudo o que eu queria fazer e a exequibilidade do mesmo,
                  incluindo as tecnologias que pretendia utilizar.
              </p>
          </li>

          <li class="timeline-item mb-5">
              <h5 class="fw-bold">Início do desenvolvimento da plataforma de suporte web</h5>
              <p class=" mb-2 fw-bold">Outubro, 2023</p>
              <p class="">
                  Na disciplina de Redes de Comunicação, vi a oportunidade de desenvolver
                  um projeto web que integrava o front-end (básico) e o back-end, e aproveitei
                  esse momento para desenvolver uma plataforma de apoio web ao que seria o projeto
                  do ManageMe, uma aplicação móvel.
                  Nesta plataforma, estou a avaliar principalmente o back-end, ou seja, tudo
                  o que é feito do lado do servidor.
              </p>
          </li>

          <li class="timeline-item mb-5">
              <h5 class="fw-bold">Entrega da plataforma de suporte web</h5>
              <p class=" mb-2 fw-bold">Novembro, 2023</p>
              <p class="">
                  No dia 13 de novembro, entreguei este website como projeto para avaliação, como
                  mencionado anteriormente.
              </p>
          </li>
      </ul>
    </section>
  </div>

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

  <?php
    include('inc/footer.php'); 
?>