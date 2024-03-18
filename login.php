<?php
    $login=true;
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        require 'connect.php';
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql="select * from `userinfo` where email='$email'";
        $result=mysqli_query($conn,$sql);
        $num=mysqli_num_rows($result);
        if ($num == 1){
          while($row=mysqli_fetch_assoc($result)){

              if (password_verify($password, $row['password'])){ 
                
                  $login = true;
                  session_start();
                  $_SESSION['logged_in'] = true;
                  $_SESSION['name'] = $row['name'];
                  header("location: wellcome.php");
              }
              else{
                $login=false;
              }
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login</title>
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
                <form action="\LOGINSYSTEM\login.php" method="post">
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input
                      type="email"
                      id="form2Example1"
                      class="form-control"
                      name="email";
                    />
                    <label class="form-label" for="form2Example1"
                      >Email address</label
                    >
                  </div>
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input
                      type="password"
                      id="form2Example2"
                      class="form-control"
                      name="password"
                    />
                    <label class="form-label" for="form2Example2"
                      >Password</label
                    >
                  </div>
                  <!-- Submit button -->
                  <div class="container">
                    <div class="row">
                      <div class="col text-center">
                        <button
                          type="submit"
                          class="btn btn-primary btn-block mb-4"
                        >
                          Sign in
                        </button>
                      </div>
                    </div>
                  </div>

                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>Not a member? <a href="signup.php">Register</a></p>
                  </div>
                </form>
                <?php
                    if(!$login){
                        echo"<div
                          class='alert alert-danger alert-dismissible fade show'
                          role='alert'>
                          <strong>ERROR!</strong><br> Name and password not match
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
