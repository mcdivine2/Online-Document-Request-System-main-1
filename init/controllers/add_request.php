<?php
require_once "../model/class_model.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn = new class_model();

    // Trim input values
    $first_name = trim($_POST['first_name']);
    $middle_name = trim($_POST['middle_name']);
    $last_name = trim($_POST['last_name']);
    $complete_address = trim($_POST['complete_address']);
    $price = str_replace('₱', '', trim($_POST['price'])); // Remove ₱ symbol
    $birthdate = trim($_POST['birthdate']);
    $course = trim($_POST['course']);
    $email_address = trim($_POST['email_address']);
    $control_no = trim($_POST['control_no']);
    $date_request = trim($_POST['date_request']);
    $mode_request = trim($_POST['mode_request']);
    $student_id = trim($_POST['student_id']);

    $document_names = isset($_POST['document_name']) ? $_POST['document_name'] : [];
    $no_ofcopies = isset($_POST['no_ofcopies']) ? $_POST['no_ofcopies'] : [];
    $purpose = isset($_POST['purpose']) ? $_POST['purpose'] : [];

    // Initialize status fields
    $registrar_status = "Received";
    $custodian_status = "Received";
    $dean_status = "Received";
    $library_status = "Received";
    $accounting_status = "Waiting for Payment";

    // Input validation
    $errors = []; // Store validation errors

    // Required fields validation
    if (empty($first_name)) $errors[] = 'First name is required!';
    if (empty($middle_name)) $errors[] = 'Maiden name is required!';
    if (empty($last_name)) $errors[] = 'Last name is required!';
    if (empty($complete_address)) $errors[] = 'Complete address is required!';
    if (empty($birthdate)) $errors[] = 'Birthdate is required!';
    if (empty($course)) $errors[] = 'Course is required!';
    if (empty($email_address)) $errors[] = 'Email address is required!';
    if (empty($control_no)) $errors[] = 'Control number is required!';
    if (empty($date_request)) $errors[] = 'Date request is required!';
    if (empty($mode_request)) $errors[] = 'Mode of request is required!';
    if (empty($student_id)) $errors[] = 'Student ID is required!';
    if (empty($purpose)) $errors[] = 'At least one purpose is required!';

    // Check if document names and copies match
    if (count($document_names) !== count($no_ofcopies)) {
        $errors[] = 'Document names and copies mismatch!';
    }

    // Validate email format
    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email address!';
    }

    // If there are validation errors, display them
    if (!empty($errors)) {
        echo '<div class="alert alert-danger">' . implode('<br>', $errors) . '</div>';
        exit; // Stop further processing
    }

    // Process requests
    $documents = [];
    foreach ($document_names as $index => $document_name) {
        $copies = isset($no_ofcopies[$index]) ? (int)$no_ofcopies[$index] : 1;
        $documents[] = $document_name . " (x" . $copies . ")";
    }
    $document_string = implode(", ", $documents);
    
    // Add request to the database
    $request = $conn->add_request(
        $first_name,
        $middle_name,
        $last_name,
        $complete_address,
        $birthdate,
        $course,
        $email_address,
        $control_no,
        $document_string, // Use the concatenated document string
        $price,
        $date_request,
        $registrar_status,
        $custodian_status,
        $dean_status,
        $library_status,
        $accounting_status,
        implode(", ", $purpose), // Ensure purpose is a string
        $mode_request,
        $student_id
    );

    // Check if the request was successful
    if ($request) { // If $request is true, show success
        echo '<div class="alert alert-success">Request added successfully!</div>';
        echo '<script>setTimeout(function() { window.history.go(-1); }, 1000);</script>';
    } else {
        echo '<div class="alert alert-danger">Failed to add request. Please try again.</div>';
        echo '<script>setTimeout(function() { window.history.go(-1); }, 1000);</script>';
    }
}
?>
