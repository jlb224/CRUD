<?php 

// Start the session.
session_start();

$id = 0;
$name = "";
$location = "";
$update = false;

// Connect to the database with mysqli error if it fails.
$mysqli = new mysqli('localhost', 'root', 'Leicester1!','crud') or die(mysqli_error($mysqli));

// Check if save button has been pressed.
if (isset($_POST['save'])){
    // Store name and location inside variables.
    $name = $_POST['name'];
    $location = $_POST['location'];
    // Insert data to database.
    $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die($mysqli->error());

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
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");
}

// Check if edit button clicked.
if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    // Check if record exists -> good practice!
    if (count($result)==1){
        $record = $result->fetch_array(); // Will return data from the record.
        $name = $record['name'];
        $location = $record['location'];
    }
}

// Check if update button clicked.
if (isset($_POST['update'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $location = $_POST['location'];

    $mysqli->query("UPDATE data SET name='$name', location='$location' WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been updated!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
