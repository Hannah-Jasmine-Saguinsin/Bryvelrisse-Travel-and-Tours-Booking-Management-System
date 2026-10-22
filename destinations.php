<?php
/**
 * destinations.php — Bryvelrisse Travel and Tours
 * Split hero with photo collage, "Best Places to Visit" 2 x 2 poster cards,
 * "More Packages" horizontal cards (image left, details right), a divider-style
 * "why us" strip and a full-width background CTA.
 *
 * Fonts, palette and modal hooks are unchanged, so js/destinations.js keeps working
 * (.text-card + data-preview-* + #destination-preview).
 */

$featured = [
    
    [
    'title' => 'South Korea - Manila Departure', 'alt' => 'South Korea', 'preview' => 'South Korea - Manila Departure',
    'img' => 'assets/images/destination/south-korea2.jpg', 'preview_img' => 'assets/images/packages/packages-korea-out-manila.jpg',
    'tag' => 'Culture', 'region' => 'international', 'from' => 'Manila',
    'text' => 'Discover K-culture, scenic spots, and vibrant city life with a convenient Manila departure.'
    ],

    ['title' => 'Shanghai, China', 'alt' => 'Shanghai, China', 'preview' => 'Shanghai, China',
     'img' => 'assets/images/destination/shanghai-china.jpg', 'preview_img' => 'assets/images/packages/packages-shanghai-china-southern.jpg', 'tag' => 'Modernity', 'region' => 'international',
     'text' => 'Experience a dynamic city where futuristic skylines meet rich cultural heritage.'],

    ['title' => 'Taiwan', 'alt' => 'Taiwan', 'preview' => 'Taiwan', 'img' => 'assets/images/destination/taipei-taiwan.jpg',
     'preview_img' => 'assets/images/packages/packages-taiwan.jpg', 'tag' => 'Top Spots', 'region' => 'international',
     'text' => 'Explore popular attractions, vibrant night markets, and must-visit scenic destinations.'],
     
    ['title' => 'Bali, Indonesia', 'alt' => 'Bali, Indonesia', 'preview' => 'Bali, Indonesia', 'img' => 'assets/images/destination/bali-indonesia.jpg',
     'preview_img' => 'assets/images/packages/packages-bali.jpg', 'tag' => 'Island Escape', 'region' => 'international',
     'text' => 'Enjoy tropical beaches, serene rice terraces, and a vibrant island culture in one unforgettable getaway.'],
];

$packages = [
    ['title' => 'South Korea - Cebu Departure', 'alt' => 'South Korea', 'preview' => 'South Korea - Cebu Departure',
     'img' => 'assets/images/destination/south-korea.jpg',
    'preview_img' => 'assets/images/packages/packages-korea-out-cebu.jpg', 'tag' => 'Culture', 'region' => 'international',
     'from' => 'Cebu',
     'text' => "Enjoy the best of Korea's modern cities and traditional charm with an easy Cebu departure."],

    ['title' => 'Singapore', 'alt' => 'Singapore', 'preview' => 'Singapore',
     'img' => 'assets/images/destination/singapore.jpg',
    'preview_img' => 'assets/images/packages/packages-singapore-out-manila.jpg', 'tag' => 'City', 'region' => 'international',
     'text' => 'Enjoy a clean, modern city filled with attractions and multicultural experiences.'],

    ['title' => 'Thailand', 'alt' => 'Thailand', 'preview' => 'Thailand', 'img' => 'assets/images/destination/thailand.jpg',
    'preview_img' => 'assets/images/packages/packages-thailand.jpg',
    'tag' => 'Adventure', 'region' => 'international', 'text' => 'Dive into vibrant street markets, temples, and tropical escapes.'],

    ['title' => 'Japan', 'alt' => 'Japan', 'preview' => 'Japan',
     'img' => 'assets/images/destination/japan.jpg', 'preview_img' => 'assets/images/packages/packages-tokyo-or-osaka.jpg', 'tag' => 'Tradition', 'region' => 'international',
     'text' => 'Discover a perfect blend of ancient traditions and cutting-edge technology.'],

    ['title' => 'Vietnam', 'alt' => 'Vietnam', 'preview' => 'Vietnam', 'img' => 'assets/images/destination/vietnam.jpg',
     'preview_img' => 'assets/images/packages/packages-vietnam.jpg', 'tag' => 'Cultural Journey', 'region' => 'international',
     'text' => "Discover vibrant cities, scenic landscapes, and warm hospitality across one of Southeast Asia's most captivating destinations."],
     
    ['title' => 'Batanes, Philippines', 'alt' => 'Batanes, Philippines', 'preview' => 'Batanes, Philippines',
     'img' => 'assets/images/destination/batanes.jpg', 'preview_img' => 'assets/images/packages/packages-batanes.jpg', 'tag' => 'Nature', 'region' => 'domestic',
     'text' => 'Relax in peaceful rolling hills, dramatic cliffs, and untouched beauty.'],
];

$values = [
    ['icon' => 'planning-icon.svg',          'title' => 'Curated Itineraries', 'text' => 'Every destination is hand-picked to ensure maximum value and comfort for our travelers.'],
    ['icon' => 'airplane-ticket-icon.svg',   'title' => 'Hassle-Free Booking', 'text' => 'From flights to hotels, we manage all the paperwork and logistics for you.'],
    ['icon' => 'technical-support-icon.svg', 'title' => 'Expert Support',      'text' => 'Get 24/7 travel assistance throughout your entire journey with our dedicated team.'],
    ['icon' => 'discount-icon.svg',          'title' => 'Best Value',          'text' => 'We negotiate the best rates and package deals to make your dream vacation affordable.'],
    ['icon' => 'location-icon.svg',          'title' => 'Local Expertise',     'text' => 'Our team has firsthand knowledge of each destination to provide authentic experiences.'],
    ['icon' => 'diamond-icon.svg',           'title' => 'Premium Quality',     'text' => 'We partner with top-rated accommodations and service providers for your peace of mind.'],
];

$count_all  = count($packages);
$count_intl = count(array_filter($packages, fn($p) => $p['region'] === 'international'));
$count_dom  = count(array_filter($packages, fn($p) => $p['region'] === 'domestic'));

if (!function_exists('e')) {
    function e($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
}

/** Poster-style card (used by "Best Places to Visit"). */
function render_card(array $d, string $variant = 'spot') {
    $search = strtolower($d['title'] . ' ' . $d['tag'] . ' ' . $d['text']);
    ?>
    <li class="dest-item dest-item--<?= e($variant) ?>" data-region="<?= e($d['region']) ?>" data-search="<?= e($search) ?>">
        <button type="button" class="text-card d2-card d2-card--<?= e($variant) ?>"
                data-preview-src="<?= e($d['preview_img'] ?? $d['img']) ?>" data-preview-alt="<?= e($d['preview']) ?>">
            <img src="<?= e($d['img']) ?>" alt="<?= e($d['alt']) ?>" class="text-card__image" loading="lazy"
                 onerror="this.onerror=null;this.src='assets/images/Bryvelrisse-Logo.png';this.classList.add('is-fallback');">
            <span class="d2-card__shade" aria-hidden="true"></span>
            <span class="d2-card__tag"><?= e($d['tag']) ?></span>
            <span class="d2-card__info">
                <span class="d2-card__title"><?= e($d['title']) ?></span>
                <span class="d2-card__text"><?= e($d['text']) ?></span>
                <span class="d2-card__cta">View package <i class="fa-solid fa-arrow-right" aria-hidden="true"></i></span>
            </span>
        </button>
    </li>
    <?php
}

/** "More Packages" card: image + title on the left, details and buttons on the right. */
function render_package(array $d) {
    $intl   = $d['region'] === 'international';
    $label  = $intl ? 'International Package' : 'Domestic Package';
    $icon   = $intl ? 'fa-earth-asia' : 'fa-location-dot';
    $search = strtolower($d['title'] . ' ' . $d['tag'] . ' ' . $d['text']);
    ?>
    <li class="dest-item d2-pkg-item" data-region="<?= e($d['region']) ?>" data-search="<?= e($search) ?>">
        <article class="d2-pkg">
            <button type="button" class="text-card d2-pkg__media"
                    data-preview-src="<?= e($d['preview_img'] ?? $d['img']) ?>" data-preview-alt="<?= e($d['preview']) ?>"
                    aria-label="Preview <?= e($d['title']) ?>">
                <img src="<?= e($d['img']) ?>" alt="<?= e($d['alt']) ?>" class="text-card__image" loading="lazy"
                     onerror="this.onerror=null;this.src='assets/images/Bryvelrisse-Logo.png';this.classList.add('is-fallback');">
                <span class="d2-pkg__shade" aria-hidden="true"></span>
                <span class="d2-pkg__title"><?= e($d['title']) ?></span>
            </button>

            <div class="d2-pkg__panel">
                <span class="d2-pkg__kind"><i class="fa-solid <?= e($icon) ?>" aria-hidden="true"></i> <?= e($label) ?></span>

                <div class="d2-pkg__highlight">
                    <span class="d2-pkg__highlight-label">Highlight:</span>
                    <p><?= e($d['text']) ?></p>
                </div>

                <div class="d2-pkg__actions">
                    <button type="button" class="text-card d2-btn d2-btn--ghost"
                            data-preview-src="<?= e($d['preview_img'] ?? $d['img']) ?>" data-preview-alt="<?= e($d['preview']) ?>">View Package</button>
                    <a href="contact.php?concern=booking" class="d2-btn d2-btn--gold">Book Now</a>
                </div>
            </div>
        </article>
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
    <script src="js/destinations.js" defer></script>
    <script src="js/navbar.js" defer></script>

    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>

    <title>Destinations | Bryvelrisse Travel and Tours</title>

    <style>
        body.dest2-page {
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
            --radius: 20px;
            --shadow: 0 8px 24px rgba(17, 38, 59, 0.10);
            --shadow-hover: 0 18px 40px rgba(17, 38, 59, 0.20);

            font-family: var(--font-body);
            color: var(--primary-dark);
            background: var(--white);
            overflow-x: hidden;
        }
        .dest2-page *, .dest2-page *::before, .dest2-page *::after { box-sizing: border-box; }
        .dest2-page :focus-visible { outline: 3px solid var(--gold); outline-offset: 3px; }
        .dest2-page ul.d2-grid, .dest2-page ul.d2-pkgs { list-style: none; margin: 0; padding: 0; }
        .d2-wrap { width: min(1180px, 100% - 2.5rem); margin-inline: auto; }

        /* ---------- Buttons ---------- */
        .d2-btn {
            display: inline-flex; align-items: center; justify-content: center; gap: .5rem;
            min-height: 46px; padding: .75rem 1.6rem; font-family: var(--font-body); font-weight: 600; font-size: .95rem;
            border-radius: 999px; border: 2px solid transparent; text-decoration: none; cursor: pointer;
            transition: background-color .2s ease, color .2s ease, border-color .2s ease, transform .2s ease;
        }
        .d2-btn--gold { background: var(--gold); color: var(--primary-dark); }
        .d2-btn--gold:hover { background: var(--gold-dark); transform: translateY(-1px); }
        .d2-btn--outline { border-color: var(--primary-color); color: var(--primary-color); background: transparent; }
        .d2-btn--outline:hover { background: var(--primary-color); color: var(--white); }
        .d2-btn--ghost { border-color: var(--accent); color: var(--primary-color); background: var(--white); }
        .d2-btn--ghost:hover { background: var(--primary-color); border-color: var(--primary-color); color: var(--white); }

        /* ---------- Split hero (photo background) ---------- */
        .d2-hero {
            overflow: hidden;
            background:
                linear-gradient(rgba(17, 38, 59, 0.45), rgba(30, 79, 107, 0.6)),
                url('assets/images/destination-bg5.jpg') center / cover no-repeat;
            background-color: var(--dark);
        }
        .d2-hero__inner {
            display: grid; grid-template-columns: 1.05fr 1fr; gap: clamp(2rem, 5vw, 4rem); align-items: center;
            padding-block: clamp(3rem, 7vw, 5.5rem);
        }
        .d2-hero__inner > div:first-child { text-align: left; }
        .d2-hero__accent { display: block; font-family: var(--font-hand); font-size: clamp(1.7rem, 3.4vw, 2.3rem); color: var(--gold); line-height: 1; margin-bottom: .4rem; }
        .d2-hero h1 {
            font-family: var(--font-display); font-weight: 700; font-size: clamp(2.4rem, 5.4vw, 4rem);
            line-height: 1.08; margin: 0 0 1rem; color: var(--white); text-shadow: 0 2px 18px rgba(17, 38, 59, .35);
        }
        .d2-hero h1 em { font-style: italic; color: var(--gold); }
        .d2-hero p { margin: 0 0 1.75rem; max-width: 46ch; line-height: 1.75; color: var(--soft-blue); font-size: 1.02rem; }
        .d2-hero__actions { display: flex; flex-wrap: wrap; gap: .75rem; align-items: center; justify-content: flex-start; }
        .d2-hero__tagline { margin-top: 1.5rem; font-size: .82rem; font-weight: 600; letter-spacing: .14em; text-transform: uppercase; color: var(--primary-light); }

        .d2-collage { position: relative; height: clamp(300px, 38vw, 440px); }
        .d2-collage img {
            position: absolute; width: 52%; aspect-ratio: 3 / 4; object-fit: cover; object-position: top;
            border-radius: var(--radius); border: 6px solid var(--white); box-shadow: var(--shadow-hover); background: var(--soft-blue);
        }
        .d2-collage img:nth-child(1) { left: 0;   top: 8%;  transform: rotate(-5deg); z-index: 1; }
        .d2-collage img:nth-child(2) { left: 24%; top: 0;   transform: rotate(2deg);  z-index: 3; }
        .d2-collage img:nth-child(3) { right: 0;  top: 14%; transform: rotate(7deg);  z-index: 2; }

        /* ---------- Sections ---------- */
        .d2-section { padding: clamp(3rem, 7vw, 5rem) 0; }
        .d2-section--soft { background: var(--surface); border-block: 1px solid var(--surface-line); }
        .d2-head { display: flex; flex-wrap: wrap; align-items: end; justify-content: space-between; gap: 1rem 2rem; margin-bottom: 2rem; }
        .d2-head--center { justify-content: center; text-align: center; }
        .d2-head--center p { margin-inline: auto; }
        .d2-head__hand { display: block; font-family: var(--font-hand); font-size: 1.6rem; color: var(--gold-dark); line-height: 1; margin-bottom: .2rem; }
        .d2-head h2 { font-family: var(--font-display); font-weight: 700; font-size: clamp(1.9rem, 3.8vw, 2.8rem); margin: 0; color: var(--primary-dark); line-height: 1.1; }
        .d2-head p { margin: .4rem 0 0; color: var(--secondary-dark); line-height: 1.6; max-width: 56ch; }
        .d2-head--tools { align-items: center; }
        .d2-head--tools p { color: var(--primary-color); font-size: 1.05rem; }

        /* ---------- Poster cards (Best Places to Visit) ---------- */
        .d2-card {
            position: relative; display: block; width: 100%; height: 100%; padding: 0; margin: 0; border: 0; text-align: left; cursor: pointer;
            font-family: var(--font-body); color: var(--white); background: var(--dark);
            border-radius: var(--radius); overflow: hidden; box-shadow: var(--shadow);
            transition: transform .3s ease, box-shadow .3s ease;
        }
        .d2-card:hover { transform: translateY(-5px); box-shadow: var(--shadow-hover); }
        .d2-card .text-card__image { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: top center; transition: transform .6s ease; }
        .d2-card .text-card__image.is-fallback { object-fit: contain; padding: 3rem; background: var(--soft-blue); }
        .d2-card:hover .text-card__image { transform: scale(1.05); }
        .d2-card__shade { position: absolute; inset: 0; background: linear-gradient(to top, rgba(17, 38, 59, .92) 0%, rgba(17, 38, 59, .45) 38%, rgba(17, 38, 59, 0) 65%); }
        .d2-card__tag {
            position: absolute; top: 1rem; left: 50%; transform: translateX(-50%); white-space: nowrap; padding: .4rem 1rem; border-radius: 999px;
            font-size: .8rem; font-weight: 700; letter-spacing: .04em; background: var(--gold); color: var(--primary-dark);
        }
        .d2-card__info { position: absolute; left: 0; right: 0; bottom: 0; display: flex; flex-direction: column; align-items: center; text-align: center; gap: .35rem; padding: 1.25rem; }
        .d2-card__title { font-family: var(--font-display); font-weight: 600; font-size: 1.3rem; line-height: 1.2; color: var(--white); }
        .d2-card__text {
            font-size: .85rem; line-height: 1.6; color: var(--soft-blue);
            max-height: 0; opacity: 0; overflow: hidden; transition: max-height .35s ease, opacity .3s ease;
        }
        .d2-card__cta { display: inline-flex; align-items: center; gap: .5rem; margin-top: .25rem; font-size: .82rem; font-weight: 600; color: var(--gold); }
        .d2-card__cta i { transition: transform .2s ease; }
        .d2-card:hover .d2-card__text, .d2-card:focus-visible .d2-card__text { max-height: 8rem; opacity: 1; }
        .d2-card:hover .d2-card__cta i { transform: translateX(4px); }
        @media (hover: none) { .d2-card__text { max-height: none; opacity: 1; } }

        /* Best Places to Visit: 2 x 2 aligned grid */
        .d2-grid.d2-spot {
            display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); grid-auto-rows: 420px;
            gap: 1.5rem; width: 100%; margin-inline: auto;
        }
        .d2-grid.d2-spot .dest-item { min-height: 0; }
        .d2-spot .d2-card--spot .d2-card__title { font-size: 1.6rem; }

        /* ---------- Toolbar (filters + search) ---------- */
        .d2-head--tools > div:first-child { flex: 1 1 280px; min-width: 0; }
        .d2-head--tools p { max-width: 38ch; }
        .d2-toolbar { display: flex; flex-wrap: nowrap; gap: 1rem; align-items: center; justify-content: flex-end; flex: 0 1 auto; }
        .d2-tabs { display: inline-flex; flex-wrap: nowrap; align-items: center; gap: .25rem; height: 52px; padding: .3rem; background: var(--white); border: 1px solid var(--surface-line); border-radius: 999px; box-shadow: var(--shadow); }
        .d2-tab {
            display: inline-flex; align-items: center; gap: .45rem; min-height: 40px; padding: .4rem 1.1rem; border: 0; border-radius: 999px; cursor: pointer;
            font-family: var(--font-body); font-size: .88rem; font-weight: 600; background: transparent; color: var(--primary-color);
            transition: background-color .2s ease, color .2s ease;
        }
        .d2-tab span { font-size: .72rem; padding: .1rem .5rem; border-radius: 999px; background: var(--soft-blue); color: var(--secondary-dark); }
        .d2-tab:hover { background: var(--surface-strong); }
        .d2-tab[aria-pressed="true"] { background: var(--dark); color: var(--white); }
        .d2-tab[aria-pressed="true"] span { background: rgba(255, 255, 255, .22); color: var(--white); }
        .d2-search { position: relative; flex: 0 1 280px; min-width: 190px; height: 52px; }
        .d2-search i { position: absolute; left: 1rem; top: 50%; transform: translateY(-50%); color: var(--primary-color); pointer-events: none; }
        .d2-search input {
            width: 100%; height: 100%; padding: 0 1rem 0 2.6rem; font-family: var(--font-body); font-size: .9rem; color: var(--primary-dark);
            background: var(--white); border: 1px solid var(--surface-line); border-radius: 999px; box-shadow: var(--shadow);
        }
        .d2-search input::placeholder { color: var(--secondary-light); }
        .d2-search input:focus { border-color: var(--accent); outline: none; }

        /* ---------- More Packages: horizontal cards, 2 per row ---------- */
        .dest-item[hidden] { display: none; }
        .d2-pkgs { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1.75rem 1.5rem; }
        .d2-pkgs > .d2-pkg-item { display: flex; }
        .d2-pkgs > .d2-pkg-item[hidden] { display: none; }
        .d2-pkg {
            flex: 1 1 auto; min-width: 0;
            display: grid; grid-template-columns: minmax(0, 0.95fr) minmax(0, 1.05fr); min-height: 250px;
            background: var(--white); border: 1px solid var(--surface-line); border-radius: 16px;
            box-shadow: var(--shadow); overflow: hidden; transition: box-shadow .3s ease, transform .3s ease;
        }
        .d2-pkg:hover { box-shadow: var(--shadow-hover); transform: translateY(-3px); }

        .d2-pkg__media {
            position: relative; display: block; width: 100%; height: 100%; min-height: 230px; padding: 0; margin: 0;
            border: 0; border-radius: 0; cursor: pointer; overflow: hidden; text-align: left;
            font-family: var(--font-body); color: var(--white); background: var(--dark);
        }
        .d2-pkg__media .text-card__image {
            position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; object-position: top center;
            transition: transform .6s ease;
        }
        .d2-pkg__media .text-card__image.is-fallback { object-fit: contain; padding: 3rem; background: var(--soft-blue); }
        .d2-pkg__media:hover .text-card__image { transform: scale(1.05); }
        .d2-pkg__shade { position: absolute; inset: 0; background: linear-gradient(to top, rgba(17, 38, 59, .9) 0%, rgba(17, 38, 59, .35) 32%, rgba(17, 38, 59, 0) 58%); }
        .d2-pkg__title {
            position: absolute; left: 1.1rem; right: 1.1rem; bottom: 1rem;
            font-family: var(--font-display); font-weight: 700; font-size: clamp(1.15rem, 1.8vw, 1.45rem); line-height: 1.15;
            color: var(--white); text-shadow: 0 2px 10px rgba(17, 38, 59, .55);
        }

        .d2-pkg__panel { display: flex; flex-direction: column; align-items: flex-start; text-align: left; padding: 1.25rem 1.4rem 1.25rem; }
        .d2-pkg__kind { display: inline-flex; align-items: center; gap: .6rem; font-size: .9rem; font-weight: 600; color: var(--primary-color); }
        .d2-pkg__kind i { font-size: 1.2rem; }
        .d2-pkg__highlight { margin-top: 1.1rem; }
        .d2-pkg__highlight-label { display: block; font-size: .85rem; font-weight: 700; letter-spacing: .02em; text-transform: uppercase; color: var(--primary-color); margin-bottom: .2rem; }
        .d2-pkg__highlight p { margin: 0; font-size: .9rem; line-height: 1.55; color: var(--primary-color); }
        .d2-pkg__actions {
            margin-top: auto; width: 100%; padding-top: 1rem; border-top: 1px solid var(--surface-line);
            display: flex; flex-wrap: wrap; gap: .65rem; align-items: center;
        }
        .d2-pkg__highlight + .d2-pkg__actions { margin-top: auto; }
        .d2-pkg__panel .d2-btn { min-height: 42px; padding: .55rem 1.3rem; font-size: .85rem; flex: 1 1 0; white-space: nowrap; }
        .d2-pkg__panel { gap: 0; }
        .d2-pkg__highlight { margin-bottom: 1rem; }

        .d2-empty {
            display: none; text-align: center; padding: 2.5rem 1rem; background: var(--white);
            border: 1px dashed var(--primary-light); border-radius: var(--radius); color: var(--secondary-dark);
        }
        .d2-empty.is-visible { display: block; }
        .d2-empty strong { display: block; font-family: var(--font-display); font-size: 1.25rem; color: var(--primary-dark); margin-bottom: .35rem; }

        /* ---------- Why us strip ---------- */
        .d2-values { display: grid; grid-template-columns: repeat(3, 1fr); }
        .d2-value { padding: 1.75rem 1.5rem; border-left: 1px solid var(--surface-line); border-top: 1px solid var(--surface-line); text-align: center; }
        .d2-value:nth-child(3n + 1) { border-left: 0; }
        .d2-value:nth-child(-n + 3) { border-top: 0; }
        .d2-value__icon { width: 56px; height: 56px; margin: 0 auto 1rem; display: grid; place-items: center; border-radius: 50%; background: var(--soft-blue); }
        .d2-value__icon img { width: 28px; height: 28px; object-fit: contain; }
        .d2-value h3 { font-family: var(--font-display); font-weight: 600; font-size: 1.2rem; margin: 0 0 .4rem; color: var(--primary-dark); }
        .d2-value p { margin: 0; font-size: .9rem; line-height: 1.65; color: var(--secondary-dark); }

        /* ---------- CTA: full-width background (no box) ---------- */
        .d2-cta {
            padding: clamp(4rem, 9vw, 6.5rem) 0; text-align: center; color: var(--white);
            background:
                linear-gradient(rgba(17, 38, 59, 0.78), rgba(17, 38, 59, 0.84)),
                url('assets/images/destination-bottombg.jpg') center / cover no-repeat;
            background-color: var(--primary-dark);
        }
        .d2-cta__hand { font-family: var(--font-hand); font-size: 2rem; color: var(--gold); display: block; line-height: 1; }
        .d2-cta h2 { font-family: var(--font-display); font-weight: 600; font-size: clamp(1.8rem, 3.8vw, 2.7rem); margin: .3rem 0 .75rem; color: var(--white); }
        .d2-cta p { margin: 0 auto; line-height: 1.7; color: var(--soft-blue); max-width: 48ch; }
        .d2-cta__actions { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: center; margin-top: 1.75rem; }
        .d2-cta .d2-btn--outline { border-color: var(--primary-light); color: var(--white); }
        .d2-cta .d2-btn--outline:hover { background: var(--white); color: var(--primary-dark); border-color: var(--white); }
        .d2-hero .d2-btn--outline { border-color: var(--white); color: var(--white); }
        .d2-hero .d2-btn--outline:hover { background: var(--white); color: var(--primary-dark); }

        /* ---------- Preview modal (hooks used by js/destinations.js) ---------- */
        .modal-preview { position: fixed; inset: 0; z-index: 2000; display: none; align-items: center; justify-content: center; padding: 1rem; }
        .modal-preview.is-open, .modal-preview.active, .modal-preview.open, .modal-preview.show, .modal-preview[aria-hidden="false"] { display: flex; }
        .modal-preview__backdrop { position: absolute; inset: 0; width: 100%; height: 100%; border: 0; padding: 0; background: rgba(17, 38, 59, 0.78); cursor: pointer; }
        .modal-preview__box { position: relative; width: min(820px, 100%); max-height: 92vh; overflow: auto; background: var(--white); border-radius: var(--radius); box-shadow: var(--shadow-hover); }
        .modal-preview__img { display: block; width: 100%; max-height: 68vh; object-fit: contain; background: var(--surface); }
        .modal-preview__actions { display: flex; flex-wrap: wrap; gap: .75rem; justify-content: flex-end; padding: 1rem 1.25rem; }
        .modal-preview__book, .modal-preview__download {
            display: inline-flex; align-items: center; gap: .5rem; min-height: 44px; padding: .65rem 1.4rem; border-radius: 999px;
            font-family: var(--font-body); font-weight: 600; font-size: .9rem; text-decoration: none; transition: background-color .2s ease, color .2s ease;
        }
        .modal-preview__book { background: var(--gold); color: var(--primary-dark); }
        .modal-preview__book:hover { background: var(--gold-dark); }
        .modal-preview__download { border: 2px solid var(--primary-color); color: var(--primary-color); }
        .modal-preview__download:hover { background: var(--primary-color); color: var(--white); }
        .modal-preview__close {
            position: absolute; top: .6rem; right: .6rem; width: 42px; height: 42px; border: 0; border-radius: 50%;
            font-size: 1.6rem; line-height: 1; cursor: pointer; background: var(--white); color: var(--primary-dark); box-shadow: var(--shadow);
        }
        .modal-preview__close:hover { background: var(--gold); }

        /* ---------- Responsive ---------- */
        @media (max-width: 1024px) {
            .d2-hero__inner { grid-template-columns: 1fr; }
            .d2-collage { max-width: 520px; width: 100%; margin-inline: auto; }
            .d2-values { grid-template-columns: repeat(2, 1fr); }
            .d2-value:nth-child(3n + 1) { border-left: 1px solid var(--surface-line); }
            .d2-value:nth-child(2n + 1) { border-left: 0; }
            .d2-value:nth-child(-n + 3) { border-top: 1px solid var(--surface-line); }
            .d2-value:nth-child(-n + 2) { border-top: 0; }
            .d2-pkgs { grid-template-columns: 1fr; }
            .d2-toolbar { justify-content: flex-start; flex-wrap: wrap; width: 100%; }
            .d2-head--tools > div:first-child { flex-basis: 100%; }
            .d2-search { flex: 1 1 220px; }
        }
        @media (max-width: 640px) {
            .d2-grid.d2-spot { grid-template-columns: 1fr; grid-auto-rows: 360px; gap: 1.1rem; }
            .d2-head--tools { align-items: stretch; }
            .d2-toolbar { flex-direction: column; align-items: stretch; width: 100%; }
            .d2-tabs { justify-content: center; height: auto; flex-wrap: wrap; }
            .d2-search { flex-basis: auto; width: 100%; }
            .d2-hero__actions .d2-btn, .d2-cta__actions .d2-btn { width: 100%; }
            .d2-pkg { grid-template-columns: 1fr; }
            .d2-pkg__media { height: 230px; }
            .d2-values { grid-template-columns: 1fr; }
            .d2-value, .d2-value:nth-child(n) { border-left: 0; border-top: 1px solid var(--surface-line); }
            .d2-value:first-child { border-top: 0; }
            .d2-cta__actions { flex-direction: column; }
            .modal-preview__actions { justify-content: stretch; }
            .modal-preview__book, .modal-preview__download { flex: 1; justify-content: center; }
        }
        @media (prefers-reduced-motion: reduce) {
            .dest2-page *, .dest2-page *::before, .dest2-page *::after { transition: none !important; animation: none !important; }
            .d2-card:hover, .d2-pkg:hover { transform: none; }
        }
    </style>
</head>
<body class="dest2-page">

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
        <!-- Split hero -->
        <header class="d2-hero">
            <div class="d2-wrap d2-hero__inner">
                <div>
                    <span class="d2-hero__accent">Wander to Wonder</span>
                    <h1>Explore Our <em>Destinations</em></h1>
                    <p>Explore our curated selection of local and international travel packages, planned end to end by people who know the way.</p>
                    <div class="d2-hero__actions">
                        <a href="#all-packages" class="d2-btn d2-btn--gold">Browse packages <i class="fa-solid fa-arrow-down" aria-hidden="true"></i></a>
                    </div>
                    <div class="d2-hero__tagline">Pick · Plan · Travel</div>
                </div>
                <div class="d2-collage" aria-hidden="true">
                    <?php foreach (array_slice($featured, 0, 3) as $d) : ?>
                        <img src="<?= e($d['preview_img'] ?? $d['img']) ?>" alt="" loading="eager"
                             onerror="this.onerror=null;this.style.objectFit='contain';this.style.padding='2rem';this.src='assets/images/Bryvelrisse-Logo.png';">
                    <?php endforeach; ?>
                </div>
            </div>
        </header>

        <!-- Best Places to Visit -->
        <section class="d2-section" id="destination-columns" aria-labelledby="featured-title">
            <div class="d2-wrap">
                <div class="d2-head d2-head--center">
                    <div>
                        <span class="d2-head__hand">Top-rated getaways</span>
                        <h2 id="featured-title">Best Places to Visit</h2>
                        <p>Our top-rated and most requested getaways.</p>
                    </div>
                </div>
                <ul class="d2-grid d2-spot">
                    <?php foreach ($featured as $d) { render_card($d, 'spot'); } ?>
                </ul>
            </div>
        </section>

        <!-- More Packages -->
        <section class="d2-section d2-section--soft" id="all-packages" aria-labelledby="packages-title">
            <div class="d2-wrap">
                <div class="d2-head d2-head--tools">
                    <div>
                        <h2 id="packages-title">More Packages</h2>
                        <p>International trips, cultural escapes and local getaways.</p>
                    </div>

                    <div class="d2-toolbar">
                        <div class="d2-tabs" role="group" aria-label="Filter packages by region">
                            <button type="button" class="d2-tab" data-filter="all" aria-pressed="true">All <span><?= $count_all ?></span></button>
                            <button type="button" class="d2-tab" data-filter="international" aria-pressed="false">International <span><?= $count_intl ?></span></button>
                            <button type="button" class="d2-tab" data-filter="domestic" aria-pressed="false">Domestic <span><?= $count_dom ?></span></button>
                        </div>
                        <div class="d2-search">
                            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
                            <label for="d2-search-input" style="position:absolute;width:1px;height:1px;overflow:hidden;clip:rect(0 0 0 0);">Search packages</label>
                            <input type="search" id="d2-search-input" placeholder="Search packages" autocomplete="off">
                        </div>
                    </div>
                </div>

                <ul class="d2-pkgs" id="dest-grid">
                    <?php foreach ($packages as $d) { render_package($d); } ?>
                </ul>
                <div class="d2-empty" id="dest-empty" role="status" aria-live="polite">
                    <strong>No packages found</strong>
                    Try a different search or select "All" to see every package.
                </div>
            </div>
        </section>

        <!-- Preview modal (hooks used by js/destinations.js) -->
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
        <section class="d2-section why-choose-us" aria-labelledby="why-title">
            <div class="d2-wrap">
                <div class="d2-head d2-head--center">
                    <div>
                        <span class="d2-head__hand">Why travelers trust us</span>
                        <h2 id="why-title">Why Choose Our Packages</h2>
                        <p>The values that drive every journey we plan.</p>
                    </div>
                </div>
                <div class="d2-values">
                    <?php foreach ($values as $v) : ?>
                    <div class="d2-value">
                        <div class="d2-value__icon">
                            <img src="assets/icons/<?= e($v['icon']) ?>" alt="" aria-hidden="true">
                        </div>
                        <h3><?= e($v['title']) ?></h3>
                        <p><?= e($v['text']) ?></p>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>

        <!-- Call to action (full-width background) -->
        <section class="d2-cta" aria-labelledby="cta-title">
            <div class="d2-wrap">
                <span class="d2-cta__hand">Ready when you are</span>
                <h2 id="cta-title">Found a destination you love?</h2>
                <p>Tell us where you want to go and our team will help you plan the trip.</p>
                <div class="d2-cta__actions">
                    <a href="booking.php" class="d2-btn d2-btn--gold"><i class="fa-solid fa-plane" aria-hidden="true"></i> Book a trip</a>
                    <a href="contact.php" class="d2-btn d2-btn--outline">Contact us</a>
                </div>
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
            <p>Designed with <i class="fa-solid fa-heart" style="color: var(--gold);"></i> for every traveler</p>
        </div>
    </footer>

    <script>
    // Page-only filter + search (package grid). Modal and back-to-top stay in js/destinations.js.
    (function () {
        var tabs = document.querySelectorAll('.d2-tab');
        var items = document.querySelectorAll('#dest-grid .dest-item');
        var input = document.getElementById('d2-search-input');
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

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                region = tab.dataset.filter;
                tabs.forEach(function (t) { t.setAttribute('aria-pressed', t === tab ? 'true' : 'false'); });
                apply();
            });
        });
        input.addEventListener('input', apply);
    })();
    </script>

</body>
</html>