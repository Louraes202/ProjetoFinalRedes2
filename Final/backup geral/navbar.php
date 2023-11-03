<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$users = $_SESSION['users'];

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        
        // Defina o perfil do usuário com base em alguma lógica (por exemplo, verificar se é um administrador)
        if ($username === 'admin') {
            $_SESSION['user_profile'] = 'admin';
        } else {
            $_SESSION['user_profile'] = 'authenticated';
        }
        $login_success = "Login bem-sucedido. Bem-vindo, $username!";
    } else {
        $login_error = "Credenciais inválidas. Tente novamente.";
    }
}

if (isset($_POST['register'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    if (isset($users[$newUsername])) {
        $register_error = "O nome de usuário já está em uso.";
    } else {
        $users[$newUsername] = $newPassword;
        $_SESSION['username'] = $newUsername;
        $registration_success = "Registo bem-sucedido. Bem-vindo, $newUsername!";
    }
}

if (isset($_POST['logout'])) {
    // Limpar apenas a variável do nome de usuário, mantendo os outros dados da sessão
    unset($_SESSION['username']);
    $logged_in_user = null;
}

// Atualizar a sessão com as credenciais de usuário
$_SESSION['users'] = $users;

// Verificar se o usuário está logado e exibir seu nome de usuário no cabeçalho
$logged_in_user = isset($_SESSION['username']) ? $_SESSION['username'] : null;

// Determinar o perfil do usuário atual
$user_profile = isset($_SESSION['user_profile']) ? $_SESSION['user_profile'] : 'unauthenticated';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocket School CMS</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a756a50383.js" crossorigin="anonymous"></script>

    <!-- Toasts para mensagens de sucesso e erro -->
    <div class="position-fixed bottom-0 end-0 p-3">
        <?php if (isset($login_success)): ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Login Bem-Sucedido</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">
                    <?php echo $login_success; ?>
                </div>
            </div>
        <?php elseif (isset($login_error)): ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Erro de Login</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">
                    <?php echo $login_error; ?>
                </div>
            </div>
        <?php elseif (isset($registration_success)): ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-success text-white">
                    <strong class="me-auto">Registo Bem-Sucedido</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">
                    <?php echo $registration_success; ?>
                </div>
            </div>
        <?php elseif (isset($register_error)): ?>
            <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-danger text-white">
                    <strong class="me-auto">Erro de Registo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
                </div>
                <div class="toast-body">
                    <?php echo $register_error; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>

</head>
<body>
    <!-- Navbar responsiva -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <i class="fa-brands fa-rocketchat"></i>
                PocketSchool
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="noticias.php">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="plataforma.php">Plataforma</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Escolas
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="esen.php">ESEN</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">ESAM</a></li>
                            <li><a class="dropdown-item" href="#">ESEV</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex align-items-center">
                <?php if ($logged_in_user): ?>
                    <p class="text-light me-3 my-0">Logado como <?php echo $logged_in_user; ?></p>
                    <form method="post" action="">
                        <button class="btn btn-danger" type="submit" name="logout">Sair</button>
                    </form>
                <?php else: ?>
                    <button class="btn btn-outline-success me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
                <?php endif; ?>
                </div>
                
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
                            <label for="username" class="form-label">Nome de usuário</label>
                            <input type="text" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
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
                            <label for="newUsername" class="form-label">Novo Nome de usuário</label>
                            <input type="text" class="form-control" name="newUsername" id="newUsername" required>
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Nova Senha</label>
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

    <script>
        // Fecha automaticamente as toasts após alguns segundos
        window.addEventListener('DOMContentLoaded', (event) => {
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach((toast) => {
                const bsToast = new bootstrap.Toast(toast, { delay: 5000 });
                bsToast.show();
            });
        });
    </script>

</body>
</html>
