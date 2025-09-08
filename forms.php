<?php
if (isset($_POST['submit'])) {
    // Collect and sanitize form data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));
    $date = date('Y-m-d H:i:s'); // Timestamp for the submission
    
    // Format the data
    $data = "Submission Time: $date\n";
    $data .= "Name: $name\n";
    $data .= "Email: $email\n";
    $data .= "Message: $message\n";
    $data .= "----------------------------------------\n";
    
    // Path to the credit.txt file
    $file = 'messages.txt';
    
    // Append data to the file
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX)) {
        echo "Message saved successfully!";
    } else {
        echo "Failed to save message. Check file permissions.";
    }
}
?>