<?php

$id = 0;
$user = "";
$course = "";

if (isset($_POST["update"])) {
    $id = mysqli_real_escape_string($connection, trim($_POST["id"]));
    $user = mysqli_real_escape_string($connection, trim($_POST["user"]));
    $course = mysqli_real_escape_string($connection, trim($_POST["course"]));
    
    $sql = "update students_course set student_id = '$user', course_id = '$course' where student_course_id = '$id'";
    mysqli_query($connection, $sql);
    
    header("Location: ../site/registration.php");
}

if (isset($_GET["edit"])) {
    $registration = $_GET["edit"];

    $rec = mysqli_query($connection, "select * from students_course where student_course_id = '$registration'");
    
    $record = mysqli_fetch_array($rec);

    $user = $record["student_id"];
    $course = $record["course_id"];
    $id = $record["student_course_id"];
}
?>