<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
    $_SESSION['users']['admin'] = 'admin';
}

$users = $_SESSION['users'];

if (isset($_POST['logout'])) {
    // Limpar apenas a variável do nome de usuário, mantendo os outros dados da sessão
    unset($_SESSION['username']);
    // Define o perfil do usuário como "guest"
    $_SESSION['user_profile'] = 'guest';
    $logged_in_user = null;
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['username'] = $username;
        
        // Verifique se o usuário está na lista de administradores (use um array ou uma tabela de banco de dados para armazenar essa informação).
        $admin_users = ['admin', 'outro_admin'];
        if (in_array($username, $admin_users)) {
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
        $_SESSION['user_profile'] = 'authenticated';
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