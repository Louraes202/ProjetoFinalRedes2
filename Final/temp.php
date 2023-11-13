<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Editar utilizador</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulário de Edit -->
                <form method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Nome de utilizador</label>
                        <input type="text" class="form-control disabled" name="username" id="username" value="<?php $username ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>