<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/resources/css/admin_style.css">
</head>

<body class="vsc-initialized">
    <div class="sidebar">
        <a href="/home">
            <img src="/resources/img/logo3.svg" width="200" height="92">
        </a>
        <ul class="nav flex-column mt-4">
            <li class="nav-item">
                <a class="nav-link" href="/home">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/tutors">Tutores</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/ongs">Ongs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/admin/animals">Animais</a>
            </li>
        </ul>
    </div>
    <div class="content">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><?= $_SESSION['user']['name'] ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/logout">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container-fluid mt-4">
            <?= $content ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/resources/js/admin_script.js"></script>

</body>

</html>