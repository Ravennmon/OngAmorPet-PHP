<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="resources/css/style.css">
    <style>
        /* Additional styles for sidebar and layout */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #8C52FF;
            padding-top: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            color: #FFBD59;
            z-index: 1;
            transition: transform 0.3s ease;
        }

        .sidebar.hidden {
            transform: translateX(-250px);
        }

        .sidebar a {
            padding: 15px 20px;
            text-decoration: none;
            font-size: 18px;
            color: #FFBD59;
            display: block;
            width: 100%;
            text-align: left;
        }

        .sidebar a:hover {
            background-color: #FFBD59;
            color: #8C52FF;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        header {
            background-color: #FFBD59;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 80px;
            position: fixed;
            top: 0;
            width: calc(100% - 250px);
            left: 250px;
            z-index: 2;
            transition: left 0.3s ease, width 0.3s ease;
        }

        header.expanded {
            left: 0;
            width: 100%;
        }

        footer {
            background-color: #8C52FF;
            color: azure;
            text-align: center;
            padding: 24px;
            position: fixed;
            bottom: 0;
            width: calc(100% - 250px);
            left: 250px;
            transition: left 0.3s ease, width 0.3s ease;
        }

        footer.expanded {
            left: 0;
            width: 100%;
        }

        .content {
            margin-top: 100px; /* To avoid overlap with fixed header */
            padding-bottom: 100px; /* To avoid overlap with fixed footer */
        }

        .toggle-btn {
            cursor: pointer;
            background-color: #8C52FF;
            color: #FFBD59;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <button class="toggle-btn" onclick="toggleSidebar()">Toggle Sidebar</button>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="#">Contact</a>
        </nav>
    </header>

    <div class="sidebar">
        <a href="home">
            <img src="resources/img/logo3.svg" width="200" height="92">
        </a>
        <a href="#">Ongs</a>
        <a href="#">Tutores</a>
        <a href="#">Animais</a>
    </div>

    <div class="main-content">
        <div class="content">
            <h1>Welcome to the Admin Dashboard</h1>
            <p>This is the main content area.</p>
            <div class="content-center">
                <div id="cachorros">
                    <a class="cachorrinhos" href="#">Dogs Section</a>
                </div>
                <div id="gatos">
                    <a class="gatinhos" href="#">Cats Section</a>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const mainContent = document.querySelector('.main-content');
            const header = document.querySelector('header');
            const footer = document.querySelector('footer');

            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('expanded');
            header.classList.toggle('expanded');
            footer.classList.toggle('expanded');
        }
    </script>
</body>
</html>
