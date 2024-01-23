<?php
session_start();

include 'db/config.php';

if (isset($_POST['novaPassword'])) {
    $novaPassword = $_POST['novaPassword'];

    $db = connect_db();

    if (!$db) {
        die("Erro ao conectar à base de dados.");
    }

    $username = $_SESSION['username'];

    // Se o campo da senha não estiver vazio, atualize a senha
    if ($novaPassword !== '') {
        $hashedNovaPassword = password_hash($novaPassword, PASSWORD_DEFAULT);
        $querySenha = "UPDATE users SET password = :novaPassword WHERE username = :username";
        $stmtSenha = $db->prepare($querySenha);
        $stmtSenha->bindParam(':novaPassword', $hashedNovaPassword);
        $stmtSenha->bindParam(':username', $username);

        if (!$stmtSenha->execute()) {
            $_SESSION['error'] = "Erro ao atualizar senha. Tente novamente.";
            header("Location: perfil.php");
            exit();
        }
    }

    // Se o campo da foto de perfil não estiver vazio, atualize a foto de perfil
    if (!empty($_FILES['novaFotoPerfil']['name'])) {
        $fotoPerfil = $_FILES['novaFotoPerfil'];
        $fotoPerfilName = $fotoPerfil['name'];
        $fotoPerfilTmp = $fotoPerfil['tmp_name'];
        $fotoPerfilPath = "uploads/" . $fotoPerfilName;

        move_uploaded_file($fotoPerfilTmp, $fotoPerfilPath);

        $queryFoto = "UPDATE users SET foto_perfil = :fotoPerfilName WHERE username = :username";
        $stmtFoto = $db->prepare($queryFoto);
        $stmtFoto->bindParam(':fotoPerfilName', $fotoPerfilName);
        $stmtFoto->bindParam(':username', $username);

        if (!$stmtFoto->execute()) {
            $_SESSION['error'] = "Erro ao atualizar foto de perfil. Tente novamente.";
            header("Location: perfil.php");
            exit();
        }
    }

    // Adicionando a condição para remover a foto de perfil
    if (isset($_POST['removerFoto']) && $_POST['removerFoto'] === 'remover') {
        $queryRemoverFoto = "UPDATE users SET foto_perfil = NULL WHERE username = :username";
        $stmtRemoverFoto = $db->prepare($queryRemoverFoto);
        $stmtRemoverFoto->bindParam(':username', $username);

        if (!$stmtRemoverFoto->execute()) {
            $_SESSION['error'] = "Erro ao remover foto de perfil. Tente novamente.";
            header("Location: perfil.php");
            exit();
        }
    }

    $_SESSION['success'] = "Perfil atualizado com sucesso.";
    header("Location: perfil.php");
    exit();
} else {
    $_SESSION['error'] = "Campo obrigatório não preenchido.";
    header("Location: perfil.php");
    exit();
}
?>
