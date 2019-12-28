<?php require 'header.php'; ?>
    <div class="container">
        <h2>Login no sistema</h2>
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
                <input type="submit" name="btnLogin" class="btn btn-primary" value="Entrar" />
                <a href="new_login.php" class="btn btn-secondary">Criar usuário</a>
            </div>
        </form>
        <?php if($not_user): ?>
            <h4>Usuário não existe! Por favor, tente novamente.</h4>
        <?php elseif($not_pass): ?>
            <h4>Senha errada! Por favor, tente novamente.</h4>
        <?php endif; ?>
    </div>
<?php require 'footer.php'; ?>