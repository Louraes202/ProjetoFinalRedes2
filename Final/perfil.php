<?php
include('navbar.php'); // Inclui a barra de navegação comum
?>
<title>Perfil</title>
<!-- Conteúdo específico da página perfil -->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto" data-aos="fade-down">
            <h1 class="fw-light">Perfil</h1>
            <p class="lead">Aqui podes configurar o teu perfil de acordo com as tuas necessidades. Nota que esta é a tua conta na aplicação Manage Me.</p>
        </div>
        </div>
    </section>
</div>

<?php if (isset($_SESSION['username'])): ?>
    <div class="container my-5">
        <h1>Perfil</h1>

        <?php
        $db = connect_db();

        if (!$db) {
            die("Erro ao conectar ao banco de dados.");
        }

        $username = $_SESSION['username'];

        $query = "SELECT username FROM users WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <p><strong>Username:</strong> <?php echo $result['username']; ?></p>

        <!-- Mostra a imagem de perfil atual -->
        <?php
        $queryFoto = "SELECT foto_perfil FROM users WHERE username = :username";
        $stmtFoto = $db->prepare($queryFoto);
        $stmtFoto->bindParam(':username', $username);
        $stmtFoto->execute();
        $resultFoto = $stmtFoto->fetch(PDO::FETCH_ASSOC);
        $fotoPerfil = $resultFoto['foto_perfil'];
        ?>
        <p><strong>Foto de Perfil:</strong></p>
        <?php if (!empty($fotoPerfil)): ?>
            <img src="uploads/<?php echo $fotoPerfil; ?>" alt="Foto de Perfil" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
        <?php else: ?>
            <p>Nenhuma foto de perfil disponível.</p>
        <?php endif; ?>

        <!-- Botão para abrir o modal de edição -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal">
            Editar Perfil
        </button>
    </div>

    <!-- Modal de Edição do Perfil -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarModalLabel">Editar Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulário de Edição -->
                    <form action="processar_editperfil.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="novaPassword" class="form-label">Nova Password</label>
                            <input type="password" class="form-control" id="novaPassword" name="novaPassword">
                        </div>

                        <!-- Adicione este campo para upload de foto de perfil -->
                        <div class="mb-3">
                            <label for="novaFotoPerfil" class="form-label">Nova Foto de Perfil</label>
                            <input type="file" class="form-control" id="novaFotoPerfil" name="novaFotoPerfil">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



<!-- Toasts -->
<div class="position-fixed bottom-0 end-0 p-3">
    <?php if (isset($_SESSION['success'])): ?>
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Sucesso</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body">
                <?php echo $_SESSION['success']; ?>
            </div>
        </div>
    <?php unset($_SESSION['success']); endif; ?>
    <?php if (isset($_SESSION['error'])): ?>
        <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Erro</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Fechar"></button>
            </div>
            <div class="toast-body">
                <?php echo $_SESSION['error']; ?>
            </div>
        </div>
    <?php unset($_SESSION['error']); endif; ?>
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


<?php else: ?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="jumbotron text-center">
                <h1 class="display-4">Acesso Restrito</h1>
                <p class="lead">Tem de estar autenticado para aceder ao conteúdo desta página.</p>
                <hr class="my-4">
                <p>Faça o login ou registe-se para continuar.</p>
                <p class="lead">
                    <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModal">Fazer Login</a>
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registerModal">Registar-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>