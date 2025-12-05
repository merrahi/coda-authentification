<?php
require_once "classes/User.php";

$userId = $_GET["user_id"];

$user = new User();
$user->deleteUser($userId);

if ($user->deleteUser($userId)){
    header('location: profile.php?delete=true');
}else {
    header('location: profile.php?delete=false');
}