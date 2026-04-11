<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Bobby Bryan</title>

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            color: white;
            overflow-x: hidden;
        }

        /* BACKGROUND MOTS */
        .bg-words {
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
            overflow: hidden;
        }

        .bg-words span {
            position: absolute;
            color: rgba(255,255,255,0.06);
            font-size: 20px;
            animation: floatUp 25s linear infinite;
            white-space: nowrap;
        }

        @keyframes floatUp {
            from { transform: translateY(100vh); }
            to { transform: translateY(-120vh); }
        }

        .bg-words span:nth-child(1){left:10%;animation-delay:0s;}
        .bg-words span:nth-child(2){left:20%;animation-delay:4s;}
        .bg-words span:nth-child(3){left:30%;animation-delay:8s;}
        .bg-words span:nth-child(4){left:40%;animation-delay:12s;}
        .bg-words span:nth-child(5){left:50%;animation-delay:16s;}
        .bg-words span:nth-child(6){left:60%;animation-delay:20s;}
        .bg-words span:nth-child(7){left:70%;animation-delay:24s;}
        .bg-words span:nth-child(8){left:80%;animation-delay:28s;}

        /* CONTENT */
        .content {
            position: relative;
            z-index: 2;
            padding: 40px;
        }

        /* SECTIONS */
        .section {
            max-width: 900px;
            margin: auto;
            padding: 70px 20px;
            text-align: center;
        }

        /* TITRES */
        h1, h2, h3 {
            margin-bottom: 15px;
        }

        h2 {
            color: #00d4ff;
        }

        /* CARDS */
        .card {
            background: rgba(255,255,255,0.08);
            padding: 25px;
            border-radius: 12px;
            backdrop-filter: blur(10px);
        }

        /* BOUTONS */
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin: 10px;
            border: 1px solid rgba(255,255,255,0.4);
            border-radius: 6px;
            color: white;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
            background: rgba(255,255,255,0.1);
        }

        /* REVEAL ANIMATION */
        .reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.7s ease;
        }

        .reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            bottom: 0;
            width: 100%;
            background: rgba(0,0,0,0.75);
            backdrop-filter: blur(10px);
            display: flex;
            justify-content: center;
            padding: 14px 0;
            z-index: 10;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 18px;
            font-weight: bold;
            transition: 0.3s;
        }

        .navbar a:hover {
            color: #00d4ff;
        }

        /* FOOTER */
        .footer {
            text-align: center;
            padding: 30px;
            margin-top: 60px;
            color: #ccc;
            font-size: 13px;
        }

        /* TIMELINE DESIGN PRO */

.timeline {
    position: relative;
    margin: 50px auto;
    max-width: 900px;
}

.timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    width: 2px;
    height: 100%;
    background: rgba(255,255,255,0.2);
    transform: translateX(-50%);
}

.timeline-item {
    position: relative;
    margin: 40px 0;
}

.timeline-content {
    width: 45%;
    padding: 25px;
    border-radius: 12px;
    background: rgba(255,255,255,0.08);
    backdrop-filter: blur(12px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.3);
}

/* gauche */
.timeline-item:nth-child(odd) .timeline-content {
    margin-left: 0;
}

/* droite */
.timeline-item:nth-child(even) .timeline-content {
    margin-left: 55%;
}

/* texte */
.timeline-content h3 {
    color: #00d4ff;
}

.timeline-content span {
    font-size: 12px;
    color: #aaa;
}
    </style>
</head>

<body>

<!-- BACKGROUND ANIMATION -->
<div class="bg-words">
    <span>PHP</span>
    <span>Laravel</span>
    <span>HTML</span>
    <span>CSS</span>
    <span>JavaScript</span>
    <span>Python</span>
    <span>Django</span>
    <span>React</span>
</div>

<!-- PAGE CONTENT -->
<div class="content">
    @yield('content')
</div>

<!-- NAVBAR -->
<div class="navbar">
    <a href="/">Accueil</a>
    <a href="/about">À propos</a>
    <a href="/skills">Compétences</a>
    <a href="/projects">Projets</a>
    <a href="/contact">Contact</a>
    <a href="/experience">Parcours</a>
</div>

<!-- SCROLL REVEAL -->
<script>
function reveal() {
    document.querySelectorAll('.reveal').forEach(el => {
        let top = el.getBoundingClientRect().top;
        if (top < window.innerHeight - 100) {
            el.classList.add('active');
        }
    });
}

window.addEventListener('scroll', reveal);
</script>

</body>
</html>