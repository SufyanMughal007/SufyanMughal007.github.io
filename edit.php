<?php
include 'connection.php';
// edit.php

if (isset($_GET['id'])) {
    // Retrieve the record to be edited
    $id = $_GET['id'];
    $sql = "SELECT * FROM register WHERE id = $id";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update the record in the database
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE register SET name='$name', gender='$gender', email='$email', address='$address' WHERE id = $id";

    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
        header("Location: record.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
}

// Display the form for editing
?>
<form action="" method="POST">
  <input type="text" name="name" value="<?php echo $row['name']; ?>">
  <input type="text" name="gender" value="<?php echo $row['gender']; ?>">
  <input type="text" name="email" value="<?php echo $row['email']; ?>">
  <input type="text" name="address" value="<?php echo $row['address']; ?>">
  <button type="submit">Update</button>
</form>
