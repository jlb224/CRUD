<!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>CRUD tutorial</title>            
             <!-- Latest compiled and minified CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <!-- Popper JS -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
            <meta name="viewport" content="width=device-width, initial-scale=1"> 
        </head>
        <body>
            <?php require_once 'process.php'; ?>
            <div class="container">
            <!-- Connect to database and select the existing records. -->
            <?php
                $mysqli = new mysqli('localhost', 'root', 'Leicester1!', 'crud') or die(mysqli_error($mysqli));
                $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
                // Print array in readable format (for testing). Returns object with no data in it.
                //pre_r($result);
                // Use method to pull the data from the object.
                // pre_r($result->fetch_assoc()); // Prints one record.
                // pre_r($result->fetch_assoc()); 
            ?>

            <div class="row justify-content-center">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Location</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
            <?php 
                // Loop through name,location data and store in $row. 
                while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="index.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a> 
                        </td>
                    </tr>
                <?php endwhile; ?>
                </table>
            </div>

            <?php
                function pre_r($array) {
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';                
                }               
            ?>

            <div class="row justify-content-center">
                <form action="process.php" method="POST">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="Enter your name">
                    </div>
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" name="location" id="location" class="form-control" value="Enter your location">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="save">Save</button>
                    </div>
                </form>
            </div>
            </div>
        </body>
    </html>
