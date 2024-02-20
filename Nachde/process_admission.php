<?php
    include "connection.php";

// Process form submission
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $dance_style = mysqli_real_escape_string($conn, $_POST['dance_style']);
    
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert data into database
    $sql = "INSERT INTO admission (name, email, dob, phone, dance_style, address)
            VALUES ('$name', '$email', '$dob', '$phone', '$dance_style', '$address')";

    if ($conn->query($sql) === TRUE) {
        header("Location: payment.php");
        exit();

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>