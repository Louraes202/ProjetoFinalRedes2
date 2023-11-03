<?php
if (! isset($_SESSION)) {
    session_start();
}

// verifica se fez login, isto é, se o utilizador já foi autenticado.
// Esta verificação é obrigatória no início de todas as páginas.
if (!isset($_SESSION['loggedin'])) {
    header("location: index.php");
    exit();
}
?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body> -->

<?php
    require(__DIR__ . '/inc/header.php');
?>
    <header>

        <div class="logo">
            <a href="#">SI LOGIN</a>
        </div>

        <nav>
            <ul>
                <li>
                    <a href="#">
                        <?php
                        /*
                                Utilização dos dados da sessão.
                                O acesso aos dados da sessão obriga à chamada da função session_start()
                                no início da página e usar o array associativo $_SESSION.
                            */
                        echo $_SESSION['email'];
                        ?>
                    </a>
                </li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </nav>
    </header>
    <div class="corpo">
            <?php
            /*
                    este SID fica guardao no cookie, identificando a sessão.
                    O cookie é enviado para o servidor e desta forma o php gere a sessão com esse SID.
                */
            echo "Está na sessão: " . session_id();
            ?>
        </div>

<?php
    require __DIR__ . '/inc/footer.php';
?>