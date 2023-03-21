<?php
	require '_dbconnect.php';
	$error = "";
	if($_SERVER['REQUEST_METHOD']=='POST'){
		require '_dbconnect.php';
		$courseId = $_POST['courseAddModalId'];
		$courseName = $_POST['courseAddModalName'];
		$instructorName = $_POST['courseAddModalInstructor'];
		$courseDescription = $_POST['courseAddModalDescription'];
		/*
		#file name with a random number so that similar don't get replaced
		$pname = rand(1000,10000)."-".$_FILES["courseAddModalFile"]["name"];
		#temporary file name to store file
		$tname = $_FILES["courseAddModalFile"]["tmp_name"];

		#upload directore path
		$uploads_dir = '/images';

		#To move the uploaded file to specific location
		move_uploaded_file($tname, $uploads_dir.'/'.$pname);
		*/
		//$target = "images/".basename($_FILES['courseAddModalFile']['name']);



		
		$sql = "SELECT * FROM `courses` WHERE `course_id`='$courseId';";
		$sqlResult = mysqli_query($conn,$sql);
		$numOfCourse = mysqli_num_rows($sqlResult);
		if($numOfCourse>0){
			$error = "Course already exists";
		}else{
			$sql = "INSERT INTO `courses`(`course_id`,`course_name`,`instructor_name`,`course_description`,`tstamp`) VALUES('$courseId','$courseName','$instructorName','$courseDescription',current_timestamp());";
			$sqlResult = mysqli_query($conn,$sql);
			if($sqlResult){
				header('location: /login-dir/openCourseSelector/faculty/facultyIndex.php?addedd=true');
				exit();
			}
		}
		header('location: /login-dir/openCourseSelector/faculty/facultyIndex.php?addedd=false&error='.$error);
	}
?>