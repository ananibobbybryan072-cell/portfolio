<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Bobby Bryan</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            overflow-x: hidden;
        }

        /* CONTENEUR PRINCIPAL */
        .content {
            position: relative;
            z-index: 2;
            text-align: center;
            padding-top: 120px;
        }

        /* ANIMATION BACKGROUND */
        .bg {
            position: fixed;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .bg span {
            position: absolute;
            color: rgba(255,255,255,0.08);
            font-size: 22px;
            animation: float 25s linear infinite;
            white-space: nowrap;
        }

        @keyframes float {
            from {
                transform: translateY(100vh);
            }
            to {
                transform: translateY(-120vh);
            }
        }

        /* NAVBAR EN BAS */
        .navbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.85);
            display: flex;
            justify-content: center;
            padding: 15px 0;
            z-index: 3;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 25px;
            font-weight: bold;
        }

        .navbar a:hover {
            color: #00d4ff;
        }

    </style>

</head>
<body>

    <!-- BACKGROUND ANIMATION -->
    <div class="bg">
        <span style="left:10%; animation-delay:0s;">PHP</span>
        <span style="left:20%; animation-delay:3s;">Laravel</span>
        <span style="left:30%; animation-delay:6s;">HTML</span>
        <span style="left:40%; animation-delay:9s;">CSS</span>
        <span style="left:50%; animation-delay:12s;">React</span>
        <span style="left:60%; animation-delay:15s;">Flutter</span>
        <span style="left:70%; animation-delay:18s;">Django</span>
        <span style="left:80%; animation-delay:21s;">JavaScript</span>
    </div>

    <!-- CONTENU -->
    <div class="content">
        @yield('content')
    </div>

    <!-- NAVBAR -->
    <div class="navbar">
        <a href="/">Accueil</a>
        <a href="/about">À propos</a>
        <a href="/projects">Projets</a>
        <a href="/contact">Contact</a>
        <a href="/skills">Compétences</a>
    </div>

</body>
</html>