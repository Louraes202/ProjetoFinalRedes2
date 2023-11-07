<?php
include('navbar.php'); // Inclui a barra de navegação comum
?>
<title>Plataforma</title>
<!-- Conteúdo específico da página Plataforma -->
<div class="animcontainer">
    <section class="py-5 text-center container">
        <div class="row py-lg-5 text-light">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">Plataforma</h1>
            <p class="lead">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        </div>
        </div>
    </section>
</div>


<div class="container my-5">
        <h1>Requisição da Plataforma</h1>
        
        <form action="processar_req.php" method="post">
            <div class="mb-3">
                <label for="escolaNome" class="form-label">Nome da Escola</label>
                <input type="text" class="form-control" id="escolaNome" name="escolaNome" required>
            </div>
            <div class="mb-3">
                <label for="contatoNome" class="form-label">Nome do Contato</label>
                <input type="text" class="form-control" id="contatoNome" name="contatoNome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Endereço de Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea class="form-control" id="mensagem" name="mensagem" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Enviar Requisição</button>
        </form>


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

    </div>