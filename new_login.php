<?php require 'header.php'; ?>
    <div class="container">
        <h2>Criar usuário no sistema</h2>
        <form method="POST">
            <div class="form-group">
                <label for="">Seu usuário:</label>
                <input type="text" name="login" class="form-control col-md-2" placeholder="Insira seu usuário" />
            </div>
            <div class="form-group">
                <label for="">Sua senha:</label>
                <input type="password" name="pass" class="form-control col-md-2" placeholder="Insira sua senha" />
            </div>
            <div class="form-group">
                <input type="submit" name="btnNewLogin" class="btn btn-primary" value="Criar usuário" />
                <a href="login.php" class="btn btn-secondary">Voltar</a>
            </div>
        </form>
        <?php if($user_exists): ?>
            <h4>Usuário já existe no sistema! Por favor, tente outro.</h4>
        <?php endif; ?>
    </div>
<?php require 'footer.php'; ?>