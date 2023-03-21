<?php
	session_start();
	session_unset();
	session_destroy();
	header('Location: /login-dir/openCourseSelector/student/studentLogin.php?logout=true');
?>