<?php $title = 'Desenvolvedores'; ?>
<?php ob_start(); ?>

<section id="login" class="init login-form fade fade-right">
    <h1>Login</h1>
    <form action="login_handler.php" method="POST">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</section>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>