<?php
if (isset($_POST["insert"])) {
    $course = $_POST["course"];
    $workload = $_POST["workload"];

    $sql = "insert into course (course_name, workload) values ('$course', '$workload')";
    mysqli_query($connection, $sql);
    header("Location: ../site/courses.php");
}
?>