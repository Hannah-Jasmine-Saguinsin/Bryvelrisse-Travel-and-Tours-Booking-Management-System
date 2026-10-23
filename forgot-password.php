<?php
require_once __DIR__ . '/back-end/database.php';

if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$message = '';
$success = false;
$email = isset($_GET['email']) && is_string($_GET['email'])
    ? trim($_GET['email'])
    : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['new_password'] ?? '';
    $confirm = $_POST['confirm_password'] ?? '';
    $csrf = $_POST['csrf_token'] ?? '';

    if (!hash_equals($_SESSION['csrf_token'], $csrf)) {
        $message = 'Your session expired. Please reload the page and try again.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
        $message = 'Please enter a valid registered email address.';
    } elseif ($password !== $confirm) {
        $message = 'The new passwords do not match.';
    } elseif (strlen($password) < 8 || preg_match('/\s/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
        $message = 'Password needs 8+ characters with uppercase, lowercase and a number.';
    } else {
        $find = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
        $find->execute([$email]);
        $user = $find->fetch();

        if (!$user) {
            $message = 'No account was found for that email address.';
        } else {
            $update = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
            $update->execute([password_hash($password, PASSWORD_DEFAULT), $user['id']]);
            $success = true;
            $message = 'Your password has been updated successfully.';
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Reset Password | Bryvelrisse Travel and Tours</title>
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
            --ok: #3aaa6e;
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

        /* ── Right Panel ── */
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
            margin-bottom: 1.1rem;
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

        .form-panel {
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
            border-color: var(--ok);
        }

        .input-wrap:focus-within>i {
            color: var(--mid);
        }

        .input-wrap input[type=password] {
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

        .pw-field {
            margin-bottom: 1.45rem;
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

        .btn-primary:disabled {
            cursor: not-allowed;
            transform: none;
        }

        .btn-primary i {
            transition: transform .18s ease;
        }

        .btn-primary:active i {
            transform: translateX(3px) scale(.98);
        }

        .terms-note {
            text-align: center;
            font-size: .7rem;
            color: var(--muted);
            margin-top: .8rem;
            line-height: 1.5;
        }

        .alert-banner {
            background: rgba(224, 90, 79, .08);
            border: 1.5px solid rgba(224, 90, 79, .3);
            border-radius: 9px;
            padding: .5rem .8rem;
            font-size: .76rem;
            font-weight: 700;
            color: var(--error);
            display: flex;
            align-items: center;
            gap: .5rem;
            margin-bottom: .8rem;
            animation: panelIn .3s var(--ease) both;
        }

        .alert-banner.success {
            background: rgba(58, 170, 110, .09);
            border-color: rgba(58, 170, 110, .35);
            color: #236b43;
        }

        .login-success {
            text-align: center;
            padding: 1rem 0;
            animation: panelIn .5s var(--ease) both;
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
            .pw-field {
                margin-bottom: 1.3rem;
            }
            .input-wrap input {
                padding-top: .5rem;
                padding-bottom: .5rem;
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
            .input-wrap input {
                font-size: 16px;
            }
        }

        @media (pointer:coarse) {
            .toggle-pw {
                right: .3rem;
                padding: .6rem;
            }
            .btn-primary {
                min-height: 46px;
            }
        }

        @media (max-width:600px) {
            .right-panel {
                padding-top: 1.2rem;
            }
            .login-box {
                max-width: 100%;
            }
        }

        @media (max-width:460px) {
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
        <h1 class="left-content__heading">Back on<br>Your <em>Way</em></h1>
        <p class="left-content__sub">Lost your password? No worries. Set a new one and get back to managing your bookings and planning your next adventure.</p>
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

        <?php if ($success): ?>

            <!-- ── Success Screen ── -->
            <div class="login-success">
                <div class="success-ring"><i class="fa-solid fa-check"></i></div>
                <h2>Password Updated!</h2>
                <p><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?> You can now sign in with your new password.</p>
                <a href="login.php" class="btn-go"><i class="fa-solid fa-arrow-right-to-bracket"></i> Return to Login</a>
            </div>

        <?php else: ?>

            <div class="login-greeting">
                <h1>Reset Password</h1>
                <p>Enter your registered email and choose a new password</p>
            </div>

            <?php if ($message !== ''): ?>
                <div class="alert-banner" role="alert">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    <span><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?></span>
                </div>
            <?php endif; ?>

            <!-- ── Reset Form ── -->
            <form class="form-panel" id="resetForm" method="post" action="forgot-password.php" novalidate>
                <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'], ENT_QUOTES, 'UTF-8') ?>">

                <div class="field">
                    <label for="email">Registered Email <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-regular fa-envelope"></i>
                        <input type="email" id="email" name="email" placeholder="juan@email.com" autocomplete="email" maxlength="150" required value="<?= htmlspecialchars($email, ENT_QUOTES, 'UTF-8') ?>">
                    </div>
                    <div class="err-msg" id="emailErr"></div>
                </div>

                <div class="field pw-field">
                    <label for="new_password">New Password <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="new_password" name="new_password" placeholder="Min. 8 characters" autocomplete="new-password" minlength="8" maxlength="64" required>
                        <span class="toggle-pw" onclick="togglePw('new_password', this)"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                    <div class="strength-wrap">
                        <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                        <div class="strength-label" id="strengthLabel"></div>
                    </div>
                    <div class="err-msg" id="new_passwordErr"></div>
                </div>

                <div class="field">
                    <label for="confirm_password">Confirm New Password <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat new password" autocomplete="new-password" minlength="8" maxlength="64" required>
                        <span class="toggle-pw" onclick="togglePw('confirm_password', this)"><i class="fa-regular fa-eye-slash"></i></span>
                    </div>
                    <div class="err-msg" id="confirm_passwordErr"></div>
                </div>

                <button class="btn-primary" type="submit" id="submitBtn">
                    <i class="fa-solid fa-key"></i> Update Password
                </button>
                
            </form>

        <?php endif; ?>

        <a href="login.php" class="back-site"><i class="fa-solid fa-arrow-left"></i> Back to login</a>
    </div>
</div>

<script>
const $ = id => document.getElementById(id);

function togglePw(id, btn) {
    const inp = $(id), isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    btn.innerHTML = isText ? '<i class="fa-regular fa-eye-slash"></i>' : '<i class="fa-regular fa-eye"></i>';
}

/* ── Client-side validation (the server re-checks everything) ── */
const EMAIL_RE = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9-]+(\.[A-Za-z0-9-]+)*\.[A-Za-z]{2,}$/;

const rules = {
    email(v) {
        v = v.trim();
        if (!v) return 'Email address is required.';
        if (/\s/.test(v)) return 'Email cannot contain spaces.';
        if (!EMAIL_RE.test(v)) return 'Enter a valid email (e.g. juan@email.com).';
        return '';
    },
    new_password(v) {
        if (!v) return 'Password is required.';
        if (v.length < 8) return 'At least 8 characters.';
        if (/\s/.test(v)) return 'No spaces allowed.';
        const missing = [];
        if (!/[a-z]/.test(v)) missing.push('lowercase');
        if (!/[A-Z]/.test(v)) missing.push('uppercase');
        if (!/\d/.test(v))    missing.push('number');
        return missing.length ? 'Add: ' + missing.join(', ') + '.' : '';
    },
    confirm_password(v) {
        if (!v) return 'Please confirm your password.';
        return v === $('new_password').value ? '' : 'Passwords do not match.';
    }
};

function validateField(id) {
    const input = $(id), msg = rules[id](input.value), errEl = $(id + 'Err');
    errEl.textContent = msg;
    errEl.classList.toggle('show', !!msg);
    input.classList.toggle('err', !!msg);
    input.classList.toggle('ok', !msg && input.value !== '');
    return !msg;
}

function checkStrength(pw) {
    let score = 0;
    if (pw.length >= 8)                       score++;
    if (/[a-z]/.test(pw) && /[A-Z]/.test(pw)) score++;
    if (/\d/.test(pw))                        score++;
    if (/[^A-Za-z0-9]/.test(pw))              score++;
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

const form = $('resetForm');
if (form) {
    ['email', 'new_password', 'confirm_password'].forEach(id => {
        const el = $(id);
        el.addEventListener('blur', () => { el.dataset.touched = '1'; if (el.value !== '') validateField(id); });
        el.addEventListener('input', () => {
            if (el.dataset.touched || el.dataset.submitted) validateField(id);
            if (id === 'new_password') {
                checkStrength(el.value);
                if ($('confirm_password').value) validateField('confirm_password');
            }
        });
    });

    form.addEventListener('submit', e => {
        const ids = ['email', 'new_password', 'confirm_password'];
        ids.forEach(id => $(id).dataset.submitted = '1');
        let firstBad = null;
        ids.forEach(id => { if (!validateField(id) && !firstBad) firstBad = id; });
        if (firstBad) { e.preventDefault(); $(firstBad).focus(); return; }
        const btn = $('submitBtn');
        btn.disabled = true;
        btn.style.opacity = '.7';
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Please wait…';
    });
}

/* ── Background stars & particles ── */
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
