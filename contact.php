<?php
header('Content-Type: application/json');
include 'db.php';

try {
    // Ensure no output before JSON
    ob_start();
    
    $form_type = isset($_POST['form_type']) ? filter_var($_POST['form_type'], FILTER_SANITIZE_STRING) : '';
    
    if ($form_type === 'booking') {
        // Validate booking form inputs
        $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
        $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
        $grade = filter_var($_POST['grade'] ?? '', FILTER_SANITIZE_STRING);
        $city = filter_var($_POST['city'] ?? '', FILTER_SANITIZE_STRING);
        $date = filter_var($_POST['date'] ?? '', FILTER_SANITIZE_STRING);
        $time = filter_var($_POST['time'] ?? '', FILTER_SANITIZE_STRING);

        // Basic validation
        if (empty($name) || empty($email) || empty($subject) || empty($grade) || empty($city) || empty($date) || empty($time)) {
            throw new Exception("All fields are required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Prepare and execute SQL for contacts table
        $stmt = $conn->prepare("INSERT INTO contacts (name, email, subject, grade, city, preferred_date, preferred_time) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $grade, $city, $date, $time]);

        ob_end_clean();
        echo json_encode(["status" => "success", "message" => "Booking request submitted successfully!"]);
    } elseif ($form_type === 'newsletter') {
        // Validate newsletter form input
        $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);

        if (empty($email)) {
            throw new Exception("Email is required.");
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Check if email already exists
        $stmt = $conn->prepare("SELECT email FROM newsletter_subscribers WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetch()) {
            throw new Exception("Email is already subscribed.");
        }

        // Insert into newsletter_subscribers table
        $stmt = $conn->prepare("INSERT INTO newsletter_subscribers (email) VALUES (?)");
        $stmt->execute([$email]);

        ob_end_clean();
        echo json_encode(["status" => "success", "message" => "Subscribed to newsletter successfully!"]);
    } else {
        throw new Exception("Invalid form type.");
    }
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>