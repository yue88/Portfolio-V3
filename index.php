<?php

session_start();

ini_set('display_errors', '1');
error_reporting(E_ALL);

if (empty($_SESSION['csrf'])) {
  $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$success = null;
$error = null;

function post(string $key): string {
  return trim((string)($_POST[$key] ?? ''));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['envoyer'])) {

  if (!empty($_POST['website'] ?? '')) {
    $error = "Erreur lors de l'envoi.";
  }
  else if (!isset($_POST['csrf']) || !hash_equals($_SESSION['csrf'], (string)$_POST['csrf'])) {
    $error = "Session expirée, merci de recharger la page.";
  } else {

    $lastName  = post('last_name');
    $firstName = post('first_name');
    $email     = post('email');
    $subject   = post('subject');
    $message   = post('message');

    if ($lastName === '' || $firstName === '' || $message === '' || $email === '') {
      $error = "Merci de remplir tous les champs requis.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error = "E-mail invalide.";
    } else if (mb_strlen($message) > 5000) {
      $error = "Message trop long (max 5000 caractères).";
    } else {

      $to = 'octavelejeune80@gmail.com';

      $safeSubject = $subject !== '' ? $subject : 'Nouveau message (formulaire de contact)';
      $safeSubject = preg_replace("/[\r\n]+/", ' ', $safeSubject);

      $body =
        "Nouveau message depuis le formulaire :\n\n"
        . "Nom : {$lastName}\n"
        . "Prénom : {$firstName}\n"
        . "Email : {$email}\n"
        . "Objet : {$safeSubject}\n\n"
        . "Message :\n{$message}\n";

      $headers = [];
      $headers[] = 'MIME-Version: 1.0';
      $headers[] = 'Content-Type: text/plain; charset=UTF-8';
      $headers[] = 'From: Formulaire de contact <no-reply@octavelejeunealwaysdata.net>';
      $headers[] = 'Reply-To: ' . $email;

      $sent = mail($to, $safeSubject, $body, implode("\r\n", $headers));

      if ($sent) {
        $success = "Message envoyé. Merci !";
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
      } else {
        $error = "Impossible d'envoyer le message pour le moment.";
      }
    }
  }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Portfolio - Octave LEJEUNE</title>
</head>

<body class="page-body " id="section-home">
  <div class="background-wrapper">
    <div class="background-glow"></div>
  </div>
  <main class="content-wrapper">

    <header class="nav-header">
      <nav class="nav-bar">
        <div class="nav-inner">

          <span class="nav-brand">PORTFOLIO DE
            <span class="nav-brand-red">OCTAVE</span>
          </span>


          <input type="checkbox" id="nav-toggle" class="nav-toggle" aria-label="Ouvrir le menu" />

          <label class="nav-hamburger" for="nav-toggle">
            <svg viewBox="0 0 32 32" aria-hidden="true">
              <path class="hamburger-line hamburger-line-top-bottom"
                d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
              </path>
              <path class="hamburger-line" d="M7 16 27 16"></path>
            </svg>
          </label>
          <div class="nav-menu">
            <button class="nav-item" data-target="section-home">HOME</button>
            <button class="nav-item" data-target="section-projects">PROJETS</button>
            <button class="nav-item" data-target="section-abtme">ABOUT ME</button>
            <button class="nav-item" data-target="section-contact">CONTACT</button>
          </div>

        </div>
      </nav>
    </header>


    <script>
      document.querySelectorAll(".nav-item").forEach(btn => {
        btn.addEventListener("click", () => {
          const id = btn.getAttribute("data-target");
          const el = document.getElementById(id);
          if (el) el.scrollIntoView({ behavior: "smooth" });
        });
      });
    </script>


    <h1 class="hero-title">
      <span class="hero-title-highlight">PORTFOLIO</span><br>
      <span class="hero-title-main">DE</span><br>
      <span class="hero-title-main">OCTAVE LEJEUNE</span><br>

      <span class="hero-subtitle">
        WEB · Frontend · Backend
      </span>
    </h1>

    <section class="projects-section" id="section-projects">
      <div class="projects-header">
        <span class="projects-label">RÉALISATIONS</span>
        <h2 class="projects-title">Projets <span>Réalisés</span></h2>
      </div>

      <div class="projects-grid">
        <a href="projet_aide_et_vous.php" class="project-card">Projet 1</a>
        <a href="projet_retro_revival.php" class="project-card">Projet 2</a>
        <a href="projet.php" class="project-card">Projet 3</a>
        <a href="projet.php" class="project-card">Projet 4</a>
      </div>
    </section>
    <section class="about-section" id="section-abtme">
      <div class="about-header">
        <span class="about-label">Parcours, Info et Contact</span>
        <h2 class="about-title">About <span>Me</span></h2>
        <p class="about-intro">
          Étudiant en deuxieme année de BUT Informatique, je construis des projets web complets en apportant une
          attention particuliere sur le design ainsi que d'autre projets personnels et profesionnel
        </p>
      </div>

      <div class="about-grid">
        <!--------------------------------- Parcours -------------------------------------->
        <article class="about-card">
          <h3 class="about-card-title">Parcours scolaire</h3>

          <div class="timeline">
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-content">
                <div class="timeline-top">
                  <span class="timeline-role">BUT Informatique</span>
                  <span class="timeline-date">2024 — Aujourd'hui</span>
                </div>
                <p class="timeline-place">IUT2 - Université Grenoble Alpes</p>
                <p class="timeline-desc">
                  Développement web, Programation Java/C++ et autre, mise en place de serveurs...
                </p>
              </div>
            </div>

            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-content">
                <div class="timeline-top">
                  <span class="timeline-role">Baccalauréat</span>
                  <span class="timeline-date">2024</span>
                </div>
                <p class="timeline-place">Lycée Xavier Bichat - Nantua 01</p>
                <p class="timeline-desc">
                  Spécialités : NSI et Mathématiques
                </p>
              </div>
            </div>

            
            <div class="timeline-item">
              <div class="timeline-dot"></div>
              <div class="timeline-content">
                <div class="timeline-top">
                  <span class="timeline-role">College</span>
                  <span class="timeline-date">2016</span>
                </div>
                <p class="timeline-place">College du Valromey - Artemare 01</p>
              </div>
            </div>
          </div>
        </article>

        <!------------------------ Outils utilisés ------------------------------>
        <article class="about-card">
          <h3 class="about-card-title">Outils & technologies</h3>

          <div class="chips-group">
            <span class="chips-title">Langages</span>
            <div class="chips">
              <span class="chip">HTML</span>
              <span class="chip">CSS</span>
              <span class="chip">Java</span>
              <span class="chip">Python</span>
              <span class="chip">PHP</span>
              <span class="chip">JavaScript</span>
              <span class="chip">SQL (PostgreSQL)</span>
            </div>
          </div>

          <div class="chips-group">
            <span class="chips-title">Outils</span>
            <div class="chips">
              <span class="chip">VSCode</span>
              <span class="chip">IntelliJ</span>
              <span class="chip">Git - GitLab</span>
              <span class="chip">Debian - environnement linux</span>
            </div>
          </div>

          <div class="about-subblock">
            <h4 class="about-subtitle">Ce que j'apprecie faire</h4>
            <ul class="about-list">
              <li>Interfaces propres, responsive, mode sombre</li>
              <li>Structurer un projet (MVC, conventions, lisibilité)</li>
            </ul>
          </div>
        </article>



        <!---------------------------- Reseaux -------------------------------->
        <article class="about-card about-card-wide">
          <h3 class="about-card-title">Réseaux</h3>

          <div class="social-grid">
            <a class="social-link" href="https://github.com/yue88" target="_blank" rel="noopener">
              <span class="social-name">GitHub</span>
              <span class="social-hint">github.com/yue88</span>
            </a>

            <a class="social-link" href="https://www.linkedin.com/in/octave-lejeune-91a65b34a/" target="_blank"
              rel="noopener">
              <span class="social-name">LinkedIn</span>
              <span class="social-hint">linkedin.com/in/octave-lejeune-91a65b34a</span>
            </a>

            <a class="social-link" href="https://www.instagram.com/octave_ljn/" target="_blank" rel="noopener">
              <span class="social-name">Instagram</span>
              <span class="social-hint">@octave_ljn</span>
            </a>

            <a class="social-link" href="#" target="_blank" rel="noopener">
              <span class="social-name">Portfolio</span>
              <span class="social-hint">Lien public (optionnel)</span>
            </a>
          </div>

          <p class="about-note">
            Si un lien n'est plus valide n'hésitez pas à me contacter via le formulaire ci-dessous !
          </p>
        </article>
      </div>
    </section>


    <section class="contact-section" id="section-contact">

      <span class="contact-label">FORMULAIRE DE CONTACT</span>
      <div class="contact-inner">
        <form class="contact-form" method="post">

          <div style="position:absolute; left:-9999px; top:-9999px;">
            <label for="website">Website</label>
            <input type="text" name="website" id="website" autocomplete="off">
          </div>


          <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

          <div class="field-row">
            <div class="field">
              <label for="last-name">Nom</label>
              <input type="text" name="last_name" id="last-name" autocomplete="family-name" required value="<?= htmlspecialchars($_POST['last_name'] ?? '') ?>">
            </div>
            <div class="field">
              <label for="first-name">Prénom</label>
              <input type="text" name="first_name" id="first-name" autocomplete="given-name" required value="<?= htmlspecialchars($_POST['first_name'] ?? '') ?>">
            </div>
          </div>

          <div class="field">
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" autocomplete="email" required value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
          </div>

          <div class="field">
            <label for="subject">Objet</label>
            <input type="text" name="subject" id="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
          </div>

          <div class="field">
            <label for="message">Message</label>
            <textarea name="message" id="message" rows="6" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
          </div>

          <?php if ($success): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
          <?php endif; ?>

          <?php if ($error): ?>
            <div class="alert alert-error"><?= htmlspecialchars($error) ?></div>
          <?php endif; ?>


          <button class="contact-submit" name="envoyer" type="submit">Envoyer le message</button>
          <p class="contact-note">Réponse sous 24 à 48h.</p>
        </form>
      </div>
    </section>


  </main>
</body>


</html>