<?php
    // Incluir o arquivo de autenticação
    require 'inc/header.php';
    include 'auth.php';
    $current_page = basename($_SERVER['SCRIPT_FILENAME']);
    
?>
<!-- Navbar responsiva -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="home.php">
        <style>
            .icon {
            width: 1.25em;
            height: 1.25em;
            vertical-align: -.250em;
            }
        </style>
        <img src="img/logo3.png" class="icon"></svg>
            ManageMe
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="<?php echo ($current_page == 'home.php') ? "nav-link active" : "nav-link"; ?>" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo ($current_page == 'noticias.php') ? "nav-link active" : "nav-link"; ?>" href="noticias.php">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo ($current_page == 'plataforma.php') ? "nav-link active" : "nav-link"; ?>" href="plataforma.php">Plataforma</a>
                </li>
                <li class="nav-item">
                    <a class="<?php echo ($current_page == 'download.php') ? "nav-link active" : "nav-link"; ?>" href="download.php">Download</a>
                </li>
                <?php if ($user_profile === 'user'): ?>
                    <li class="nav-item">
                        <a class="<?php echo ($current_page == 'perfil.php') ? "nav-link active" : "nav-link"; ?>" href="perfil.php">Perfil</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="<?php echo ($current_page == 'esen.php') ? "nav-link dropdown-toggle active" : "nav-link dropdown-toggle"; ?>" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Recursos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Módulos funcionais</a></li>
                        <li><a class="dropdown-item" href="">Documentação</a></li>
                        <li><a class="dropdown-item" href="">API</a></li>
                        <li><a class="dropdown-item" href="">Solução para empresas</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item disabled" href="#">Versão final</a></li>
                    </ul>
                </li>


                <?php if ($user_profile === 'admin'): ?>
                    <!-- Exibir este item apenas se o utilizador for um administrador -->
                    <li class="nav-item">
                        <a class="<?php echo ($current_page == 'admin_panel.php') ? "nav-link active" : "nav-link"; ?>" href="admin_panel.php">Painel de Administrador</a>
                    </li>
                <?php else: ?>
                    
                <?php endif; ?>
            </ul>

            <!-- Adicione esta parte para exibir a fotografia de perfil -->
            <?php if ($logged_in_user): ?>
                <?php
                $queryFotoNavbar = "SELECT foto_perfil FROM users WHERE username = :username";
                $stmtFotoNavbar = $db->prepare($queryFotoNavbar);
                $stmtFotoNavbar->bindParam(':username', $logged_in_user);
                $stmtFotoNavbar->execute();
                $resultFotoNavbar = $stmtFotoNavbar->fetch(PDO::FETCH_ASSOC);
                $fotoPerfilNavbar = $resultFotoNavbar['foto_perfil'];
                ?>

                <div class="d-flex align-items-center justify-content-end">
                    <?php if (!empty($fotoPerfilNavbar)): ?>
                        <img src="uploads/<?php echo $fotoPerfilNavbar; ?>" alt="Foto de Perfil" class="img-thumbnail rounded-circle me-2" style="width: 40px; height: 40px; object-fit: cover; background-size: cover; background-position: center; padding: 0; border: 0">

                    <?php elseif ($user_profile === 'admin'): ?>
                        <i class="fa-solid fa-screwdriver-wrench me-2" style="color: #ffffff;"></i>
                    <?php else: ?>
                        <i class="fa-solid fa-user me-2" style="color: #ffffff;"></i>
                    <?php endif; ?>

                    <p class="text-light me-3 my-0">Logado como <?php echo $logged_in_user; ?></p>
                    <form method="post" action="">
                        <button class="btn btn-danger" type="submit" name="logout">Sair</button>
                    </form>
                </div>
            <?php else: ?>
                <button class="btn btn-outline-success me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
            <?php endif; ?>
            
            
        </div>
        
    </div>
</nav>

<!-- Modal de Login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Faça login na sua conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário de Login -->
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de utilizador</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <?php if (isset($login_error)) { echo "<p class='text-danger'>$login_error</p>"; } ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#registerModal">Registar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Registo -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Crie uma nova conta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário de Registo -->
                <form method="post">
                    <div class="mb-3">
                        <label for="newUsername" class="form-label">Novo Nome de utilizador</label>
                        <input type="text" class="form-control" name="newUsername" id="newUsername" required>
                    </div>
                    <div class="mb-3">
                        <label for="newPassword" class="form-label">Nova Password</label>
                        <input type="password" class="form-control" name="newPassword" id="newPassword" required>
                    </div>
                    <button type="submit" name="register" class="btn btn-primary">Registar</button>
                    <?php if (isset($register_error)) { echo "<p class='text-danger'>$register_error</p>"; } ?>
                    <?php if (isset($registration_success)) { echo "<p class='text-success'>$registration_success</p>"; } ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

