<?php 

// Connect to the database with mysqli error if it fails.
$mysqli = new mysqli('localhost', 'root', 'Leicester1!','crud') or die(mysqli_error($mysqli));

// Check if save button has been pressed.
if (isset($_POST['save'])){
    // Store name and location inside variables.
    $name = $_POST['name'];
    $location = $_POST['location'];
    // Insert data to database.
    $mysqli->query("INSERT INTO data (name, location) VALUES ('$name', '$location')") or die($mysqli->error);
}
