<?php
header('Content-Type: application/json');
include 'db.php';

try {
    $city = filter_var($_GET['city'] ?? '', FILTER_SANITIZE_STRING);
    $subject = filter_var($_GET['subject'] ?? '', FILTER_SANITIZE_STRING);
    $name = filter_var($_GET['name'] ?? '', FILTER_SANITIZE_STRING);

    $query = "SELECT id, name, subject, city, qualifications FROM tutors WHERE 1=1";
    $params = [];
    
    if (!empty($city)) {
        $query .= " AND city = ?";
        $params[] = $city;
    }
    if (!empty($subject)) {
        $query .= " AND subject LIKE ?";
        $params[] = "%$subject%";
    }
    if (!empty($name)) {
        $query .= " AND name LIKE ?";
        $params[] = "%$name%";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $tutors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($tutors);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(["status" => "error", "message" => "Search failed: " . $e->getMessage()]);
}
?>