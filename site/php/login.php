<?php
session_start();

include("../../db/connection.php");

if (empty($_POST["user"]) || empty($_POST["password"])) {
    $_SESSION["empty_field"] = true;
    header("Location: ../login.php");
    exit();
}

$user = mysqli_real_escape_string($connection, $_POST["user"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);

$query = "select user_id, user from users where user = '{$user}' and password = md5('$password')";

$result = mysqli_query($connection, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
    $_SESSION["user"] = $user;
    $_SESSION["authenticated"] = true;
    header("Location: ../panel.php");
    exit();
} else {
    $_SESSION["unauthenticated"] = true;
    header("Location: ../login.php");
    exit();
}
?>