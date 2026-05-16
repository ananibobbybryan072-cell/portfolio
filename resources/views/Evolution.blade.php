@extends('layout')

@section('content')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Space+Mono:wght@400;700&family=Syne:wght@400;600;800&display=swap');

  .evo-page {
    min-height: 100vh;
    padding: 60px 20px;
    font-family: 'Syne', sans-serif;
    position: relative;
  }

  .evo-title {
    text-align: center;
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 800;
    letter-spacing: -1px;
    margin-bottom: 8px;
    background: linear-gradient(90deg, #00f5c4, #00aaff, #a78bfa);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }

  .evo-subtitle {
    text-align: center;
    color: rgba(255,255,255,0.45);
    font-family: 'Space Mono', monospace;
    font-size: 0.8rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-bottom: 60px;
  }

  /* ── COURBE CHART ── */
  .chart-wrapper {
    max-width: 860px;
    margin: 0 auto 70px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 20px;
    padding: 40px 30px 30px;
    position: relative;
    overflow: hidden;
  }

  .chart-wrapper::before {
    content: '';
    position: absolute;
    top: -60px; right: -60px;
    width: 200px; height: 200px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0,245,196,0.08), transparent 70%);
    pointer-events: none;
  }

  .chart-legend {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
    margin-bottom: 30px;
    justify-content: center;
  }

  .legend-item {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 0.78rem;
    font-family: 'Space Mono', monospace;
    color: rgba(255,255,255,0.7);
  }

  .legend-dot {
    width: 10px; height: 10px;
    border-radius: 50%;
    flex-shrink: 0;
  }

  .chart-svg-container {
    width: 100%;
    overflow-x: auto;
  }

  svg.chart {
    width: 100%;
    min-width: 500px;
    height: 280px;
    display: block;
  }

  .grid-line {
    stroke: rgba(255,255,255,0.06);
    stroke-width: 1;
  }

  .axis-label {
    fill: rgba(255,255,255,0.3);
    font-family: 'Space Mono', monospace;
    font-size: 10px;
  }

  .curve-path {
    fill: none;
    stroke-width: 2.5;
    stroke-linecap: round;
    stroke-linejoin: round;
    opacity: 0;
    animation: drawLine 1.8s ease forwards;
  }

  .curve-path:nth-child(1) { animation-delay: 0.1s; }
  .curve-path:nth-child(2) { animation-delay: 0.3s; }
  .curve-path:nth-child(3) { animation-delay: 0.5s; }
  .curve-path:nth-child(4) { animation-delay: 0.7s; }
  .curve-path:nth-child(5) { animation-delay: 0.9s; }

  @keyframes drawLine {
    0%   { opacity: 0; stroke-dashoffset: 1000; stroke-dasharray: 1000; }
    10%  { opacity: 1; }
    100% { opacity: 1; stroke-dashoffset: 0; stroke-dasharray: 1000; }
  }

  .dot-point {
    opacity: 0;
    animation: popIn 0.3s ease forwards;
    cursor: pointer;
    transition: r 0.2s;
  }
  .dot-point:hover { r: 7; }

  /* ── SKILL BARS ── */
  .skills-section {
    max-width: 860px;
    margin: 0 auto 60px;
  }

  .skills-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
    gap: 24px;
  }

  .skill-item {
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 14px;
    padding: 22px 24px;
    opacity: 0;
    transform: translateY(20px);
    animation: slideUp 0.5s ease forwards;
  }

  .skill-item:nth-child(1) { animation-delay: 0.2s; }
  .skill-item:nth-child(2) { animation-delay: 0.35s; }
  .skill-item:nth-child(3) { animation-delay: 0.5s; }
  .skill-item:nth-child(4) { animation-delay: 0.65s; }
  .skill-item:nth-child(5) { animation-delay: 0.8s; }

  @keyframes slideUp {
    to { opacity: 1; transform: translateY(0); }
  }

  .skill-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
  }

  .skill-name {
    font-weight: 600;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .skill-icon {
    width: 28px; height: 28px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
  }

  .skill-pct {
    font-family: 'Space Mono', monospace;
    font-size: 0.85rem;
    color: rgba(255,255,255,0.5);
  }

  .bar-track {
    height: 6px;
    background: rgba(255,255,255,0.08);
    border-radius: 99px;
    overflow: hidden;
  }

  .bar-fill {
    height: 100%;
    border-radius: 99px;
    width: 0%;
    transition: width 1.4s cubic-bezier(0.25, 1, 0.5, 1);
  }

  .skill-note {
    margin-top: 8px;
    font-size: 0.72rem;
    font-family: 'Space Mono', monospace;
    color: rgba(255,255,255,0.3);
  }

  /* ── MILESTONES ── */
  .milestones {
    max-width: 860px;
    margin: 0 auto;
    position: relative;
    padding-left: 30px;
  }

  .milestones::before {
    content: '';
    position: absolute;
    left: 8px; top: 0; bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #00f5c4, #a78bfa, transparent);
  }

  .milestone {
    position: relative;
    margin-bottom: 32px;
    opacity: 0;
    transform: translateX(-10px);
    animation: fadeRight 0.5s ease forwards;
  }

  .milestone:nth-child(1) { animation-delay: 0.3s; }
  .milestone:nth-child(2) { animation-delay: 0.5s; }
  .milestone:nth-child(3) { animation-delay: 0.7s; }
  .milestone:nth-child(4) { animation-delay: 0.9s; }

  @keyframes fadeRight {
    to { opacity: 1; transform: translateX(0); }
  }

  .milestone::before {
    content: '';
    position: absolute;
    left: -26px; top: 6px;
    width: 10px; height: 10px;
    border-radius: 50%;
    background: #00f5c4;
    box-shadow: 0 0 10px #00f5c4;
  }

  .milestone-date {
    font-family: 'Space Mono', monospace;
    font-size: 0.7rem;
    color: #00f5c4;
    letter-spacing: 2px;
    text-transform: uppercase;
    margin-bottom: 4px;
  }

  .milestone-title {
    font-weight: 600;
    font-size: 1rem;
    margin-bottom: 4px;
  }

  .milestone-desc {
    font-size: 0.83rem;
    color: rgba(255,255,255,0.45);
    line-height: 1.6;
  }

  .section-label {
    font-family: 'Space Mono', monospace;
    font-size: 0.7rem;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #00f5c4;
    margin-bottom: 20px;
    max-width: 860px;
    margin-left: auto;
    margin-right: auto;
  }
</style>

<div class="evo-page reveal">

  <h1 class="evo-title">Mon Évolution</h1>
  <p class="evo-subtitle">6 mois · 5 technologies · 1 objectif</p>

  <!-- COURBE -->
  <p class="section-label">// Progression dans le temps</p>
  <div class="chart-wrapper">
    <div class="chart-legend">
      <div class="legend-item"><div class="legend-dot" style="background:#00f5c4"></div> PHP</div>
      <div class="legend-item"><div class="legend-dot" style="background:#f97316"></div> Laravel</div>
      <div class="legend-item"><div class="legend-dot" style="background:#a78bfa"></div> CSS</div>
      <div class="legend-item"><div class="legend-dot" style="background:#38bdf8"></div> MySQL</div>
      <div class="legend-item"><div class="legend-dot" style="background:#f472b6"></div> Git</div>
    </div>

    <div class="chart-svg-container">
      <svg class="chart" viewBox="0 0 760 280" preserveAspectRatio="none">
        <!-- Grilles horizontales -->
        <line x1="60" y1="30"  x2="740" y2="30"  class="grid-line"/>
        <line x1="60" y1="80"  x2="740" y2="80"  class="grid-line"/>
        <line x1="60" y1="130" x2="740" y2="130" class="grid-line"/>
        <line x1="60" y1="180" x2="740" y2="180" class="grid-line"/>
        <line x1="60" y1="230" x2="740" y2="230" class="grid-line"/>

        <!-- Labels Y -->
        <text x="50" y="34"  class="axis-label" text-anchor="end">100%</text>
        <text x="50" y="84"  class="axis-label" text-anchor="end">75%</text>
        <text x="50" y="134" class="axis-label" text-anchor="end">50%</text>
        <text x="50" y="184" class="axis-label" text-anchor="end">25%</text>
        <text x="50" y="234" class="axis-label" text-anchor="end">0%</text>

        <!-- Labels X (mois) -->
        <text x="60"  y="260" class="axis-label" text-anchor="middle">Mois 1</text>
        <text x="193" y="260" class="axis-label" text-anchor="middle">Mois 2</text>
        <text x="326" y="260" class="axis-label" text-anchor="middle">Mois 3</text>
        <text x="459" y="260" class="axis-label" text-anchor="middle">Mois 4</text>
        <text x="592" y="260" class="axis-label" text-anchor="middle">Mois 5</text>
        <text x="740" y="260" class="axis-label" text-anchor="middle">Mois 6</text>

        <!-- PHP  (60→65→68→72→76→80%) -->
        <polyline class="curve-path" stroke="#00f5c4"
          points="60,182 193,170 326,162 459,150 592,136 740,118"/>

        <!-- Laravel (0→10→25→40→55→68%) -->
        <polyline class="curve-path" stroke="#f97316"
          points="60,230 193,205 326,168 459,130 592,93 740,62"/>

        <!-- CSS (20→35→48→57→65→73%) -->
        <polyline class="curve-path" stroke="#a78bfa"
          points="60,218 193,188 326,157 459,133 592,110 740,88"/>

        <!-- MySQL (5→15→30→45→55→62%) -->
        <polyline class="curve-path" stroke="#38bdf8"
          points="60,228 193,208 326,180 459,143 592,118 740,99"/>

        <!-- Git (10→30→45→52→60→70%) -->
        <polyline class="curve-path" stroke="#f472b6"
          points="60,225 193,185 326,153 459,138 592,118 740,93"/>

        <!-- Points PHP -->
        <circle class="dot-point" cx="60"  cy="182" r="4" fill="#00f5c4" style="animation-delay:1.8s"/>
        <circle class="dot-point" cx="740" cy="118" r="4" fill="#00f5c4" style="animation-delay:1.9s"/>

        <!-- Points Laravel -->
        <circle class="dot-point" cx="60"  cy="230" r="4" fill="#f97316" style="animation-delay:2s"/>
        <circle class="dot-point" cx="740" cy="62"  r="4" fill="#f97316" style="animation-delay:2.1s"/>
      </svg>
    </div>
  </div>

  <!-- BARRES -->
  <p class="section-label">// Niveau actuel</p>
  <div class="skills-section">
    <div class="skills-grid">

      <div class="skill-item">
        <div class="skill-header">
          <div class="skill-name">
            <div class="skill-icon" style="background:rgba(0,245,196,0.12);">🐘</div>
            PHP
          </div>
          <span class="skill-pct">80%</span>
        </div>
        <div class="bar-track">
          <div class="bar-fill" data-width="80" style="background: linear-gradient(90deg, #00f5c4, #00d4a8);"></div>
        </div>
        <p class="skill-note">Syntaxe, fonctions, OOP basique</p>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <div class="skill-name">
            <div class="skill-icon" style="background:rgba(249,115,22,0.12);">🔥</div>
            Laravel
          </div>
          <span class="skill-pct">68%</span>
        </div>
        <div class="bar-track">
          <div class="bar-fill" data-width="68" style="background: linear-gradient(90deg, #f97316, #fb923c);"></div>
        </div>
        <p class="skill-note">Routing, Blade, Eloquent, MVC</p>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <div class="skill-name">
            <div class="skill-icon" style="background:rgba(167,139,250,0.12);">🎨</div>
            CSS
          </div>
          <span class="skill-pct">73%</span>
        </div>
        <div class="bar-track">
          <div class="bar-fill" data-width="73" style="background: linear-gradient(90deg, #a78bfa, #c4b5fd);"></div>
        </div>
        <p class="skill-note">Flexbox, animations, responsive</p>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <div class="skill-name">
            <div class="skill-icon" style="background:rgba(56,189,248,0.12);">🗄️</div>
            MySQL
          </div>
          <span class="skill-pct">62%</span>
        </div>
        <div class="bar-track">
          <div class="bar-fill" data-width="62" style="background: linear-gradient(90deg, #38bdf8, #7dd3fc);"></div>
        </div>
        <p class="skill-note">Requêtes, relations, migrations</p>
      </div>

      <div class="skill-item">
        <div class="skill-header">
          <div class="skill-name">
            <div class="skill-icon" style="background:rgba(244,114,182,0.12);">🌿</div>
            Git
          </div>
          <span class="skill-pct">70%</span>
        </div>
        <div class="bar-track">
          <div class="bar-fill" data-width="70" style="background: linear-gradient(90deg, #f472b6, #f9a8d4);"></div>
        </div>
        <p class="skill-note">Commits, branches, GitHub</p>
      </div>

    </div>
  </div>

  <!-- MILESTONES -->
  <p class="section-label">// Étapes clés</p>
  <div class="milestones">

    <div class="milestone">
      <div class="milestone-date">Mois 1</div>
      <div class="milestone-title">🚀 Premiers pas en PHP</div>
      <div class="milestone-desc">Découverte du web backend, variables, boucles, fonctions. Première page dynamique.</div>
    </div>

    <div class="milestone">
      <div class="milestone-date">Mois 2 – 3</div>
      <div class="milestone-title">⚡ Découverte de Laravel</div>
      <div class="milestone-desc">Installation, routing, Blade templates, Eloquent ORM. Premier projet MVC structuré.</div>
    </div>

    <div class="milestone">
      <div class="milestone-date">Mois 4 – 5</div>
      <div class="milestone-title">🏗️ Projets concrets</div>
      <div class="milestone-desc">Lancement de l'app de gestion des naissances et de Smart Build Camer. Mise en pratique réelle.</div>
    </div>

    <div class="milestone">
      <div class="milestone-date">Mois 6 → ∞</div>
      <div class="milestone-title">🎯 Objectif Full-Stack</div>
      <div class="milestone-desc">Progression vers le JavaScript avancé, APIs REST, et déploiement. La courbe continue de monter.</div>
    </div>

  </div>

</div>

<script>
  // Anime les barres de compétences
  document.addEventListener('DOMContentLoaded', () => {
    setTimeout(() => {
      document.querySelectorAll('.bar-fill').forEach(bar => {
        bar.style.width = bar.dataset.width + '%';
      });
    }, 400);

    // Anime les points du graphique
    document.querySelectorAll('.dot-point').forEach((dot, i) => {
      dot.style.animation = popIn 0.3s ease ${1.8 + i * 0.1}s forwards;
    });
  });
</script>

@endsection