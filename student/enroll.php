<?php
	require 'partials/_dbconnect.php';
	$courseId = $_GET['courseId'];
	$sqlEnroll = "UPDATE `students` SET `course_id`='$courseId';";
	$sqlEnrollResult = mysqli_query($conn,$sqlEnroll);
	header("Location: /login-dir/openCourseSelector/student/courseSelect.php?courseId=".$courseId);
?>