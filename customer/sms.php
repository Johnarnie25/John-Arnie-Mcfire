<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['phoneNumber'])) {
    $phoneNumber = $_POST['phoneNumber'];

    // Validate and sanitize the phone number (you may add more validation logic)
    $phoneNumber = filter_var($phoneNumber, FILTER_SANITIZE_NUMBER_INT);

    // Generate a random 6-digit code
    $smsCode = rand(100000, 999999);

    // Save the code in the session for later verification
    session_start();
    $_SESSION['smsCode'] = $smsCode;

    // Simulate sending the SMS code (replace this with your actual SMS sending logic)
    // For demonstration purposes, we'll just echo the code here
    echo json_encode(['success' => true, 'code' => $smsCode]);
} else {
    // Handle invalid requests
    echo json_encode(['success' => false]);
}
?>

