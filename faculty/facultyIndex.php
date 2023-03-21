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
    <title>Open Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <!-- create Account Modal -->
<div class="modal fade" id="createAccountModal" tabindex="-1" aria-labelledby="createAccountModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="createAccountModalLabel">Add Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <!-- create Account Modal Form -->
          <form method="POST" action="partials/_handleCreateAccountModal.php">
  
            <div class="mb-3">
              <label for="createAccountModalEmail" class="form-label">Email</label>
              <input type="text" class="form-control" id="createAccountModalEmail" name="createAccountModalEmail" placeholder="example@gmail.com" >
            </div>
            <div class="mb-3">
              <label for="createAccountModalPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="createAccountModalPassword" name="createAccountModalPassword">
            </div>
           
            <button type="submit" class="btn btn-primary">Create Account</button>
  
          </form>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Course Modal -->
  <div class="modal fade" id="courseAddModal" tabindex="-1" aria-labelledby="courseAddModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="courseAddModalLabel">Add Course</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          
          <!-- Add course modal Form -->
          <form method="POST" action="partials/_handleCourseAddModal.php">
  
            <div class="mb-3">
              <label for="courseAddModalId" class="form-label">Course Id</label>
              <input type="text" class="form-control" id="courseAddModalId" name="courseAddModalId" placeholder="" required>
            </div>
            <div class="mb-3">
              <label for="courseAddModalName" class="form-label">Course Name</label>
              <input type="text" class="form-control" id="courseAddModalName" name="courseAddModalName" placeholder="" >
            </div>
            <div class="mb-3">
              <label for="courseAddModalInstructor" class="form-label">Instructor Name</label>
              <input type="text" class="form-control" id="courseAddModalInstructor" name="courseAddModalInstructor" placeholder="" >
            </div>
            <div class="mb-3">
              <label for="courseAddModalDescription" class="form-label">Course Description</label>
              <input type="text" class="form-control" id="courseAddModalDescription" name="courseAddModalDescription" placeholder="" >
            </div>
           
            <button type="submit" class="btn btn-primary">Add Course</button>
  
          </form>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


    <!-- nav bar-->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="facultyIndex.php">OpenCourse</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="facultyIndex.php">Home</a>
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
              <p class=" m-2 text-light ">Welcome Faculty</p>
              <a href="partials/_logout.php" class="btn btn-outline-success mx-2">Log Out</a>
              
             
          </div>
        </div>
      </nav>

      <!-- alert -->
      <?php
        if(isset($_GET['signUp']) && $_GET['signUp']== 'true'){
  echo '<div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
  <strong>Success!</strong> You have been successfully signed in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}else if(isset($_GET['signUp']) && $_GET['signUp'] == 'false' ){
  echo '<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
  <strong>Sorry!</strong> '.$_GET["error"].'.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
      ?>

    <!-- slides -->
    <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://source.unsplash.com/2400x600/?learn" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x600/?classroom" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="https://source.unsplash.com/2400x600/?study" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- categories -->
    <div class="container my-5">
      <h2 class="text-center mb-4">Select Task</h2>

      

      <div class="row">

                    <div class="col-md-4 my-2">
                      <div class="card" style="width: 18rem;">
                        <img src="https://source.unsplash.com/500x400/?student" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"><a href="" style="text-decoration:none">Student Account</a></h5>
                          <p class="card-text">Faculty can Create Account</p>
                          <!--
                          <a href="course.html" class="btn btn-primary">Enroll</a>
                        -->
                          <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#createAccountModal">Create</button>
        
                        </div>
                      </div>
                    </div>

                    <div class="col-md-4 my-2">
                        <div class="card" style="width: 18rem;">
                          <img src="https://source.unsplash.com/500x400/?learn" class="card-img-top" alt="...">
                          <div class="card-body">
                            <h5 class="card-title"><a href="" style="text-decoration:none">Add Course</a></h5>
                            <p class="card-text">Faculty Can add Courses</p>
                            <!--
                            <a href="course.html" class="btn btn-primary">Enroll</a>
                          -->
                            <button class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#courseAddModal">Add</button>
          
                          </div>
                        </div>
                      </div>

                      

        
      </div>


    </div>



    <!-- footer -->
    <div class="container-fluid bg-dark text-light py-2">
        <p class="text-center mt-2">Copyright OpenCourse Forum 2023 | All right reserved</p>
      </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
