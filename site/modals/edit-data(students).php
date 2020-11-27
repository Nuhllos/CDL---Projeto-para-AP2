<?php

$id = 0;
$user = "";
$date = "";

if (isset($_POST["update"])) {
    $id = mysqli_real_escape_string($connection, trim($_POST["id"]));
    $user = mysqli_real_escape_string($connection, trim($_POST["user"]));
    $date = strtotime(mysqli_real_escape_string($connection, trim($_POST["date"])));
    $date = date("Y-m-d", $date);

    $sql = "update users set user = '$user', year = '$date' where user_id = '$id'";
    mysqli_query($connection, $sql);
    header("Location: ../site/students.php");
}

if (isset($_GET["edit"])) {
    $student = $_GET["edit"];

    $rec = mysqli_query($connection, "select * from users where user_id='$student'");
    $record = mysqli_fetch_array($rec);

    $user = $record["user"];
    $date = $record["year"];
    $id = $record["user_id"];
}
?>