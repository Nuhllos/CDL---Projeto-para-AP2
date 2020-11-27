<?php

if (isset($_POST["delete"])) {
    $id = mysqli_real_escape_string($connection, trim($_POST["id"]));
    $user = mysqli_real_escape_string($connection, trim($_POST["user"]));
    $date = strtotime(mysqli_real_escape_string($connection, trim($_POST["date"])));
    $date = date("Y-m-d", $date);

    $sql = "delete from users where user_id='$id'";
    mysqli_query($connection, $sql);
    header("Location: ../site/students.php");
}

if (isset($_GET["delete"])) {
    $user = $_GET["delete"];

    $rec = mysqli_query($connection, "select * from users where user_id='$user'");
    $record = mysqli_fetch_array($rec);

    $user = $record["user"];
    $date = $record["year"];
    $id = $record["user_id"];
}
?>