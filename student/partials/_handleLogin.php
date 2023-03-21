<?php
  require '_dbconnect.php';

  if($_SERVER['REQUEST_METHOD']=='POST'){
    require '_dbconnect.php';
    $studentEmail = $_POST['student_email'];
    $studentPassword = $_POST['student_password'];

    $sql = "SELECT * FROM `students` WHERE `student_email`='$studentEmail';";
    $sqlResult = mysqli_query($conn,$sql);
    $recordCount = mysqli_num_rows($sqlResult);
    if($recordCount==1){
      $row = mysqli_fetch_assoc($sqlResult);
      if($studentPassword == $row['student_password']){
        session_start();
        $_SESSION['loggedIn']=true;
        $_SESSION['studentEmail']=$studentEmail;
        $_SESSION['UserId'] = $row['slno'];
        header('Location: /login-dir/openCourseSelector/student/studentIndex.php?login=true');
        exit();
      }
      else{
        $error = "Password is incorrect";
      }
    }else{
      $error = "User doesn't exist";
    }
    header('Location: /login-dir/openCourseSelector/student/studentLogin.php?login=false&error='.$error);
  }
?> 