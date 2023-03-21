<?php
  require 'partials/_dbconnect.php';
  session_start();
  if($_SESSION['loggedIn'] != true){
    header('Location: /login-dir/openCourseSelector/');
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Select Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>

    <!-- nav bar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="studentIndex.php">OpenCourse</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="studentIndex.php">Home</a>
              </li>
              <!--
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              -->
              <li class="nav-item dropdown">
                <ul class="dropdown-menu">
                
                    <li><a class="dropdown-item" href=""></a></li>
                  
      
                </ul>
              </li>
              
            </ul>
              <p class=" m-2 text-light ">Welcome</p>
              <a href="partials/_logout.php" class="btn btn-outline-success mx-2">Log Out</a>
              
             
          </div>
        </div>
      </nav>




    <div class="container">
      <h1 class="text-center mt-5">Hello, world!</h1>
  <div class="mb-3">
      <?php
        $courseId = $_GET['courseId'];
        $sql = "SELECT * FROM `courses` WHERE `course_id` = '$courseId';";
        $sqlResult = mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($sqlResult)){

          echo '

  <label for="courseName" class="form-label">Course Name</label>
  <input type="text" class="form-control" id="courseName" placeholder="'.$row['course_name'].'" readonly>
</div>
<div class="mb-3">
  <label for="instructorName" class="form-label">Instructor Name</label>
  <input type="text" class="form-control" id="instructorName" placeholder="'.$row['instructor_name'].'">
</div>
<div class="mb-3">
  <label for="courseDescription" class="form-label">Course Description</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>'.$row['course_description'].'</textarea>
</div>

<a href="enroll.php?courseId='.$courseId.'" type="submit" class="btn btn-primary">Enroll</a>
          ';
        }
      ?>
  
</div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>