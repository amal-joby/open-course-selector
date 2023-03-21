<?php
	require '_dbconnect.php';
	$error = "";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require '_dbconnect.php';
		$email = $_POST['createAccountModalEmail'];
		$password = $_POST['createAccountModalPassword'];

		$sql = "SELECT * FROM `students` WHERE `student_email`='$email';";
		$sqlResult = mysqli_query($conn,$sql);
		$numOfUsers = mysqli_num_rows($sqlResult);
		if($numOfUsers>0){
			$error = "User already exist";
		}else{
			$sql = "INSERT INTO `students`(`student_email`,`student_password`,`course_id`,`student_tstamp`) VALUES ('$email','$password','0',current_timestamp());";
			$sqlResult = mysqli_query($conn,$sql);
			if($sqlResult){
				header('location: /login-dir/openCourseSelector/faculty/facultyIndex.php?signUp=true');
				exit();
			}
		}
		header('location: /login-dir/openCourseSelector/faculty/facultyIndex.php?signUp=false&error='.$error);
	}
?>