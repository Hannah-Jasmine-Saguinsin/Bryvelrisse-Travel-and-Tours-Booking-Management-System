<?php
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_out(['success' => false, 'message' => 'Invalid request.'], 405);
}

$first = trim($_POST['first_name'] ?? '');
$last = trim($_POST['last_name'] ?? '');
$email = strtolower(trim($_POST['email'] ?? ''));
$phone = preg_replace('/[\s\-()]/', '', $_POST['phone'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';
$namePattern = "/^[A-Za-zÀ-ÖØ-öø-ÿñÑ]+(?:[ '.\\-][A-Za-zÀ-ÖØ-öø-ÿñÑ]+)*\\.?$/u";

if (!preg_match($namePattern, $first) || mb_strlen($first) < 2 || mb_strlen($first) > 60) {
    json_out(['success' => false, 'message' => 'Please enter a valid first name.'], 400);
}
if (!preg_match($namePattern, $last) || mb_strlen($last) < 2 || mb_strlen($last) > 60) {
    json_out(['success' => false, 'message' => 'Please enter a valid last name.'], 400);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($email) > 150) {
    json_out(['success' => false, 'message' => 'Please enter a valid email address.'], 400);
}
if (!preg_match('/^\+639\d{9}$/', $phone)) {
    json_out(['success' => false, 'message' => 'Enter a valid PH mobile number (9XX XXX XXXX).'], 400);
}
if (strlen($password) < 8 || preg_match('/\s/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[A-Z]/', $password) || !preg_match('/\d/', $password)) {
    json_out(['success' => false, 'message' => 'Password needs 8+ characters with uppercase, lowercase and a number.'], 400);
}
if ($password !== $confirm) {
    json_out(['success' => false, 'message' => 'Passwords do not match.'], 400);
}

try {
    $stmt = $pdo->prepare('SELECT id FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        json_out(['success' => false, 'message' => 'That email is already registered. Try signing in instead.'], 409);
    }

    $fullName = $first . ' ' . $last;
    $stmt = $pdo->prepare("INSERT INTO users (full_name, email, phone, password, role) VALUES (?, ?, ?, ?, 'customer')");
    $stmt->execute([$fullName, $email, $phone, password_hash($password, PASSWORD_DEFAULT)]);
    $userId = (int) $pdo->lastInsertId();
} catch (PDOException $e) {
    // The unique email index also protects against simultaneous duplicate submissions.
    if ($e->getCode() === '23000') {
        json_out(['success' => false, 'message' => 'That email is already registered. Try signing in instead.'], 409);
    }
    json_out(['success' => false, 'message' => 'Unable to create your account right now. Please try again.'], 500);
}

session_regenerate_id(true);
$_SESSION['user_id'] = $userId;
$_SESSION['full_name'] = $fullName;
$_SESSION['first_name'] = $first;
$_SESSION['email'] = $email;
$_SESSION['role'] = 'customer';
json_out(['success' => true, 'name' => $first, 'role' => 'customer', 'redirect' => 'index.php']);
