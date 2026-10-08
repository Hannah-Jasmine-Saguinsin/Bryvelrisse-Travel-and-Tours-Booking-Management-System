<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Login | Bryvelrisse Travel and Tours</title>
<script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
        :root {
            --navy: #11263b;
            --dark: #1e4f6b;
            --mid: #306f91;
            --sky: #4fb8e0;
            --gold: #F0B13D;
            --white: #fff;
            --offwhite: #f5f9fb;
            --muted: #356b86;
            --error: #e05a4f;
            --ease: cubic-bezier(.4, 0, .2, 1);
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            font-size: 1rem;
            color: var(--navy);
            background: var(--navy);
            height: 100vh;
            height: 100dvh;
            display: flex;
            overflow: hidden;
        }

        /* ── Left Panel ── */
        .left-panel {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: clamp(1.5rem, 4vh, 3rem);
            overflow: hidden;
            height: 100%;
        }

        .left-panel__bg {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(17, 38, 59, .3) 0%, rgba(17, 38, 59, .65) 40%, rgba(17, 38, 59, .92) 100%),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><defs><linearGradient id="g1" x1="0%25" y1="0%25" x2="100%25" y2="100%25"><stop offset="0%25" stop-color="%230e2a3b"/><stop offset="50%25" stop-color="%23306f91"/><stop offset="100%25" stop-color="%234fb8e0"/></linearGradient></defs><rect fill="url(%23g1)" width="800" height="600"/><circle cx="600" cy="120" r="180" fill="%23F0B13D" opacity="0.12"/><circle cx="150" cy="500" r="120" fill="%234fb8e0" opacity="0.08"/><path d="M0 400 Q200 300 400 380 Q600 460 800 340 L800 600 L0 600Z" fill="%231e4f6b" opacity="0.6"/><path d="M0 450 Q200 370 400 430 Q600 490 800 400 L800 600 L0 600Z" fill="%230e2a3b" opacity="0.8"/></svg>');
            background-size: cover;
            background-position: center;
        }

        .particles,
        .stars {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(79, 184, 224, .15);
            animation: float linear infinite;
        }

        @keyframes float {
            0% {
                transform: translateY(100vh) scale(0);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: .6;
            }
            100% {
                transform: translateY(-100px) scale(1);
                opacity: 0;
            }
        }

        .plane-anim {
            position: absolute;
            top: 18%;
            left: -80px;
            font-size: 2.2rem;
            color: var(--gold);
            opacity: .7;
            animation: flyAcross 18s linear infinite;
            filter: drop-shadow(0 0 12px rgba(240, 177, 61, .4));
        }

        @keyframes flyAcross {
            0% {
                left: -80px;
                top: 18%;
                opacity: 0;
            }
            5% {
                opacity: .7;
            }
            95% {
                opacity: .7;
            }
            100% {
                left: calc(100% + 80px);
                top: 12%;
                opacity: 0;
            }
        }

        .star {
            position: absolute;
            width: 2px;
            height: 2px;
            background: #fff;
            border-radius: 50%;
            animation: twinkle ease-in-out infinite;
        }

        @keyframes twinkle {
            0%,
            100% {
                opacity: .2;
                transform: scale(1);
            }
            50% {
                opacity: 1;
                transform: scale(1.5);
            }
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-content__tag {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            background: rgba(240, 177, 61, .15);
            border: 1px solid rgba(240, 177, 61, .3);
            color: var(--gold);
            font-size: .75rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: .4rem .9rem;
            border-radius: 999px;
            margin-bottom: 1rem;
        }

        .left-content__heading {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.2rem, min(7vh, 5.5vw), 4rem);
            font-weight: 800;
            color: var(--white);
            line-height: 1;
            letter-spacing: .02em;
            margin-bottom: 1rem;
            text-shadow: 0 2px 30px rgba(0, 0, 0, .5);
        }

        .left-content__heading em {
            font-style: normal;
            color: var(--gold);
        }

        .left-content__sub {
            color: rgba(255, 255, 255, .65);
            font-size: .95rem;
            line-height: 1.6;
            max-width: 380px;
            margin-bottom: 1.4rem;
        }

        .trust-pills {
            display: flex;
            flex-wrap: wrap;
            gap: .6rem;
        }

        .trust-pill {
            display: flex;
            align-items: center;
            gap: .4rem;
            background: rgba(255, 255, 255, .06);
            border: 1px solid rgba(255, 255, 255, .12);
            color: rgba(255, 255, 255, .75);
            font-size: .78rem;
            font-weight: 700;
            padding: .38rem .85rem;
            border-radius: 999px;
            backdrop-filter: blur(4px);
        }

        .trust-pill i {
            color: var(--gold);
            font-size: .75rem;
        }

        /* ── Right Panel (always fits the viewport; scrolls only on very short screens) ── */
        .right-panel {
            width: clamp(420px, 40vw, 500px);
            flex-shrink: 0;
            background: var(--offwhite);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 1rem 2.2rem;
            position: relative;
            z-index: 10;
            height: 100%;
            overflow-y: auto;
        }

        .right-panel::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 0;
            bottom: 0;
            width: 60px;
            background: var(--offwhite);
            border-radius: 50% 0 0 50%/30% 0 0 30%;
        }

        .login-box {
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
            margin: auto 0;
        }

        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: .3rem;
            animation: fadeDown .6s var(--ease) both;
        }

        .login-logo img {
            height: clamp(120px, 9vh, 76px);
            width: auto;
            filter: drop-shadow(0 4px 16px rgba(48, 111, 145, .15));
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-16px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-greeting {
            text-align: center;
            margin-bottom: .9rem;
            animation: fadeDown .6s .1s var(--ease) both;
        }

        .login-greeting h1 {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: .15rem;
        }

        .login-greeting p {
            font-size: .8rem;
            color: var(--muted);
            font-weight: 500;
        }

        .auth-tabs {
            display: flex;
            background: #e3eef5;
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 1rem;
            animation: fadeDown .6s .15s var(--ease) both;
        }

        .auth-tab {
            flex: 1;
            text-align: center;
            padding: .45rem 0;
            font-size: .82rem;
            font-weight: 800;
            color: var(--muted);
            cursor: pointer;
            border-radius: 7px;
            transition: all .28s var(--ease);
            user-select: none;
        }

        .auth-tab.active {
            background: var(--white);
            color: var(--navy);
            box-shadow: 0 2px 10px rgba(48, 111, 145, .12);
        }

        .form-panel {
            display: none;
        }

        .form-panel.active {
            display: block;
            animation: panelIn .35s var(--ease) both;
        }

        @keyframes panelIn {
            from {
                opacity: 0;
                transform: translateY(8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Fields: error text is absolutely positioned so the layout never jumps */
        .field {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .field label {
            display: block;
            font-size: .8rem;
            font-weight: 800;
            color: var(--mid);
            margin-bottom: .25rem;
            letter-spacing: .2px;
        }

        .field label .req {
            color: var(--error);
            margin-left: 2px;
        }

        .input-wrap {
            position: relative;
        }

        .input-wrap>i {
            position: absolute;
            left: .85rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: .82rem;
            pointer-events: none;
            transition: color .2s;
        }

        .input-wrap input {
            width: 100%;
            padding: .6rem .85rem .6rem 2.3rem;
            border: 1.5px solid #d0e4ef;
            border-radius: 10px;
            font-family: 'Montserrat', sans-serif;
            font-size: .88rem;
            font-weight: 600;
            color: var(--navy);
            background: var(--white);
            outline: none;
            transition: border-color .25s, box-shadow .25s;
        }

        .input-wrap input::placeholder {
            color: #9aaab5;
            font-weight: 500;
        }

        .input-wrap input:focus {
            border-color: var(--sky);
            box-shadow: 0 0 0 3px rgba(79, 184, 224, .14);
        }

        .input-wrap input.err {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(224, 90, 79, .1);
        }

        .input-wrap input.ok {
            border-color: #3aaa6e;
        }

        .input-wrap:focus-within>i {
            color: var(--mid);
        }

        .input-wrap input[type=password],
        .input-wrap input.has-toggle {
            padding-right: 2.4rem;
        }

        .toggle-pw {
            position: absolute;
            right: .85rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--muted);
            font-size: .85rem;
            transition: color .2s;
        }

        .toggle-pw:hover {
            color: var(--mid);
        }

        .err-msg {
            position: absolute;
            left: 0;
            right: 0;
            top: 100%;
            margin-top: .12rem;
            font-size: .68rem;
            line-height: 1.2;
            color: var(--error);
            font-weight: 700;
            display: none;
        }

        .err-msg.show {
            display: block;
        }

        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin: -.55rem 0 .7rem;
        }

        .forgot-row a {
            font-size: .75rem;
            font-weight: 700;
            color: var(--mid);
            text-decoration: none;
            transition: color .2s;
        }

        .forgot-row a:hover {
            color: var(--dark);
        }

        .remember-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: .9rem;
        }

        .remember-row input {
            width: 15px;
            height: 15px;
            accent-color: var(--mid);
        }

        .remember-row label {
            font-size: .78rem;
            color: var(--muted);
            font-weight: 600;
            cursor: pointer;
        }

        .btn-primary {
            width: 100%;
            padding: .72rem;
            border: none;
            border-radius: 10px;
            background: var(--mid);
            color: var(--white);
            font-family: 'Montserrat', sans-serif;
            font-size: .92rem;
            font-weight: 800;
            letter-spacing: .3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .5rem;
            box-shadow: 0 6px 20px rgba(48, 111, 145, .28);
            transition: opacity .22s, transform .18s, box-shadow .22s, background .22s;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255, 255, 255, .08), transparent);
            pointer-events: none;
        }

        .btn-primary:hover {
            background: var(--dark);
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(48, 111, 145, .38);
        }

        .btn-primary:active {
            transform: translateY(1px) scale(.995);
            box-shadow: 0 3px 10px rgba(48, 111, 145, .18);
        }

        .btn-primary:focus-visible {
            outline: none;
            box-shadow: 0 0 0 6px rgba(79, 184, 224, .12), 0 8px 28px rgba(48, 111, 145, .28);
        }

        .btn-primary i {
            transition: transform .18s ease;
        }

        .btn-primary:active i {
            transform: translateX(3px) scale(.98);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: .8rem;
            margin: .9rem 0;
            color: var(--muted);
            font-size: .73rem;
            font-weight: 700;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1.5px;
            background: #d8eaf2;
        }

        .social-btns {
            display: flex;
            gap: .75rem;
        }

        .social-btn {
            flex: 1;
            padding: .55rem;
            border: 1.5px solid #d0e4ef;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: .45rem;
            font-family: 'Montserrat', sans-serif;
            font-size: .8rem;
            font-weight: 800;
            color: var(--navy);
            transition: border-color .22s, box-shadow .22s, transform .18s;
        }

        .social-btn:hover {
            border-color: var(--sky);
            box-shadow: 0 3px 12px rgba(79, 184, 224, .14);
            transform: translateY(-1px);
        }

        .social-btn .fb {
            color: #1877f2;
        }

        .social-btn .ggl {
            color: #ea4335;
        }

        .terms-note {
            text-align: center;
            font-size: .7rem;
            color: var(--muted);
            margin-top: .8rem;
            line-height: 1.5;
        }

        .terms-note a {
            color: var(--mid);
            font-weight: 700;
            text-decoration: none;
        }

        .terms-note a:hover {
            color: var(--dark);
        }

        .login-success {
            display: none;
            text-align: center;
            padding: 1rem 0;
            animation: panelIn .5s var(--ease) both;
        }

        .login-success.show {
            display: block;
        }

        .success-ring {
            width: 68px;
            height: 68px;
            border-radius: 50%;
            background: linear-gradient(135deg, #306f91, #4fb8e0);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.7rem;
            color: #fff;
            box-shadow: 0 8px 24px rgba(48, 111, 145, .3);
            animation: popIn .5s var(--ease) both;
        }

        @keyframes popIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            70% {
                transform: scale(1.12);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .login-success h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(1.7rem, 4.5vh, 2.2rem);
            font-weight: 800;
            line-height: 1.1;
            color: var(--navy);
            margin-bottom: .4rem;
        }

        .login-success p {
            font-size: .85rem;
            color: var(--muted);
            margin-bottom: 1.2rem;
        }

        .btn-go {
            display: inline-flex;
            align-items: center;
            gap: .5rem;
            padding: .65rem 1.6rem;
            background: linear-gradient(135deg, var(--dark), var(--sky));
            color: #fff;
            border-radius: 9px;
            font-weight: 800;
            font-size: .88rem;
            text-decoration: none;
            box-shadow: 0 4px 16px rgba(48, 111, 145, .25);
            transition: opacity .2s, transform .18s;
        }

        .btn-go:hover {
            opacity: .9;
            transform: translateY(-1px);
        }

        .back-site {
            display: flex;
            align-items: center;
            gap: .4rem;
            font-size: .76rem;
            font-weight: 700;
            color: var(--muted);
            text-decoration: none;
            margin-top: .9rem;
            justify-content: center;
            transition: color .2s;
        }

        .back-site:hover {
            color: var(--dark);
        }

        .alert-banner {
            background: rgba(224, 90, 79, .08);
            border: 1.5px solid rgba(224, 90, 79, .3);
            border-radius: 9px;
            padding: .5rem .8rem;
            font-size: .76rem;
            font-weight: 700;
            color: var(--error);
            display: none;
            align-items: center;
            gap: .5rem;
            margin-bottom: .8rem;
        }

        .alert-banner.show {
            display: flex;
            animation: panelIn .3s var(--ease) both;
        }

        .phone-prefix {
            position: absolute;
            left: .85rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: .78rem;
            font-weight: 800;
            color: var(--navy);
            display: flex;
            align-items: center;
            gap: .3rem;
            pointer-events: none;
        }

        .phone-prefix+input {
            padding-left: 4.2rem!important;
        }

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .7rem;
        }

        .strength-wrap {
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-top: .3rem;
        }

        .strength-bar {
            flex: 1;
            height: 4px;
            border-radius: 999px;
            background: #dde;
            overflow: hidden;
        }

        .strength-fill {
            height: 100%;
            border-radius: 999px;
            transition: width .3s, background .3s;
            width: 0;
        }

        .strength-label {
            font-size: .66rem;
            font-weight: 700;
            color: var(--muted);
            min-width: 44px;
            text-align: right;
        }

        #panelRegister .field {
            margin-bottom: 1.15rem;
        }

        #panelRegister .pw-field {
            margin-bottom: 1.35rem;
        }

        /* Responsive */
        @media (max-height:760px) {
            .login-greeting p {
                display: none;
            }
            .login-greeting {
                margin-bottom: .6rem;
            }
            .field {
                margin-bottom: 1.1rem;
            }
            #panelRegister .field {
                margin-bottom: 1.05rem;
            }
            .input-wrap input {
                padding-top: .5rem;
                padding-bottom: .5rem;
            }
            .divider {
                margin: .65rem 0;
            }
            .terms-note {
                margin-top: .55rem;
            }
            .back-site {
                margin-top: .6rem;
            }
        }

        @media (max-height:640px) {
            .login-logo img {
                height: 40px;
            }
            .login-greeting h1 {
                font-size: 1rem;
            }
        }

        /* ── Responsive: tablet & phone (single-column, page scrolls normally) ── */
        @media (max-width:900px) {
            html,
            body {
                height: auto;
            }
            body {
                min-height: 100vh;
                min-height: 100dvh;
                overflow-y: auto;
                overflow-x: hidden;
            }
            .left-panel {
                display: none;
            }
            .right-panel {
                width: 100%;
                height: auto;
                min-height: 100vh;
                min-height: 100dvh;
                overflow: visible;
                padding: 1.5rem max(1.5rem, env(safe-area-inset-right)) max(1.5rem, env(safe-area-inset-bottom)) max(1.5rem, env(safe-area-inset-left));
            }
            .right-panel::before {
                display: none;
            }
            .login-box {
                max-width: 460px;
            }
            .login-logo img {
                height: 64px;
            }
            .login-greeting p {
                display: block;
            }
            /* 16px inputs stop iOS Safari from zooming in on focus */
            .input-wrap input {
                font-size: 16px;
            }
        }

        /* Touch devices: larger tap targets */
        @media (pointer:coarse) {
            .auth-tab {
                padding: .7rem 0;
            }
            .toggle-pw {
                right: .3rem;
                padding: .6rem;
            }
            .social-btn,
            .btn-primary {
                min-height: 46px;
            }
            .remember-row input {
                width: 18px;
                height: 18px;
            }
        }

        /* Large phones / small tablets in portrait */
        @media (max-width:600px) {
            .right-panel {
                padding-top: 1.2rem;
            }
            .login-box {
                max-width: 100%;
            }
        }

        /* Phones: stack paired fields so nothing is cramped */
        @media (max-width:460px) {
            .two-col {
                grid-template-columns: 1fr;
                gap: 0;
            }
            .right-panel {
                padding-left: max(1.1rem, env(safe-area-inset-left));
                padding-right: max(1.1rem, env(safe-area-inset-right));
            }
            .login-greeting h1 {
                font-size: 1.05rem;
            }
            .alert-banner {
                font-size: .72rem;
            }
        }

        /* Very small phones (e.g. 320–360px) */
        @media (max-width:360px) {
            .social-btns {
                flex-direction: column;
            }
            .auth-tab {
                font-size: .78rem;
            }
            .terms-note {
                font-size: .66rem;
            }
        }

        /* Phones in landscape: short screen, so tighten spacing and hide extras */
        @media (max-height:500px) and (orientation:landscape) {
            .login-logo img {
                height: 36px;
            }
            .login-greeting {
                display: none;
            }
            .right-panel {
                padding-top: .8rem;
                padding-bottom: .8rem;
            }
        }

        /* Respect "reduce motion" settings */
        @media (prefers-reduced-motion:reduce) {
            *,
            *::before,
            *::after {
                animation-duration: .01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: .01ms !important;
            }
            .plane-anim,
            .particles {
                display: none;
            }
        }
    </style>
</head>
<body>

<!-- ── Left Immersive Panel ── -->
<div class="left-panel">
    <div class="left-panel__bg"></div>
    <div class="stars" id="stars"></div>
    <div class="particles" id="particles"></div>
    <div class="plane-anim"><i class="fa-solid fa-plane"></i></div>
    <div class="left-content">
        <div class="left-content__tag"><i class="fa-solid fa-compass"></i> Since 2019</div>
        <h1 class="left-content__heading">Your Journey<br>Begins <em>Here</em></h1>
        <p class="left-content__sub">Sign in to manage your bookings, explore destinations, and let us craft your perfect adventure.</p>
        <div class="trust-pills">
            <div class="trust-pill"><i class="fa-solid fa-check"></i> Tailored Packages</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> No Hidden Fees</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> 24/7 Support</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> Budget Friendly</div>
        </div>
    </div>
</div>

<!-- ── Right Form Panel ── -->
<div class="right-panel">
    <div class="login-box">

        <div class="login-logo">
            <a href="index.php" aria-label="Bryvelrisse Travel and Tours home">
                <img src="assets/images/Bryvelrisse-Logo.png" alt="Bryvelrisse Logo">
            </a>
        </div>

        <div class="login-greeting">
            <h1>Welcome Back</h1>
            <p>Sign in to continue your journey</p>
        </div>

        <div class="auth-tabs">
            <div class="auth-tab active" id="tabLogin" onclick="switchTab('login')">Sign In</div>
            <div class="auth-tab" id="tabRegister" onclick="switchTab('register')">Create Account</div>
        </div>

        <div class="alert-banner" id="alertBanner">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span id="alertMsg">Invalid email or password.</span>
        </div>

        <!-- ── Login Panel ── -->
        <div class="form-panel active" id="panelLogin">
            <div class="field">
                <label for="loginEmail">Email Address <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="loginEmail" placeholder="juan@email.com" autocomplete="email" maxlength="100">
                </div>
                <div class="err-msg" id="loginEmailErr"></div>
            </div>

            <div class="field">
                <label for="loginPw">Password <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="loginPw" placeholder="Enter your password" autocomplete="current-password" maxlength="64">
                    <span class="toggle-pw" onclick="togglePw('loginPw', this)"><i class="fa-regular fa-eye-slash"></i></span>
                </div>
                <div class="err-msg" id="loginPwErr"></div>
            </div>

            <div class="forgot-row">
                <a href="#" onclick="showForgot(); return false;">Forgot password?</a>
            </div>

            <div class="remember-row">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me on this device</label>
            </div>

            <button class="btn-primary" type="button" onclick="handleLogin()">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In
            </button>

            <div class="divider">or continue with</div>

            <div class="social-btns">
                <button class="social-btn" type="button" onclick="handleSocial('Facebook')"><i class="fa-brands fa-facebook fb"></i> Facebook</button>
                <button class="social-btn" type="button" onclick="handleSocial('Google')"><i class="fa-brands fa-google ggl"></i> Google</button>
            </div>

            <div class="terms-note">
                By signing in, you agree to our
                <a href="terms.php" target="_blank">Terms of Service</a> &amp; <a href="#">Privacy Policy</a>
            </div>
        </div>

        <!-- ── Register Panel ── -->
        <div class="form-panel" id="panelRegister">
            <div class="two-col">
                <div class="field">
                    <label for="regFirst">First Name <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="regFirst" placeholder="Juan" autocomplete="given-name" maxlength="40">
                    </div>
                    <div class="err-msg" id="regFirstErr"></div>
                </div>
                <div class="field">
                    <label for="regLast">Last Name <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="regLast" placeholder="Dela Cruz" autocomplete="family-name" maxlength="40">
                    </div>
                    <div class="err-msg" id="regLastErr"></div>
                </div>
            </div>

            <div class="field">
                <label for="regEmail">Email Address <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="regEmail" placeholder="juan@email.com" autocomplete="email" maxlength="100">
                </div>
                <div class="err-msg" id="regEmailErr"></div>
            </div>

            <div class="field">
                <label for="regPhone">Phone Number <span class="req">*</span></label>
                <div class="input-wrap">
                    <span class="phone-prefix">🇵🇭 +63</span>
                    <input type="tel" id="regPhone" placeholder="9XX XXX XXXX" autocomplete="tel-national" maxlength="14">
                </div>
                <div class="err-msg" id="regPhoneErr"></div>
            </div>

            <div class="two-col">
                <div class="field pw-field">
                    <label for="regPw">Password <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="regPw" placeholder="Min. 8 characters" autocomplete="new-password" maxlength="64">
                        <span class="toggle-pw" onclick="togglePw('regPw', this)"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                    <div class="strength-wrap">
                        <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                        <div class="strength-label" id="strengthLabel"></div>
                    </div>
                    <div class="err-msg" id="regPwErr"></div>
                </div>
                <div class="field pw-field">
                    <label for="regPwConf">Confirm <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="regPwConf" placeholder="Repeat password" autocomplete="new-password" maxlength="64">
                        <span class="toggle-pw" onclick="togglePw('regPwConf', this)"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                    <div class="err-msg" id="regPwConfErr"></div>
                </div>
            </div>

            <button class="btn-primary" type="button" onclick="handleRegister()">
                <i class="fa-solid fa-user-plus"></i> Create Account
            </button>

            <div class="terms-note">
                By creating an account you agree to our
                <a href="terms.php" target="_blank">Terms</a> &amp; <a href="#">Privacy Policy</a>
            </div>
        </div>

        <!-- ── Success Screen ── -->
        <div class="login-success" id="loginSuccess">
            <div class="success-ring"><i class="fa-solid fa-check"></i></div>
            <h2 id="successHeading">Welcome back!</h2>
            <p id="successMsg">You've signed in successfully. Redirecting you now…</p>
            <a href="index.php" class="btn-go"><i class="fa-solid fa-house"></i> Go to Home</a>
        </div>

        <a href="index.php" class="back-site"><i class="fa-solid fa-arrow-left"></i> Back to Bryvelrisse</a>
    </div>
</div>

<script>
/* ── Helpers ─────────────────────────────────────────────────── */
const $ = id => document.getElementById(id);

function switchTab(tab) {
    const isLogin = tab === 'login';
    $('tabLogin').classList.toggle('active', isLogin);
    $('tabRegister').classList.toggle('active', !isLogin);
    $('panelLogin').classList.toggle('active', isLogin);
    $('panelRegister').classList.toggle('active', !isLogin);
    $('loginSuccess').classList.remove('show');
    document.querySelector('.login-greeting h1').textContent = isLogin ? 'Welcome Back' : 'Join Bryvelrisse';
    document.querySelector('.login-greeting p').textContent  = isLogin ? 'Sign in to continue your journey' : 'Create an account to start planning';
    hideAlert();
}

function togglePw(id, btn) {
    const inp = $(id), isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    btn.innerHTML = isText ? '<i class="fa-regular fa-eye-slash"></i>' : '<i class="fa-regular fa-eye"></i>';
}

function restrictNameInput(id) {
    const input = $(id);
    if (!input) return;
    input.addEventListener('input', () => {
        input.value = input.value.replace(/[^A-Za-zÀ-ÖØ-öø-ÿñÑ\s.'-]/g, '');
    });
}

function showAlert(msg) { $('alertMsg').textContent = msg; $('alertBanner').classList.add('show'); }
function hideAlert()    { $('alertBanner').classList.remove('show'); }
const capitalise = s => s.charAt(0).toUpperCase() + s.slice(1);

/* ── Validation rules: each returns '' when valid, else an error message ── */
const EMAIL_RE = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.[A-Za-z]{2,}$/;
const NAME_RE  = /^[A-Za-zÀ-ÖØ-öø-ÿñÑ]+(?:[ '.\-][A-Za-zÀ-ÖØ-öø-ÿñÑ]+)*\.?$/;

const rules = {
    email(v) {
        v = v.trim();
        if (!v) return 'Email address is required.';
        if (/\s/.test(v)) return 'Email cannot contain spaces.';
        if (!EMAIL_RE.test(v)) return 'Enter a valid email (e.g. juan@email.com).';
        return '';
    },
    loginPw(v) { return v ? '' : 'Password is required.'; },
    name(v, label) {
        v = v.trim();
        if (!v) return label + ' is required.';
        if (v.length < 2) return 'At least 2 characters.';
        if (!NAME_RE.test(v)) return 'Letters, spaces, - . \' only.';
        return '';
    },
    phone(v) {
        const n = normalisePhone(v);
        if (!v.trim()) return 'Phone number is required.';
        if (/[^\d\s\-()+]/.test(v)) return 'Digits only, please.';
        if (!/^9\d{9}$/.test(n)) return 'Enter a valid PH mobile (9XX XXX XXXX).';
        return '';
    },
    newPw(v) {
        if (!v) return 'Password is required.';
        if (v.length < 8) return 'At least 8 characters.';
        if (/\s/.test(v)) return 'No spaces allowed.';
        const missing = [];
        if (!/[a-z]/.test(v)) missing.push('lowercase');
        if (!/[A-Z]/.test(v)) missing.push('uppercase');
        if (!/\d/.test(v))    missing.push('number');
        return missing.length ? 'Add: ' + missing.join(', ') + '.' : '';
    },
    confirm(v) {
        if (!v) return 'Please confirm your password.';
        return v === $('regPw').value ? '' : 'Passwords do not match.';
    }
};

/* Normalise PH numbers: accepts 9171234567, 09171234567, +639171234567, 63917... */
function normalisePhone(v) {
    let n = v.replace(/[\s\-()+]/g, '');
    if (n.startsWith('63') && n.length === 12) n = n.slice(2);
    else if (n.startsWith('0')) n = n.slice(1);
    return n;
}

/* Field registry: input id → [error id, validator] */
const fields = {
    loginEmail: ['loginEmailErr', v => rules.email(v)],
    loginPw:    ['loginPwErr',    v => rules.loginPw(v)],
    regFirst:   ['regFirstErr',   v => rules.name(v, 'First name')],
    regLast:    ['regLastErr',    v => rules.name(v, 'Last name')],
    regEmail:   ['regEmailErr',   v => rules.email(v)],
    regPhone:   ['regPhoneErr',   v => rules.phone(v)],
    regPw:      ['regPwErr',      v => rules.newPw(v)],
    regPwConf:  ['regPwConfErr',  v => rules.confirm(v)]
};

function validateField(id, silentOk) {
    const [errId, fn] = fields[id];
    const input = $(id), msg = fn(input.value);
    const errEl = $(errId);
    errEl.textContent = msg;
    errEl.classList.toggle('show', !!msg);
    input.classList.toggle('err', !!msg);
    input.classList.toggle('ok', !msg && !silentOk && input.value !== '');
    return !msg;
}

function validateAll(ids) {
    let firstBad = null;
    ids.forEach(id => { if (!validateField(id) && !firstBad) firstBad = id; });
    if (firstBad) $(firstBad).focus();
    return !firstBad;
}

/* Live validation: validate on blur, then re-check as the user types */
Object.keys(fields).forEach(id => {
    const el = $(id);
    el.addEventListener('blur', () => { el.dataset.touched = '1'; if (el.value !== '' || el.dataset.submitted) validateField(id); });
    el.addEventListener('input', () => {
        hideAlert();
        if (el.dataset.touched || el.dataset.submitted) validateField(id);
        if (id === 'regPw') {
            checkStrength(el.value);
            if ($('regPwConf').value) validateField('regPwConf');
        }
    });
});

['regFirst', 'regLast'].forEach(restrictNameInput);

/* Only allow phone-ish characters while typing */
$('regPhone').addEventListener('input', e => { e.target.value = e.target.value.replace(/[^\d\s\-()+]/g, ''); });

/* ── Password strength meter ─────────────────────────────────── */
function checkStrength(pw) {
    let score = 0;
    if (pw.length >= 8)                      score++;
    if (/[a-z]/.test(pw) && /[A-Z]/.test(pw)) score++;
    if (/\d/.test(pw))                       score++;
    if (/[^A-Za-z0-9]/.test(pw))             score++;
    const levels = [
        { w: '0%',   bg: 'transparent', txt: '' },
        { w: '25%',  bg: '#e05a4f',     txt: 'Weak' },
        { w: '55%',  bg: '#F0B13D',     txt: 'Fair' },
        { w: '78%',  bg: '#4fb8e0',     txt: 'Good' },
        { w: '100%', bg: '#3aaa6e',     txt: 'Strong' }
    ];
    const l = levels[pw.length === 0 ? 0 : Math.max(1, score)];
    $('strengthFill').style.width = l.w;
    $('strengthFill').style.background = l.bg;
    $('strengthLabel').textContent = l.txt;
    $('strengthLabel').style.color = l.bg;
}

/* ── Sign in ─────────────────────────────────────────────────── */
function handleLogin() {
    hideAlert();
    ['loginEmail', 'loginPw'].forEach(id => $(id).dataset.submitted = '1');
    if (!validateAll(['loginEmail', 'loginPw'])) return;

    /* Demo: any valid email + password works. Replace with a fetch() to your PHP auth endpoint. */
    showSuccess($('loginEmail').value.trim().split('@')[0], false);
}

/* ── Create account ──────────────────────────────────────────── */
function handleRegister() {
    hideAlert();
    const ids = ['regFirst', 'regLast', 'regEmail', 'regPhone', 'regPw', 'regPwConf'];
    ids.forEach(id => $(id).dataset.submitted = '1');
    if (!validateAll(ids)) return;

    /* Normalised values ready to send to PHP: */
    // const phone = '+63' + normalisePhone($('regPhone').value);
    showSuccess($('regFirst').value.trim(), true);
}

/* Press Enter to submit the active form */
document.addEventListener('keydown', e => {
    if (e.key !== 'Enter' || e.target.tagName === 'BUTTON' || e.target.type === 'checkbox') return;
    if (e.target.closest('#panelLogin'))    handleLogin();
    if (e.target.closest('#panelRegister')) handleRegister();
});

/* ── Success screen ──────────────────────────────────────────── */
function showSuccess(name, isNew) {
    $('panelLogin').classList.remove('active');
    $('panelRegister').classList.remove('active');
    hideAlert();
    $('successHeading').textContent = isNew ? 'Account Created! 🎉' : 'Welcome back, ' + capitalise(name) + '!';
    $('successMsg').textContent = isNew ? 'Your account is ready. Start planning your dream trip!' : "You're signed in. Ready to explore?";
    $('loginSuccess').classList.add('show');
}

function showForgot() { showAlert('Password reset is not yet available. Please contact us at bryvelrissetravelandtours@gmail.com'); }
function handleSocial(provider) { showAlert(provider + ' login is coming soon. Please use email for now.'); }

/* ── Background stars & particles ────────────────────────────── */
const starsEl = $('stars');
for (let i = 0; i < 60; i++) {
    const s = document.createElement('div');
    s.className = 'star';
    const big = Math.random() > .8 ? 3 : 2;
    s.style.cssText = `left:${Math.random()*100}%;top:${Math.random()*100}%;animation-duration:${2+Math.random()*4}s;animation-delay:${Math.random()*4}s;width:${big}px;height:${big}px;opacity:${.2+Math.random()*.5}`;
    starsEl.appendChild(s);
}
const partsEl = $('particles');
for (let i = 0; i < 12; i++) {
    const p = document.createElement('div');
    p.className = 'particle';
    const size = 20 + Math.random() * 60;
    p.style.cssText = `left:${Math.random()*100}%;width:${size}px;height:${size}px;animation-duration:${12+Math.random()*20}s;animation-delay:${Math.random()*15}s`;
    partsEl.appendChild(p);
}
</script>
</body>
</html>