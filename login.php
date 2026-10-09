<?php
// TODO: connect to the project's authentication backend.
// On POST, validate credentials here, start the session, redirect on success,
// and set $error (e.g. "Invalid email or password.") on failure.
$error = '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Global CSS (same variables and fonts as index.php) -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login | Bryvelrisse Travel and Tours</title>

    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            background: var(--surface, #f5f9fb);
            font-family: Montserrat, sans-serif;
            color: var(--primary-dark, #11263b);
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: var(--white, #fff);
            border: 1px solid var(--surface-line, #d8e5ec);
            border-radius: 20px;
            padding: 36px 32px;
            box-shadow: 0 10px 26px rgba(17, 38, 59, 0.08);
        }

        .login-logo { display: flex; justify-content: center; margin-bottom: 16px; }
        .login-logo img { height: 70px; width: auto; }

        .login-card h1 {
            font-family: PlayfairDisplay, serif;
            font-weight: 900;
            font-size: 1.8rem;
            line-height: 1.1;
            letter-spacing: 0.02em;
            text-align: center;
            color: var(--primary-dark, #11263b);
            margin: 0 0 24px;
        }

        .login-alert {
            background: rgba(224, 90, 79, 0.08);
            border: 1px solid rgba(224, 90, 79, 0.3);
            color: #e05a4f;
            border-radius: 10px;
            padding: 10px 14px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .login-field { margin-bottom: 16px; }

        .login-field label {
            display: block;
            font-size: 0.85rem;
            font-weight: 700;
            color: var(--primary-color, #356b86);
            margin-bottom: 6px;
        }

        .login-field input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid var(--surface-line, #d8e5ec);
            border-radius: 10px;
            font-family: Montserrat, sans-serif;
            font-size: 0.95rem;
            color: var(--primary-dark, #11263b);
            background: var(--white, #fff);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .login-field input:focus {
            outline: none;
            border-color: var(--primary-color, #356b86);
            box-shadow: 0 0 0 3px rgba(53, 107, 134, 0.15);
        }

        .login-forgot { text-align: right; margin: -6px 0 20px; }

        .login-card a {
            color: var(--primary-color, #356b86);
            font-weight: 600;
            text-decoration: none;
        }
        .login-card a:hover { text-decoration: underline; }
        .login-forgot a { font-size: 0.85rem; }

        .login-btn {
            width: 100%;
            padding: 14px 24px;
            border: none;
            border-radius: 30px;
            background: var(--primary-color, #356b86);
            color: var(--white, #fff);
            font-family: Montserrat, sans-serif;
            font-size: 0.95rem;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s ease;
        }
        .login-btn:hover { background: var(--secondary-light-dark, #1e4f6b); }

        .login-switch {
            text-align: center;
            font-size: 0.9rem;
            color: var(--secondary-light, #356b86);
            margin: 20px 0 0;
        }

        .login-back {
            margin-top: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--primary-color, #356b86);
            text-decoration: none;
        }
        .login-back:hover { text-decoration: underline; }
    </style>
</head>

<body>

    <main class="login-card">
        <a href="index.php" class="login-logo" aria-label="Bryvelrisse Travel and Tours home">
            <img src="assets/images/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours">
        </a>

        <h1>Welcome Back</h1>

        <?php if ($error): ?>
            <div class="login-alert" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="post" action="login.php">
            <div class="login-field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="juan@email.com"
                    autocomplete="email" required
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
            </div>

            <div class="login-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password"
                    autocomplete="current-password" required>
            </div>

            <div class="login-forgot">
                <a href="mailto:bryvelrissetravelandtours@gmail.com?subject=Password%20Reset%20Request">Forgot Password?</a>
            </div>

            <button type="submit" class="login-btn">Log In</button>
        </form>

        <p class="login-switch">Don't have an account? <a href="registration.php">Sign Up</a></p>
    </main>

    <a href="index.php" class="login-back">&larr; Back to Home</a>

</body>

</html>