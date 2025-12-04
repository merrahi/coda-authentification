<?php
require_once "classes/User.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <script src="vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>

<body>
    <?php
    if (isset($_POST['userName']) && isset($_POST['password'])) {
        $user = new User();
        if ($user->login($_POST['userName'], $_POST['password'])) {
            echo '<div class="alert alert-success" role="alert">
                User login success </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                User not logged </div>';
        }
    } 
    ?>
    <form action="" method="post">
        <div class="mb-3">
            <label for="exampleInputUsername" class="form-label">username</label>
            <input type="userName" name="userName" class="form-control" id="exampleInputUsername"
                aria-describedby="userNameHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="rememberMe" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="exampleCheck1">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>