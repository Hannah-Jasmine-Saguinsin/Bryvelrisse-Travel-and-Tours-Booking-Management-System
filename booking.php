<?php
require_once __DIR__ . '/back-end/database.php';

$requestedDestination = $_GET['destination'] ?? '';
$initialDestination = is_string($requestedDestination) ? trim($requestedDestination) : '';
$requestedDate = $_GET['date'] ?? '';
$initialDate = '';
if (is_string($requestedDate) && preg_match('/^(\d{4})-(\d{2})-(\d{2})$/D', $requestedDate, $dateParts)
    && checkdate((int)$dateParts[2], (int)$dateParts[3], (int)$dateParts[1])) {
    $initialDate = $requestedDate;
}

$readPassengerCount = static function (string $key, int $default, int $minimum): int {
    $value = $_GET[$key] ?? null;
    if (!is_string($value) || !preg_match('/^(0|[1-9][0-9]*)$/D', $value)) {
        return $default;
    }
    $count = filter_var($value, FILTER_VALIDATE_INT);
    return $count !== false && $count >= $minimum ? $count : $default;
};

$initialAdults = $readPassengerCount('adults', 1, 1);
$initialChildren = $readPassengerCount('children', 0, 0);

try {
    $bookingDestinations = $pdo->query("SELECT DISTINCT p.destination
        FROM packages p INNER JOIN package_departures d ON d.package_id = p.id
        WHERE p.is_active = 1 AND d.status = 'available'
          AND d.depart_date >= GREATEST(CURDATE(), '2026-12-01')
        ORDER BY p.destination")->fetchAll(PDO::FETCH_COLUMN);

    $packageSql = "SELECT p.id, p.name, p.destination, p.description, p.duration_days, p.duration_nights
        FROM packages p
        WHERE p.is_active = 1
          AND EXISTS (SELECT 1 FROM package_departures d WHERE d.package_id = p.id
              AND d.status = 'available' AND d.depart_date >= GREATEST(CURDATE(), '2026-12-01'))
        ORDER BY p.destination, p.name";
    $packageStmt = $pdo->prepare($packageSql);
    $packageStmt->execute();
    $bookingPackages = $packageStmt->fetchAll();

    if ($bookingPackages) {
        $packageIds = array_column($bookingPackages, 'id');
        $marks = implode(',', array_fill(0, count($packageIds), '?'));
        $departureSql = "SELECT id, package_id, depart_date, return_date, departure_city,
                duration_days, duration_nights, surcharge_note
            FROM package_departures
            WHERE package_id IN ($marks) AND status = 'available'
              AND depart_date >= GREATEST(CURDATE(), '2026-12-01')";
        $departureParams = $packageIds;
        $departureSql .= ' ORDER BY depart_date, departure_city';
        $stmt = $pdo->prepare($departureSql);
        $stmt->execute($departureParams);
        $departures = $stmt->fetchAll();

        $packageDepartureIds = [];
        foreach ($departures as $departure) {
            $packageDepartureIds[] = $departure['id'];
            $bookingPackagesById[(int)$departure['package_id']]['departures'][] = $departure;
        }
        $stmt = $pdo->prepare("SELECT package_id, day_order, day_label, location, meals, activities
            FROM package_itinerary_days WHERE package_id IN ($marks) ORDER BY package_id, day_order");
        $stmt->execute($packageIds);
        foreach ($stmt->fetchAll() as $row) $bookingPackagesById[(int)$row['package_id']]['itinerary'][] = $row;

        $stmt = $pdo->prepare("SELECT package_id, tier_label, group_size_label, amount, currency, price_basis
            FROM package_price_tiers WHERE package_id IN ($marks) ORDER BY package_id, id");
        $stmt->execute($packageIds);
        foreach ($stmt->fetchAll() as $row) $bookingPackagesById[(int)$row['package_id']]['prices'][] = $row;

        if ($packageDepartureIds) {
            $departureMarks = implode(',', array_fill(0, count($packageDepartureIds), '?'));
            $stmt = $pdo->prepare("SELECT package_departure_id, rule_label, amount, currency, surcharge_basis
                FROM package_departure_surcharges WHERE package_departure_id IN ($departureMarks)
                ORDER BY package_departure_id, rule_order");
            $stmt->execute($packageDepartureIds);
            foreach ($stmt->fetchAll() as $row) {
                $bookingPackagesById['departure_surcharges'][(int)$row['package_departure_id']][] = $row;
            }
        }

        foreach ($bookingPackages as &$package) {
            $id = (int)$package['id'];
            $details = $bookingPackagesById[$id] ?? [];
            $package['departures'] = $details['departures'] ?? [];
            $package['itinerary'] = $details['itinerary'] ?? [];
            $package['prices'] = $details['prices'] ?? [];
            foreach ($package['departures'] as &$departure) {
                $departure['surcharges'] = $bookingPackagesById['departure_surcharges'][(int)$departure['id']] ?? [];
            }
            unset($departure);
        }
        unset($package);
    }
} catch (PDOException $e) {
    error_log('Booking catalog load failed: ' . $e->getMessage());
    http_response_code(500);
    exit('The booking catalog is temporarily unavailable. Please try again later.');
}

if (empty($_SESSION['booking_csrf_token'])) {
    $_SESSION['booking_csrf_token'] = bin2hex(random_bytes(32));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Trip | Bryvelrisse Travel and Tours</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Global + navbar styles (provide the color variables and fonts) -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/navbar.css">

    <style>
        /* Uses global variables from style.css, same as home.css */
        :root { --ease: cubic-bezier(0.4,0,0.2,1); --card-shadow: 0 10px 26px rgba(17,38,59,0.08); --err: #c0392b; }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: Montserrat, sans-serif; font-size: 1rem; background: var(--surface); color: var(--primary-dark); min-height: 100vh; }

        /* Hero: same treatment as homepage hero */
        .booking-hero {
            position: relative; padding: 112px 24px 96px; text-align: center;
            background:
                radial-gradient(circle at left center, rgba(17,38,59,0.88), rgba(255,255,255,0) 60%),
                radial-gradient(circle at right center, rgba(17,38,59,0.88), rgba(255,255,255,0) 60%),
                url("assets/images/home-hero.jpg") center/cover no-repeat;
        }
        .booking-hero::before { content: ""; position: absolute; inset: 0; background: linear-gradient(rgba(8,20,34,0.48), rgba(8,20,34,0.38)); }
        .booking-hero > * { position: relative; }
        .booking-hero__accent { font-family: Caveat, cursive; font-size: 1.8rem; font-weight: 500; color: var(--white); }
        .booking-hero__title { font-family: PlayfairDisplay, serif; font-size: 4rem; font-weight: 900; line-height: 0.98; letter-spacing: 0.02em; color: var(--white); margin-bottom: 0.2em; }
        .booking-hero__sub { max-width: 640px; margin: 0 auto; line-height: 1.7; color: rgba(255,255,255,0.92); }

        /* Stepper */
        .stepper-wrap { display: flex; justify-content: center; margin: -2.2rem auto 0; padding: 0 1rem; max-width: 700px; position: relative; z-index: 10; }
        .stepper { width: 100%; display: flex; align-items: center; justify-content: space-between; padding: 0.55rem 1.5rem; background: var(--white); border: 1px solid var(--surface-line); border-radius: 999px; box-shadow: var(--card-shadow); }
        .step { display: flex; align-items: center; gap: 0.5rem; flex: 1; position: relative; }
        .step:not(:last-child)::after { content: ''; position: absolute; left: calc(50% + 18px); right: calc(-50% + 18px); top: 50%; height: 2px; background: var(--surface-line); transition: background 0.4s; }
        .step.completed:not(:last-child)::after { background: var(--accent); }
        .step__num { width: 32px; height: 32px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.78rem; font-weight: 800; background: var(--soft-blue); color: var(--secondary-light-dark); flex-shrink: 0; position: relative; z-index: 1; transition: background 0.3s, color 0.3s; }
        .step.active .step__num { background: var(--primary-color); color: var(--white); }
        .step.completed .step__num { background: var(--accent); color: var(--white); }
        .step__label { font-size: 0.73rem; font-weight: 700; color: var(--secondary-light-dark); white-space: nowrap; }
        .step.active .step__label { color: var(--primary-color); }
        .step.completed .step__label { color: var(--accent); }
        @media (max-width: 520px) { .step__label { display: none; } .stepper { padding: 0.5rem 1rem; } }

        /* Layout and cards (same as value-card / pkg-card) */
        .booking-layout { max-width: 960px; margin: 2.5rem auto 4rem; padding: 0 1.25rem; display: grid; grid-template-columns: 1fr 320px; gap: 2rem; align-items: start; }
        @media (max-width: 820px) { .booking-layout { grid-template-columns: 1fr; } .booking-sidebar { order: -1; } }
        .booking-card, .sidebar-card { background: var(--white); border: 1px solid var(--surface-line); border-radius: 20px; box-shadow: var(--card-shadow); }
        .booking-card { padding: var(--site-card-padding, 2rem); }
        .sidebar-card { padding: 1.4rem 1.35rem; }
        .form-panel { display: none; }
        .form-panel.active { display: block; animation: panelIn 0.38s var(--ease) both; }
        @keyframes panelIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }

        .panel-title { font-family: PlayfairDisplay, serif; font-size: 1.4rem; font-weight: 900; color: var(--primary-dark); margin-bottom: 0.3rem; display: flex; align-items: center; gap: 0.55rem; }
        .panel-title i { color: var(--primary-color); font-size: 1.1rem; }
        .panel-sub { color: var(--secondary-light-dark); font-size: 0.9rem; line-height: 1.7; margin-bottom: 1.6rem; }

        /* Fields */
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .form-grid .span-2 { grid-column: span 2; }
        @media (max-width: 560px) { .form-grid { grid-template-columns: 1fr; } .form-grid .span-2 { grid-column: span 1; } }
        .field { display: flex; flex-direction: column; gap: 0.35rem; }
        .field label { font-size: 0.9rem; font-weight: 700; color: var(--primary-color); }
        .field label .req { color: var(--err); margin-left: 2px; }
        .field input, .field select, .field textarea { width: 100%; padding: 0.7rem 0.95rem; border: 1.5px solid var(--surface-line); border-radius: 12px; font-family: inherit; font-size: 0.94rem; color: var(--primary-dark); background: var(--surface); outline: none; transition: border-color 0.25s, box-shadow 0.25s, background 0.25s; }
        .field input::placeholder, .field textarea::placeholder { color: var(--secondary-light); }
        .field input:focus, .field select:focus, .field textarea:focus { border-color: var(--accent); background: var(--white); box-shadow: 0 0 0 3px rgba(79,184,224,0.18); }
        .field input.error, .field select.error { border-color: var(--err); }
        .err-msg { font-size: 0.78rem; color: var(--err); font-weight: 700; display: none; }
        .field.has-error .err-msg { display: block; }
        .field textarea { resize: vertical; min-height: 80px; }
        .input-icon-wrap { position: relative; }
        .input-icon-wrap i { position: absolute; left: 0.9rem; top: 50%; transform: translateY(-50%); color: var(--secondary-light-dark); font-size: 0.85rem; pointer-events: none; }
        .input-icon-wrap input { padding-left: 2.3rem; }

        /* Destination chips */
        .dest-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 0.7rem; margin-top: 0.5rem; }
        @media (max-width: 560px) { .dest-grid { grid-template-columns: repeat(2, 1fr); } }
        .dest-chip { cursor: pointer; border: 1.5px solid var(--surface-line); border-radius: 16px; padding: 0.8rem 0.5rem; text-align: center; font: inherit; font-size: 0.82rem; font-weight: 700; color: var(--secondary-light-dark); background: var(--surface); user-select: none; transition: border-color 0.22s, background 0.22s, color 0.22s; }
        .dest-chip i { display: block; font-size: 1.2rem; margin-bottom: 0.35rem; color: var(--primary-color); }
        .dest-chip:hover { border-color: var(--accent); color: var(--primary-color); }
        .dest-chip.selected { border-color: var(--primary-color); background: var(--soft-blue); color: var(--primary-dark); }
        .package-list { display: grid; gap: 0.85rem; margin: 1rem 0; }
        .package-card { border: 1.5px solid var(--surface-line); border-radius: 16px; padding: 1rem; background: var(--surface); cursor: pointer; }
        .package-card.selected { border-color: var(--primary-color); background: var(--soft-blue); }
        .package-card__heading { display: flex; align-items: flex-start; gap: 0.7rem; }
        .package-card__heading input { margin-top: 0.25rem; accent-color: var(--primary-color); }
        .package-card h3 { font-size: 1rem; margin-bottom: 0.3rem; }
        .package-card p, .package-card li { color: var(--secondary-light-dark); font-size: 0.82rem; line-height: 1.6; }
        .package-detail { margin: 0.7rem 0 0 1.5rem; }
        .catalog-empty { padding: 1rem; border-radius: 12px; background: var(--surface); color: var(--secondary-light-dark); font-size: 0.9rem; }
        .clear-search-date { display: none; padding: 0; border: 0; background: none; color: var(--primary-color); font: inherit; font-size: 0.82rem; font-weight: 700; text-decoration: underline; cursor: pointer; }

        /* Trip type pills (like .pkg-card__tag, selectable) */
        .pill-group { display: flex; flex-wrap: wrap; gap: 0.55rem; margin-top: 0.4rem; }
        .pill { cursor: pointer; border: 1.5px solid var(--surface-line); border-radius: 999px; padding: 0.4rem 1rem; font-size: 0.78rem; font-weight: 700; color: var(--secondary-light-dark); background: var(--surface); user-select: none; transition: background 0.22s, color 0.22s, border-color 0.22s; }
        .pill:hover { border-color: var(--accent); color: var(--primary-color); }
        .pill.active { background: var(--primary-color); border-color: var(--primary-color); color: var(--white); }

        /* Counters */
        .counter-row { display: flex; align-items: center; justify-content: space-between; padding: 0.85rem 0; border-bottom: 1px solid var(--surface-line); }
        .counter-row:last-child { border-bottom: none; }
        .counter-row__info strong { font-size: 0.92rem; }
        .counter-row__info span { font-size: 0.78rem; color: var(--secondary-light-dark); display: block; }
        .counter-ctrl { display: flex; align-items: center; gap: 0.75rem; }
        .counter-ctrl button { width: 32px; height: 32px; border-radius: 50%; border: 1.5px solid var(--surface-line); background: var(--surface); cursor: pointer; font-size: 1rem; font-weight: 700; color: var(--primary-color); display: flex; align-items: center; justify-content: center; transition: background 0.2s, border-color 0.2s; }
        .counter-ctrl button:hover { background: var(--soft-blue); border-color: var(--accent); }
        .counter-ctrl button:disabled { opacity: 0.35; cursor: not-allowed; }
        .counter-val { font-size: 1rem; font-weight: 800; min-width: 1.5rem; text-align: center; }

        /* Review */
        .review-block { background: var(--surface); border: 1px solid var(--surface-line); border-radius: 16px; padding: 1rem 1.2rem; margin-bottom: 0.85rem; }
        .review-block h5 { font-family: PlayfairDisplay, serif; font-size: 1rem; font-weight: 900; color: var(--primary-dark); margin-bottom: 0.6rem; }
        .review-row { display: flex; justify-content: space-between; gap: 1rem; font-size: 0.88rem; padding: 0.22rem 0; }
        .review-row span:first-child { color: var(--secondary-light-dark); font-weight: 600; }
        .review-row span:last-child { font-weight: 700; text-align: right; }
        .consent { display: flex; align-items: flex-start; gap: 0.65rem; margin-top: 1.2rem; }
        .consent input[type=checkbox] { width: 17px; height: 17px; margin-top: 2px; accent-color: var(--primary-color); flex-shrink: 0; }
        .consent label { font-size: 0.82rem; color: var(--secondary-light-dark); line-height: 1.6; }
        .consent label a { color: var(--primary-color); font-weight: 700; }

        /* Buttons: same shape as .btn-hero and .cta-btn */
        .form-nav { display: flex; justify-content: space-between; margin-top: 1.8rem; gap: 0.75rem; }
        .btn-back, .btn-next, .btn-submit, .btn-home { display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem; padding: 0.9rem 1.8rem; border-radius: 30px; font-family: Montserrat, sans-serif; font-size: 0.95rem; font-weight: 700; text-decoration: none; cursor: pointer; transition: 0.3s ease; }
        .btn-back { background: transparent; border: 2px solid var(--primary-color); color: var(--primary-color); }
        .btn-back:hover { background: var(--primary-color); color: var(--white); }
        .btn-next, .btn-home { border: none; background: var(--primary-color); color: var(--white); }
        .btn-next { flex: 1; max-width: 260px; }
        .btn-next:hover, .btn-home:hover { background: var(--secondary-light-dark); transform: scale(1.05); }
        .btn-submit { flex: 1; max-width: 280px; border: none; background: var(--gold); color: var(--primary-dark); font-size: 0.82rem; font-weight: 800; letter-spacing: 0.1em; text-transform: uppercase; box-shadow: 0 4px 24px rgba(240,177,61,0.45); }
        .btn-submit:hover { background: var(--gold-dark); transform: translateY(-3px); box-shadow: 0 10px 36px rgba(240,177,61,0.55); }
        .btn-back:focus-visible, .btn-next:focus-visible, .btn-submit:focus-visible, .btn-home:focus-visible { outline: 3px solid var(--accent); outline-offset: 2px; }

        /* Sidebar */
        .booking-sidebar { display: flex; flex-direction: column; gap: 1.25rem; }
        .sidebar-card h4 { font-family: PlayfairDisplay, serif; font-size: 1.05rem; font-weight: 900; color: var(--primary-dark); margin-bottom: 0.85rem; display: flex; align-items: center; gap: 0.5rem; }
        .sidebar-card h4 i { color: var(--primary-color); }
        .summary-line { display: flex; justify-content: space-between; gap: 1rem; font-size: 0.875rem; padding: 0.35rem 0; border-bottom: 1px solid var(--surface-line); }
        .summary-line:last-child { border-bottom: none; }
        .summary-line span:first-child { color: var(--secondary-light-dark); }
        .summary-line span:last-child { font-weight: 700; text-align: right; }
        .trust-item { display: flex; align-items: flex-start; gap: 0.65rem; font-size: 0.82rem; color: var(--secondary-light-dark); line-height: 1.6; padding: 0.4rem 0; }
        .trust-item i { color: var(--primary-color); margin-top: 3px; flex-shrink: 0; }
        .trust-item strong { color: var(--primary-dark); display: block; }
        .contact-cta { display: flex; align-items: center; gap: 0.65rem; background: var(--primary-color); border-radius: 30px; padding: 0.8rem 1.2rem; color: var(--white); text-decoration: none; font-size: 0.85rem; font-weight: 700; transition: 0.3s ease; }
        .contact-cta:hover { background: var(--secondary-light-dark); transform: scale(1.03); }

        /* Success */
        .success-screen { display: none; text-align: center; padding: 3rem 1.5rem; }
        .success-screen.show { display: block; animation: panelIn 0.5s var(--ease) both; }
        .success-icon { width: 80px; height: 80px; background: var(--primary-color); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 1.5rem; font-size: 2rem; color: var(--white); }
        .success-screen h2 { font-family: PlayfairDisplay, serif; font-size: 2.4rem; font-weight: 900; color: var(--primary-dark); margin-bottom: 0.5rem; }
        .success-screen p { color: var(--secondary-light-dark); font-size: 0.95rem; max-width: 420px; margin: 0 auto 1.8rem; line-height: 1.7; }
        .success-ref { display: inline-block; background: var(--soft-blue); border-radius: 999px; padding: 0.4rem 1.2rem; font-size: 0.8rem; font-weight: 700; color: var(--primary-color); letter-spacing: 0.06em; margin-bottom: 1.8rem; }

        .section-divider { border: none; border-top: 1px solid var(--surface-line); margin: 1.4rem 0; }
        .progress-bar-wrap { background: var(--soft-blue); border-radius: 999px; height: 4px; overflow: hidden; }
        .progress-bar { height: 100%; background: var(--primary-color); border-radius: 999px; transition: width 0.45s var(--ease); }

        @media (max-width: 768px) { .booking-hero__title { font-size: 2.6rem; } .btn-next, .btn-submit { max-width: none; } }
        @media (max-width: 480px) {
            .booking-hero { padding: 96px 16px 80px; }
            .booking-hero__accent { font-size: 1.3rem; }
            .booking-hero__title { font-size: 2rem; }
            .booking-hero__sub { font-size: 0.85rem; }
            .success-screen h2 { font-size: 1.8rem; }
        }
        @media (prefers-reduced-motion: reduce) { .form-panel.active, .success-screen.show { animation: none; } }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navigation">
    <a href="index.php" class="logo">
        <img src="assets/images/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours" style="height:60px;width:auto;">
    </a>
    <div class="nav-links" id="navLinks">
        <a href="index.php">Home</a>
        <a href="destinations.php">Destinations</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
        <a href="booking.php" class="btn-booking"><i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i> Booking</a>
        <?php if (!empty($_SESSION['user_id'])): ?><a href="back-end/logout.php" class="btn-login"><i class="fa-solid fa-user nav-icon" aria-hidden="true"></i> Log Out</a><?php else: ?><a href="login.php" class="btn-login"><i class="fa-solid fa-user nav-icon" aria-hidden="true"></i> Log In</a><?php endif; ?>
    </div>
    <button class="menu-toggle" id="menuToggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
        <i class="fa-solid fa-bars"></i>
    </button>
</nav>

<!-- Hero -->
<div class="booking-hero">
    <p class="booking-hero__accent">Bryvelrisse Travel and Tours</p>
    <h1 class="booking-hero__title">Book Your Journey</h1>
    <p class="booking-hero__sub">Fill in your details and we'll take care of the rest.</p>
</div>

<!-- Stepper -->
<div class="stepper-wrap">
    <div class="stepper" id="stepper">
        <div class="step active" data-step="1"><div class="step__num">1</div><span class="step__label">Destination</span></div>
        <div class="step" data-step="2"><div class="step__num">2</div><span class="step__label">Travel Info</span></div>
        <div class="step" data-step="3"><div class="step__num">3</div><span class="step__label">Travelers</span></div>
        <div class="step" data-step="4"><div class="step__num">4</div><span class="step__label">Review</span></div>
    </div>
</div>

<!-- Main -->
<div class="booking-layout">
    <div class="booking-card" id="bookingCard">
        <div class="progress-bar-wrap"><div class="progress-bar" id="progressBar" style="width:25%"></div></div>

        <!-- Panel 1 -->
        <div class="form-panel active" id="panel1">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-location-dot"></i> Choose Your Destination</p>
                <p class="panel-sub">Select one destination for your upcoming trip.</p>

                <div class="dest-grid" id="destGrid">
                    <?php foreach ($bookingDestinations as $destination): ?>
                        <button class="dest-chip" type="button" data-val="<?= htmlspecialchars($destination, ENT_QUOTES, 'UTF-8') ?>"><i class="fa-solid fa-earth-asia"></i><?= htmlspecialchars($destination, ENT_QUOTES, 'UTF-8') ?></button>
                    <?php endforeach; ?>
                </div>
                <p class="err-msg" id="destErr" style="margin-top:0.5rem;">Please select a destination.</p>

                <hr class="section-divider">
                <p class="panel-sub" style="margin-bottom:0.6rem;">Choose an active package. Details and prices below come from the package catalog.</p>
                <div class="package-list" id="packageList"></div>
                <button class="clear-search-date" id="clearSearchDate" type="button">Show all upcoming dates for this destination</button>
                <p class="err-msg" id="packageErr">Please select an available package.</p>

                <hr class="section-divider">

                <div class="form-grid">
                    <div class="field span-2">
                        <label>Package Departure <span class="req">*</span></label>
                        <select id="departure"><option value="">Select package first</option></select>
                        <span class="err-msg">Please select an available package departure.</span>
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <span></span>
                <button class="btn-next" id="next1">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

        <!-- Panel 2 -->
        <div class="form-panel" id="panel2">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-regular fa-calendar"></i> Travel Details</p>
                <p class="panel-sub">Tell us when and how you'd like to travel.</p>

                <div class="form-grid">
                    <div class="field">
                        <label>Departure Date <span class="req">*</span></label>
                        <div class="input-icon-wrap"><i class="fa-regular fa-calendar"></i><input type="date" id="depDate" readonly></div>
                        <span class="err-msg">Please pick a date.</span>
                    </div>
                    <div class="field">
                        <label>Return Date</label>
                        <div class="input-icon-wrap"><i class="fa-regular fa-calendar"></i><input type="date" id="retDate" readonly></div>
                    </div>
                    <div class="field span-2"><div id="selectedDepartureDetails" class="catalog-empty" hidden></div></div>

                    <div class="field span-2">
                        <label>Trip Type</label>
                        <div class="pill-group" id="tripTypePills">
                            <div class="pill active" data-val="Package Tour">Package Tour</div>
                            <div class="pill" data-val="Custom Itinerary">Custom Itinerary</div>
                            <div class="pill" data-val="Honeymoon">Honeymoon</div>
                            <div class="pill" data-val="Family">Family</div>
                            <div class="pill" data-val="Group">Group</div>
                            <div class="pill" data-val="Business">Business</div>
                        </div>
                    </div>

                    <div class="field span-2">
                        <label>Budget Range (per person, PHP)</label>
                        <select id="budget">
                            <option value="">Select a range…</option>
                            <option>Below ₱20,000</option>
                            <option>₱20,000 – ₱40,000</option>
                            <option>₱40,000 – ₱70,000</option>
                            <option>₱70,000 – ₱100,000</option>
                            <option>Above ₱100,000</option>
                        </select>
                    </div>

                    <div class="field span-2">
                        <label>Special Requests / Notes</label>
                        <textarea id="notes" placeholder="Dietary requirements, accessibility needs, special occasions…"></textarea>
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <button class="btn-back" id="back2"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <button class="btn-next" id="next2">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

        <!-- Panel 3 -->
        <div class="form-panel" id="panel3">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-users"></i> Traveler Information</p>
                <p class="panel-sub">Lead traveler contact details and group size.</p>

                <div class="form-grid">
                    <div class="field">
                        <label>First Name <span class="req">*</span></label>
                        <input type="text" id="firstName" placeholder="Juan">
                        <span class="err-msg">First name is required.</span>
                    </div>
                    <div class="field">
                        <label>Last Name <span class="req">*</span></label>
                        <input type="text" id="lastName" placeholder="Dela Cruz">
                        <span class="err-msg">Last name is required.</span>
                    </div>
                    <div class="field">
                        <label>Email Address <span class="req">*</span></label>
                        <div class="input-icon-wrap"><i class="fa-regular fa-envelope"></i><input type="email" id="email" placeholder="juan@example.com"></div>
                        <span class="err-msg">Enter a valid email.</span>
                    </div>
                    <div class="field">
                        <label>Phone Number <span class="req">*</span></label>
                        <div class="input-icon-wrap"><i class="fa-solid fa-phone"></i><input type="tel" id="phone" placeholder="+63 9XX XXX XXXX"></div>
                        <span class="err-msg">Phone number is required.</span>
                    </div>
                </div>

                <hr class="section-divider">
                <p style="font-size:0.82rem;font-weight:700;color:var(--secondary-light-dark);margin-bottom:0.6rem;">Group size</p>

                <div class="counter-row">
                    <div class="counter-row__info"><strong>Adults</strong><span>Ages 18 and above</span></div>
                    <div class="counter-ctrl">
                        <button id="adultDec" type="button" aria-label="Decrease adults">−</button>
                        <span class="counter-val" id="adultVal">1</span>
                        <button id="adultInc" type="button" aria-label="Increase adults">+</button>
                    </div>
                </div>
                <div class="counter-row">
                    <div class="counter-row__info"><strong>Children</strong><span>Ages 0 – 17</span></div>
                    <div class="counter-ctrl">
                        <button id="childDec" type="button" aria-label="Decrease children">−</button>
                        <span class="counter-val" id="childVal">0</span>
                        <button id="childInc" type="button" aria-label="Increase children">+</button>
                    </div>
                </div>
            </div>
            <div class="form-nav">
                <button class="btn-back" id="back3"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <button class="btn-next" id="next3">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

        <!-- Panel 4 -->
        <div class="form-panel" id="panel4">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-clipboard-check"></i> Review Your Booking</p>
                <p class="panel-sub">Please check your details before submitting.</p>

                <div class="review-block">
                    <h5>Destination</h5>
                    <div class="review-row"><span>Destination</span><span id="rv-dest">—</span></div>
                    <div class="review-row"><span>Package</span><span id="rv-package">—</span></div>
                    <div class="review-row"><span>Departure From</span><span id="rv-dep">—</span></div>
                </div>
                <div class="review-block">
                    <h5>Travel Details</h5>
                    <div class="review-row"><span>Departure Date</span><span id="rv-depDate">—</span></div>
                    <div class="review-row"><span>Return Date</span><span id="rv-retDate">—</span></div>
                    <div class="review-row"><span>Trip Type</span><span id="rv-tripType">—</span></div>
                    <div class="review-row"><span>Budget</span><span id="rv-budget">—</span></div>
                </div>
                <div class="review-block">
                    <h5>Traveler</h5>
                    <div class="review-row"><span>Name</span><span id="rv-name">—</span></div>
                    <div class="review-row"><span>Email</span><span id="rv-email">—</span></div>
                    <div class="review-row"><span>Phone</span><span id="rv-phone">—</span></div>
                    <div class="review-row"><span>Group Size</span><span id="rv-group">—</span></div>
                </div>

                <div class="consent">
                    <input type="checkbox" id="agreeConsent">
                    <label for="agreeConsent">I agree to the <a href="terms.php" target="_blank">Terms &amp; Conditions</a> and understand this is a booking inquiry. A travel consultant will contact me within 24 hours to confirm details and pricing.</label>
                </div>
                <p class="err-msg" id="consentErr" style="margin-top:0.5rem;">Please accept the terms to proceed.</p>
                <p class="err-msg" id="submitError" role="alert" style="margin-top:0.5rem;"></p>
            </div>
            <div class="form-nav">
                <button class="btn-back" id="back4"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <button class="btn-submit" id="submitBtn"><i class="fa-solid fa-paper-plane"></i> Submit Booking</button>
            </div>
        </div>

        <!-- Success -->
        <div class="success-screen" id="successScreen">
            <div class="success-icon"><i class="fa-solid fa-check"></i></div>
            <h2>Booking Submitted</h2>
            <p>Thank you for choosing Bryvelrisse Travel and Tours. Your booking inquiry has been received. Our travel consultant will reach out within <strong>24 hours</strong> to confirm your details.</p>
            <div class="success-ref" id="refCode">REF: BTT-000000</div>
            <br>
            <a href="index.php" class="btn-home"><i class="fa-solid fa-house"></i> Back to Home</a>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="booking-sidebar">
        <div class="sidebar-card">
            <h4><i class="fa-solid fa-star"></i> Your Selection</h4>
            <div class="summary-line"><span>Destination</span><span id="sb-dest">—</span></div>
            <div class="summary-line"><span>Travel Date</span><span id="sb-date">—</span></div>
            <div class="summary-line"><span>Travelers</span><span id="sb-pax">1 adult</span></div>
            <div class="summary-line"><span>Trip Type</span><span id="sb-type">Package Tour</span></div>
        </div>
        <div class="sidebar-card">
            <h4><i class="fa-solid fa-shield-halved"></i> Our Promise</h4>
            <div class="trust-item"><i class="fa-solid fa-check-circle"></i><div><strong>No hidden fees</strong>All costs disclosed upfront</div></div>
            <div class="trust-item"><i class="fa-solid fa-check-circle"></i><div><strong>Tailored itineraries</strong>Built around your preferences</div></div>
            <div class="trust-item"><i class="fa-solid fa-check-circle"></i><div><strong>24/7 support</strong>We're here every step of the way</div></div>
        </div>
        <div class="sidebar-card">
            <h4><i class="fa-solid fa-headset"></i> Need Help?</h4>
            <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" class="contact-cta" style="margin-bottom:0.6rem;"><i class="fa-brands fa-facebook-messenger"></i> Message us on Facebook</a>
            <a href="tel:+639422699852" class="contact-cta"><i class="fa-solid fa-phone"></i> +63 942 269 9852</a>
        </div>
    </aside>
</div>

<!-- Footer -->
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
                </div>
            </div>
            <div class="footer-col"><h4>Company</h4><ul><li><a href="about.php">About Us</a></li></ul></div>
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="contact.php#faq">FAQ</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="terms.php" target="_blank">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
        <p>Designed with <i class="fa-solid fa-heart" style="color:var(--gold);"></i> for every traveler</p>
    </div>
</footer>

<script>
/* Navbar toggle */
const menuToggle = document.getElementById('menuToggle');
const navLinks   = document.getElementById('navLinks');
menuToggle?.addEventListener('click', () => {
    const open = navLinks.classList.toggle('active');
    menuToggle.classList.toggle('open', open);
    menuToggle.setAttribute('aria-expanded', open);
});

/* State */
const state = {
    destination: '', departure: '', depDate: '', retDate: '',
    tripType: 'Package Tour', budget: '', notes: '',
    firstName: '', lastName: '', email: '', phone: '',
    adults: 1, children: 0, packageId: '', departureId: ''
};
const initialBooking = <?= json_encode([
    'destination' => $initialDestination,
    'adults' => $initialAdults,
    'children' => $initialChildren,
    'date' => $initialDate,
    'packages' => $bookingPackages,
    'csrf' => $_SESSION['booking_csrf_token'],
    'request_token' => bin2hex(random_bytes(32))
], JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>;
state.destination = initialBooking.destination;
state.adults = initialBooking.adults;
state.children = initialBooking.children;
let searchDate = initialBooking.date;
const catalogPackages = initialBooking.packages;
const TOTAL = 4;
const CHECK = '<i class="fa-solid fa-check" style="font-size:0.7rem;"></i>';

function paxText() {
    return state.adults + ' adult' + (state.adults > 1 ? 's' : '') +
        (state.children ? ', ' + state.children + ' child' + (state.children > 1 ? 'ren' : '') : '');
}

function restrictNameInput(id) {
    const input = document.getElementById(id);
    if (!input) return;
    input.addEventListener('input', () => {
        input.value = input.value.replace(/[^\p{L}\p{M}\s.'-]/gu, '');
    });
}

restrictNameInput('firstName');
restrictNameInput('lastName');

/* ── Step UI ─────────────────────────────────────────────────────── */
function goTo(n) {
    document.querySelectorAll('.form-panel').forEach((p, i) => p.classList.toggle('active', i === n - 1));
    document.querySelectorAll('.step').forEach((s, i) => {
        s.classList.toggle('active', i === n - 1);
        s.classList.toggle('completed', i < n - 1);
        const num = s.querySelector('.step__num');
        if (i < n - 1) num.innerHTML = CHECK; else num.textContent = i + 1;
    });
    document.getElementById('progressBar').style.width = ((n / TOTAL) * 100) + '%';
    window.scrollTo({ top: 0, behavior: 'smooth' });
    updateSidebar();
}

/* Package catalog, populated from MySQL */
const packageList = document.getElementById('packageList');
const departureSelect = document.getElementById('departure');
const depDateInput = document.getElementById('depDate');
const retDateInput = document.getElementById('retDate');
const departureDetails = document.getElementById('selectedDepartureDetails');
const textNode = (tag, text, className = '') => {
    const node = document.createElement(tag);
    node.textContent = text;
    if (className) node.className = className;
    return node;
};
const displayDate = value => value ? new Date(value + 'T00:00:00').toLocaleDateString('en-PH', {month:'short',day:'numeric',year:'numeric'}) : '';
let selectedPackage = null;
let selectedDeparture = null;

function updateDepartureChoices(packageItem) {
    state.packageId = String(packageItem.id);
    selectedPackage = packageItem;
    selectedDeparture = null;
    depDateInput.value = '';
    retDateInput.value = '';
    departureDetails.hidden = true;
    departureSelect.replaceChildren(new Option('Select an available departure', ''));
    const choices = packageItem.departures;
    choices.forEach(item => {
        const option = new Option(`${displayDate(item.depart_date)}${item.return_date ? ' – ' + displayDate(item.return_date) : ''} · ${item.departure_city}`, String(item.id));
        departureSelect.add(option);
    });
    const preferredDeparture = choices.find(item => item.depart_date === searchDate) || choices[0];
    if (preferredDeparture) departureSelect.value = String(preferredDeparture.id);
    departureSelect.dispatchEvent(new Event('change'));
}

function renderPackages() {
    packageList.replaceChildren();
    document.getElementById('clearSearchDate').style.display = 'none';
    state.packageId = '';
    state.departureId = '';
    selectedPackage = null;
    selectedDeparture = null;
    departureSelect.replaceChildren(new Option('Select package first', ''));
    depDateInput.value = '';
    retDateInput.value = '';
    departureDetails.hidden = true;
    document.getElementById('packageErr').style.display = 'none';
    const matching = catalogPackages.filter(item => item.destination === state.destination &&
        item.departures.some(departure => !searchDate || departure.depart_date === searchDate));
    if (!state.destination || !matching.length) {
        packageList.append(textNode('p', state.destination ? 'No active packages with an available departure match this destination and date.' : 'Choose a destination to see available packages.', 'catalog-empty'));
        document.getElementById('clearSearchDate').style.display = searchDate && state.destination ? 'inline-block' : 'none';
        updateSidebar();
        return;
    }
    matching.forEach(item => {
        const card = document.createElement('article');
        card.className = 'package-card';
        const heading = document.createElement('label');
        heading.className = 'package-card__heading';
        const radio = document.createElement('input');
        radio.type = 'radio';
        radio.name = 'package_choice';
        radio.value = String(item.id);
        const titleWrap = document.createElement('div');
        titleWrap.append(textNode('h3', item.name));
        titleWrap.append(textNode('p', `${item.destination} · ${item.duration_days ? item.duration_days + ' days' : 'Duration not recorded'}${item.duration_nights ? ' / ' + item.duration_nights + ' nights' : ''}`));
        heading.append(radio, titleWrap);
        card.append(heading);
        if (item.description) card.append(textNode('p', item.description, 'package-detail'));
        const prices = document.createElement('div');
        prices.className = 'package-detail';
        prices.append(textNode('strong', 'Group prices'));
        if (item.prices.length) {
            const list = document.createElement('ul');
            item.prices.forEach(tier => {
                const fields = [tier.tier_label, tier.group_size_label].filter(Boolean);
                const price = tier.amount !== null ? `${tier.currency || ''} ${tier.amount}`.trim() : 'Amount not recorded';
                fields.push(price);
                if (tier.price_basis) fields.push(tier.price_basis);
                list.append(textNode('li', fields.join(' · ')));
            });
            prices.append(list);
        } else prices.append(textNode('p', 'No price tiers recorded.'));
        card.append(prices);
        const itinerary = document.createElement('div');
        itinerary.className = 'package-detail';
        itinerary.append(textNode('strong', 'Itinerary'));
        if (item.itinerary.length) {
            const list = document.createElement('ul');
            item.itinerary.forEach(day => {
                const details = [day.day_label, day.location, day.meals, day.activities].filter(Boolean);
                list.append(textNode('li', details.join(' · ')));
            });
            itinerary.append(list);
        } else itinerary.append(textNode('p', 'No itinerary details recorded.'));
        card.append(itinerary);
        card.addEventListener('click', () => {
            packageList.querySelectorAll('.package-card').forEach(el => el.classList.remove('selected'));
            card.classList.add('selected');
            radio.checked = true;
            document.getElementById('packageErr').style.display = 'none';
            updateDepartureChoices(item);
        });
        packageList.append(card);
    });
    const selectedCard = packageList.querySelector('.package-card');
    if (selectedCard) selectedCard.click();
    updateSidebar();
}

document.getElementById('clearSearchDate').addEventListener('click', () => {
    searchDate = '';
    renderPackages();
});

departureSelect.addEventListener('change', () => {
    selectedDeparture = selectedPackage?.departures.find(item => String(item.id) === departureSelect.value) || null;
    state.departureId = selectedDeparture ? String(selectedDeparture.id) : '';
    state.departure = selectedDeparture?.departure_city || '';
    state.depDate = selectedDeparture?.depart_date || '';
    state.retDate = selectedDeparture?.return_date || '';
    depDateInput.value = state.depDate;
    retDateInput.value = state.retDate;
    if (selectedDeparture) {
        const lines = [`Departure city: ${selectedDeparture.departure_city}`];
        if (selectedDeparture.duration_days) lines.push(`Duration: ${selectedDeparture.duration_days} days${selectedDeparture.duration_nights ? ` / ${selectedDeparture.duration_nights} nights` : ''}`);
        if (selectedDeparture.surcharge_note) lines.push(`Surcharge note: ${selectedDeparture.surcharge_note}`);
        selectedDeparture.surcharges.forEach(rule => {
            const amount = rule.amount !== null ? `${rule.currency || ''} ${rule.amount}`.trim() : 'Amount not recorded';
            lines.push(`Surcharge${rule.rule_label ? ' (' + rule.rule_label + ')' : ''}: ${amount}${rule.surcharge_basis ? ' · ' + rule.surcharge_basis : ''}`);
        });
        departureDetails.textContent = lines.join(' | ');
        departureDetails.hidden = false;
    } else departureDetails.hidden = true;
    updateSidebar();
});

document.querySelectorAll('.dest-chip').forEach(chip => {
    chip.addEventListener('click', () => {
        if (state.destination !== chip.dataset.val) searchDate = '';
        document.querySelectorAll('.dest-chip').forEach(c => c.classList.remove('selected'));
        chip.classList.add('selected');
        state.destination = chip.dataset.val;
        document.getElementById('destErr').style.display = 'none';
        renderPackages();
    });
});
if (state.destination) document.querySelector(`.dest-chip[data-val="${CSS.escape(state.destination)}"]`)?.classList.add('selected');
renderPackages();

/* Trip type pills */
document.querySelectorAll('#tripTypePills .pill').forEach(pill => {
    pill.addEventListener('click', () => {
        document.querySelectorAll('#tripTypePills .pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        state.tripType = pill.dataset.val;
        updateSidebar();
    });
});

/* Counters */
function bindCounter(decId, incId, valId, key, min) {
    const dec = document.getElementById(decId), inc = document.getElementById(incId), val = document.getElementById(valId);
    dec.addEventListener('click', () => {
        if (state[key] > min) { state[key]--; val.textContent = state[key]; dec.disabled = state[key] <= min; updateSidebar(); }
    });
    inc.addEventListener('click', () => { state[key]++; val.textContent = state[key]; dec.disabled = false; updateSidebar(); });
    dec.disabled = state[key] <= min;
}
document.getElementById('adultVal').textContent = state.adults;
document.getElementById('childVal').textContent = state.children;
bindCounter('adultDec', 'adultInc', 'adultVal', 'adults', 1);
bindCounter('childDec', 'childInc', 'childVal', 'children', 0);
updateSidebar();

/* Sidebar */
function updateSidebar() {
    document.getElementById('sb-dest').textContent = state.destination || '—';
    const dd = document.getElementById('depDate').value;
    document.getElementById('sb-date').textContent = dd ? new Date(dd).toLocaleDateString('en-PH', {month:'short',day:'numeric',year:'numeric'}) : '—';
    document.getElementById('sb-pax').textContent  = paxText();
    document.getElementById('sb-type').textContent = state.tripType;
}

/* Validation */
function validate(id, check) {
    const el = document.getElementById(id);
    const ok = check(el.value);
    el.closest('.field')?.classList.toggle('has-error', !ok);
    el.classList.toggle('error', !ok);
    return ok;
}
const fmt = (d, m) => d ? new Date(d).toLocaleDateString('en-PH', {month:m,day:'numeric',year:'numeric'}) : null;

/* Next / Back */
document.getElementById('next1').addEventListener('click', () => {
    let ok = true;
    if (!state.destination) { document.getElementById('destErr').style.display = 'block'; ok = false; }
    if (!state.packageId) { document.getElementById('packageErr').style.display = 'block'; ok = false; }
    if (!validate('departure', v => v !== '')) ok = false;
    if (ok) { state.departure = document.getElementById('departure').value; goTo(2); }
});
document.getElementById('back2').addEventListener('click', () => goTo(1));
document.getElementById('next2').addEventListener('click', () => {
    if (validate('depDate', v => v !== '')) {
        state.depDate = document.getElementById('depDate').value;
        state.retDate = document.getElementById('retDate').value;
        state.budget  = document.getElementById('budget').value;
        state.notes   = document.getElementById('notes').value;
        goTo(3);
    }
});
document.getElementById('back3').addEventListener('click', () => goTo(2));
document.getElementById('next3').addEventListener('click', () => {
    const namePattern = /^[\p{L}\p{M}]+(?:[ .'-][\p{L}\p{M}]+)*\.?$/u;
    const f1 = validate('firstName', v => v.trim() !== '' && namePattern.test(v.trim()));
    const f2 = validate('lastName',  v => v.trim() !== '' && namePattern.test(v.trim()));
    const f3 = validate('email',     v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    const f4 = validate('phone',     v => /^[0-9+().\s-]{6,30}$/.test(v.trim()) && /[0-9]/.test(v));
    if (f1 && f2 && f3 && f4) {
        state.firstName = document.getElementById('firstName').value.trim();
        state.lastName  = document.getElementById('lastName').value.trim();
        state.email     = document.getElementById('email').value.trim();
        state.phone     = document.getElementById('phone').value.trim();
        const set = (id, t) => document.getElementById(id).textContent = t;
        set('rv-dest', state.destination);
        set('rv-package', selectedPackage?.name || '—');
        set('rv-dep', state.departure);
        set('rv-depDate', fmt(state.depDate, 'long') || '—');
        set('rv-retDate', fmt(state.retDate, 'long') || 'N/A');
        set('rv-tripType', state.tripType);
        set('rv-budget', state.budget || 'Not specified');
        set('rv-name', state.firstName + ' ' + state.lastName);
        set('rv-email', state.email);
        set('rv-phone', state.phone);
        set('rv-group', paxText());
        goTo(4);
    }
});
document.getElementById('back4').addEventListener('click', () => goTo(3));
document.getElementById('submitBtn').addEventListener('click', async () => {
    if (!document.getElementById('agreeConsent').checked) { document.getElementById('consentErr').style.display = 'block'; return; }
    document.getElementById('consentErr').style.display = 'none';
    const submitButton = document.getElementById('submitBtn');
    const errorBox = document.getElementById('submitError');
    errorBox.style.display = 'none';
    submitButton.disabled = true;
    submitButton.textContent = 'Submitting…';
    const payload = new URLSearchParams({
        csrf_token: initialBooking.csrf,
        request_token: initialBooking.request_token,
        package_id: state.packageId,
        departure_id: state.departureId,
        first_name: state.firstName,
        last_name: state.lastName,
        email: state.email,
        phone: state.phone,
        adults: String(state.adults),
        children: String(state.children),
        trip_type: state.tripType,
        budget_range: state.budget,
        special_requests: state.notes,
        consent: '1'
    });
    try {
        const response = await fetch('back-end/booking_inquiry.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8', 'Accept': 'application/json'},
            body: payload.toString()
        });
        let result;
        try {
            result = await response.json();
        } catch (parseError) {
            throw new Error('The server returned an unreadable response. Please refresh the page and try again.');
        }
        if (!response.ok || !result.success) throw new Error(result.message || 'We could not submit your inquiry. Please try again.');
        document.querySelectorAll('.form-panel').forEach(p => p.classList.remove('active'));
        document.querySelector('.progress-bar-wrap').style.display = 'none';
        document.getElementById('refCode').textContent = 'INQUIRY: BTT-' + String(result.inquiry_id).padStart(6, '0');
        document.getElementById('successScreen').classList.add('show');
        document.querySelectorAll('.step').forEach(s => {
            s.classList.remove('active'); s.classList.add('completed');
            s.querySelector('.step__num').innerHTML = CHECK;
        });
        document.getElementById('progressBar').style.width = '100%';
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } catch (error) {
        errorBox.textContent = error instanceof TypeError
            ? 'Could not reach the booking server. Check that Apache and MySQL are running, then try again.'
            : error.message;
        errorBox.style.display = 'block';
    } finally {
        submitButton.disabled = false;
        submitButton.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Submit Booking';
    }
});
</script>
</body>
</html>
