<?php

$sql = "select student_course_id, users.user, course.course_name from students_course join users on students_course.student_id = users.user_id join course on students_course.course_id = course.course_id";

$result = mysqli_query($connection, $sql);
?>