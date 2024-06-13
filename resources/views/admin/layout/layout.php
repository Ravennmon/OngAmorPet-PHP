<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Admin' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: #fff;
            padding: 10px;
            position: fixed;
            height: 100%;
        }

        .sidebar a {
            color: #fff;
            text-decoration: none;
        }

        .content {
            margin-left: 250px;
            flex: 1;
            padding: 20px;
            overflow-y: auto;
        }

        .float-right {
            float: right;
        }
    </style>
</head>

<body class="vsc-initialized">
    <div class="sidebar">
        <h2>AmorPet</h2>
        <ul class="nav flex-column">
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