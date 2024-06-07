<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section id="login" class="init login-form fade fade-right">
    <div class="login-container">
        <div class="login-box">
            <h2>Login</h2>
            <form action="login" method="post">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Senha">
                <label>
                    <input type="checkbox" name="remember">
                    Lembrar-me
                </label>
                <input type="submit" value="Login">
                <a href="register">Cadastrar-se</a>
            </form>

        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>