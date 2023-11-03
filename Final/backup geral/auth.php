<?php
session_start();

function authenticateUser() {
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
}

function getUserProfile() {
    // Determine o perfil do usuário atual
    return isset($_SESSION['user_profile']) ? $_SESSION['user_profile'] : 'unauthenticated';
}
?>
