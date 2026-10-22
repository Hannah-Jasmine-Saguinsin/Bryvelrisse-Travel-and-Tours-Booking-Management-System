<?php
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_out(['success' => false, 'message' => 'Invalid request.'], 405);
}

$email = strtolower(trim($_POST['email'] ?? ''));
$password = $_POST['password'] ?? '';
$remember = ($_POST['remember'] ?? '') === '1';
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $password === '') {
    json_out(['success' => false, 'message' => 'Please enter a valid email and password.'], 400);
}

try {
    $stmt = $pdo->prepare('SELECT id, full_name, email, password, role FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
} catch (PDOException $e) {
    json_out(['success' => false, 'message' => 'Unable to sign in right now. Please try again.'], 500);
}

if (!$user || !password_verify($password, $user['password'])) {
    json_out(['success' => false, 'message' => 'Invalid email or password.'], 401);
}

session_regenerate_id(true);
$_SESSION['user_id'] = (int) $user['id'];
$_SESSION['full_name'] = $user['full_name'];
$_SESSION['first_name'] = preg_split('/\s+/', trim($user['full_name']))[0] ?? $user['full_name'];
$_SESSION['email'] = $user['email'];
$_SESSION['role'] = $user['role'];

// Persistent login needs a server-stored revocable token; the current schema has no token store.
// Keep the PHP session cookie session-only even when Remember Me is selected.
json_out([
    'success' => true,
    'name' => $_SESSION['first_name'],
    'role' => $user['role'],
    'remember_supported' => false,
    'redirect' => $user['role'] === 'admin' ? 'admin/dashboard.php' : 'index.php',
]);
