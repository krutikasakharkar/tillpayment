<?php
session_start();

// Check if the required data is received
if(isset($_POST['style_id']) && isset($_POST['payment_id'])) {
    // Process the payment
    // Assuming you process the payment and store the payment ID in a variable $payment_id

    // Set the payment ID in the session variable
    $_SESSION['paymentid'] = $_POST['payment_id'];

    // Send a success response
    echo 'done';
} else {
    // Send an error response
    echo 'Error: Required data not received';
}
?>
