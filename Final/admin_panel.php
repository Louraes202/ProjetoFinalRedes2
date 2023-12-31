<?php
include('navbar.php'); // Inclui a barra de navegação comum


if ($_SESSION['user_profile'] !== 'admin') {
    // Utilizador não é um administrador, redirecione para a página anterior
    echo "<div class='d-flex justify-content-center align-items-center'><h2 class='display-2 font-weight-normal'>Não tem acesso a esta página. </h2> <i class='fas fa-ban'></i></div>";
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
        $_SESSION['users'][$newUsername] = $newPassword; 
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

if (isset($_POST['editUser'])) { 
    $usernameToEdit = $_POST['userToEdit'];
    $passwordToEdit = $_POST['pwdToEdit'];
    if (isset($_SESSION['users'][$usernameToEdit])) {
        $_SESSION['users'][$usernameToEdit] = $passwordToEdit;
    } else {
        //erro
    }
}
?>
<style>
    .icon-btn {
      /* Resetando estilos padrão do botão */
      border: none;
      background: none;
      outline: none; /* Remover a borda de foco padrão (pode ser ajustado conforme necessário) */
    }

</style>
<title> Painel Admin </title>

<!-- Conteúdo específico da página Admin Panel -->
<div class="container"> 
    <h1 class="mt-4">Admin Panel</h1>
    <!-- Tabela de Utilizadores -->
    <h2 class="mt-4">Lista de Utilizadores</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome de Utilizador</th>
                <th>Password</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($_SESSION['users']) === 1) { // Se só houver 1 utilizador é o próprio admin, logo ainda não há utilizadores
                echo "<tr>";
                echo "<td>Ainda não há utilizadores</td>";
                echo "<td></td>";
                echo "</tr>";
            }
            else {
                foreach ($_SESSION['users'] as $username => $password) {
                    if ($password === 'admin') {
                        continue; // Pule os Utilizadores com perfil de administrador
                    }
                    echo "<tr>";
                    echo "<td>$username</td>";
                    echo "<td>$password</td>";
                    echo "<td>
                            <div class='d-flex gap-1'>
                                <button name='editUser' class='btn icon-btn' data-bs-toggle='modal' data-bs-target='#editUserModal'><i class='fas fa-edit' style='color: #005eff;'></i></button>
                                <form method='post'>
                                    <input type='hidden' name='usernameToDelete' value='$username'>
                                    <button type='submit' name='deleteUser' class='icon-btn btn'><i class='fa-solid fa-trash-can' style='color: #005eff;'></i></button>
                                </form>
                            </div>
                        </td>";
                    echo "</tr>";
                }
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

    <!-- Modal para editar utilizador -->
    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar utilizador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Edit -->
                    <form method="post">
                        <div class="mb-3">
                            <label for="userToEdit" class="form-label">Nome de utilizador</label>
                            <input type="text" class="form-control disabled" name="userToEdit" id="userToEdit" placeholder="Coloque aqui o utilizador" required>
                        </div>
                        <div class="mb-3">
                            <label for="pwdToEdit" class="form-label">Password</label>
                            <input type="text" class="form-control" name="pwdToEdit" id="pwdToEdit" placeholder="Coloque aqui a nova password" required>
                        </div>
                        <button type="submit" name="editUser" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    if (!empty($creation_error)) {
        echo "<div class='d-flex justify-content-between alert alert-dimissible alert-danger mt-3'>$creation_error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    if (!empty($creation_success)) {
        echo "<div class='d-flex justify-content-between alert alert-dimissible alert-success mt-3'>$creation_success
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
    <!-- Mensagens de Apagar Utilizador -->
    <?php
    if (!empty($deletion_error)) {
        echo "<div class='d-flex justify-content-between alert alert-dimissible alert-danger mt-3'>$deletion_error
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    if (!empty($deletion_success)) {
        echo "<div class='d-flex justify-content-between alert alert-dimissible alert-success mt-3'>$deletion_success
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
    }
    ?>
</div>
