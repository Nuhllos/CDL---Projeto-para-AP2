<?php
if (isset($_POST["insert"])) {
    $user = $_POST["user"];
    $course = $_POST["course"];

    $sql = "insert into students_course (student_id, course_id) values ('$user', '$course')";
    mysqli_query($connection, $sql);
    header("Location: ../site/registration.php");
}
?>