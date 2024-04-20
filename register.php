<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.png" />
    <style>
        #wrongPass{
            visibility:hidden;
        }
        </style>
  </head>
  <body>
  <?php
        if(isset($_GET['error']))
            {
    ?>
    <div class="alert alert-danger" style="width: fit-content;">
        <?php
            echo $_GET['error'];
            }
        ?>
    </div>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST" id="myForm" enctype="multipart/form-data">
                  <div class="form-group" id="registerForm">
                    <label>Name</label>
                    <input type="text" id="name" name="name" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Surname</label>
                    <input type="text" id="surname" name="surname" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" id="email" name="email" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="md-textarea form-control" name="address" id="address" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Work Address</label>
                    <textarea class="md-textarea form-control" name="workAddress" id="workAddress" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" id="occupation" name="occupation" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Profile Pic:</label>
                    <input type="file" id="pic" accept="image/*" name="pic" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" id="password" name="password" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Confirm Password</label>
                    <input type="password" id="confirmPassword" name="confirmPasswordd" onkeyup="validate_password()" class="form-control p_input" required>
                  </div>
                  <div class="text-center">
                    <button onclick="validate_password()" class="btn btn-primary btn-block enter-btn" >Register</button>
                  </div>
                  <p class="terms">By creating an account you are accepting our<a href="terms.php"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="assets/js/off-canvas.js"></script>
    <script src="assets/js/hoverable-collapse.js"></script>
    <script src="assets/js/misc.js"></script>
    <script src="assets/js/settings.js"></script>
    <script src="assets/js/todolist.js"></script>
    <script>
        function validate_password()
        {
            $password = document.getElementById('password').value;
            $passwordConfirmation = document.getElementById('confirmPassword').value;

            if($password != $passwordConfirmation)
            {
                document.getElementById('wrongPass').style.visibility = 'visible';
                exit();
            }
            else if($password === $passwordConfirmation)
            {
                document.getElementById('wrongPass').style.visibility = 'hidden';
                document.getElementById('myForm').action = "phpScripts/register.php";
            }
        }
    </script>
    <!-- endinject -->
    <div class="alert alert-danger" id="wrongPass" style="text-align: center; width:fit-content">
        <p>Passwords do not match!</p>
    </div>
  </body>

</html>