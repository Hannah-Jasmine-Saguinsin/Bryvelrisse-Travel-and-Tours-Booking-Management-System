<?php
require_once __DIR__ . '/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    json_out(['success' => false, 'message' => 'Use the booking form to submit an inquiry.'], 405);
}

$token = $_POST['csrf_token'] ?? '';
if (!is_string($token) || empty($_SESSION['booking_csrf_token']) || !hash_equals($_SESSION['booking_csrf_token'], $token)) {
    json_out(['success' => false, 'message' => 'Your form session expired. Refresh the booking page and try again.'], 419);
}

$requestToken = $_POST['request_token'] ?? '';
if (!is_string($requestToken) || !preg_match('/^[a-f0-9]{64}$/D', $requestToken)) {
    json_out(['success' => false, 'message' => 'This form submission is invalid. Refresh the booking page and try again.'], 422);
}

// PHP's standard session handler holds a lock for the request, so retries from
// this form see the saved result instead of inserting a second inquiry.
$savedInquiryId = $_SESSION['booking_inquiry_results'][$requestToken] ?? null;
if (is_int($savedInquiryId) && $savedInquiryId > 0) {
    json_out(['success' => true, 'inquiry_id' => $savedInquiryId, 'duplicate' => true]);
}

$readText = static function (string $key): string {
    $value = $_POST[$key] ?? '';
    return is_string($value) ? trim($value) : '';
};
$readCount = static function (string $key, int $minimum): ?int {
    $value = $_POST[$key] ?? null;
    if (!is_string($value) || !preg_match('/^(0|[1-9][0-9]*)$/D', $value)) return null;
    $number = filter_var($value, FILTER_VALIDATE_INT);
    return $number !== false && $number >= $minimum && $number <= 65535 ? $number : null;
};

$packageId = filter_var($_POST['package_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$departureId = filter_var($_POST['departure_id'] ?? null, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
$firstName = $readText('first_name');
$lastName = $readText('last_name');
$email = $readText('email');
$phone = $readText('phone');
$adults = $readCount('adults', 1);
$children = $readCount('children', 0);
$tripType = $readText('trip_type');
$budgetRange = $readText('budget_range');
$specialRequests = $readText('special_requests');
$validTripTypes = ['Package Tour', 'Custom Itinerary', 'Honeymoon', 'Family', 'Group', 'Business'];

$validName = static function (string $value): bool {
    return preg_match('/^[\p{L}\p{M}]+(?:[ .\'-][\p{L}\p{M}]+)*\.?$/u', $value) === 1;
};

if ($packageId === false || $departureId === false || !$validName($firstName) || !$validName($lastName)
    || strlen($firstName) > 100 || strlen($lastName) > 100
    || strlen($email) > 150 || filter_var($email, FILTER_VALIDATE_EMAIL) === false
    || strlen($phone) > 30 || !preg_match('/^[0-9+().\s-]{6,30}$/D', $phone) || !preg_match('/[0-9]/', $phone)
    || $adults === null || $children === null
    || !in_array($tripType, $validTripTypes, true) || strlen($budgetRange) > 80
    || strlen($specialRequests) > 5000 || ($readText('consent') !== '1')) {
    json_out(['success' => false, 'message' => 'Please check the traveler details, group size, and consent, then try again.'], 422);
}

try {
    $check = $pdo->prepare("SELECT p.id
        FROM packages p
        INNER JOIN package_departures d ON d.package_id = p.id
        WHERE p.id = :package_id AND d.id = :departure_id
          AND p.is_active = 1 AND d.status = 'available'
          AND d.depart_date >= GREATEST(CURDATE(), '2026-12-01')
        LIMIT 1");
    $check->execute(['package_id' => $packageId, 'departure_id' => $departureId]);
    if (!$check->fetchColumn()) {
        json_out(['success' => false, 'message' => 'That package departure is no longer available. Please choose another departure.'], 409);
    }

    $userId = null;
    if (isset($_SESSION['user_id']) && filter_var($_SESSION['user_id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])) {
        $userCheck = $pdo->prepare('SELECT id FROM users WHERE id = ?');
        $userCheck->execute([(int)$_SESSION['user_id']]);
        $userId = $userCheck->fetchColumn() ?: null;
    }

    $insert = $pdo->prepare("INSERT INTO booking_inquiries
        (user_id, package_id, package_departure_id, first_name, last_name, email, phone,
         adults, children, trip_type, budget_range, special_requests)
        VALUES (:user_id, :package_id, :departure_id, :first_name, :last_name, :email, :phone,
         :adults, :children, :trip_type, :budget_range, :special_requests)");
    $insert->execute([
        'user_id' => $userId,
        'package_id' => $packageId,
        'departure_id' => $departureId,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'phone' => $phone,
        'adults' => $adults,
        'children' => $children,
        'trip_type' => $tripType,
        'budget_range' => $budgetRange !== '' ? $budgetRange : null,
        'special_requests' => $specialRequests !== '' ? $specialRequests : null,
    ]);

    $inquiryId = (int)$pdo->lastInsertId();
    if (!isset($_SESSION['booking_inquiry_results']) || !is_array($_SESSION['booking_inquiry_results'])) {
        $_SESSION['booking_inquiry_results'] = [];
    }
    $_SESSION['booking_inquiry_results'][$requestToken] = $inquiryId;
    if (count($_SESSION['booking_inquiry_results']) > 100) {
        $_SESSION['booking_inquiry_results'] = array_slice($_SESSION['booking_inquiry_results'], -100, null, true);
    }

    json_out(['success' => true, 'inquiry_id' => $inquiryId]);
} catch (PDOException $e) {
    error_log('Booking inquiry save failed: ' . $e->getMessage());
    json_out(['success' => false, 'message' => 'The inquiry could not be saved. Please try again later.'], 500);
}
