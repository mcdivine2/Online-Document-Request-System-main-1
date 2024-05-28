<?php
require_once "../model/class_model.php";

if (isset($_POST)) {
    $conn = new class_model();

    // Validate and sanitize the input fields
    $document_description = trim($_POST['document_decription']);
    $student_id = trim($_POST['student_id']);

    // Check if file is uploaded
    if (isset($_FILES['document_name']) && $_FILES['document_name']['error'] === UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['document_name']['tmp_name'];
        $file_name = addslashes($_FILES['document_name']['name']);
        $file_size = $_FILES['document_name']['size'];
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/Online-Document-Request-System-main/student/student_uploads/";

        // Ensure the upload directory exists
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0755, true);
        }

        $upload_file = $upload_dir . $file_name;

        // Move the uploaded file to the desired directory
        if (move_uploaded_file($file_tmp_path, $upload_file)) {
            // File path to store in the database
            $document_name = "student_uploads/" . $file_name;

            // Insert document information into the database
            $doc = $conn->add_document($document_name, $document_description, $file_size, $student_id);
            
            if ($doc == TRUE) {
                echo '<div class="alert alert-success">Add Document Successfully!</div><script> setTimeout(function() { window.history.go(-1); }, 1000); </script>';
            } else {
                echo '<div class="alert alert-danger">Add Document Failed!</div><script> setTimeout(function() { window.history.go(-1); }, 1000); </script>';
            }
        } else {
            echo '<div class="alert alert-danger">Failed to move uploaded file.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">No file uploaded or upload error.</div>';
    }
}
?>