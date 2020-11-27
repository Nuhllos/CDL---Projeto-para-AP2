<?php

if (isset($_POST["delete"])) {
    $id = mysqli_real_escape_string($connection, trim($_POST["id"]));
    $user = mysqli_real_escape_string($connection, trim($_POST["user"]));
    $course = mysqli_real_escape_string($connection, trim($_POST["course"]));

    $sql = "delete from students_course where student_course_id = '$id'";
    mysqli_query($connection, $sql);

    header("Location: ../site/registration.php");
}

if (isset($_GET["delete"])) {
    $registration = $_GET["delete"];

    $rec = mysqli_query($connection, "select * from students_course where student_course_id = '$registration'");
    $record = mysqli_fetch_array($rec);

    $user = $record["student_id"];
    $course = $record["course_id"];
    $id = $record["student_course_id"];
}

if (isset($_GET["delete"])) {
    $registration2 = $_GET["delete"];

    $rec2 = mysqli_query($connection, "select student_course_id, users.user, course.course_name from students_course join users on students_course.student_id = users.user_id join course on students_course.course_id = course.course_id where student_course_id = '$registration2'");
    $record2 = mysqli_fetch_array($rec2);

    $user2 = $record2["user"];
    $course2 = $record2["course_name"];
    $id2 = $record2["student_course_id"];
}
?>