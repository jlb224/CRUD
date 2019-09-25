<?php 

// Start the session.
session_start();

// Connect to the database with mysqli error if it fails.
$mysqli = new mysqli('localhost', 'root', 'Leicester1!','crud') or die(mysqli_error($mysqli));

// Check if save button has been pressed.
if (isset($_POST['save'])){
    // Store name and location inside variables.
    $name = $_POST['name'];
    $location = $_POST['location'];
    // Insert data to database.
    $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die($mysqli->error);

    // Set session message variable.
    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    // Redirect user back to index.php.
    header("location: index.php");
}

// Delete record from 'data' using ID passed from $_GET['delete'] variable.
if (isset($_GET['delete'])){
    // Store ID inside variable.
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

