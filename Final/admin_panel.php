<?php
include('navbar.php');

if ($_SESSION['user_profile'] !== 'admin') {
    echo "<div class='d-flex justify-content-center align-items-center'><h2 class='display-2 font-weight-normal'>Não tem acesso a esta página. </h2> <i class='fas fa-ban'></i></div>";
    exit;
}

$creation_error = "";
$creation_success = "";
$deletion_error = "";
$deletion_success = "";
$edit_error = "";
$edit_success = "";

$db = connect_db();

if (!$db) {
    die("Error connecting to the database.");
}

// Verificação do formulário de criação de Utilizador
if (isset($_POST['createUser'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    // Check if the user already exists
    $queryCheck = "SELECT * FROM users WHERE username = :username";
    $stmtCheck = $db->prepare($queryCheck);
    $stmtCheck->bindParam(':username', $newUsername);
    $stmtCheck->execute();
    $existingUser = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        $creation_error = "O nome de Utilizador já está em uso.";
    } else {
        // Assume 'user' profile by default
        $userProfile = 'user';

        // Check if the user being registered is an admin
        if (in_array($newUsername, ['admin', 'other_admin'])) {
            $userProfile = 'admin';
        }

        // Hash the password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Insert the new user with the appropriate profile and hashed password
        $queryInsert = "INSERT INTO users (username, password, profile) VALUES (:username, :password, :profile)";
        $stmtInsert = $db->prepare($queryInsert);
        $stmtInsert->bindParam(':username', $newUsername);
        $stmtInsert->bindParam(':password', $hashedPassword);
        $stmtInsert->bindParam(':profile', $userProfile);
        $stmtInsert->execute();

        $creation_success = "Novo Utilizador '$newUsername' criado com sucesso!";
    }
}

// Verificação do formulário para apagar um Utilizador
if (isset($_POST['deleteUser'])) { 
    $usernameToDelete = $_POST['usernameToDelete'];

    // Delete the user from the database
    $queryDelete = "DELETE FROM users WHERE username = :username";
    $stmtDelete = $db->prepare($queryDelete);
    $stmtDelete->bindParam(':username', $usernameToDelete);
    $stmtDelete->execute();

    if ($stmtDelete->rowCount() > 0) {
        $deletion_success = "Utilizador '$usernameToDelete' foi apagado com sucesso!";
    } else {
        $deletion_error = "Utilizador não encontrado. Nenhum Utilizador foi apagado.";
    }
}

// Fetch users from the database
$querySelect = "SELECT * FROM users WHERE profile != 'admin'";
$stmtSelect = $db->prepare($querySelect);
$stmtSelect->execute();
$users = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

// Verificação do formulário para editar um Utilizador
if (isset($_POST['editUser'])) { 
    $usernameToEdit = $_POST['userToEdit'];
    $passwordToEdit = $_POST['pwdToEdit'];

    // Update the user's password in the database
    $queryUpdate = "UPDATE users SET password = :password WHERE username = :username";
    $stmtUpdate = $db->prepare($queryUpdate);
    $stmtUpdate->bindParam(':username', $usernameToEdit);
    $passwordToEdit = password_hash($passwordToEdit, PASSWORD_DEFAULT);
    $stmtUpdate->bindParam(':password', $passwordToEdit); // Hash the new password
    $stmtUpdate->execute();

    if ($stmtUpdate->rowCount() > 0) {
        $edit_success = "Password do Utilizador '$usernameToEdit' atualizada com sucesso!";
    } else {
        $edit_error = "Erro ao atualizar a password do Utilizador.";
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
        if (count($users) === 0) {
            echo "<tr>";
            echo "<td>Ainda não há utilizadores</td>";
            echo "</tr>";
        } else {
            foreach ($users as $user) {
                echo "<tr>";
                echo "<td>{$user['username']}</td>";
                echo "<td>
                        <div class='d-flex gap-1'>
                            <button name='editUser' class='btn icon-btn' data-bs-toggle='modal' data-bs-target='#editUserModal' data-username='{$user['username']}'><i class='fas fa-edit' style='color: #005eff;'></i></button>
                            <form method='post'>
                                <input type='hidden' name='usernameToDelete' value='{$user['username']}'>
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
    <div class="mb-5">
        <h2 class="mt-4">Criar Novo Utilizador</h2>
        <form method="post" action="">
            <div class="mb-3">
                <label for="idnewUsername" class="form-label">Nome de Utilizador:</label>
                <input type="text" class="form-control" name="newUsername" id="idnewUsername" required>
            </div>
            <div class="mb-3">
                <label for="idNewPassword" class="form-label">Senha:</label>
                <input type="password" class="form-control" name="newPassword" id="idNewPassword" required>
            </div>
            <button type="submit" class="btn btn-success" name="createUser">Criar Utilizador</button>
        </form>
    </div>


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
                    <form method="post" action="">
                        <div class="mb-3">
                            <label for="userToEdit" class="form-label">Nome de utilizador</label>
                            <input type="text" class="form-control" 
                                name="userToEdit" id="userToEdit" placeholder="Coloque aqui o utilizador" required readonly>
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

    <script>
        // Populate the modal with username when the edit button is clicked
        $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget); // Button that triggered the modal
            var username = button.data('username'); // Extract info from data-* attributes
            var modal = $(this);
            modal.find('.modal-body #userToEdit').val(username);
        });
    </script>


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
