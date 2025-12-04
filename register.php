<?php
require_once "classes/User.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $user = new User();
            if($user->register($_POST["username"], $_POST["password"])){
                echo '<div class="alert alert-success" role="alert">
                User registered </div>';
            }else{
                echo '<div class="alert alert-danger" role="alert">
                User registration error </div>';
            }
        }
    ?>
    <form action="" method="post">
        <div class="form-group">
            <label for="exampleInputUsername">Username</label>
            <input type="text" class="form-control" name="username" id="exampleInputUsername1"
                aria-describedby="UsernameHelp" placeholder="Enter Username">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1"
                placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>