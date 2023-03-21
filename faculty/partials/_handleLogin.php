<?php
  require '_dbconnect.php';

  if($_SERVER['REQUEST_METHOD']=='POST'){
    require '_dbconnect.php';
    $adminEmail = $_POST['admin_email'];
    $adminPassword = $_POST['admin_pwd'];

    $sql = "SELECT * FROM `admin` WHERE `admin_email`='$adminEmail';";
    $sqlResult = mysqli_query($conn,$sql);
    $recordCount = mysqli_num_rows($sqlResult);
    if($recordCount==1){
      $row = mysqli_fetch_assoc($sqlResult);
      if($adminPassword == $row['admin_pwd']){
        session_start();
        $_SESSION['loggedIn']=true;
        $_SESSION['adminEmail']=$adminEmail;
        $_SESSION['UserId'] = $row['slno'];
        header('Location: /login-dir/openCourseSelector/faculty/facultyIndex.php?login=true');
        exit();
      }
      else{
        $error = "Password is incorrect";
      }
    }else{
      $error = "User doesn't exist";
    }
    header('Location: /login-dir/openCourseSelector/faculty/facultyLogin.php?login=false&error='.$error);
  }
?> 