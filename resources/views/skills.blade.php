@extends('layout')

@section('content')

<h1>Mes Compétences</h1>

<!-- BOUTONS -->
<div style="margin-top:30px;">
    <button class="skill-btn" onclick="showSkill('php')">PHP</button>
    <button class="skill-btn" onclick="showSkill('javascript')">JavaScript</button>
    <button class="skill-btn" onclick="showSkill('python')">Python</button>
    <button class="skill-btn" onclick="showSkill('frontend')">Frontend</button>
    <button class="skill-btn" onclick="showSkill('backend')">Backend</button>
    <button class="skill-btn" onclick="showSkill('tools')">Outils</button>
</div>

<!-- CONTENU -->
<div id="skill-content" class="skill-box">
    Cliquez sur une compétence pour voir les détails.
</div>

<script>
function showSkill(skill) {
    let content = document.getElementById("skill-content");

    let data = {
        php: `
            <h2>PHP</h2>
            <p>Niveau : Intermédiaire</p>
            <p>Utilisation de PHP pour le développement backend et la logique serveur.</p>
        `,
        javascript: `
            <h2>JavaScript</h2>
            <p>Niveau : Intermédiaire</p>
            <p>Création d’interactions dynamiques côté client.</p>
        `,
        python: `
            <h2>Python</h2>
            <p>Niveau : Intermédiaire</p>
            <p>Utilisé pour scripts, backend et développement avec Django.</p>
        `,
        frontend: `
            <h2>Frontend</h2>
            <p>HTML, CSS, Bootstrap</p>
            <p>Niveau : Intermédiaire</p>
            <p>Création d’interfaces modernes et responsives.</p>
        `,
        backend: `
            <h2>Backend</h2>
            <p>Laravel, Django, API, MySQL, PostgreSQL</p>
            <p>Niveau : Intermédiaire</p>
            <p>Développement d’API et gestion des bases de données.</p>
        `,
        tools: `
            <h2>Outils</h2>
            <p>GitHub, Termux</p>
            <p>Niveau : Intermédiaire</p>
            <p>Gestion de version et développement mobile/terminal.</p>
        `
    };

    content.innerHTML = data[skill];
}
</script>

<style>
.skill-btn {
    padding: 12px 18px;
    margin: 5px;
    border: none;
    border-radius: 6px;
    background: rgba(255,255,255,0.1);
    color: white;
    cursor: pointer;
    transition: 0.3s;
}

.skill-btn:hover {
    background: rgba(255,255,255,0.25);
    transform: translateY(-3px);
}

.skill-box {
    margin-top: 40px;
    padding: 20px;
    border-radius: 10px;
    background: rgba(255,255,255,0.1);
    transition: all 0.4s ease;
}
</style>

@endsection