<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Trip | Bryvelrisse Travel and Tours</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Reuse site nav/footer styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">

    <style>
        /* ─── Design Tokens ─────────────────────────────────────────── */
        :root {
            --primary:    #306f91;
            --dark:       #1e4f6b;
            --accent:     #4fb8e0;
            --accent2:    #F0B13D;
            --bg:         #f5f9fc;
            --surface:    #ffffff;
            --border:     rgba(48,111,145,0.14);
            --muted:      #6b8fa3;
            --text:       #1a2e3b;
            --error:      #e05a4f;
            --success:    #3aaa6e;
            --radius:     14px;
            --shadow:     0 8px 40px rgba(48,111,145,0.10);
            --ease:       cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Montserrat', 'Segoe UI', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
        }

        /* ─── Page Hero ──────────────────────────────────────────────── */
        .booking-hero {
            background: linear-gradient(135deg, var(--dark) 0%, var(--primary) 55%, #5ab6d4 100%);
            padding: 3.5rem 1.5rem 5.5rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .booking-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
        .booking-hero__title {
            font-size: clamp(1.8rem, 4vw, 2.8rem);
            font-weight: 800;
            color: #fff;
            letter-spacing: -0.5px;
            position: relative;
        }
        .booking-hero__sub {
            margin-top: 0.6rem;
            color: rgba(255,255,255,0.78);
            font-size: 1rem;
            font-weight: 500;
            position: relative;
        }

        /* ─── Stepper ────────────────────────────────────────────────── */
        .stepper-wrap {
            display: flex;
            justify-content: center;
            margin: -2.2rem auto 0;
            position: relative;
            z-index: 10;
            padding: 0 1rem;
            max-width: 700px;
        }
        .stepper {
            background: var(--surface);
            border-radius: 999px;
            box-shadow: var(--shadow);
            display: flex;
            align-items: center;
            padding: 0.55rem 1.5rem;
            gap: 0;
            width: 100%;
            justify-content: space-between;
        }
        .step {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex: 1;
            position: relative;
        }
        .step:not(:last-child)::after {
            content: '';
            position: absolute;
            left: calc(50% + 18px);
            right: calc(-50% + 18px);
            top: 50%;
            height: 2px;
            background: var(--border);
            transition: background 0.4s;
        }
        .step.completed:not(:last-child)::after {
            background: var(--accent);
        }
        .step__num {
            width: 32px; height: 32px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 0.78rem;
            font-weight: 800;
            background: var(--border);
            color: var(--muted);
            flex-shrink: 0;
            transition: background 0.3s, color 0.3s, box-shadow 0.3s;
            position: relative;
            z-index: 1;
        }
        .step.active .step__num {
            background: var(--primary);
            color: #fff;
            box-shadow: 0 0 0 4px rgba(48,111,145,0.18);
        }
        .step.completed .step__num {
            background: var(--accent);
            color: #fff;
        }
        .step__label {
            font-size: 0.73rem;
            font-weight: 700;
            color: var(--muted);
            white-space: nowrap;
            transition: color 0.3s;
        }
        .step.active .step__label   { color: var(--primary); }
        .step.completed .step__label { color: var(--accent); }

        @media (max-width: 520px) {
            .step__label { display: none; }
            .stepper { padding: 0.5rem 1rem; }
        }

        /* ─── Main Layout ────────────────────────────────────────────── */
        .booking-layout {
            max-width: 860px;
            margin: 2.5rem auto 4rem;
            padding: 0 1.25rem;
            display: grid;
            grid-template-columns: 1fr 320px;
            gap: 2rem;
            align-items: start;
        }
        @media (max-width: 820px) {
            .booking-layout { grid-template-columns: 1fr; }
            .booking-sidebar { order: -1; }
        }

        /* ─── Form Card ──────────────────────────────────────────────── */
        .booking-card {
            background: var(--surface);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 2.2rem 2rem;
            border: 1px solid var(--border);
        }

        .form-panel { display: none; }
        .form-panel.active { display: block; animation: panelIn 0.38s var(--ease) both; }

        @keyframes panelIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .panel-title {
            font-size: 1.2rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.55rem;
        }
        .panel-title i { color: var(--accent); font-size: 1rem; }
        .panel-sub {
            color: var(--muted);
            font-size: 0.84rem;
            margin-bottom: 1.6rem;
        }

        /* ─── Form Fields ─────────────────────────────────────────────── */
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .form-grid .span-2 { grid-column: span 2; }

        @media (max-width: 560px) {
            .form-grid { grid-template-columns: 1fr; }
            .form-grid .span-2 { grid-column: span 1; }
        }

        .field {
            display: flex;
            flex-direction: column;
            gap: 0.35rem;
        }
        .field label {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: 0.3px;
        }
        .field label .req { color: var(--error); margin-left: 2px; }

        .field input,
        .field select,
        .field textarea {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            font-family: inherit;
            font-size: 0.88rem;
            color: var(--text);
            background: #f8fbfd;
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s, background 0.25s;
            appearance: none;
        }
        .field input:focus,
        .field select:focus,
        .field textarea:focus {
            border-color: var(--accent);
            background: #fff;
            box-shadow: 0 0 0 3px rgba(79,184,224,0.14);
        }
        .field input.error,
        .field select.error {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(224,90,79,0.10);
        }
        .field .err-msg {
            font-size: 0.74rem;
            color: var(--error);
            font-weight: 600;
            display: none;
        }
        .field.has-error .err-msg { display: block; }

        .field textarea { resize: vertical; min-height: 80px; }

        /* input with icon */
        .input-icon-wrap {
            position: relative;
        }
        .input-icon-wrap i {
            position: absolute;
            left: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 0.85rem;
            pointer-events: none;
        }
        .input-icon-wrap input {
            padding-left: 2.2rem;
        }

        /* ─── Destination Picker ──────────────────────────────────────── */
        .dest-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.65rem;
            margin-top: 0.5rem;
        }
        @media (max-width: 560px) { .dest-grid { grid-template-columns: repeat(2, 1fr); } }

        .dest-chip {
            cursor: pointer;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 0.6rem 0.5rem;
            text-align: center;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--muted);
            background: #f8fbfd;
            transition: border-color 0.22s, background 0.22s, color 0.22s, transform 0.18s;
            user-select: none;
        }
        .dest-chip:hover { border-color: var(--accent); color: var(--primary); transform: translateY(-1px); }
        .dest-chip.selected {
            border-color: var(--primary);
            background: rgba(48,111,145,0.07);
            color: var(--primary);
        }
        .dest-chip .dest-flag { font-size: 1.3rem; display: block; margin-bottom: 0.2rem; }

        /* ─── Travel Type Pills ───────────────────────────────────────── */
        .pill-group {
            display: flex;
            flex-wrap: wrap;
            gap: 0.55rem;
            margin-top: 0.4rem;
        }
        .pill {
            cursor: pointer;
            border: 1.5px solid var(--border);
            border-radius: 999px;
            padding: 0.4rem 0.95rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--muted);
            background: #f8fbfd;
            transition: all 0.22s;
            user-select: none;
        }
        .pill:hover  { border-color: var(--accent); color: var(--primary); }
        .pill.active {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }

        /* ─── Counter Row ─────────────────────────────────────────────── */
        .counter-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.85rem 0;
            border-bottom: 1px solid var(--border);
        }
        .counter-row:last-child { border-bottom: none; }
        .counter-row__info strong { font-size: 0.9rem; color: var(--dark); }
        .counter-row__info span  { font-size: 0.77rem; color: var(--muted); display: block; }
        .counter-ctrl {
            display: flex; align-items: center; gap: 0.75rem;
        }
        .counter-ctrl button {
            width: 30px; height: 30px;
            border-radius: 50%;
            border: 1.5px solid var(--border);
            background: #f8fbfd;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary);
            display: flex; align-items: center; justify-content: center;
            transition: background 0.2s, border-color 0.2s;
        }
        .counter-ctrl button:hover { background: rgba(48,111,145,0.09); border-color: var(--accent); }
        .counter-ctrl button:disabled { opacity: 0.35; cursor: not-allowed; }
        .counter-val { font-size: 1rem; font-weight: 800; color: var(--dark); min-width: 1.5rem; text-align: center; }

        /* ─── Review Summary ──────────────────────────────────────────── */
        .review-block {
            background: #f4f9fc;
            border: 1.5px solid var(--border);
            border-radius: 10px;
            padding: 1rem 1.1rem;
            margin-bottom: 0.85rem;
        }
        .review-block h5 {
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--muted);
            margin-bottom: 0.6rem;
        }
        .review-row {
            display: flex;
            justify-content: space-between;
            font-size: 0.86rem;
            padding: 0.22rem 0;
            color: var(--dark);
        }
        .review-row span:first-child { color: var(--muted); font-weight: 600; }
        .review-row span:last-child  { font-weight: 700; }

        /* ─── Consent Checkbox ───────────────────────────────────────── */
        .consent {
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
            margin-top: 1.2rem;
        }
        .consent input[type=checkbox] {
            width: 17px; height: 17px;
            margin-top: 2px;
            accent-color: var(--primary);
            flex-shrink: 0;
        }
        .consent label {
            font-size: 0.8rem;
            color: var(--muted);
            line-height: 1.5;
        }
        .consent label a { color: var(--primary); font-weight: 700; }

        /* ─── Form Navigation Buttons ─────────────────────────────────── */
        .form-nav {
            display: flex;
            justify-content: space-between;
            margin-top: 1.8rem;
            gap: 0.75rem;
        }
        .btn-back {
            padding: 0.7rem 1.4rem;
            border: 1.5px solid var(--border);
            border-radius: 9px;
            background: transparent;
            color: var(--muted);
            font-family: inherit;
            font-size: 0.88rem;
            font-weight: 700;
            cursor: pointer;
            display: flex; align-items: center; gap: 0.4rem;
            transition: border-color 0.22s, color 0.22s;
        }
        .btn-back:hover { border-color: var(--primary); color: var(--primary); }

        .btn-next, .btn-submit {
            flex: 1;
            max-width: 260px;
            padding: 0.75rem 1.6rem;
            border: none;
            border-radius: 9px;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: #fff;
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 800;
            cursor: pointer;
            display: flex; align-items: center; justify-content: center; gap: 0.5rem;
            transition: opacity 0.22s, transform 0.18s, box-shadow 0.22s;
            box-shadow: 0 4px 18px rgba(48,111,145,0.22);
        }
        .btn-next:hover, .btn-submit:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            box-shadow: 0 6px 24px rgba(48,111,145,0.3);
        }
        .btn-submit { background: linear-gradient(135deg, var(--success), #2e9a60); }

        /* active / pressed styles */
        .btn-next:active, .btn-submit:active {
            transform: translateY(1px) scale(0.994);
            box-shadow: 0 3px 12px rgba(48,111,145,0.14);
            opacity: 0.98;
        }
        .btn-back:active {
            transform: translateY(1px) scale(0.996);
            box-shadow: none;
        }
        .btn-home:active {
            transform: translateY(1px) scale(0.994);
            box-shadow: 0 3px 10px rgba(48,111,145,0.12);
        }
        .btn-next:focus-visible, .btn-submit:focus-visible, .btn-back:focus-visible, .btn-home:focus-visible {
            outline: none;
            box-shadow: 0 0 0 6px rgba(79,184,224,0.10), 0 6px 20px rgba(48,111,145,0.18);
        }
        .btn-next i, .btn-submit i, .btn-back i, .btn-home i { transition: transform 0.18s ease, opacity 0.18s ease; }
        .btn-next:active i, .btn-submit:active i { transform: translateX(4px) scale(0.98); opacity: 0.95; }

        /* ─── Sidebar ─────────────────────────────────────────────────── */
        .booking-sidebar { display: flex; flex-direction: column; gap: 1.25rem; }

        .sidebar-card {
            background: var(--surface);
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1.4rem 1.35rem;
            border: 1px solid var(--border);
        }
        .sidebar-card h4 {
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.6px;
            color: var(--muted);
            margin-bottom: 0.85rem;
            display: flex; align-items: center; gap: 0.4rem;
        }
        .sidebar-card h4 i { color: var(--accent2); }

        .summary-line {
            display: flex;
            justify-content: space-between;
            font-size: 0.86rem;
            padding: 0.28rem 0;
            border-bottom: 1px dashed var(--border);
            color: var(--dark);
        }
        .summary-line:last-child { border-bottom: none; }
        .summary-line span:first-child { color: var(--muted); }

        .trust-item {
            display: flex;
            align-items: flex-start;
            gap: 0.65rem;
            font-size: 0.82rem;
            color: var(--muted);
            padding: 0.4rem 0;
        }
        .trust-item i { color: var(--success); margin-top: 2px; flex-shrink: 0; }
        .trust-item strong { color: var(--dark); display: block; }

        .contact-cta {
            display: flex;
            align-items: center;
            gap: 0.65rem;
            background: linear-gradient(135deg, var(--dark), var(--primary));
            border-radius: 10px;
            padding: 0.85rem 1rem;
            color: #fff;
            text-decoration: none;
            font-size: 0.83rem;
            font-weight: 700;
            transition: opacity 0.22s, transform 0.18s;
        }
        .contact-cta:hover { opacity: 0.9; transform: translateY(-1px); }
        .contact-cta i { font-size: 1.1rem; }

        /* ─── Success Screen ──────────────────────────────────────────── */
        .success-screen {
            display: none;
            text-align: center;
            padding: 3rem 1.5rem;
        }
        .success-screen.show { display: block; animation: panelIn 0.5s var(--ease) both; }
        .success-icon {
            width: 80px; height: 80px;
            background: linear-gradient(135deg, var(--success), #2e9a60);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 2rem;
            color: #fff;
            box-shadow: 0 8px 28px rgba(58,170,110,0.3);
        }
        .success-screen h2 { font-size: 1.6rem; font-weight: 800; color: var(--dark); margin-bottom: 0.5rem; }
        .success-screen p  { color: var(--muted); font-size: 0.9rem; max-width: 380px; margin: 0 auto 1.8rem; line-height: 1.6; }
        .success-ref {
            display: inline-block;
            background: #f4f9fc;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            padding: 0.5rem 1.2rem;
            font-size: 0.85rem;
            font-weight: 800;
            color: var(--primary);
            letter-spacing: 1px;
            margin-bottom: 1.8rem;
        }
        .btn-home {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.8rem;
            background: linear-gradient(135deg, var(--primary), var(--accent));
            color: #fff;
            border-radius: 9px;
            font-weight: 800;
            font-size: 0.9rem;
            text-decoration: none;
            box-shadow: 0 4px 18px rgba(48,111,145,0.22);
            transition: opacity 0.22s, transform 0.18s;
        }
        .btn-home:hover { opacity: 0.9; transform: translateY(-1px); }

        /* ─── Misc ─────────────────────────────────────────────────── */
        .section-divider {
            border: none;
            border-top: 1.5px dashed var(--border);
            margin: 1.2rem 0;
        }

        .badge-row {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-top: 0.6rem;
        }
        .badge {
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.25rem 0.7rem;
            border-radius: 999px;
            background: rgba(48,111,145,0.08);
            color: var(--primary);
        }

        .progress-bar-wrap {
            background: var(--border);
            border-radius: 999px;
            height: 4px;
            margin-top: 1.2rem;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, var(--primary), var(--accent));
            border-radius: 999px;
            transition: width 0.45s var(--ease);
        }
    </style>
</head>
<body>

<!-- ─── Navbar ────────────────────────────────────────────────────────── -->
<nav class="navigation">
    <a href="index.html" class="logo">
        <img src="assets/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours" style="height:60px;width:auto;">
    </a>
        <div class="nav-links" id="navLinks">
        <a href="index.html">Home</a>
        <a href="destinations.html">Destinations</a>
        <a href="about.html">About</a>
        <a href="contact.html">Contact</a>
        <a href="booking.html" class="btn-booking">
            <i class="fa-solid fa-plane nav-icon" aria-hidden="true"></i>
            Booking
        </a>
        <a href="login.html" class="btn-login">
            <i class="fa-solid fa-user nav-icon" aria-hidden="true"></i>
            Sign In
        </a>
    </div>
    <button class="menu-toggle" id="menuToggle" type="button" aria-label="Toggle navigation" aria-expanded="false">
        <i class="fa-solid fa-bars"></i>
    </button>
</nav>

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="booking-hero">
    <h1 class="booking-hero__title"><i class="fa-solid fa-paper-plane" style="font-size:0.8em;opacity:0.85;"></i> Book Your Journey</h1>
    <p class="booking-hero__sub">Fill in your details and we'll take care of the rest</p>
</div>

<!-- ─── Stepper ───────────────────────────────────────────────────────── -->
<div class="stepper-wrap">
    <div class="stepper" id="stepper">
        <div class="step active" data-step="1">
            <div class="step__num" id="sn1">1</div>
            <span class="step__label">Destination</span>
        </div>
        <div class="step" data-step="2">
            <div class="step__num" id="sn2">2</div>
            <span class="step__label">Travel Info</span>
        </div>
        <div class="step" data-step="3">
            <div class="step__num" id="sn3">3</div>
            <span class="step__label">Travelers</span>
        </div>
        <div class="step" data-step="4">
            <div class="step__num" id="sn4">4</div>
            <span class="step__label">Review</span>
        </div>
    </div>
</div>

<!-- ─── Main ──────────────────────────────────────────────────────────── -->
<div class="booking-layout">

    <!-- ── Form Card ──────────────────────────────────────────────────── -->
    <div class="booking-card" id="bookingCard">

        <!-- Progress bar -->
        <div class="progress-bar-wrap"><div class="progress-bar" id="progressBar" style="width:25%"></div></div>

        <!-- ── Panel 1: Destination ─────────────────────────────────── -->
        <div class="form-panel active" id="panel1">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-location-dot"></i> Choose Your Destination</p>
                <p class="panel-sub">Select one destination for your upcoming trip</p>

                <div class="dest-grid" id="destGrid">
                    <div class="dest-chip" data-val="South Korea">     <span class="dest-flag">🇰🇷</span>South Korea</div>
                    <div class="dest-chip" data-val="Shanghai, China">  <span class="dest-flag">🇨🇳</span>Shanghai</div>
                    <div class="dest-chip" data-val="Taiwan">           <span class="dest-flag">🇹🇼</span>Taiwan</div>
                    <div class="dest-chip" data-val="Hongkong">         <span class="dest-flag">🇭🇰</span>Hongkong</div>
                    <div class="dest-chip" data-val="Singapore">        <span class="dest-flag">🇸🇬</span>Singapore</div>
                    <div class="dest-chip" data-val="Thailand">         <span class="dest-flag">🇹🇭</span>Thailand</div>
                    <div class="dest-chip" data-val="Japan">            <span class="dest-flag">🇯🇵</span>Japan</div>
                    <div class="dest-chip" data-val="Batanes, Philippines"><span class="dest-flag">🏝️</span>Batanes</div>
                    <div class="dest-chip" data-val="El Nido, Philippines"><span class="dest-flag">🌊</span>El Nido</div>
                    <div class="dest-chip" data-val="Siargao, Philippines"><span class="dest-flag">🏄</span>Siargao</div>
                    <div class="dest-chip" data-val="Iloilo, Philippines"><span class="dest-flag">🏛️</span>Iloilo</div>
                    <div class="dest-chip" data-val="Other">            <span class="dest-flag">✈️</span>Other</div>
                </div>
                <p class="err-msg" id="destErr" style="color:var(--error);font-size:0.78rem;font-weight:700;margin-top:0.5rem;display:none;">Please select a destination.</p>

                <hr class="section-divider">

                <div class="form-grid">
                    <div class="field span-2">
                        <label>Departure City / Port <span class="req">*</span></label>
                        <select id="departure">
                            <option value="">Select departure point…</option>
                            <option>Manila (NAIA)</option>
                            <option>Cebu (Mactan–Cebu)</option>
                            <option>Clark (CRK)</option>
                            <option>Davao (FCIA)</option>
                            <option>Iloilo (ILO)</option>
                            <option>Other</option>
                        </select>
                        <span class="err-msg">Please select your departure city.</span>
                    </div>
                </div>
            </div>

            <div class="form-nav">
                <span></span>
                <button class="btn-next" id="next1">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

        <!-- ── Panel 2: Travel Info ──────────────────────────────────── -->
        <div class="form-panel" id="panel2">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-regular fa-calendar"></i> Travel Details</p>
                <p class="panel-sub">Tell us when and how you'd like to travel</p>

                <div class="form-grid">
                    <div class="field">
                        <label>Departure Date <span class="req">*</span></label>
                        <div class="input-icon-wrap">
                            <i class="fa-regular fa-calendar"></i>
                            <input type="date" id="depDate">
                        </div>
                        <span class="err-msg">Please pick a date.</span>
                    </div>
                    <div class="field">
                        <label>Return Date</label>
                        <div class="input-icon-wrap">
                            <i class="fa-regular fa-calendar"></i>
                            <input type="date" id="retDate">
                        </div>
                    </div>

                    <div class="field span-2">
                        <label>Trip Type</label>
                        <div class="pill-group" id="tripTypePills">
                            <div class="pill active" data-val="Package Tour">📦 Package Tour</div>
                            <div class="pill" data-val="Custom Itinerary">🗺️ Custom Itinerary</div>
                            <div class="pill" data-val="Honeymoon">💍 Honeymoon</div>
                            <div class="pill" data-val="Family">👨‍👩‍👧 Family</div>
                            <div class="pill" data-val="Group">👥 Group</div>
                            <div class="pill" data-val="Business">💼 Business</div>
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

        <!-- ── Panel 3: Travelers ────────────────────────────────────── -->
        <div class="form-panel" id="panel3">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-users"></i> Traveler Information</p>
                <p class="panel-sub">Lead traveler contact details & group size</p>

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
                        <div class="input-icon-wrap">
                            <i class="fa-regular fa-envelope"></i>
                            <input type="email" id="email" placeholder="juan@example.com">
                        </div>
                        <span class="err-msg">Enter a valid email.</span>
                    </div>
                    <div class="field">
                        <label>Phone Number <span class="req">*</span></label>
                        <div class="input-icon-wrap">
                            <i class="fa-solid fa-phone"></i>
                            <input type="tel" id="phone" placeholder="+63 9XX XXX XXXX">
                        </div>
                        <span class="err-msg">Phone number is required.</span>
                    </div>
                </div>

                <hr class="section-divider">
                <p style="font-size:0.82rem;font-weight:700;color:var(--muted);margin-bottom:0.6rem;">GROUP SIZE</p>

                <div class="counter-row">
                    <div class="counter-row__info">
                        <strong>Adults</strong>
                        <span>Ages 18 and above</span>
                    </div>
                    <div class="counter-ctrl">
                        <button id="adultDec" type="button">−</button>
                        <span class="counter-val" id="adultVal">1</span>
                        <button id="adultInc" type="button">+</button>
                    </div>
                </div>
                <div class="counter-row">
                    <div class="counter-row__info">
                        <strong>Children</strong>
                        <span>Ages 0 – 17</span>
                    </div>
                    <div class="counter-ctrl">
                        <button id="childDec" type="button">−</button>
                        <span class="counter-val" id="childVal">0</span>
                        <button id="childInc" type="button">+</button>
                    </div>
                </div>
            </div>

            <div class="form-nav">
                <button class="btn-back" id="back3"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <button class="btn-next" id="next3">Next <i class="fa-solid fa-arrow-right"></i></button>
            </div>
        </div>

        <!-- ── Panel 4: Review ───────────────────────────────────────── -->
        <div class="form-panel" id="panel4">
            <div style="margin-top:1.4rem;">
                <p class="panel-title"><i class="fa-solid fa-clipboard-check"></i> Review Your Booking</p>
                <p class="panel-sub">Please check your details before submitting</p>

                <div class="review-block">
                    <h5>✈️ Destination</h5>
                    <div class="review-row"><span>Destination</span><span id="rv-dest">—</span></div>
                    <div class="review-row"><span>Departure From</span><span id="rv-dep">—</span></div>
                </div>

                <div class="review-block">
                    <h5>📅 Travel Details</h5>
                    <div class="review-row"><span>Departure Date</span><span id="rv-depDate">—</span></div>
                    <div class="review-row"><span>Return Date</span><span id="rv-retDate">—</span></div>
                    <div class="review-row"><span>Trip Type</span><span id="rv-tripType">—</span></div>
                    <div class="review-row"><span>Budget</span><span id="rv-budget">—</span></div>
                </div>

                <div class="review-block">
                    <h5>👤 Traveler</h5>
                    <div class="review-row"><span>Name</span><span id="rv-name">—</span></div>
                    <div class="review-row"><span>Email</span><span id="rv-email">—</span></div>
                    <div class="review-row"><span>Phone</span><span id="rv-phone">—</span></div>
                    <div class="review-row"><span>Group Size</span><span id="rv-group">—</span></div>
                </div>

                <div class="consent">
                    <input type="checkbox" id="agreeConsent">
                    <label for="agreeConsent">
                        I agree to the <a href="terms.html" target="_blank">Terms &amp; Conditions</a> and understand this is a booking inquiry. A travel consultant will contact me within 24 hours to confirm details and pricing.
                    </label>
                </div>
                <p class="err-msg" id="consentErr" style="color:var(--error);font-size:0.78rem;font-weight:700;margin-top:0.5rem;display:none;">Please accept the terms to proceed.</p>
            </div>

            <div class="form-nav">
                <button class="btn-back" id="back4"><i class="fa-solid fa-arrow-left"></i> Back</button>
                <button class="btn-submit" id="submitBtn"><i class="fa-solid fa-paper-plane"></i> Submit Booking</button>
            </div>
        </div>

        <!-- ── Success ───────────────────────────────────────────────── -->
        <div class="success-screen" id="successScreen">
            <div class="success-icon"><i class="fa-solid fa-check"></i></div>
            <h2>Booking Submitted!</h2>
            <p>Thank you for choosing Bryvelrisse Travel and Tours. Your booking inquiry has been received. Our travel consultant will reach out within <strong>24 hours</strong> to confirm your details.</p>
            <div class="success-ref" id="refCode">REF: BTT-000000</div>
            <br>
            <a href="index.html" class="btn-home"><i class="fa-solid fa-house"></i> Back to Home</a>
        </div>
    </div>

    <!-- ── Sidebar ─────────────────────────────────────────────────────── -->
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
            <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" class="contact-cta" style="margin-bottom:0.6rem;">
                <i class="fa-brands fa-facebook-messenger"></i> Message us on Facebook
            </a>
            <a href="tel:+639422699852" class="contact-cta">
                <i class="fa-solid fa-phone"></i> +63 942 269 9852
            </a>
        </div>
    </aside>
</div>

<!-- ─── Footer ────────────────────────────────────────────────────────── -->
<footer class="site-footer">
    <div class="footer-inner">
        <div class="footer-main">
            <div class="footer-brand">
                <a href="index.html" class="footer-logo">Bryvelrisse<br><span>Travel and Tours</span></a>
                <p class="footer-tagline">Crafting unforgettable journeys since 2019. Your adventure begins with a single step.</p>
                <div class="footer-socials">
                    <a href="https://www.facebook.com/share/1YTtkZ2UkY/" target="_blank" rel="noopener" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="tel:+639422699852" aria-label="Phone"><i class="fa-solid fa-phone"></i></a>
                    <a href="mailto:bryvelrissetravelandtours@gmail.com" aria-label="Email"><i class="fa-regular fa-envelope"></i></a>
                </div>
            </div>
            <div class="footer-col">
                <h4>Company</h4>
                <ul><li><a href="about.html">About Us</a></li></ul>
            </div>
            <div class="footer-col">
                <h4>Support</h4>
                <ul>
                    <li><a href="contact.html#faq">FAQ</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="terms.html" target="_blank">Terms</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; 2026 Bryvelrisse Travel and Tours. All rights reserved.</p>
        <p>Designed with <i class="fa-solid fa-heart" style="color:#F0B13D;"></i> for every traveler</p>
    </div>
</footer>

<script>
/* ── Navbar toggle ───────────────────────────────────────────────── */
const menuToggle = document.getElementById('menuToggle');
const navLinks   = document.getElementById('navLinks');
menuToggle?.addEventListener('click', () => {
    const open = navLinks.classList.toggle('active');
    menuToggle.classList.toggle('open', open);
    menuToggle.setAttribute('aria-expanded', open);
});

/* ── State ───────────────────────────────────────────────────────── */
const state = {
    destination: '', departure: '',
    depDate: '', retDate: '',
    tripType: 'Package Tour', budget: '', notes: '',
    firstName: '', lastName: '', email: '', phone: '',
    adults: 1, children: 0
};

let currentPanel = 1;
const TOTAL = 4;

/* ── Step UI ─────────────────────────────────────────────────────── */
function goTo(n) {
    document.querySelectorAll('.form-panel').forEach((p, i) => p.classList.toggle('active', i === n - 1));
    document.querySelectorAll('.step').forEach((s, i) => {
        s.classList.toggle('active', i === n - 1);
        s.classList.toggle('completed', i < n - 1);
        if (i < n - 1) s.querySelector('.step__num').innerHTML = '<i class="fa-solid fa-check" style="font-size:0.7rem;"></i>';
        else s.querySelector('.step__num').textContent = i + 1;
    });
    document.getElementById('progressBar').style.width = ((n / TOTAL) * 100) + '%';
    currentPanel = n;
    window.scrollTo({ top: 0, behavior: 'smooth' });
    updateSidebar();
}

/* ── Destination chips ───────────────────────────────────────────── */
document.querySelectorAll('.dest-chip').forEach(chip => {
    chip.addEventListener('click', () => {
        document.querySelectorAll('.dest-chip').forEach(c => c.classList.remove('selected'));
        chip.classList.add('selected');
        state.destination = chip.dataset.val;
        document.getElementById('destErr').style.display = 'none';
        updateSidebar();
    });
});

/* ── Trip type pills ─────────────────────────────────────────────── */
document.querySelectorAll('#tripTypePills .pill').forEach(pill => {
    pill.addEventListener('click', () => {
        document.querySelectorAll('#tripTypePills .pill').forEach(p => p.classList.remove('active'));
        pill.classList.add('active');
        state.tripType = pill.dataset.val;
        updateSidebar();
    });
});

/* ── Counters ────────────────────────────────────────────────────── */
function bindCounter(decId, incId, valId, stateKey, min = 0) {
    const dec = document.getElementById(decId);
    const inc = document.getElementById(incId);
    const val = document.getElementById(valId);
    dec.addEventListener('click', () => {
        if (state[stateKey] > min) { state[stateKey]--; val.textContent = state[stateKey]; dec.disabled = state[stateKey] <= min; updateSidebar(); }
    });
    inc.addEventListener('click', () => {
        state[stateKey]++; val.textContent = state[stateKey]; dec.disabled = false; updateSidebar();
    });
    dec.disabled = state[stateKey] <= min;
}
bindCounter('adultDec', 'adultInc', 'adultVal', 'adults', 1);
bindCounter('childDec', 'childInc', 'childVal', 'children', 0);

/* ── Sidebar updater ─────────────────────────────────────────────── */
function updateSidebar() {
    document.getElementById('sb-dest').textContent  = state.destination || '—';
    const dd = document.getElementById('depDate').value;
    document.getElementById('sb-date').textContent  = dd ? new Date(dd).toLocaleDateString('en-PH', {month:'short',day:'numeric',year:'numeric'}) : '—';
    const pax = state.adults + ' adult' + (state.adults > 1 ? 's' : '') + (state.children ? ', ' + state.children + ' child' + (state.children > 1 ? 'ren' : '') : '');
    document.getElementById('sb-pax').textContent   = pax;
    document.getElementById('sb-type').textContent  = state.tripType;
}

/* ── Validation helpers ──────────────────────────────────────────── */
function validate(id, check) {
    const el = document.getElementById(id);
    const ok = check(el.value);
    el.closest('.field')?.classList.toggle('has-error', !ok);
    el.classList.toggle('error', !ok);
    return ok;
}

/* ── Next / Back ─────────────────────────────────────────────────── */
document.getElementById('next1').addEventListener('click', () => {
    let ok = true;
    if (!state.destination) { document.getElementById('destErr').style.display = 'block'; ok = false; }
    const depOk = validate('departure', v => v !== '');
    if (!depOk) ok = false;
    if (ok) { state.departure = document.getElementById('departure').value; goTo(2); }
});

document.getElementById('back2').addEventListener('click', () => goTo(1));
document.getElementById('next2').addEventListener('click', () => {
    const ok = validate('depDate', v => v !== '');
    if (ok) {
        state.depDate  = document.getElementById('depDate').value;
        state.retDate  = document.getElementById('retDate').value;
        state.budget   = document.getElementById('budget').value;
        state.notes    = document.getElementById('notes').value;
        goTo(3);
    }
});

document.getElementById('back3').addEventListener('click', () => goTo(2));
document.getElementById('next3').addEventListener('click', () => {
    const f1 = validate('firstName', v => v.trim() !== '');
    const f2 = validate('lastName',  v => v.trim() !== '');
    const f3 = validate('email',     v => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v));
    const f4 = validate('phone',     v => v.trim() !== '');
    if (f1 && f2 && f3 && f4) {
        state.firstName = document.getElementById('firstName').value.trim();
        state.lastName  = document.getElementById('lastName').value.trim();
        state.email     = document.getElementById('email').value.trim();
        state.phone     = document.getElementById('phone').value.trim();
        // Populate review
        document.getElementById('rv-dest').textContent    = state.destination;
        document.getElementById('rv-dep').textContent     = state.departure;
        document.getElementById('rv-depDate').textContent = state.depDate ? new Date(state.depDate).toLocaleDateString('en-PH',{month:'long',day:'numeric',year:'numeric'}) : '—';
        document.getElementById('rv-retDate').textContent = state.retDate ? new Date(state.retDate).toLocaleDateString('en-PH',{month:'long',day:'numeric',year:'numeric'}) : 'N/A';
        document.getElementById('rv-tripType').textContent = state.tripType;
        document.getElementById('rv-budget').textContent  = state.budget || 'Not specified';
        document.getElementById('rv-name').textContent    = state.firstName + ' ' + state.lastName;
        document.getElementById('rv-email').textContent   = state.email;
        document.getElementById('rv-phone').textContent   = state.phone;
        const pax = state.adults + ' adult' + (state.adults > 1 ? 's' : '') + (state.children ? ', ' + state.children + ' child' + (state.children > 1 ? 'ren' : '') : '');
        document.getElementById('rv-group').textContent   = pax;
        goTo(4);
    }
});

document.getElementById('back4').addEventListener('click', () => goTo(3));
document.getElementById('submitBtn').addEventListener('click', () => {
    const consent = document.getElementById('agreeConsent');
    if (!consent.checked) { document.getElementById('consentErr').style.display = 'block'; return; }
    document.getElementById('consentErr').style.display = 'none';

    // Hide panels, show success
    document.querySelectorAll('.form-panel').forEach(p => p.classList.remove('active'));
    document.querySelector('.progress-bar-wrap').style.display = 'none';
    const ref = 'BTT-' + Math.floor(100000 + Math.random() * 900000);
    document.getElementById('refCode').textContent = 'REF: ' + ref;
    document.getElementById('successScreen').classList.add('show');
    document.querySelectorAll('.step').forEach(s => {
        s.classList.remove('active');
        s.classList.add('completed');
        s.querySelector('.step__num').innerHTML = '<i class="fa-solid fa-check" style="font-size:0.7rem;"></i>';
    });
    document.getElementById('progressBar').style.width = '100%';
    window.scrollTo({ top: 0, behavior: 'smooth' });
});

/* ── Set min date to today ────────────────────────────────────────── */
const today = new Date().toISOString().split('T')[0];
document.getElementById('depDate').min = today;
document.getElementById('retDate').min = today;
document.getElementById('depDate').addEventListener('change', e => {
    document.getElementById('retDate').min = e.target.value || today;
    updateSidebar();
});
</script>
</body>
</html>