<?php
    if (! isset($_SESSION)) {
        session_start();
    }

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("location: dasboard.php");
    }

    require(__DIR__ . '/inc/header.php');
?>

    <div class="container">
        <div class="col">
            <!-- Apresentação do formulário -->
            <form action="valida.php" method="post">
                <div>
                    <label for="InputEmail1">Email</label>
                    <input type="email" name="email" id="InputEmail1" placeholder="Insira o Email" required>
                </div>
                <div>
                    <label for="InputPassword1">Senha</label>
                    <input type="password" name="senha" id="InputPassword1" placeholder="Insira a Senha" required>
                </div>
                <input type="submit" value="Entrar">
            </form>
        </div>
    </div>

<?php
    require __DIR__ . '/inc/footer.php';
?>