<?php
    session_start();
    if(!isset ($_SESSION['user']) && !isset($_COOKIE[('userCookie')])) {
        header('location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
    <style>
        .toright{ 
            float: right;
        } 
        .hellow-user{ 
            margin: 15px 15px;
            padding: 15px 15px;
        }

    </style>
</head>

<body>
   <div class="hellow-user"> <span class=""> Bonjour <?php echo $_SESSION['userName'] ?? "" ; ?> </span> <a href="logout.php" class="btn btn-primary toright" tabindex="-1" role="button" aria-disabled="true">Logout</a> </div>

</body>

</html>