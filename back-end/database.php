<?php
/**
 * Bryvelrisse Travel and Tours - database.php
 * Connects to the existing MySQL database and starts a hardened session.
 *
 * Usage in other files:  require_once __DIR__ . '/database.php';  // gives you $pdo
 */

if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'secure' => $isHttps,
        'httponly' => true,
        'samesite' => 'Lax',
    ]);
    session_start();
}

// ---- XAMPP defaults ----
$DB_HOST = 'localhost';
$DB_NAME = 'bryvelrisse_travel';
$DB_USER = 'root';
$DB_PASS = '';          // XAMPP default is empty
$DB_PORT = 3306;

try {
    // 1) Connect to the server (no DB yet) and create the DB if missing
    $server = new PDO("mysql:host=$DB_HOST;port=$DB_PORT;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
    $server->exec("CREATE DATABASE IF NOT EXISTS `$DB_NAME` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // 2) Connect to the actual database
    $pdo = new PDO("mysql:host=$DB_HOST;port=$DB_PORT;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage() . ' — Is MySQL running in XAMPP?');
}

// 3) Auto-create tables
$pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id          INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        full_name   VARCHAR(120) NOT NULL,
        email       VARCHAR(150) NOT NULL UNIQUE,
        phone       VARCHAR(30)  DEFAULT NULL,
        password    VARCHAR(255) NOT NULL,
        role        ENUM('admin','customer') NOT NULL DEFAULT 'customer',
        created_at  TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB
");

function json_out(array $payload, int $status = 200): void
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($payload, JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE);
    exit;
}

function require_login(): void
{
    if (empty($_SESSION['user_id'])) {
        header('Location: ../login.php');
        exit;
    }
}

function require_admin(): void
{
    if (empty($_SESSION['user_id'])) {
        header('Location: ../login.php');
        exit;
    }
    if (($_SESSION['role'] ?? '') !== 'admin') {
        http_response_code(403);
        exit('Access denied.');
    }
}
