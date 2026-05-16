@extends('layout')

@section('content')

<!-- TITRE -->
<section class="section reveal">
    <h2>Parcours</h2>
    <p>Formation & Expérience professionnelle</p>
</section>

<!-- EXPERIENCE -->
<section class="section reveal">

    <h2>Expérience</h2>

    <div class="timeline">

        <div class="timeline-item">
            <div class="timeline-content card">
                <h3>Développeur Web - Stage & Freelance</h3>

                <p>
                    Réalisation de projets web au sein de startups au Cameroun,
                    sous l’encadrement de développeurs expérimentés.
                </p>

                <p>
                    Participation à des missions freelance, notamment avec des mairies,
                    pour la conception de solutions digitales adaptées aux besoins locaux.
                </p>

                <span>2025</span>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-content card">
                <h3>Application de gestion des naissances</h3>

                <p>
                    Développement d’une application interconnectant hôpitaux et mairies
                    pour la gestion des actes de naissance au Cameroun.
                </p>

                <p>
                    Objectif : digitaliser et simplifier les démarches administratives.
                </p>

                <span>Projet académique</span>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-content card">
                <h3>Smart Build Camer</h3>

                <p>
                    Logiciel d’estimation des coûts et délais de construction
                    adapté au contexte camerounais et Africain.
                </p>

                <span>2026 - En cours</span>
            </div>
        </div>

    </div>

</section>

<!-- FORMATION -->
<section class="section reveal">

    <h2>Formation</h2>

    <div class="timeline">

        <div class="timeline-item">
            <div class="timeline-content card">
                <h3>Institut Africain d’Informatique</h3>

                <p>
                    Formation en Informatique et Développement Web :
                    PHP, Laravel, JavaScript, Python, django et bases de données.
                </p>

                <span>2023 - 2026</span>
            </div>
        </div>

    </div>

</section>

@endsection