<?php
session_start();

// CSRF token (the form posts it back; verified below)
if (empty($_SESSION['csrf'])) {
    $_SESSION['csrf'] = bin2hex(random_bytes(32));
}

$errors = [];
$old = ['full_name' => '', 'email' => '', 'username' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['full_name'] = trim($_POST['full_name'] ?? '');
    $old['email']     = trim($_POST['email'] ?? '');
    $old['username']  = trim($_POST['username'] ?? '');
    $password         = $_POST['password'] ?? '';
    $confirm          = $_POST['confirm_password'] ?? '';

    if (!hash_equals($_SESSION['csrf'], $_POST['csrf'] ?? '')) {
        $errors['form'] = 'Your session expired. Please try again.';
    }
    if ($old['full_name'] === '' || mb_strlen($old['full_name']) > 100) {
        $errors['full_name'] = 'Please enter your full name.';
    }
    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please enter a valid email address.';
    }
    if (!preg_match('/^[A-Za-z0-9_]{3,30}$/', $old['username'])) {
        $errors['username'] = '3-30 characters: letters, numbers, and underscores only.';
    }
    if (strlen($password) < 8) {
        $errors['password'] = 'Password must be at least 8 characters.';
    }
    if ($password !== $confirm) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    if (!$errors) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        // TODO: connect to the project's database and:
        //   1. Check that the email and username are not already taken
        //      (set $errors['email'] / $errors['username'] if they are).
        //   2. INSERT full_name, email, username, $passwordHash using a prepared
        //      statement. Never store or log the plain-text password.
        //   3. On success, redirect to login.php (header('Location: login.php'); exit;).
    }
}

function field_error(array $errors, string $key): string
{
    return isset($errors[$key])
        ? '<div class="field-error">' . htmlspecialchars($errors[$key]) . '</div>'
        : '';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Global CSS (same variables and fonts as index.php / login.php) -->
    <link rel="stylesheet" href="css/style.css">

    <title>Register | Bryvelrisse Travel and Tours</title>

    <style>
        /* Same styles as login.php so both pages match. */
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

        .login-card a {
            color: var(--primary-color, #356b86);
            font-weight: 600;
            text-decoration: none;
        }
        .login-card a:hover { text-decoration: underline; }

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

        /* Registration-only additions */
        .field-error {
            color: #e05a4f;
            font-size: 0.78rem;
            font-weight: 600;
            margin-top: 4px;
        }
        .login-field input.has-error { border-color: #e05a4f; }
        .login-hint { font-size: 0.75rem; color: var(--secondary-light, #356b86); margin-top: 4px; }
    </style>
</head>

<body>

    <main class="login-card">
        <a href="index.php" class="login-logo" aria-label="Bryvelrisse Travel and Tours home">
            <img src="assets/images/Bryvelrisse-Logo.png" alt="Bryvelrisse Travel and Tours">
        </a>

        <h1>Create Account</h1>

        <?php if (isset($errors['form'])): ?>
            <div class="login-alert" role="alert"><?= htmlspecialchars($errors['form']) ?></div>
        <?php endif; ?>

        <form method="post" action="registration.php" novalidate>
            <input type="hidden" name="csrf" value="<?= htmlspecialchars($_SESSION['csrf']) ?>">

            <div class="login-field">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" placeholder="Juan Dela Cruz"
                    autocomplete="name" maxlength="100" required
                    class="<?= isset($errors['full_name']) ? 'has-error' : '' ?>"
                    value="<?= htmlspecialchars($old['full_name']) ?>">
                <?= field_error($errors, 'full_name') ?>
            </div>

            <div class="login-field">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="juan@email.com"
                    autocomplete="email" required
                    class="<?= isset($errors['email']) ? 'has-error' : '' ?>"
                    value="<?= htmlspecialchars($old['email']) ?>">
                <?= field_error($errors, 'email') ?>
            </div>

            <div class="login-field">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="juandelacruz"
                       autocomplete="username" minlength="3" maxlength="30"
                       pattern="[A-Za-z0-9_]{3,30}" required
                       class="<?= isset($errors['username']) ? 'has-error' : '' ?>"
                       value="<?= htmlspecialchars($old['username']) ?>">
                <?= field_error($errors, 'username') ?>
            </div>

            <div class="login-field">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="At least 8 characters"
                    autocomplete="new-password" minlength="8" required
                    class="<?= isset($errors['password']) ? 'has-error' : '' ?>">
                <?= field_error($errors, 'password') ?>
            </div>

            <div class="login-field">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Repeat your password"
                    autocomplete="new-password" minlength="8" required
                    class="<?= isset($errors['confirm_password']) ? 'has-error' : '' ?>">
                <?= field_error($errors, 'confirm_password') ?>
            </div>

            <button type="submit" class="login-btn">Register</button>
        </form>

        <p class="login-switch">Already have an account? <a href="login.php">Log In</a></p>
    </main>

    <a href="index.php" class="login-back">&larr; Back to Home</a>

</body>

</html>