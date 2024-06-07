<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Garanta uma vida longa e cheia de alegria para um PET.">
    <title><?= $title ?? 'Desenvolvedores' ?></title>

    <link rel="stylesheet" href="resources/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;500&display=swap" rel="stylesheet">
</head>
<body>
<header>
        <a href="home">
            <img src="resources/img/logo3.svg" width="200" height="92">
        </a>

        <nav>
            <a href="home">Inicio</a>
            <a href="faq">FAQ</a>
            <a href="about">Desenvolvedores</a>
            <a href="login">Login</a>
        </nav>
    </header>

    <main>
        <?= $content ?>
    </main>

    <footer>
        Desenvolvido por: <a class="dev" target="_blank"> Francyne Leocadio, Renan Dos Santos, Pedro Dawybida e Henrique Onorato. </a>
    </footer>

    <script src="resources/js/script.js"></script>
</body>
</html>