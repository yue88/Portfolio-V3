<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" type="image/svg+xml" href="IMG/favicon.svg">
</head>

<body class="page-body page-fade">
    <div class="wrapper-projet">
        <div class="background-wrapper">
            <div class="background-glow"></div>
        </div>

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
                        <button type="button" class="nav-item" data-href="index.php#section-home">HOME</button>
                        <button type="button" class="nav-item" data-href="index.php#section-projects">PROJETS</button>
                        <button type="button" class="nav-item" data-href="index.php#section-abtme">ABOUT ME</button>
                        <button type="button" class="nav-item" data-href="index.php#section-contact">CONTACT</button>
                    </div>



                </div>
            </nav>
        </header>


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


    </div>
</body>

</html>