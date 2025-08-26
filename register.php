<?php
header('Content-Type: application/json');
include 'db.php';

try {
    ob_start();
    
    $form_type = isset($_POST['form_type']) ? filter_var($_POST['form_type'], FILTER_SANITIZE_STRING) : '';
    
    if ($form_type !== 'tutor_registration') {
        throw new Exception("Invalid form type.");
    }

    // Validate form inputs
    $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
    $qualifications = filter_var($_POST['qualifications'] ?? '', FILTER_SANITIZE_STRING);
    $city = filter_var($_POST['city'] ?? '', FILTER_SANITIZE_STRING);

    if (empty($name) || empty($email) || empty($subject) || empty($qualifications) || empty($city)) {
        throw new Exception("All fields are required.");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format.");
    }

    // Handle file upload
    $resume_path = '';
    if (isset($_FILES['resume']) && $_FILES['resume']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }
        $resume_name = uniqid() . '_' . basename($_FILES['resume']['name']);
        $resume_path = $upload_dir . $resume_name;
        if (!move_uploaded_file($_FILES['resume']['tmp_name'], $resume_path)) {
            throw new Exception("Failed to upload resume.");
        }
        if (pathinfo($resume_path, PATHINFO_EXTENSION) !== 'pdf') {
            unlink($resume_path);
            throw new Exception("Only PDF files are allowed.");
        }
    } else {
        throw new Exception("Resume file is required.");
    }

    // Insert into tutors table
    $stmt = $conn->prepare("INSERT INTO tutors (name, email, subject, qualifications, city, resume_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $email, $subject, $qualifications, $city, $resume_path]);

    ob_end_clean();
    echo json_encode(["status" => "success", "message" => "Tutor registration submitted successfully!"]);
} catch (Exception $e) {
    ob_end_clean();
    http_response_code(400);
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>