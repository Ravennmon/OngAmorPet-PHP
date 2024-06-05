<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section id="login" class="init login-form fade fade-right">
    <div class="login-container">
        <div class="login-box">
            <h2>Cadastro</h2>
            <form action="users" method="post">
                <input type="text" name="name" placeholder="Nome">
                <input type="text" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Senha">
                <input type="submit" value="Cadastrar">
            </form>

        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>