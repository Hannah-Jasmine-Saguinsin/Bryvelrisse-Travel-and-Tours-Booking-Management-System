<?php
define('API_MODE', true);
define('NO_SESSION', true);
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    json_out(['success' => false, 'message' => 'Use a GET request to search packages.'], 405);
}

$query = $_GET['q'] ?? '';
$destination = $_GET['destination'] ?? '';
$travelDate = $_GET['date'] ?? '';
if (!is_string($query) || !is_string($destination) || !is_string($travelDate)) {
    json_out(['success' => false, 'message' => 'Search parameters must be single text values.'], 400);
}
$query = trim($query);
$destination = trim($destination);
$travelDate = trim($travelDate);
$type = $_GET['type'] ?? 'search';
if (!is_string($type) || !in_array($type, ['search', 'destinations', 'dates'], true)) {
    json_out(['success' => false, 'message' => 'Invalid search type.'], 400);
}
if (strlen($query) > 100 || strlen($destination) > 100) {
    json_out(['success' => false, 'message' => 'Search text is too long.'], 400);
}
if ($travelDate !== '' && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $travelDate)) {
    json_out(['success' => false, 'message' => 'Travel date must use YYYY-MM-DD format.'], 400);
}

if ($type === 'destinations') {
    try {
        $sql = "SELECT DISTINCT p.destination
                FROM packages p
                INNER JOIN package_departures d ON d.package_id = p.id
                WHERE p.is_active = 1
                  AND d.status = 'available'
                  AND d.depart_date >= '2026-12-01'";
        $params = [];
        if ($query !== '') {
            $prefix = str_replace(['\\', '%', '_'], ['\\\\', '\\%', '\\_'], $query) . '%';
            $sql .= " AND p.destination LIKE ? ESCAPE '\\\\'";
            $params[] = $prefix;
        }
        $sql .= ' ORDER BY p.destination ASC';
        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);
        $destinations = array_column($stmt->fetchAll(), 'destination');
        json_out(['success' => true, 'count' => count($destinations), 'destinations' => $destinations]);
    } catch (PDOException $e) {
        json_out(['success' => false, 'message' => 'Destination search is temporarily unavailable.'], 500);
    }
}

if ($type === 'dates' && $destination === '') {
    json_out(['success' => false, 'message' => 'Choose a destination to load its travel dates.'], 400);
}

$sql = "SELECT p.id, p.slug, p.name, p.destination, p.keywords,
               d.depart_date, d.return_date, d.departure_city
        FROM packages p
        INNER JOIN package_departures d ON d.package_id = p.id
        WHERE p.is_active = 1
          AND d.status = 'available'
          AND d.depart_date >= '2026-12-01'";
$params = [];

if ($query !== '') {
    $sql .= ' AND (p.name LIKE ? OR p.destination LIKE ? OR p.keywords LIKE ? OR d.departure_city LIKE ?)';
    $like = '%' . $query . '%';
    array_push($params, $like, $like, $like, $like);
}
if ($destination !== '') {
    if ($type === 'dates') {
        $sql .= ' AND p.destination = ?';
        $params[] = $destination;
    } else {
        $sql .= ' AND p.destination LIKE ?';
        $params[] = '%' . $destination . '%';
    }
}
if ($travelDate !== '') {
    $sql .= ' AND d.depart_date = ?';
    $params[] = $travelDate;
}
$sql .= ' ORDER BY d.depart_date ASC, p.destination ASC, p.name ASC, d.departure_city ASC';

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $packages = $stmt->fetchAll();
    foreach ($packages as &$package) {
        $package['id'] = (int) $package['id'];
    }
    unset($package);
    json_out(['success' => true, 'count' => count($packages), 'packages' => $packages]);
} catch (PDOException $e) {
    json_out(['success' => false, 'message' => 'Package search is temporarily unavailable.'], 500);
}
