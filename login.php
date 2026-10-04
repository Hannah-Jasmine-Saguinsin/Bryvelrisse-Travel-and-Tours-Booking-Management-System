<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Bryvelrisse Travel and Tours</title>
    <script src="https://kit.fontawesome.com/6a1f3f4237.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;600;700&family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --navy:   #0e2a3b;
            --dark:   #1e4f6b;
            --mid:    #306f91;
            --sky:    #4fb8e0;
            --gold:   #F0B13D;
            --gold2:  #c8891f;
            --white:  #ffffff;
            --offwhite: #f2f8fc;
            --muted:  #7aa3b8;
            --error:  #e05a4f;
            --ease:   cubic-bezier(0.4,0,0.2,1);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Nunito', sans-serif;
            background: var(--navy);
            min-height: 100vh;
            display: flex;
            overflow: hidden;
        }

        /* ── Left Panel ───────────────────────────────────────────── */
        .left-panel {
            flex: 1;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 3rem;
            overflow: hidden;
            min-height: 100vh;
        }

        .left-panel__bg {
            position: absolute;
            inset: 0;
            background:
                linear-gradient(160deg,
                    rgba(14,42,59,0.3) 0%,
                    rgba(14,42,59,0.65) 40%,
                    rgba(14,42,59,0.92) 100%),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 800 600"><defs><linearGradient id="g1" x1="0%25" y1="0%25" x2="100%25" y2="100%25"><stop offset="0%25" stop-color="%230e2a3b"/><stop offset="50%25" stop-color="%23306f91"/><stop offset="100%25" stop-color="%234fb8e0"/></linearGradient></defs><rect fill="url(%23g1)" width="800" height="600"/><circle cx="600" cy="120" r="180" fill="%23F0B13D" opacity="0.12"/><circle cx="150" cy="500" r="120" fill="%234fb8e0" opacity="0.08"/><path d="M0 400 Q200 300 400 380 Q600 460 800 340 L800 600 L0 600Z" fill="%231e4f6b" opacity="0.6"/><path d="M0 450 Q200 370 400 430 Q600 490 800 400 L800 600 L0 600Z" fill="%230e2a3b" opacity="0.8"/></svg>');
            background-size: cover;
            background-position: center;
        }

        /* Animated particles */
        .particles {
            position: absolute;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            background: rgba(79,184,224,0.15);
            animation: float linear infinite;
        }
        @keyframes float {
            0%   { transform: translateY(100vh) scale(0); opacity: 0; }
            10%  { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { transform: translateY(-100px) scale(1); opacity: 0; }
        }

        /* Animated airplane */
        .plane-anim {
            position: absolute;
            top: 18%;
            left: -80px;
            font-size: 2.2rem;
            color: var(--gold);
            opacity: 0.7;
            animation: flyAcross 18s linear infinite;
            filter: drop-shadow(0 0 12px rgba(240,177,61,0.4));
        }
        @keyframes flyAcross {
            0%   { left: -80px; top: 18%; opacity: 0; }
            5%   { opacity: 0.7; }
            95%  { opacity: 0.7; }
            100% { left: calc(100% + 80px); top: 12%; opacity: 0; }
        }

        /* Stars */
        .stars {
            position: absolute;
            inset: 0;
            pointer-events: none;
        }
        .star {
            position: absolute;
            width: 2px; height: 2px;
            background: #fff;
            border-radius: 50%;
            animation: twinkle ease-in-out infinite;
        }
        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50%       { opacity: 1;   transform: scale(1.5); }
        }

        .left-content {
            position: relative;
            z-index: 2;
        }

        .left-content__tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(240,177,61,0.15);
            border: 1px solid rgba(240,177,61,0.3);
            color: var(--gold);
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            padding: 0.4rem 0.9rem;
            border-radius: 999px;
            margin-bottom: 1.2rem;
        }

        .left-content__heading {
            font-family: 'Cinzel', serif;
            font-size: clamp(2.2rem, 4vw, 3.5rem);
            font-weight: 700;
            color: var(--white);
            line-height: 1.15;
            margin-bottom: 1rem;
            text-shadow: 0 2px 30px rgba(0,0,0,0.5);
        }
        .left-content__heading em {
            font-style: normal;
            color: var(--gold);
        }

        .left-content__sub {
            color: rgba(255,255,255,0.65);
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.7;
            max-width: 380px;
            margin-bottom: 2rem;
        }

        .trust-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
        }
        .trust-pill {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            color: rgba(255,255,255,0.75);
            font-size: 0.78rem;
            font-weight: 700;
            padding: 0.38rem 0.85rem;
            border-radius: 999px;
            backdrop-filter: blur(4px);
        }
        .trust-pill i { color: var(--gold); font-size: 0.75rem; }

        /* ── Right Panel ───────────────────────────────────────────── */
        .right-panel {
            width: 480px;
            flex-shrink: 0;
            background: var(--offwhite);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2.5rem 2.8rem;
            position: relative;
            z-index: 10;
            min-height: 100vh;
            overflow-y: auto;
        }

        /* Subtle wave on left edge */
        .right-panel::before {
            content: '';
            position: absolute;
            left: -30px;
            top: 0;
            bottom: 0;
            width: 60px;
            background: var(--offwhite);
            border-radius: 50% 0 0 50% / 30% 0 0 30%;
        }

        .login-box {
            width: 100%;
            max-width: 360px;
            position: relative;
            z-index: 1;
        }

        /* Logo */
        .login-logo {
            display: flex;
            justify-content: center;
            margin-bottom: 0.5rem;
            animation: fadeDown 0.6s var(--ease) both;
        }
        .login-logo img {
            height: 90px;
            width: auto;
            filter: drop-shadow(0 4px 16px rgba(48,111,145,0.15));
        }

        @keyframes fadeDown {
            from { opacity: 0; transform: translateY(-16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .login-greeting {
            text-align: center;
            margin-bottom: 2rem;
            animation: fadeDown 0.6s 0.1s var(--ease) both;
        }
        .login-greeting h1 {
            font-family: 'Cinzel', serif;
            font-size: 1.45rem;
            font-weight: 700;
            color: var(--navy);
            margin-bottom: 0.25rem;
        }
        .login-greeting p {
            font-size: 0.85rem;
            color: var(--muted);
            font-weight: 500;
        }

        /* Tabs */
        .auth-tabs {
            display: flex;
            background: #e3eef5;
            border-radius: 10px;
            padding: 4px;
            margin-bottom: 1.8rem;
            animation: fadeDown 0.6s 0.15s var(--ease) both;
        }
        .auth-tab {
            flex: 1;
            text-align: center;
            padding: 0.55rem 0;
            font-size: 0.85rem;
            font-weight: 800;
            color: var(--muted);
            cursor: pointer;
            border-radius: 7px;
            transition: all 0.28s var(--ease);
            user-select: none;
        }
        .auth-tab.active {
            background: var(--white);
            color: var(--dark);
            box-shadow: 0 2px 10px rgba(48,111,145,0.12);
        }

        /* Form panels */
        .form-panel { display: none; }
        .form-panel.active {
            display: block;
            animation: panelIn 0.35s var(--ease) both;
        }
        @keyframes panelIn {
            from { opacity: 0; transform: translateY(8px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* Field */
        .field {
            margin-bottom: 1rem;
        }
        .field label {
            display: block;
            font-size: 0.77rem;
            font-weight: 800;
            color: var(--dark);
            margin-bottom: 0.35rem;
            letter-spacing: 0.2px;
        }
        .field label .req { color: var(--error); margin-left: 2px; }

        .input-wrap {
            position: relative;
        }
        .input-wrap i {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
            font-size: 0.85rem;
            pointer-events: none;
            transition: color 0.2s;
        }
        .input-wrap input {
            width: 100%;
            padding: 0.7rem 0.9rem 0.7rem 2.4rem;
            border: 1.5px solid #d0e4ef;
            border-radius: 10px;
            font-family: 'Nunito', sans-serif;
            font-size: 0.88rem;
            font-weight: 600;
            color: var(--navy);
            background: var(--white);
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s;
        }
        .input-wrap input:focus {
            border-color: var(--sky);
            box-shadow: 0 0 0 3px rgba(79,184,224,0.14);
        }
        .input-wrap input.err {
            border-color: var(--error);
            box-shadow: 0 0 0 3px rgba(224,90,79,0.1);
        }
        .input-wrap input:focus ~ i,
        .input-wrap:focus-within i { color: var(--mid); }

        /* Toggle password */
        .toggle-pw {
            position: absolute;
            right: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--muted);
            font-size: 0.85rem;
            transition: color 0.2s;
            pointer-events: all;
        }
        .toggle-pw:hover { color: var(--mid); }

        .err-msg {
            font-size: 0.73rem;
            color: var(--error);
            font-weight: 700;
            margin-top: 0.28rem;
            display: none;
        }
        .err-msg.show { display: block; }

        /* Forgot */
        .forgot-row {
            display: flex;
            justify-content: flex-end;
            margin-top: -0.3rem;
            margin-bottom: 1.3rem;
        }
        .forgot-row a {
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--mid);
            text-decoration: none;
            transition: color 0.2s;
        }
        .forgot-row a:hover { color: var(--dark); }

        /* Remember me */
        .remember-row {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1.3rem;
        }
        .remember-row input[type=checkbox] {
            width: 15px; height: 15px;
            accent-color: var(--mid);
        }
        .remember-row label {
            font-size: 0.8rem;
            color: var(--muted);
            font-weight: 600;
            cursor: pointer;
        }

        /* Primary button */
        .btn-primary {
            width: 100%;
            padding: 0.82rem;
            border: none;
            border-radius: 10px;
            background: linear-gradient(135deg, var(--dark) 0%, var(--sky) 100%);
            color: var(--white);
            font-family: 'Nunito', sans-serif;
            font-size: 0.95rem;
            font-weight: 800;
            letter-spacing: 0.3px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            box-shadow: 0 6px 20px rgba(48,111,145,0.28);
            transition: opacity 0.22s, transform 0.18s, box-shadow 0.22s;
            position: relative;
            overflow: hidden;
        }
        .btn-primary::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.08), transparent);
        }
        .btn-primary:hover {
            opacity: 0.93;
            transform: translateY(-1px);
            box-shadow: 0 8px 28px rgba(48,111,145,0.38);
        }
        .btn-primary:active {
            transform: translateY(1px) scale(0.995);
            box-shadow: 0 3px 10px rgba(48,111,145,0.18);
            opacity: 0.98;
        }
        .btn-primary:focus-visible {
            outline: none;
            box-shadow: 0 0 0 6px rgba(79,184,224,0.12), 0 8px 28px rgba(48,111,145,0.28);
        }

        /* explicit active state when toggled via JS */
        .btn-primary.active {
            transform: translateY(-1px);
            box-shadow: 0 10px 34px rgba(48,111,145,0.42);
            opacity: 1;
        }
        .btn-primary i { transition: transform 0.18s ease, opacity 0.18s ease; }
        .btn-primary:active i { transform: translateX(3px) scale(0.98); opacity: 0.95; }

        /* Divider */
        .divider {
            display: flex;
            align-items: center;
            gap: 0.8rem;
            margin: 1.3rem 0;
            color: #b0ccd8;
            font-size: 0.75rem;
            font-weight: 700;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1.5px;
            background: #d8eaf2;
        }

        /* Social buttons */
        .social-btns {
            display: flex;
            gap: 0.75rem;
        }
        .social-btn {
            flex: 1;
            padding: 0.65rem;
            border: 1.5px solid #d0e4ef;
            border-radius: 10px;
            background: var(--white);
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.45rem;
            font-family: 'Nunito', sans-serif;
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--dark);
            transition: border-color 0.22s, box-shadow 0.22s, transform 0.18s;
        }
        .social-btn:hover {
            border-color: var(--sky);
            box-shadow: 0 3px 12px rgba(79,184,224,0.14);
            transform: translateY(-1px);
        }
        .social-btn .fb  { color: #1877f2; }
        .social-btn .ggl { color: #ea4335; }

        /* Terms note */
        .terms-note {
            text-align: center;
            font-size: 0.73rem;
            color: var(--muted);
            margin-top: 1.3rem;
            line-height: 1.6;
        }
        .terms-note a { color: var(--mid); font-weight: 700; text-decoration: none; }
        .terms-note a:hover { color: var(--dark); }

        /* Success state */
        .login-success {
            display: none;
            text-align: center;
            padding: 1rem 0;
            animation: panelIn 0.5s var(--ease) both;
        }
        .login-success.show { display: block; }
        .success-ring {
            width: 72px; height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, #306f91, #4fb8e0);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.2rem;
            font-size: 1.8rem;
            color: #fff;
            box-shadow: 0 8px 24px rgba(48,111,145,0.3);
            animation: popIn 0.5s var(--ease) both;
        }
        @keyframes popIn {
            0%   { transform: scale(0); opacity: 0; }
            70%  { transform: scale(1.12); }
            100% { transform: scale(1);  opacity: 1; }
        }
        .login-success h2 {
            font-family: 'Cinzel', serif;
            font-size: 1.3rem;
            color: var(--navy);
            margin-bottom: 0.4rem;
        }
        .login-success p {
            font-size: 0.85rem;
            color: var(--muted);
            margin-bottom: 1.5rem;
        }
        .btn-go {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.7rem 1.8rem;
            background: linear-gradient(135deg, var(--dark), var(--sky));
            color: #fff;
            border-radius: 9px;
            font-weight: 800;
            font-size: 0.9rem;
            text-decoration: none;
            box-shadow: 0 4px 16px rgba(48,111,145,0.25);
            transition: opacity 0.2s, transform 0.18s;
        }
        .btn-go:hover { opacity: 0.9; transform: translateY(-1px); }

        /* Back to site */
        .back-site {
            display: flex;
            align-items: center;
            gap: 0.4rem;
            font-size: 0.78rem;
            font-weight: 700;
            color: var(--muted);
            text-decoration: none;
            margin-top: 1.8rem;
            justify-content: center;
            transition: color 0.2s;
        }
        .back-site:hover { color: var(--dark); }

        /* Alert banner */
        .alert-banner {
            background: rgba(224,90,79,0.08);
            border: 1.5px solid rgba(224,90,79,0.3);
            border-radius: 9px;
            padding: 0.65rem 0.9rem;
            font-size: 0.8rem;
            font-weight: 700;
            color: var(--error);
            display: none;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        .alert-banner.show { display: flex; animation: panelIn 0.3s var(--ease) both; }

        /* Phone field flag */
        .phone-prefix {
            position: absolute;
            left: 0.9rem;
            top: 50%;
            transform: translateY(-50%);
            font-size: 0.8rem;
            font-weight: 800;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 0.3rem;
            pointer-events: none;
        }
        .phone-prefix + input { padding-left: 3.8rem !important; }

        /* Name row */
        .name-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.75rem;
        }

        /* Strength bar */
        .strength-wrap { margin-top: 0.4rem; }
        .strength-bar {
            height: 4px;
            border-radius: 999px;
            background: #dde;
            overflow: hidden;
            margin-bottom: 0.25rem;
        }
        .strength-fill {
            height: 100%;
            border-radius: 999px;
            transition: width 0.3s, background 0.3s;
            width: 0%;
        }
        .strength-label {
            font-size: 0.7rem;
            font-weight: 700;
            color: var(--muted);
        }

        /* Responsive */
        @media (max-width: 900px) {
            .left-panel { display: none; }
            .right-panel { width: 100%; padding: 2rem 1.5rem; min-height: 100vh; }
            .right-panel::before { display: none; }
        }
        @media (max-width: 420px) {
            .right-panel { padding: 1.5rem 1.2rem; }
            .name-row { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<!-- ── Left Immersive Panel ─────────────────────────────────────────── -->
<div class="left-panel">
    <div class="left-panel__bg"></div>

    <!-- Stars -->
    <div class="stars" id="stars"></div>

    <!-- Particles -->
    <div class="particles" id="particles"></div>

    <!-- Airplane -->
    <div class="plane-anim"><i class="fa-solid fa-plane"></i></div>

    <div class="left-content">
        <div class="left-content__tag">
            <i class="fa-solid fa-compass"></i> Since 2019
        </div>
        <h1 class="left-content__heading">
            Your Journey<br>Begins <em>Here</em>
        </h1>
        <p class="left-content__sub">
            Sign in to manage your bookings, explore destinations, and let us craft your perfect adventure.
        </p>
        <div class="trust-pills">
            <div class="trust-pill"><i class="fa-solid fa-check"></i> Tailored Packages</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> No Hidden Fees</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> 24/7 Support</div>
            <div class="trust-pill"><i class="fa-solid fa-check"></i> Budget Friendly</div>
        </div>
    </div>
</div>

<!-- ── Right Form Panel ─────────────────────────────────────────────── -->
<div class="right-panel">
    <div class="login-box">

        <!-- Logo -->
        <div class="login-logo">
            <img src="assets/Bryvelrisse-Logo.png" alt="Bryvelrisse Logo">
        </div>

        <div class="login-greeting">
            <h1>Welcome Back</h1>
            <p>Sign in to continue your journey</p>
        </div>

        <!-- Tabs -->
        <div class="auth-tabs">
            <div class="auth-tab active" id="tabLogin" onclick="switchTab('login')">Sign In</div>
            <div class="auth-tab" id="tabRegister" onclick="switchTab('register')">Create Account</div>
        </div>

        <!-- Alert banner -->
        <div class="alert-banner" id="alertBanner">
            <i class="fa-solid fa-circle-exclamation"></i>
            <span id="alertMsg">Invalid email or password.</span>
        </div>

        <!-- ── Login Panel ──────────────────────────────────────── -->
        <div class="form-panel active" id="panelLogin">
            <div class="field">
                <label>Email Address <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="loginEmail" placeholder="juan@email.com" autocomplete="email">
                </div>
                <div class="err-msg" id="loginEmailErr">Please enter a valid email.</div>
            </div>

            <div class="field">
                <label>Password <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="loginPw" placeholder="Enter your password" autocomplete="current-password">
                    <span class="toggle-pw" onclick="togglePw('loginPw', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="err-msg" id="loginPwErr">Password is required.</div>
            </div>

            <div class="forgot-row">
                <a href="#" onclick="showForgot(); return false;">Forgot password?</a>
            </div>

            <div class="remember-row">
                <input type="checkbox" id="rememberMe">
                <label for="rememberMe">Remember me on this device</label>
            </div>

            <button class="btn-primary" onclick="handleLogin()">
                <i class="fa-solid fa-arrow-right-to-bracket"></i> Sign In
            </button>

            <div class="divider">or continue with</div>

            <div class="social-btns">
                <button class="social-btn" onclick="handleSocial('Facebook')">
                    <i class="fa-brands fa-facebook fb"></i> Facebook
                </button>
                <button class="social-btn" onclick="handleSocial('Google')">
                    <i class="fa-brands fa-google ggl"></i> Google
                </button>
            </div>

            <div class="terms-note">
                By signing in, you agree to our
                <a href="terms.html" target="_blank">Terms of Service</a> &amp;
                <a href="#">Privacy Policy</a>
            </div>
        </div>

        <!-- ── Register Panel ───────────────────────────────────── -->
        <div class="form-panel" id="panelRegister">
            <div class="name-row">
                <div class="field">
                    <label>First Name <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="regFirst" placeholder="Juan">
                    </div>
                    <div class="err-msg" id="regFirstErr">Required.</div>
                </div>
                <div class="field">
                    <label>Last Name <span class="req">*</span></label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" id="regLast" placeholder="Dela Cruz">
                    </div>
                    <div class="err-msg" id="regLastErr">Required.</div>
                </div>
            </div>

            <div class="field">
                <label>Email Address <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="regEmail" placeholder="juan@email.com" autocomplete="email">
                </div>
                <div class="err-msg" id="regEmailErr">Enter a valid email.</div>
            </div>

            <div class="field">
                <label>Phone Number <span class="req">*</span></label>
                <div class="input-wrap" style="position:relative;">
                    <span class="phone-prefix">🇵🇭 +63</span>
                    <input type="tel" id="regPhone" placeholder="9XX XXX XXXX" style="padding-left:3.8rem;">
                </div>
                <div class="err-msg" id="regPhoneErr">Enter a valid phone number.</div>
            </div>

            <div class="field">
                <label>Password <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="regPw" placeholder="Create a strong password" oninput="checkStrength(this.value)" autocomplete="new-password">
                    <span class="toggle-pw" onclick="togglePw('regPw', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="strength-wrap">
                    <div class="strength-bar"><div class="strength-fill" id="strengthFill"></div></div>
                    <div class="strength-label" id="strengthLabel"></div>
                </div>
                <div class="err-msg" id="regPwErr">Password must be at least 8 characters.</div>
            </div>

            <div class="field">
                <label>Confirm Password <span class="req">*</span></label>
                <div class="input-wrap">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="regPwConf" placeholder="Repeat your password" autocomplete="new-password">
                    <span class="toggle-pw" onclick="togglePw('regPwConf', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span>
                </div>
                <div class="err-msg" id="regPwConfErr">Passwords do not match.</div>
            </div>

            <button class="btn-primary" onclick="handleRegister()" style="margin-top:0.5rem;">
                <i class="fa-solid fa-user-plus"></i> Create Account
            </button>

            <div class="terms-note" style="margin-top:1rem;">
                By creating an account you agree to our
                <a href="terms.html" target="_blank">Terms</a> &amp;
                <a href="#">Privacy Policy</a>
            </div>
        </div>

        <!-- ── Success Screen ───────────────────────────────────── -->
        <div class="login-success" id="loginSuccess">
            <div class="success-ring"><i class="fa-solid fa-check"></i></div>
            <h2 id="successHeading">Welcome back!</h2>
            <p id="successMsg">You've signed in successfully. Redirecting you now…</p>
            <a href="index.html" class="btn-go"><i class="fa-solid fa-house"></i> Go to Home</a>
        </div>

        <!-- Back to site -->
        <a href="index.html" class="back-site">
            <i class="fa-solid fa-arrow-left"></i> Back to Bryvelrisse
        </a>
    </div>
</div>

<script>
/* ── Tab switching ───────────────────────────────────────────── */
function switchTab(tab) {
    const isLogin = tab === 'login';
    document.getElementById('tabLogin').classList.toggle('active', isLogin);
    document.getElementById('tabRegister').classList.toggle('active', !isLogin);
    document.getElementById('panelLogin').classList.toggle('active', isLogin);
    document.getElementById('panelRegister').classList.toggle('active', !isLogin);
    hideAlert();
}

/* ── Toggle password visibility ─────────────────────────────── */
function togglePw(id, btn) {
    const inp = document.getElementById(id);
    const isText = inp.type === 'text';
    inp.type = isText ? 'password' : 'text';
    btn.innerHTML = isText
        ? '<i class="fa-regular fa-eye"></i>'
        : '<i class="fa-regular fa-eye-slash"></i>';
}

/* ── Password strength ───────────────────────────────────────── */
function checkStrength(pw) {
    const fill  = document.getElementById('strengthFill');
    const label = document.getElementById('strengthLabel');
    let score = 0;
    if (pw.length >= 8)              score++;
    if (/[A-Z]/.test(pw))            score++;
    if (/[0-9]/.test(pw))            score++;
    if (/[^A-Za-z0-9]/.test(pw))     score++;

    const levels = [
        { w: '0%',   bg: 'transparent', txt: '' },
        { w: '25%',  bg: '#e05a4f',      txt: 'Weak' },
        { w: '55%',  bg: '#F0B13D',      txt: 'Fair' },
        { w: '78%',  bg: '#4fb8e0',      txt: 'Good' },
        { w: '100%', bg: '#3aaa6e',      txt: 'Strong 💪' },
    ];
    const l = levels[pw.length === 0 ? 0 : Math.max(1, score)];
    fill.style.width      = l.w;
    fill.style.background = l.bg;
    label.textContent     = l.txt;
    label.style.color     = l.bg;
}

/* ── Alert ───────────────────────────────────────────────────── */
function showAlert(msg) {
    const b = document.getElementById('alertBanner');
    document.getElementById('alertMsg').textContent = msg;
    b.classList.add('show');
}
function hideAlert() {
    document.getElementById('alertBanner').classList.remove('show');
}

/* ── Validation helper ───────────────────────────────────────── */
function setErr(id, show) {
    const el = document.getElementById(id);
    if (el) el.classList.toggle('show', show);
    const inp = document.querySelector('#' + id)?.previousElementSibling?.querySelector('input');
    if (inp) inp.classList.toggle('err', show);
    return !show;
}

/* ── Login ───────────────────────────────────────────────────── */
function handleLogin() {
    hideAlert();
    const email = document.getElementById('loginEmail').value.trim();
    const pw    = document.getElementById('loginPw').value;

    const emailOk = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const pwOk    = pw.length > 0;

    document.getElementById('loginEmailErr').classList.toggle('show', !emailOk);
    document.getElementById('loginEmail').classList.toggle('err', !emailOk);
    document.getElementById('loginPwErr').classList.toggle('show', !pwOk);
    document.getElementById('loginPw').classList.toggle('err', !pwOk);

    if (!emailOk || !pwOk) return;

    /* Demo: any valid email + password works */
    showSuccess(email.split('@')[0], false);
}

/* ── Register ────────────────────────────────────────────────── */
function handleRegister() {
    hideAlert();
    const first  = document.getElementById('regFirst').value.trim();
    const last   = document.getElementById('regLast').value.trim();
    const email  = document.getElementById('regEmail').value.trim();
    const phone  = document.getElementById('regPhone').value.trim();
    const pw     = document.getElementById('regPw').value;
    const pwConf = document.getElementById('regPwConf').value;

    const firstOk  = first !== '';
    const lastOk   = last  !== '';
    const emailOk  = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    const phoneOk  = /^\d{9,11}$/.test(phone.replace(/\s/g,''));
    const pwOk     = pw.length >= 8;
    const confOk   = pw === pwConf && pwConf !== '';

    const setF = (id, el, ok) => {
        document.getElementById(id).classList.toggle('show', !ok);
        document.getElementById(el).classList.toggle('err', !ok);
    };
    setF('regFirstErr', 'regFirst', firstOk);
    setF('regLastErr',  'regLast',  lastOk);
    setF('regEmailErr', 'regEmail', emailOk);
    setF('regPhoneErr', 'regPhone', phoneOk);
    setF('regPwErr',    'regPw',    pwOk);
    setF('regPwConfErr','regPwConf',confOk);

    if (!firstOk || !lastOk || !emailOk || !phoneOk || !pwOk || !confOk) return;

    showSuccess(first, true);
}

/* ── Success screen ──────────────────────────────────────────── */
function showSuccess(name, isNew) {
    document.getElementById('panelLogin').classList.remove('active');
    document.getElementById('panelRegister').classList.remove('active');
    document.getElementById('alertBanner').classList.remove('show');

    document.getElementById('successHeading').textContent = isNew
        ? 'Account Created! 🎉'
        : 'Welcome back, ' + capitalise(name) + '!';
    document.getElementById('successMsg').textContent = isNew
        ? 'Your account is ready. Start planning your dream trip!'
        : 'You\'re signed in. Ready to explore?';

    document.getElementById('loginSuccess').classList.add('show');
}

function capitalise(s) { return s.charAt(0).toUpperCase() + s.slice(1); }

/* ── Forgot password ─────────────────────────────────────────── */
function showForgot() {
    showAlert('Password reset is not yet available. Please contact us at bryvelrissetravelandtours@gmail.com');
}

/* ── Social login ────────────────────────────────────────────── */
function handleSocial(provider) {
    showAlert(provider + ' login is coming soon. Please use email for now.');
}

/* ── Generate background stars ──────────────────────────────── */
const starsEl = document.getElementById('stars');
for (let i = 0; i < 60; i++) {
    const s = document.createElement('div');
    s.className = 'star';
    s.style.cssText = `
        left:${Math.random()*100}%;
        top:${Math.random()*100}%;
        animation-duration:${2 + Math.random()*4}s;
        animation-delay:${Math.random()*4}s;
        width:${Math.random() > 0.8 ? 3 : 2}px;
        height:${Math.random() > 0.8 ? 3 : 2}px;
        opacity:${0.2 + Math.random()*0.5};
    `;
    starsEl.appendChild(s);
}

/* ── Generate floating particles ────────────────────────────── */
const partsEl = document.getElementById('particles');
for (let i = 0; i < 12; i++) {
    const p = document.createElement('div');
    p.className = 'particle';
    const size = 20 + Math.random() * 60;
    p.style.cssText = `
        left:${Math.random()*100}%;
        width:${size}px;
        height:${size}px;
        animation-duration:${12 + Math.random()*20}s;
        animation-delay:${Math.random()*15}s;
    `;
    partsEl.appendChild(p);
}
</script>
</body>
</html>