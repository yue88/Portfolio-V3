<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/svg+xml" href="IMG/favicon.svg">
  <title>Projet - Retro Revival</title>
</head>

<body class="page-body page-fade project-purple">
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
        <span class="project-label">Boutique en ligne fictive</span>
        <h1 class="project-title">Retro<span>Revival</span></h1>
        <p class="project-intro">
          Un site web consacr&eacute; &agrave; l'univers r&eacute;tro, avec une identit&eacute; visuelle inspir&eacute;e des ann&eacute;es
          80, 90 et 2000, entre ambiance sombre, couleurs n&eacute;on et esth&eacute;tique pixel art.
        </p>

        <div class="project-meta">
          <span>HTML/CSS</span>
          <span>Responsive</span>
          <span>Identit&eacute; visuelle</span>
        </div>
      </div>

      <div class="project-hero-visual">
        <img src="IMG/RetroRevival/homepage.png" alt="Page d'accueil du projet Retro Revival">
      </div>
    </section>

    <section class="project-section">
      <div class="project-section-header">
        <span class="project-label">Contexte</span>
        <h2 class="project-section-title">Une boutique r&eacute;tro immersive</h2>
      </div>

      <div class="project-text-grid">
        <article class="project-card-info">
          <h3>Objectif</h3>
          <p>
            Retro Revival pr&eacute;sente diff&eacute;rents produits, une page d'accueil, une collection,
            une page de contact ainsi qu'un syst&egrave;me de connexion et d'inscription.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Experience</h3>
          <p>
            Le projet avait pour but de cr&eacute;er une interface originale et coh&eacute;rente, en travaillant
            la structure des pages, le design et l'exp&eacute;rience utilisateur.
          </p>
        </article>

        <article class="project-card-info">
          <h3>Role</h3>
          <p>
            J'ai travaill&eacute; sur l'int&eacute;gration HTML/CSS, la mise en page responsive et la coh&eacute;rence
            graphique du site autour d'une identit&eacute; visuelle forte.
          </p>
        </article>
      </div>
    </section>

    <section class="project-section">
      <div class="project-section-header">
        <span class="project-label">Aper&ccedil;u</span>
        <h2 class="project-section-title">Interfaces du projet</h2>
      </div>

      <div class="project-gallery">
        <figure class="project-gallery-item project-gallery-large" tabindex="0">
          <img src="IMG/RetroRevival/homepage.png" alt="Accueil Retro Revival">
        </figure>
        <figure class="project-gallery-item" tabindex="0">
          <img src="IMG/RetroRevival/collection.png" alt="Collection Retro Revival">
        </figure>
        <figure class="project-gallery-item" tabindex="0">
          <img src="IMG/RetroRevival/register.png" alt="Inscription Retro Revival">
        </figure>
      </div>
    </section>

    <section class="project-section project-final">
      <span class="project-label">Bilan</span>
      <p>
        Ce projet m'a permis de d&eacute;velopper mes comp&eacute;tences en design web, en structuration de pages
        et en cr&eacute;ation d'une identit&eacute; visuelle marqu&eacute;e.
      </p>
    </section>
  </main>

  <div class="project-lightbox" aria-hidden="true">
    <button class="project-lightbox-close" type="button" aria-label="Fermer l'image agrandie">&times;</button>
    <img class="project-lightbox-image" src="" alt="">
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const FADE_MS = 220;
      const lightbox = document.querySelector(".project-lightbox");
      const lightboxImage = document.querySelector(".project-lightbox-image");
      const lightboxClose = document.querySelector(".project-lightbox-close");

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

      function openLightbox(image) {
        lightboxImage.src = image.currentSrc || image.src;
        lightboxImage.alt = image.alt;
        lightbox.classList.add("is-open");
        lightbox.setAttribute("aria-hidden", "false");
        document.body.classList.add("lightbox-open");
        lightboxClose.focus();
      }

      function closeLightbox() {
        lightbox.classList.remove("is-open");
        lightbox.setAttribute("aria-hidden", "true");
        document.body.classList.remove("lightbox-open");
        lightboxImage.src = "";
        lightboxImage.alt = "";
      }

      document.querySelectorAll(".project-gallery-item").forEach((item) => {
        item.addEventListener("click", () => {
          const image = item.querySelector("img");
          if (image) openLightbox(image);
        });

        item.addEventListener("keydown", (event) => {
          if (event.key !== "Enter" && event.key !== " ") return;
          event.preventDefault();
          const image = item.querySelector("img");
          if (image) openLightbox(image);
        });
      });

      lightboxClose.addEventListener("click", closeLightbox);

      lightbox.addEventListener("click", (event) => {
        if (event.target === lightbox) closeLightbox();
      });

      document.addEventListener("keydown", (event) => {
        if (event.key === "Escape" && lightbox.classList.contains("is-open")) {
          closeLightbox();
        }
      });
    });
  </script>
</body>

</html>
