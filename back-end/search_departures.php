<?php
require_once __DIR__ . '/database.php';

header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

try {
    $stmt = $pdo->prepare("SELECT p.destination, d.depart_date
        FROM packages p
        INNER JOIN package_departures d ON d.package_id = p.id
        WHERE p.is_active = 1
          AND d.status = 'available'
          AND d.depart_date >= GREATEST(CURDATE(), '2026-12-01')
        ORDER BY p.destination, d.depart_date");
    $stmt->execute();

    $dateRanges = [];
    foreach ($stmt->fetchAll() as $row) {
        $destination = $row['destination'];
        $dateRanges[$destination][] = [$row['depart_date'], $row['depart_date']];
    }

    $destinations = array_keys($dateRanges);
    json_out([
        'success' => true,
        'destinations' => $destinations,
        'package_date_ranges' => $dateRanges,
    ]);
} catch (PDOException $e) {
    error_log('Search availability load failed: ' . $e->getMessage());
    json_out(['success' => false, 'message' => 'Available packages could not be loaded.'], 500);
}
