<?php
/**
 * destinations.php — Bryvelrisse Travel and Tours
 *
 * All destination content below comes from the original page. Duplicate cards
 * (Bali and Vietnam each appeared twice) are now listed once.
 * Region is derived from the destination name: 'international' or 'domestic'.
 */

$featured = [
    ['title' => 'South Korea - Manila Departure', 'alt' => 'South Korea', 'preview' => 'South Korea - Manila Departure',
     'img' => 'assets/images/packages/packages-korea-out-manila.jpg', 'tag' => 'Culture', 'region' => 'international',
     'text' => 'Discover K-culture, scenic spots, and vibrant city life with a convenient Manila departure.'],
    ['title' => 'Shanghai, China', 'alt' => 'Shanghai, China', 'preview' => 'Shanghai, China',
     'img' => 'assets/images/packages/packages-shanghai-china-southern.jpg', 'tag' => 'Modernity', 'region' => 'international',
     'text' => 'Experience a dynamic city where futuristic skylines meet rich cultural heritage.'],
    ['title' => 'Taiwan', 'alt' => 'Taiwan', 'preview' => 'Taiwan',
     'img' => 'assets/images/packages/packages-taiwan.jpg', 'tag' => 'Top Spots', 'region' => 'international',
     'text' => 'Explore popular attractions, vibrant night markets, and must-visit scenic destinations.'],
    ['title' => 'Bali, Indonesia', 'alt' => 'Bali, Indonesia', 'preview' => 'Bali, Indonesia',
     'img' => 'assets/images/packages/packages-bali.jpg', 'tag' => 'Island Escape', 'region' => 'international',
     'text' => 'Enjoy tropical beaches, serene rice terraces, and a vibrant island culture in one unforgettable getaway.'],
];

$packages = [
    ['title' => 'South Korea - Cebu Departure', 'alt' => 'South Korea', 'preview' => 'South Korea - Cebu Departure',
     'img' => 'assets/images/packages/packages-korea-out-cebu.jpg', 'tag' => 'Culture', 'region' => 'international',
     'text' => "Enjoy the best of Korea's modern cities and traditional charm with an easy Cebu departure."],
    ['title' => 'Singapore', 'alt' => 'Singapore', 'preview' => 'Singapore',
     'img' => 'assets/images/packages/packages-singapore-out-manila.jpg', 'tag' => 'City', 'region' => 'international',
     'text' => 'Enjoy a clean, modern city filled with attractions and multicultural experiences.'],
    ['title' => 'Thailand', 'alt' => 'Thailand', 'preview' => 'Thailand',
     'img' => 'assets/images/packages/packages-thailand.jpg', 'tag' => 'Adventure', 'region' => 'international',
     'text' => 'Dive into vibrant street markets, temples, and tropical escapes.'],
    ['title' => 'Japan', 'alt' => 'Japan', 'preview' => 'Japan',
     'img' => 'assets/images/packages/packages-tokyo-or-osaka.jpg', 'tag' => 'Tradition', 'region' => 'international',
     'text' => 'Discover a perfect blend of ancient traditions and cutting-edge technology.'],
    ['title' => 'Vietnam', 'alt' => 'Vietnam', 'preview' => 'Vietnam',
     'img' => 'assets/images/packages/packages-vietnam.jpg', 'tag' => 'Cultural Journey', 'region' => 'international',
     'text' => "Discover vibrant cities, scenic landscapes, and warm hospitality across one of Southeast Asia's most captivating destinations."],
    ['title' => 'Batanes, Philippines', 'alt' => 'Batanes, Philippines', 'preview' => 'Batanes, Philippines',
     'img' => 'assets/images/packages/packages-batanes.jpg', 'tag' => 'Nature', 'region' => 'domestic',
     'text' => 'Relax in peaceful rolling hills, dramatic cliffs, and untouched beauty.'],
];

$values = [
    ['icon' => 'planning-icon.svg',          'title' => 'Curated Itineraries', 'text' => 'Every destination is hand-picked to ensure maximum value and comfort for our travelers.'],
    ['icon' => 'location-icon.svg',          'title' => 'Local Expertise',     'text' => 'Our team has firsthand knowledge of each destination to provide authentic experiences.'],
    ['icon' => 'airplane-ticket-icon.svg',   'title' => 'Hassle-Free Booking', 'text' => 'From flights to hotels, we manage all the paperwork and logistics for you.'],
    ['icon' => 'discount-icon.svg',          'title' => 'Best Value',          'text' => 'We negotiate the best rates and package deals to make your dream vacation affordable.'],
    ['icon' => 'diamond-icon.svg',           'title' => 'Premium Quality',     'text' => 'We partner with top-rated accommodations and service providers for your peace of mind.'],
    ['icon' => 'technical-support-icon.svg', 'title' => 'Expert Support',      'text' => 'Get 24/7 travel assistance throughout your entire journey with our dedicated team.'],
];

function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }

/** Renders one destination card. Keeps .text-card + data-preview-* so js/destinations.js still opens the preview modal. */
function render_card(array $d, bool $large = false) {
    $search = strtolower($d['title'] . ' ' . $d['tag'] . ' ' . $d['text']);
    ?>
    <li class="dest-item" data-region="<?= e($d['region']) ?>" data-search="<?= e($search) ?>">
        <button type="button" class="text-card dest-card<?= $large ? ' dest-card--large' : '' ?>"
                data-preview-src="<?= e($d['img']) ?>" data-preview-alt="<?= e($d['preview']) ?>">
            <span class="dest-card__media">
                <img src="<?= e($d['img']) ?>" alt="<?= e($d['alt']) ?>" class="text-card__image" loading="lazy"
                     onerror="this.onerror=null;this.src='assets/images/Bryvelrisse-Logo.png';this.classList.add('is-fallback');">
                <span class="pkg-card__tag"><?= e($d['tag']) ?></span>
            </span>
            <span class="dest-card__body">
                <span class="dest-card__title"><?= e($d['title']) ?></span>
                <span class="dest-card__text"><?= e($d['text']) ?></span>
                <span class="dest-card__cta">View package <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
            </span>
        </button>
    </li>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!--
        css/destinations.css is intentionally no longer linked: the redesign styles
        (including the preview modal) live in the <style> block below, scoped to body.dest-page,
        so they cannot affect other pages.
    -->
    <script src="js/destinations.js" defer></script>
    <script src="js/navbar.js" defer></script>

    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>

    <title>Destinations | Bryvelrisse Travel and Tours</title>

    <style>
        body.dest-page {
            --white: #ffffff;
            --dark: #1e4f6b;
            --accent: #4fb8e0;
            --primary-color: #306f91;
            --primary-light: #afc3dc;
            --primary-dark: #11263b;
            --secondary-light-dark: #356b86;
            --secondary-light: #8a96b0;
            --secondary-dark: #234e63;
            --soft-blue: #dceaf1;
            --surface: #f5f9fb;
            --surface-strong: #edf4f7;
            --surface-line: #d8e5ec;
            --gold: #F0B13D;
            --gold-dark: #d9973a;

            --font-display: 'Playfair Display', Georgia, serif;
            --font-hand: 'Caveat', cursive;
            --font-body: 'Montserrat', system-ui, sans-serif;
            --radius: 16px;
            --shadow: 0 6px 20px rgba(17, 38, 59, 0.08);
            --shadow-hover: 0 14px 32px rgba(17, 38, 59, 0.14);

            font-family: var(--font-body);
            color: var(--primary-dark);
            background: var(--surface);
            overflow-x: hidden;
        }
        .dest-page *, .dest-page *::before, .dest-page *::after { box-sizing: border-box; }
        .dest-page :focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }

        .dest-wrap { width: min(1180px, 100% - 2.5rem); margin-inline: auto; }
        .dest-page ul.dest-grid { list-style: none; margin: 0; padding: 0; }

        /* ---------- Hero ---------- */
        .dest-hero {
            position: relative;
            color: var(--white);
            text-align: center;
            padding: clamp(4rem, 10vw, 7.5rem) 1.25rem clamp(3.5rem, 8vw, 6rem);
            background:
                linear-gradient(rgba(17, 38, 59, 0.62), rgba(30, 79, 107, 0.72)),
                url('assets/images/packages/packages-batanes.jpg') center / cover no-repeat;
            background-color: var(--dark);
        }
        .dest-hero__accent {
            display: block;
            font-family: var(--font-hand);
            font-size: clamp(1.6rem, 3.4vw, 2.2rem);
            color: var(--gold);
            margin-bottom: .25rem;
        }
        .dest-hero h1 {
            font-family: var(--font-display);
            font-weight: 700;
            font-size: clamp(2.2rem, 5.5vw, 3.8rem);
            line-height: 1.1;
            margin: 0 0 1rem;
            color: var(--white);
        }
        .dest-hero p {
            font-size: clamp(.95rem, 1.6vw, 1.1rem);
            line-height: 1.7;
            max-width: 560px;
            margin: 0 auto 1.75rem;
            color: var(--soft-blue);
        }
        .dest-hero__tagline { display: block; margin-top: 1.5rem; font-size: .85rem; letter-spacing: .08em; color: var(--primary-light); }

        .dest-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
            min-height: 46px; padding: .75rem 1.6rem;
            font-family: var(--font-body); font-weight: 600; font-size: .95rem;
            border-radius: 999px; border: 2px solid transparent; text-decoration: none; cursor: pointer;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
        }
        .dest-btn--gold { background: var(--gold); color: var(--primary-dark); }
        .dest-btn--gold:hover { background: var(--gold-dark); transform: translateY(-1px); }
        .dest-btn--outline { border-color: var(--primary-color); color: var(--primary-color); background: transparent; }
        .dest-btn--outline:hover { background: var(--primary-color); color: var(--white); }

        /* ---------- Sections ---------- */
        .dest-section { padding: clamp(2.75rem, 6vw, 4.5rem) 0; }
        .dest-section--soft { background: var(--surface-strong); border-block: 1px solid var(--surface-line); }
        .dest-head { margin-bottom: 1.75rem; }
        .dest-head h2 {
            font-family: var(--font-display); font-weight: 600;
            font-size: clamp(1.6rem, 3.2vw, 2.2rem); margin: 0 0 .4rem; color: var(--primary-dark);
        }
        .dest-head p { margin: 0; color: var(--secondary-dark); line-height: 1.6; max-width: 60ch; }
        .dest-head__hand { font-family: var(--font-hand); font-size: 1.6rem; color: var(--gold-dark); display: block; line-height: 1; margin-bottom: .2rem; }

        /* ---------- Toolbar (filter + search) ---------- */
        .dest-toolbar { display: flex; flex-wrap: wrap; gap: .75rem 1rem; align-items: center; justify-content: space-between; margin-bottom: 1.75rem; }
        .dest-filters { display: flex; flex-wrap: wrap; gap: .5rem; }
        .dest-chip {
            font-family: var(--font-body); font-size: .88rem; font-weight: 600;
            min-height: 42px; padding: .5rem 1.1rem; border-radius: 999px; cursor: pointer;
            background: var(--white); color: var(--primary-color); border: 1px solid var(--surface-line);
            transition: background-color .2s ease, color .2s ease, border-color .2s ease;
        }
        .dest-chip:hover { border-color: var(--primary-color); }
        .dest-chip[aria-pressed="true"] { background: var(--primary-color); color: var(--white); border-color: var(--primary-color); }
        .dest-search { position: relative; flex: 0 1 300px; min-width: 200px; }
        .dest-search i { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--secondary-light); pointer-events: none; }
        .dest-search input {
            width: 100%; min-height: 44px; padding: .6rem 1rem .6rem 2.6rem;
            font-family: var(--font-body); font-size: .9rem; color: var(--primary-dark);
            background: var(--white); border: 1px solid var(--surface-line); border-radius: 999px;
        }
        .dest-search input::placeholder { color: var(--secondary-light); }
        .dest-search input:focus { border-color: var(--accent); }

        /* ---------- Grid + cards ---------- */
        .dest-grid { display: grid; gap: 1.5rem; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); }
        .dest-grid--featured { grid-template-columns: repeat(4, 1fr); }
        .dest-item[hidden] { display: none; }

        .dest-card {
            display: flex; flex-direction: column; width: 100%; height: 100%;
            padding: 0; margin: 0; text-align: left; cursor: pointer;
            font-family: var(--font-body); color: var(--primary-dark);
            background: var(--white); border: 1px solid var(--surface-line); border-radius: var(--radius);
            box-shadow: var(--shadow); overflow: hidden;
            transition: transform .25s ease, box-shadow .25s ease, border-color .25s ease;
        }
        .dest-card:hover { transform: translateY(-4px); box-shadow: var(--shadow-hover); border-color: var(--primary-light); }
        .dest-card__media { position: relative; display: block; aspect-ratio: 4 / 3; background: var(--soft-blue); overflow: hidden; }
        .dest-card .text-card__image { display: block; width: 100%; height: 100%; object-fit: cover; transition: transform .5s ease; }
        .dest-card .text-card__image.is-fallback { object-fit: contain; padding: 2rem; }
        .dest-card:hover .text-card__image { transform: scale(1.04); }
        .dest-card .pkg-card__tag {
            position: absolute; top: .75rem; left: .75rem;
            padding: .3rem .8rem; border-radius: 999px;
            font-size: .75rem; font-weight: 600; line-height: 1.2;
            background: var(--white); color: var(--primary-dark); border: 1px solid var(--surface-line);
        }
        .dest-card__body { display: flex; flex-direction: column; flex: 1; gap: .5rem; padding: 1.1rem 1.25rem 1.25rem; }
        .dest-card__title { font-family: var(--font-display); font-weight: 600; font-size: 1.2rem; line-height: 1.25; color: var(--primary-dark); }
        .dest-card__text { font-size: .88rem; line-height: 1.65; color: var(--secondary-dark); }
        .dest-card__cta {
            margin-top: auto; padding-top: .5rem; font-size: .85rem; font-weight: 600; color: var(--primary-color);
            display: inline-flex; align-items: center; gap: .5rem;
        }
        .dest-card__cta i { transition: transform .2s ease; }
        .dest-card:hover .dest-card__cta { color: var(--gold-dark); }
        .dest-card:hover .dest-card__cta i { transform: translateX(4px); }

        .dest-empty {
            display: none; text-align: center; padding: 2.5rem 1rem; background: var(--white);
            border: 1px dashed var(--primary-light); border-radius: var(--radius); color: var(--secondary-dark);
        }
        .dest-empty.is-visible { display: block; }
        .dest-empty strong { display: block; font-family: var(--font-display); font-size: 1.25rem; color: var(--primary-dark); margin-bottom: .35rem; }

        /* ---------- Why choose us ---------- */
        .values-grid { display: grid; gap: 1.25rem; grid-template-columns: repeat(3, minmax(0, 1fr)); }
        @media (max-width: 900px) {
            .values-grid { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
        @media (max-width: 600px) {
            .values-grid { grid-template-columns: minmax(0, 1fr); }
        }
        .value-card { background: var(--white); border: 1px solid var(--surface-line); border-radius: var(--radius); padding: 1.5rem; box-shadow: var(--shadow); }
        .value-card__icon {
            width: 52px; height: 52px; margin-bottom: 1rem; display: grid; place-items: center;
            background: var(--soft-blue); border-radius: 14px;
        }
        .value-card__icon img { width: 28px; height: 28px; object-fit: contain; }
        .value-card h3 { font-family: var(--font-display); font-weight: 600; font-size: 1.15rem; margin: 0 0 .4rem; color: var(--primary-dark); }
        .value-card p { margin: 0; font-size: .9rem; line-height: 1.65; color: var(--secondary-dark); }

        /* ---------- CTA ---------- */
        .dest-cta { background: var(--dark); color: var(--white); text-align: center; padding: clamp(3rem, 7vw, 4.75rem) 1.25rem; }
        .dest-cta__hand { font-family: var(--font-hand); font-size: 1.9rem; color: var(--gold); display: block; }
        .dest-cta h2 { font-family: var(--font-display); font-weight: 600; font-size: clamp(1.6rem, 3.6vw, 2.4rem); margin: .25rem 0 .75rem; color: var(--white); }
        .dest-cta p { max-width: 520px; margin: 0 auto 1.75rem; line-height: 1.7; color: var(--soft-blue); }
        .dest-cta__actions { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: center; }
        .dest-cta .dest-btn--outline { border-color: var(--primary-light); color: var(--white); }
        .dest-cta .dest-btn--outline:hover { background: var(--white); color: var(--primary-dark); border-color: var(--white); }

        /* ---------- Preview modal (hooks used by js/destinations.js) ---------- */
        .modal-preview { position: fixed; inset: 0; z-index: 2000; display: none; align-items: center; justify-content: center; padding: 1rem; }
        .modal-preview.is-open, .modal-preview.active, .modal-preview.open, .modal-preview.show, .modal-preview[aria-hidden="false"] { display: flex; }
        .modal-preview__backdrop { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; padding: 0; background: rgba(17, 38, 59, 0.78); cursor: pointer; }
        .modal-preview__box {
            position: relative; width: min(820px, 100%); max-height: 92vh; overflow: auto;
            background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow-hover);
        }
        .modal-preview__img { display: block; width: 100%; max-height: 68vh; object-fit: cover; }
        .modal-preview__actions { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: flex-end; padding: 1rem 1.25rem; }
        .modal-preview__book, .modal-preview__download {
            display: inline-flex; align-items: center; gap: .5rem; min-height: 44px; padding: .65rem 1.4rem;
            border-radius: 999px; font-family: var(--font-body); font-weight: 600; font-size: .9rem; text-decoration: none;
            transition: background-color .2s ease, color .2s ease;
        }
        .modal-preview__book { background: var(--gold); color: var(--primary-dark); }
        .modal-preview__book:hover { background: var(--gold-dark); }
        .modal-preview__download { border: 2px solid var(--primary-color); color: var(--primary-color); }
        .modal-preview__download:hover { background: var(--primary-color); color: var(--white); }
        .modal-preview__close {
            position: absolute; top: .6rem; right: .6rem; width: 42px; height: 42px; border: 0; border-radius: 50%;
            font-size: 1.6rem; line-height: 1; cursor: pointer; background: var(--white); color: var(--primary-dark);
            box-shadow: var(--shadow);
        }
        .modal-preview__close:hover { background: var(--gold); }

        /* ---------- Responsive ---------- */
        @media (max-width: 1024px) { .dest-grid--featured { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 640px) {
            .dest-grid, .dest-grid--featured { grid-template-columns: 1fr; gap: 1.1rem; }
            .dest-toolbar { flex-direction: column; align-items: stretch; }
            .dest-search { flex-basis: auto; }
            .dest-btn { width: 100%; }
            .dest-cta__actions { flex-direction: column; }
            .modal-preview__actions { justify-content: stretch; }
            .modal-preview__book, .modal-preview__download { flex: 1; justify-content: center; }
        }
        @media (prefers-reduced-motion: reduce) {
            .dest-page *, .dest-page *::before, .dest-page *::after { transition: none !important; animation: none !important; }
            .dest-card:hover { transform: none; }
        }
    </style>
</head>
<body class="dest-page">

    <nav class="navigation">
        <a href="index.php" class="logo"><img src="assets/images/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours" style="height: 60px; width: auto;"></a>
        <div class="nav-links">
            <a href="index.php">Home</a>
            <a href="destinations.php" class="active" aria-current="page">Destinations</a>
            <a href="about.php">About</a>
            <a href="contact.php">Contact</a>
            <a href="booking.php" class="btn-booking">
                <i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i>
                Booking
            </a>
            <a href="login.php" class="btn-login">
                <i class="fa-solid fa-user nav-icon" aria-hidden="true"></i>
                Login
            </a>
        </div>
        <button class="menu-toggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <i class="fa-solid fa-bars"></i>
        </button>
    </nav>

    <main>
        <header class="dest-hero destinations-header">
            <span class="dest-hero__accent">Wander to Wonder</span>
            <h1>Our Destinations</h1>
            <p>Explore our curated selection of local and international travel packages.</p>
            <a href="#all-packages" class="dest-btn dest-btn--gold">Browse packages <i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
            <span class="dest-hero__tagline destinations-header__tagline">Pick · Plan · Travel</span>
        </header>

        <!-- Best places -->
        <section class="dest-section" id="destination-columns" aria-labelledby="featured-title">
            <div class="dest-wrap">
                <div class="dest-head">
                    <span class="dest-head__hand">Top-rated getaways</span>
                    <h2 id="featured-title">Best Places to Visit</h2>
                    <p>Our top-rated and most requested getaways.</p>
                </div>
                <ul class="dest-grid dest-grid--featured">
                    <?php foreach ($featured as $d) { render_card($d, true); } ?>
                </ul>
            </div>
        </section>

        <!-- All packages with filter/search -->
        <section class="dest-section dest-section--soft" id="all-packages" aria-labelledby="packages-title">
            <div class="dest-wrap">
                <div class="dest-head">
                    <h2 id="packages-title">More Packages</h2>
                    <p>International trips, cultural escapes and local getaways.</p>
                </div>

                <div class="dest-toolbar">
                    <div class="dest-filters" role="group" aria-label="Filter packages by region">
                        <button type="button" class="dest-chip" data-filter="all" aria-pressed="true">All</button>
                        <button type="button" class="dest-chip" data-filter="international" aria-pressed="false">International</button>
                        <button type="button" class="dest-chip" data-filter="domestic" aria-pressed="false">Domestic</button>
                    </div>
                    <div class="dest-search">
                        <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                        <label for="dest-search-input" class="sr-only" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);">Search packages</label>
                        <input type="search" id="dest-search-input" placeholder="Search packages" autocomplete="off">
                    </div>
                </div>

                <ul class="dest-grid" id="dest-grid">
                    <?php foreach ($packages as $d) { render_card($d); } ?>
                </ul>
                <div class="dest-empty" id="dest-empty" role="status" aria-live="polite">
                    <strong>No packages found</strong>
                    Try a different search or select "All" to see every package.
                </div>
            </div>
        </section>

        <!-- Preview modal (unchanged hooks for js/destinations.js) -->
        <div class="modal-preview" id="destination-preview" aria-hidden="true">
            <button type="button" class="modal-preview__backdrop" aria-label="Close preview"></button>
            <div class="modal-preview__box" role="dialog" aria-modal="true" aria-label="Destination image preview">
                <img src="" alt="" class="modal-preview__img" id="destination-preview-image">
                <div class="modal-preview__actions">
                    <a href="contact.php?concern=booking" class="modal-preview__book">Book Now</a>
                    <a href="#" class="modal-preview__download" id="destination-preview-download" download>
                        <i class="fa-solid fa-download" aria-hidden="true"></i> Download
                    </a>
                </div>
                <button type="button" class="modal-preview__close" aria-label="Close preview">&times;</button>
            </div>
        </div>

        <!-- Why choose us -->
        <section class="dest-section why-choose-us" aria-labelledby="why-title">
            <div class="dest-wrap">
                <div class="dest-head">
                    <h2 id="why-title">Why Choose Our Packages</h2>
                    <p>The values that drive every journey we plan.</p>
                </div>
                <div class="values-grid">
                    <?php foreach ($values as $v) : ?>
                    <div class="value-card">
                        <div class="value-card__icon value-card__icon--image">
                            <img src="assets/icons/<?= e($v['icon']) ?>" alt="" aria-hidden="true">
                        </div>
                        <h3><?= e($v['title']) ?></h3>
                        <p><?= e($v['text']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Call to action (links only to existing pages) -->
        <section class="dest-cta" aria-labelledby="cta-title">
            <span class="dest-cta__hand">Ready when you are</span>
            <h2 id="cta-title">Found a destination you love?</h2>
            <p>Tell us where you want to go and our team will help you plan the trip.</p>
            <div class="dest-cta__actions">
                <a href="booking.php" class="dest-btn dest-btn--gold"><i class="fa-solid fa-plane" aria-hidden="true"></i> Book a trip</a>
                <a href="contact.php" class="dest-btn dest-btn--outline">Contact us</a>
            </div>
        </section>
    </main>

    <!-- Button -->
    <button id="back-to-top" aria-label="Back to top">
    <i class="fa-solid fa-chevron-up"></i>
    </button>

    <!--(Footer)-->
    <footer class="site-footer">
        <div class="footer-inner">
            <div class="footer-main">
                <div class="footer-brand">
                    <a href="index.php" class="footer-logo">Bryvelrisse<br><span>Travel and Tours</span></a>
                    <p class="footer-tagline">Crafting unforgettable journeys since 2019. Your adventure begins with a single step.</p>
                    <div class="footer-socials">
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="tel:+639422699852" aria-label="Phone"><i class="fa-solid fa-phone"></i></a>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com" aria-label="Email"><i class="fa-regular fa-envelope"></i></a>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener" aria-label="Location">
                            <i class="fa-solid fa-location-dot"></i>
                        </a>
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="contact.php#faq">FAQ</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="terms.php" target="_blank">Terms</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-col footer-contact">
                <h4>Contact Info</h4>
                <ul class="footer-contact-list">
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <a href="tel:+639422699852">+63 942 269 9852</a>
                    </li>
                    <li>
                        <i class="fa-solid fa-location-dot"></i>
                        <a href="https://www.google.com/maps/place/Bryvelrisse+Travel+and+Tours/@14.5233841,121.1476712,17z/data=!4m15!1m8!3m7!1s0x3397c6955a4ae49d:0xab32088e8de36c2d!2s336+E+Bautista+St,+Angono,+1930+Rizal!3b1!8m2!3d14.5233841!4d121.1476712!16s%2Fg%2F11f776jr0_!3m5!1s0x3397c78057d49b99:0xb929b7ba022f704f!8m2!3d14.5235852!4d121.1475056!16s%2Fg%2F11flbfqtfb?entry=ttu&g_ep=EgoyMDI2MDUxMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener">336 E. Bautista St., Brgy. San Vicente, Angono, Philippines, 1930</a>
                    </li>
                    <li>
                        <i class="fa-regular fa-envelope"></i>
                        <a href="mailto:bryvelrissetravelandtours@gmail.com">bryvelrissetravelandtours@gmail.com</a>
                    </li>
                    <li>
                        <i class="fa-brands fa-facebook-f"></i>
                        <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener">Bryvelrisse Travel and Tours</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
            <p>Designed with <i class="fa-solid fa-heart" style="color: var(--gold, #F0B13D);"></i> for every traveler</p>
        </div>
    </footer>

    <script>
    // Page-only filter + search. Modal and back-to-top remain handled by js/destinations.js.
    (function () {
        var chips = document.querySelectorAll('.dest-chip');
        var items = document.querySelectorAll('#dest-grid .dest-item');
        var input = document.getElementById('dest-search-input');
        var empty = document.getElementById('dest-empty');
        var region = 'all';

        function apply() {
            var q = input.value.trim().toLowerCase();
            var shown = 0;
            items.forEach(function (li) {
                var ok = (region === 'all' || li.dataset.region === region) &&
                         (q === '' || li.dataset.search.indexOf(q) !== -1);
                li.hidden = !ok;
                if (ok) shown++;
            });
            empty.classList.toggle('is-visible', shown === 0);
        }

        chips.forEach(function (chip) {
            chip.addEventListener('click', function () {
                region = chip.dataset.filter;
                chips.forEach(function (c) { c.setAttribute('aria-pressed', c === chip ? 'true' : 'false'); });
                apply();
            });
        });
        input.addEventListener('input', apply);
    })();
    </script>

</body>
</html>
