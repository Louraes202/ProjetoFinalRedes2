<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SF7X4trCk4pYEDbQTwQND6MhJojg6dgtNC5uq/iY2U+8f7pHDWVJDDfdOnK" crossorigin="anonymous">
</head>
<body>
    <?php
    include('navbar.php'); // Inclui a barra de navegação comum


    if ($_SESSION['user_profile'] !== 'admin') {
        // Utilizador não é um administrador, redirecione para a página anterior
        echo "<p>Não tem acesso a esta página</p>";
        exit;
    }

    // Verificação do formulário de criação de Utilizador
    $creation_error = "";
    $creation_success = "";

    if (isset($_POST['createUser'])) {
        $newUsername = $_POST['newUsername'];
        $newPassword = $_POST['newPassword'];

        if (isset($_SESSION['users'][$newUsername])) {
            $creation_error = "O nome de Utilizador já está em uso.";
        } else {
            $_SESSION['users'][$newUsername] = $newPassword; // Defina o perfil como "authenticated"
            $creation_success = "Novo Utilizador '$newUsername' criado com sucesso!";
        }
    }

    // Verificação do formulário para apagar um Utilizador
    if (isset($_POST['deleteUser'])) {
        $usernameToDelete = $_POST['usernameToDelete'];
        if (isset($_SESSION['users'][$usernameToDelete])) {
            unset($_SESSION['users'][$usernameToDelete]); // Remove o Utilizador
            $deletion_success = "Utilizador '$usernameToDelete' foi apagado com sucesso!";
        } else {
            $deletion_error = "Utilizador não encontrado. Nenhum Utilizador foi apagado.";
        }
    }
    ?>

    <!-- Conteúdo específico da página Admin Panel -->
    <div class="container">
        <h1 class="mt-4">Admin Panel</h1>

        <!-- Tabela de Utilizadores -->
        <h2 class="mt-4">Lista de Utilizadores</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome de Utilizador</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($_SESSION['users'] as $username => $profile) {
                    if ($profile === 'admin') {
                        continue; // Pule os Utilizadores com perfil de administrador
                    }
                    echo "<tr>";
                    echo "<td>$username</td>";
                    echo "<td>
                            <form method='post'>
                                <input type='hidden' name='usernameToDelete' value='$username'>
                                <button type='submit' name='deleteUser' class='btn btn-danger'>Apagar</button>
                            </form>
                        </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Formulário para criar novo Utilizador -->
        <h2 class="mt-4">Criar Novo Utilizador</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="newUsername" class="form-label">Nome de Utilizador:</label>
                <input type="text" class="form-control" name="newUsername" id="newUsername" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="newPassword" id="newPassword" required>
            </div>
            <button type="submit" class="btn btn-success" name="createUser">Criar Utilizador</button>
        </form>

        <?php
        if (!empty($creation_error)) {
            echo "<div class='alert alert-danger mt-3'>$creation_error</div>";
        }
        if (!empty($creation_success)) {
            echo "<div class='alert alert-success mt-3'>$creation_success</div>";
        }
        ?>
    </div>

    <!-- Mensagens de Apagar Utilizador -->
    <?php
    if (!empty($deletion_error)) {
        echo "<div class='alert alert-danger mt-3'>$deletion_error</div>";
    }
    if (!empty($deletion_success)) {
        echo "<div class='alert alert-success mt-3'>$deletion_success</div>";
    }
    ?>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Z9f5nuFv9T+o5cJfH+4MToXZ/DG1VKCE8pIwARgPw/xGqq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-e0s9qqCipMGptazTvNdTZKJwsR6bJg6tjBh7yyC5VJwAQqU1ftnqd12F4f2leFbKu" crossorigin="anonymous"></script>
</body>
</html>
