<?php
include "auth.php";

if ($_SESSION['user_profile'] === 'admin') {
    $_SESSION['users'] = [];
    $_SESSION['users']['admin'] = 'admin';
    echo "Lista de usuários foi limpa com sucesso!";
} else {
    echo "Apenas administradores têm permissão para limpar a lista de usuários.";

}
?>
