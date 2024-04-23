<?php
include('navbar.php');

// Function to fetch all posts
function getBlogPosts($db) {
    $stmt = $db->prepare("SELECT * FROM posts ORDER BY data_publicacao DESC");
    $stmt->execute();
    return $stmt->fetchAll();
}

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
        $userProfile = 'user';

        if (in_array($newUsername, ['admin', 'other_admin'])) {
            $userProfile = 'admin';
        }

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

// Fetch users da database
$querySelect = "SELECT * FROM users WHERE profile != 'admin'";
$stmtSelect = $db->prepare($querySelect);
$stmtSelect->execute();
$users = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

// Verificação do formulário para editar um Utilizador
if (isset($_POST['editUser'])) { 
    $usernameToEdit = $_POST['userToEdit'];
    $passwordToEdit = $_POST['pwdToEdit'];

    $queryUpdate = "UPDATE users SET password = :password WHERE username = :username";
    $stmtUpdate = $db->prepare($queryUpdate);
    $stmtUpdate->bindParam(':username', $usernameToEdit);
    $passwordToEdit = password_hash($passwordToEdit, PASSWORD_DEFAULT);
    $stmtUpdate->bindParam(':password', $passwordToEdit); 
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
    /* Reset estilos padrão do botão */
    border: none;
    background: none;
    outline: none;
    /* Remover a borda de foco padrão (pode ser ajustado conforme necessário) */
}
</style>
<title> Painel Admin </title>

<!-- Conteúdo específico da página Admin Panel -->
<div class="container">
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
                            <input type="text" class="form-control" name="userToEdit" id="userToEdit"
                                placeholder="Coloque aqui o utilizador" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="pwdToEdit" class="form-label">Password</label>
                            <input type="text" class="form-control" name="pwdToEdit" id="pwdToEdit"
                                placeholder="Coloque aqui a nova password" required>
                        </div>
                        <button type="submit" name="editUser" class="btn btn-primary">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para Edição de Notícia -->
    <div class="modal fade" id="editNewsModal" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editNewsModalLabel">Editar Notícia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editNewsForm">
                        <input type="hidden" name="newsId" id="newsId">
                        <div class="mb-3">
                            <label for="editNewsTitle" class="form-label">Título:</label>
                            <input type="text" class="form-control" name="newsTitle" id="editNewsTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editNewsContent" class="form-label">Conteúdo:</label>
                            <textarea class="form-control" name="newsContent" id="editNewsContent" rows="5"
                                required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Popularizar o modal dos utilizadores
    $('#editUserModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var username = button.data('username');
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

    <?php $news = getBlogPosts($db); ?>
    <div class="container">
        <h2 class="mt-4">Lista de Notícias</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Conteúdo</th>
                    <th>Data de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($news as $item): ?>
                <tr>
                    <td><?php echo $item['id']; ?></td>
                    <td><?php echo $item['titulo']; ?></td>
                    <td><?php echo substr($item['conteudo'], 0, 50) . '...'; ?></td> <!-- Mostra uma prévia -->
                    <td><?php echo $item['data_publicacao']; ?></td>
                    <td>
                        <!-- Botões de ação -->
                        <button class="btn btn-primary btn-edit" data-id="<?php echo $item['id']; ?>">Editar</button>
                        <button class="btn btn-danger btn-delete" data-id="<?php echo $item['id']; ?>">Remover</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="mb-5">
            <h2 class="mt-4">Criar Nova Notícia</h2>
            <form id="createNewsForm">
                <div class="mb-3">
                    <label for="newsTitle" class="form-label">Título:</label>
                    <input type="text" class="form-control" name="newsTitle" id="newsTitle" required>
                </div>
                <div class="mb-3">
                    <label for="newsContent" class="form-label">Conteúdo:</label>
                    <textarea class="form-control" name="newsContent" id="newsContent" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Criar Notícia</button>
            </form>
        </div>
    </div>


    <script>
    document.getElementById('createNewsForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Evita o recarregamento da página

        let formData = new FormData(this);

        fetch('create_news.php', { 
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message); // Exibe a mensagem de sucesso ou erro vinda do servidor
                location.reload();           
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Falha ao criar a notícia.");
            });
    });


    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function() {
            const newsId = this.getAttribute('data-id');

            fetch(`get_news_data.php?id=${newsId}`)
                .then(response => response.json())
                .then(data => {
                    // Verificar se o retorno não contém erro
                    if (!data.error) {
                        document.getElementById('newsId').value = newsId;
                        document.getElementById('editNewsTitle').value = data.titulo;
                        document.getElementById('editNewsContent').value = data.conteudo;

                        var editModal = new bootstrap.Modal(document.getElementById(
                            'editNewsModal'));
                        editModal.show();
                    } else {
                        alert(data.error);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert("Falha ao carregar os dados da notícia.");
                });
        });
    });

    document.getElementById('editNewsForm').addEventListener('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        fetch('update_news.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.message) {
                    alert(data.message);
                    // Recarrega a página ou atualiza a tabela de notícias conforme necessário
                    location.reload();
                } else if (data.error) {
                    alert(data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Falha ao atualizar a notícia.");
            });
    });

    function fetchAndUpdateNews() {
        fetch('get_all_news.php') // Endpoint que retorna todas as notícias em JSON
            .then(response => response.json())
            .then(news => {
                const tableBody = document.querySelector('.table tbody');
                tableBody.innerHTML = ''; // Limpa a tabela antes de adicionar novos dados

                news.forEach(item => {
                    const row = `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.titulo}</td>
                        <td>${item.conteudo.substring(0, 50)}...</td>
                        <td>${item.data_publicacao}</td>
                        <td>
                            <button class="btn btn-primary btn-edit" data-id="${item.id}">Editar</button>
                            <button class="btn btn-danger btn-delete" data-id="${item.id}">Remover</button>
                        </td>
                    </tr>
                `;
                    tableBody.innerHTML += row;
                });

                attachEventListeners(); // Reanexa os ouvintes de eventos aos botões
            })
            .catch(error => console.error('Error:', error));
    }

    function attachEventListeners() {
        // Chamada quando a tabela é reconstruída -- por ajustar
    }

    document.addEventListener('DOMContentLoaded', function() {
        fetchAndUpdateNews(); // Atualiza a tabela na carga inicial
    });

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function() {
            const newsId = this.getAttribute('data-id');
            if (confirm('Tem certeza que deseja remover esta notícia?')) {
                fetch('delete_news.php', {
                        method: 'POST',
                        body: JSON.stringify({
                            id: newsId
                        }),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(data.message);
                        // Recarrega a página ou remove a linha da tabela do DOM
                        fetchAndUpdateNews();
                    })
                    .catch(error => console.error('Error:', error));
            }
        });
    });
    </script>


</div>