<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Define uma variável de sessão para indicar sucesso

    $escolaNome = isset($_POST['escolaNome']) ? trim($_POST['escolaNome']) : '';
    $contatoNome = isset($_POST['contatoNome']) ? trim($_POST['contatoNome']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $mensagem = isset($_POST['mensagem']) ? trim($_POST['mensagem']) : '';

    // Validação dos campos
    if (strlen($escolaNome) < 3 || strlen($contatoNome) < 3 || strlen($email) < 3 || strlen($mensagem) < 3) {
        $_SESSION['error'] = 'Todos os campos devem conter pelo menos 3 caracteres.';
        header('Location: plataforma.php');
        exit;
    }

    else {
        $_SESSION['success'] = 'Formulário enviado com sucesso';
    }

    // Armazena os dados em variáveis de sessão
    $_SESSION['escolaNome'] = $escolaNome;
    $_SESSION['contatoNome'] = $contatoNome;
    $_SESSION['email'] = $email;
    $_SESSION['mensagem'] = $mensagem;

    // Redireciona para a página do formulário
    header('Location: plataforma.php');
} else {
    // Se alguém acessar diretamente este script sem enviar o formulário, redireciona para o formulário
    header('Location: plataforma.php');
}
?>