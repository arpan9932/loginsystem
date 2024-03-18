<?php
 $exits=false;
 $isequal=false;
if($_SERVER['REQUEST_METHOD']=='POST'){
include 'connect.php';
$username=$_POST["Name"];
$Email=$_POST["Email"];
$fPassword=$_POST["fPassword"];
$sPassword=$_POST["sPassword"];
$exitsql="SELECT * FROM `userinfo` WHERE email ='$Email'";
$result=mysqli_query($conn,$exitsql);
$rowcount=mysqli_num_rows($result);
if($rowcount>0)
 { 
  $exits='email aredy exits'; 
} 
else
{
  if($sPassword==$fPassword)
  {
    $hash=password_hash($fPassword,PASSWORD_DEFAULT);
    $sql = "INSERT INTO `userinfo` (`name`,`email`, `password`, `td`) VALUES ('$username', '$Email', '$hash',current_timestamp())";
     $result = mysqli_query($conn,$sql);
    header("location:login.php");
  }
  else{
    $isequal='both password must be same';
  }
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Signup</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <section class="vh-100" style="background-color: #eee">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-12 col-xl-11">
            <div class="card text-black" style="border-radius: 25px">
              <div class="card-body p-md-5">
                <div class="row justify-content-center">
                  <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">
                      Sign up
                    </p>

                    <form
                      class="mx-1 mx-md-4"
                      action="\LOGINSYSTEM\signup.php"
                      method="post"
                    >
                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="text"
                            id="form3Example1c"
                            class="form-control"
                            name="Name"
                            maxlength="11"
                          />
                          <label class="form-label" for="form3Example1c"
                            >Your Name</label
                          >
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="email"
                            id="form3Example3c"
                            class="form-control"
                            name="Email"
                          />
                          <label class="form-label" for="form3Example3c"
                            >Your Email</label
                          >
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            id="form3Example4c"
                            class="form-control"
                            name="fPassword"
                          />
                          <label class="form-label" for="form3Example4c"
                            >Password</label
                          >
                        </div>
                      </div>

                      <div class="d-flex flex-row align-items-center mb-4">
                        <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                        <div class="form-outline flex-fill mb-0">
                          <input
                            type="password"
                            id="form3Example4cd"
                            class="form-control"
                            name="sPassword"
                          />
                          <label class="form-label" for="form3Example4cd"
                            >Repeat your password</label
                          >
                        </div>
                      </div>

                      <div
                        class="d-flex justify-content-center mx-4 mb-3 mb-lg-4"
                      >
                        <button type="submit" class="btn btn-primary btn-lg">
                          Signup
                        </button>
                      </div>
                      <div class="text-center">
                        <p>Alredy a member? <a href="login.php">Login</a></p>
                      </div>
                    </form>
                <?php
                        if($exits){
                          echo"<div
                          class='alert alert-danger alert-dismissible fade show'
                          role='alert'>
                          <strong>ERROR!</strong> ".$exits."
                          <button
                            type='button'
                            class='btn-close'
                            data-bs-dismiss='alert'
                            aria-label='Close'
                          ></button>
                        </div>"; 
                          }
                          if($isequal){
                            echo"<div
                            class='alert alert-danger alert-dismissible fade show'
                            role='alert'
                          >
                            <strong>ERROR!</strong> ".$isequal."
                            <button
                              type='button'
                              class='btn-close'
                              data-bs-dismiss='alert'
                              aria-label='Close'
                            ></button>
                          </div>"; 
                            }
                  ?>
                    
                  </div>
                  <div
                    class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2"
                  >
                    <img
                      src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                      class="img-fluid"
                      alt="Sample image"
                    />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>