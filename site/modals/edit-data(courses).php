<?php

$id = 0;
$course = "";
$workload = "";

if (isset($_POST["update"])) {
    $id = mysqli_real_escape_string($connection, trim($_POST["id"]));
    $course = mysqli_real_escape_string($connection, trim($_POST["course"]));
    $workload = mysqli_real_escape_string($connection, trim($_POST["workload"]));

    $sql = "update course set course_name = '$course', workload = '$workload' where course_id = '$id'";
    mysqli_query($connection, $sql);
    header("Location: ../site/courses.php");
}

if (isset($_GET["edit"])) {
    $course = $_GET["edit"];

    $rec = mysqli_query($connection, "select * from course where course_id='$course'");
    $record = mysqli_fetch_array($rec);

    $course = $record["course_name"];
    $workload = $record["workload"];
    $id = $record["course_id"];
}
?>