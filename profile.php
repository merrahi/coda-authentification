<?php
require_once "classes/User.php";
session_start();
if (!isset($_SESSION['user']) && !isset($_COOKIE[('userCookie')])) {
    header('location: login.php');
}
$isDeleted = $_GET['delete'];
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
        .toright {
            float: right;
        }

        .hellow-user {
            margin: 15px 15px;
            padding: 15px 15px;
        }

        .btn {
            margin: 5px 5px;
            padding: 15px 15px;
        }

        table {
            margin: 20px;
        }
    </style>
</head>

<body>
    <?php
    $user = new User();
    $users = $user->getUsers();
    ?>
    <div class="hellow-user"> <span class=""> Bonjour <?php echo $_SESSION['userName'] ?? ""; ?> </span> <a
            href="logout.php" class="btn btn-primary toright" tabindex="-1" role="button"
            aria-disabled="true">Logout</a>
        </div>
        <?php 
            if($isDeleted){
                echo '<div class="alert alert-success" role="alert">
                User deleted </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                User not deleted </div>';
            }
        ?>

    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) { ?>
                <tr>
                    <th scope="row"><?= $user["id"] ?></th>
                    <td><?= $user["username"] ?></td>
                    <td><?= $user["passwordHash"] ?></td>
                    <td>
                        <a href="edit.php" class="btn btn-info" tabindex="-1" role="button" aria-disabled="true">Edit</a>
                        <a href="delete.php?user_id=<?= $user['id'] ?>" class="btn btn-danger" tabindex="-1" role="button"
                            aria-disabled="true">Delete</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <div class="hellow-user"><a href="register.php" class="btn btn-success toright" tabindex="-1" role="button"
            aria-disabled="true">Add User</a> </div>
</body>

</html>