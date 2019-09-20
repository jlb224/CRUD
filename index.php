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
        </body>
    </html>
