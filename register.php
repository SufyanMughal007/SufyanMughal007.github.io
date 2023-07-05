<?php
include 'connection.php';
// Retrieve form data
$name = $_POST['name'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$address = $_POST['address'];

// Insert data into the database
$sql = "INSERT INTO register (name, gender, email, address) VALUES ('$name', '$gender', '$email', '$address')";

if (mysqli_query($con, $sql)) {
    echo "Record added successfully";
    header("Location: record.php");
        exit;
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
