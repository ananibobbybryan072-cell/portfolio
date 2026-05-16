@extends('layout')

@section('content')

<!-- HERO -->
<section class="section hero reveal">
    <h1>Bienvenue dans mon HubSpace, je suis</h1>
    <h2>Bobby Bryan Mbida Anani</h2>
    <p>Développeur Web Junior - Laravel / PHP</p>

    <div>
        <a href="#about" class="btn">Découvrir</a>
        <a href="/contact" class="btn">Me contacter</a>
    </div>
</section>

<!-- ABOUT -->
<section id="about" class="section reveal">
    <h2>À propos</h2>
    <p>
        Passionné par le développement web, je construis des applications modernes
        avec Laravel, PHP, JavaScript et des interfaces simples et efficaces.
    </p>
</section>

<!-- PHILOSOPHIE / TEMOIGNAGE -->
<section class="section reveal card">
    <h2>Ma philosophie</h2>

    <p>
        La programmation est un domaine qui demande discipline et régularité.
        Chaque jour de pratique améliore mes compétences et ma vision du développement.
    </p>

    <p>
        Je crois qu’un bon développeur ne crée pas seulement du code,
        mais surtout des interfaces simples et compréhensibles pour l’utilisateur final.
    </p>
</section>

<!-- CTA -->
<section class="section reveal center">
    <h2>Travaillons ensemble</h2>
    <p>Disponible pour projets web et collaborations.</p>

    <a href="/contact" class="btn">Contact</a>
</section>

<!-- FOOTER -->
<footer class="footer">
    © 2026 - Bobby Bryan Mbida Anani
</footer>

@endsection