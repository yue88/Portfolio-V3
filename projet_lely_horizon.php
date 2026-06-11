<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/svg+xml" href="IMG/favicon.svg">
  <title>Projet - Lely Horizon</title>
</head>

<body class="page-body page-fade project-green">
  <div class="background-wrapper">
    <div class="background-glow"></div>
  </div>

  <header class="nav-header">
    <nav class="nav-bar">
      <div class="nav-inner">
        <span class="nav-brand">OCTAVE
          <span class="nav-brand-red">LEJEUNE</span>
        </span>

        <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Ouvrir le menu">

        <label class="nav-hamburger" for="nav-toggle">
          <svg viewBox="0 0 32 32" aria-hidden="true">
            <path class="hamburger-line hamburger-line-top-bottom"
              d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
            </path>
            <path class="hamburger-line" d="M7 16 27 16"></path>
          </svg>
        </label>

        <div class="nav-menu">
          <button type="button" class="nav-item" data-href="index.php#section-home">HOME</button>
          <button type="button" class="nav-item" data-href="index.php#section-projects">PROJETS</button>
          <button type="button" class="nav-item" data-href="index.php#section-abtme">ABOUT ME</button>
          <button type="button" class="nav-item" data-href="index.php#section-contact">CONTACT</button>
        </div>
      </div>
    </nav>
  </header>

  <main class="content-wrapper project-page">
    <section class="project-hero">
      <div class="project-hero-content">
        <a class="project-back-link" href="index.php#section-projects">Retour aux projets</a>
        <span class="project-label">Stage - SQL Server</span>
        <h1 class="project-title">Lely<span>Horizon</span></h1>
        <p class="project-intro">
          Un projet de stage autour de l'exploitation d'une base de donn&eacute;es SQL Server,
          afin de r&eacute;cup&eacute;rer, analyser et pr&eacute;senter des donn&eacute;es li&eacute;es &agrave; la production
          laiti&egrave;re et au suivi des vaches.
        </p>

        <div class="project-meta">
          <span>SQL Server</span>
          <span>Analyse de donn&eacute;es</span>
          <span>Application m&eacute;tier</span>
        </div>
      </div>

      <div class="project-hero-visual project-image-placeholder">
        <span>Image &agrave; venir</span>
      </div>
    </section>

    <section class="project-section">
      <div class="project-section-header">
        <span class="project-label">Contexte</span>
        <h2 class="project-section-title">Analyser une base m&eacute;tier complexe</h2>
      </div>

      <div class="project-text-grid">
        <article class="project-card-info">
          <h3>Objectif</h3>
          <p>
            Le projet consistait &agrave; cr&eacute;er des requ&ecirc;tes SQL et des vues capables de calculer
            des indicateurs utiles pour la production laiti&egrave;re et le suivi des vaches.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Donnees</h3>
          <p>
            Le travail demandait de comprendre une base existante et complexe, puis d'extraire
            les informations pertinentes pour les rendre exploitables.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Role</h3>
          <p>
            J'ai travaill&eacute; sur l'analyse des tables, les requ&ecirc;tes SQL, les sauvegardes,
            les restaurations et l'int&eacute;gration des r&eacute;sultats dans une application.
          </p>
        </article>
      </div>
    </section>

    <section class="project-section">
      <div class="project-section-header">
        <span class="project-label">Indicateurs</span>
        <h2 class="project-section-title">Requ&ecirc;tes, vues et pr&eacute;visions</h2>
      </div>

      <div class="project-text-grid">
        <article class="project-card-info">
          <h3>Production</h3>
          <p>
            Calculs de production moyenne et analyse des donn&eacute;es disponibles pour suivre
            l'activit&eacute; laiti&egrave;re.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Suivi</h3>
          <p>
            Mise en place d'indicateurs comme le temps moyen pass&eacute; en box et les donn&eacute;es
            utiles au suivi des animaux.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Previsions</h3>
          <p>
            Cr&eacute;ation de requ&ecirc;tes orient&eacute;es vers des pr&eacute;visions de cycles et une meilleure
            lecture des tendances.
          </p>
        </article>
      </div>
    </section>

    <section class="project-section">
      <div class="project-section-header">
        <span class="project-label">Aper&ccedil;u</span>
        <h2 class="project-section-title">Photos &agrave; venir</h2>
      </div>

      <div class="project-gallery-empty">
        <span>Les captures du projet seront ajout&eacute;es ici.</span>
      </div>
    </section>

    <section class="project-section project-final">
      <span class="project-label">Bilan</span>
      <p>
        Ce projet m'a permis de progresser en SQL Server, en analyse de donn&eacute;es et en
        compr&eacute;hension d'un environnement professionnel r&eacute;el.
      </p>
    </section>
  </main>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const FADE_MS = 220;

      function prefersReducedMotion() {
        return window.matchMedia && window.matchMedia("(prefers-reduced-motion: reduce)").matches;
      }

      function goWithFade(href) {
        const toggle = document.getElementById("nav-toggle");
        if (toggle) toggle.checked = false;

        if (prefersReducedMotion()) {
          window.location.href = href;
          return;
        }

        document.body.classList.add("is-leaving");
        setTimeout(() => {
          window.location.href = href;
        }, FADE_MS);
      }

      document.querySelectorAll(".nav-item").forEach((btn) => {
        btn.addEventListener("click", () => {
          const href = btn.getAttribute("data-href");
          if (!href) return;
          goWithFade(href);
        });
      });
    });
  </script>
</body>

</html>
