<?php
session_start();

include './db/config.php';

function getProfileByUsername($db, $username) {
    $query = "SELECT profile FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['profile'] : null;
}

function createAdminUser($db) {
    $adminUsername = 'admin';
    $adminPassword = 'ServerSide1234';
    $profile = 'admin';

    // Check if the admin user already exists
    $queryCheck = "SELECT * FROM users WHERE username = :username";
    $stmtCheck = $db->prepare($queryCheck);
    $stmtCheck->bindParam(':username', $adminUsername);
    $stmtCheck->execute();
    $existingAdmin = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if (!$existingAdmin) {
        // Create the admin user with 'admin' profile
        $hashedPassword = password_hash($adminPassword, PASSWORD_DEFAULT); // Hash the password

        $queryInsert = "INSERT INTO users (username, password, profile) VALUES (:username, :password, :profile)";
        $stmtInsert = $db->prepare($queryInsert);
        $stmtInsert->bindParam(':username', $adminUsername);
        $stmtInsert->bindValue(':password', $hashedPassword); // Use bindValue here
        $stmtInsert->bindParam(':profile', $profile);
        $stmtInsert->execute();
    }
}

$db = connect_db();

if (!$db) {
    die("Error connecting to the database.");
}

createAdminUser($db);

if (isset($_POST['logout'])) {
    unset($_SESSION['username']);
    $_SESSION['user_profile'] = 'guest';
    $logged_in_user = null;
}


if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        $_SESSION['user_profile'] = $user['profile'];
        $login_success = "Successful login. Welcome, $username!";
    } else {
        $login_error = "Invalid credentials.";
    }
}


if (isset($_POST['register'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];

    if (strlen($newPassword) < 4) {
        $register_error = "Password must be at least 4 characters.";
    } elseif (!preg_match('/[A-Z]/', $newPassword) || !preg_match('/[a-z]/', $newPassword)) {
        $register_error = "Password must contain at least one uppercase and one lowercase letter.";
    } else {
        // Check if the user already exists
        $queryCheck = "SELECT * FROM users WHERE username = :username";
        $stmtCheck = $db->prepare($queryCheck);
        $stmtCheck->bindParam(':username', $newUsername);
        $stmtCheck->execute();
        $existingUser = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($existingUser) {
            $register_error = "User already exists. Please choose a different username.";
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

            $_SESSION['user_profile'] = $userProfile;
            $_SESSION['username'] = $newUsername;
            $registration_success = "Successful registration. Welcome, $newUsername!";
        }
    }
}

$logged_in_user = isset($_SESSION['username']) ? $_SESSION['username'] : null;
$user_profile = isset($_SESSION['user_profile']) ? $_SESSION['user_profile'] : 'unauthenticated';
?>


<style>
    .toast-element {
    position: relative;
    z-index: 10000; /* Valor alto para sobrepor os toasts */
    /* Outros estilos e animações AOS */
}
</style>
<!-- Toasts para mensagens de sucesso e erro -->
<div class="position-fixed bottom-0 end-0 p-3">
    <?php if (isset($login_success)): ?>
        <div class="toast show toast-element" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Login Bem-Sucedido</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body bg-light">
                <?php echo $login_success; ?>
            </div>
        </div>
    <?php elseif (isset($login_error)): ?>
        <div class="toast show toast-element" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Erro de Login</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body bg-light">
                <?php echo $login_error; ?>
            </div>
        </div>
    <?php elseif (isset($registration_success)): ?>
        <div class="toast show toast-element" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Registo Bem-Sucedido</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body bg-light">
                <?php echo $registration_success; ?>
            </div>
        </div>
    <?php elseif (isset($register_error)): ?>
        <div class="toast show toast-element" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Erro de Registo</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body bg-light">
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