<?php
require_once "../model/class_model.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn = new class_model();

    $control_no = trim($_POST['control_no']);
    $studentID_no = trim($_POST['studentID_no']);
    $email_address = trim($_POST['email_address']);
    $date_request = trim($_POST['date_request']);
    $received = "Received";
    $student_id = trim($_POST['student_id']);
    $mode_request = trim($_POST['mode_request']);

    $document_names = isset($_POST['document_name']) ? $_POST['document_name'] : [];
    $no_ofcopies = isset($_POST['no_ofcopies']) ? $_POST['no_ofcopies'] : [];

    // Input validation
    if (empty($control_no) || empty($studentID_no) || empty($email_address) || empty($date_request) || empty($mode_request) || empty($student_id)) {
        echo '<div class="alert alert-danger">All fields are required!</div>';
        exit;
    }

    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Invalid email address!</div>';
        exit;
    }

    if (count($document_names) !== count($no_ofcopies)) {
        echo '<div class="alert alert-danger">Form data mismatch!</div>';
        exit;
    }

    $all_success = true;

    foreach ($document_names as $index => $document_name) {
        $copies = $no_ofcopies[$index] ?? 1;

        // Add request to database
        $request = $conn->add_request(
            $control_no, 
            $studentID_no, 
            $email_address, 
            $document_name, 
            $copies, 
            $date_request, 
            $received, 
            $student_id, 
            $mode_request
        );

        if (!$request) {
            $all_success = false;
            break;
        }
    }

    if ($all_success) {
        echo '<div class="alert alert-success">Request added successfully!</div>';
        echo '<script>setTimeout(function() { window.history.go(-1); }, 1000);</script>';
    } else {
        echo '<div class="alert alert-danger">Failed to add request. Please try again.</div>';
        echo '<script>setTimeout(function() { window.history.go(-1); }, 1000);</script>';
    }
}
?>
