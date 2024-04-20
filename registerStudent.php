<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register a student</title>
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
  </head>
  <body>
 
    </div>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register a student</h3>
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
                    <label>Date of Birth</label>
                    <input type="date" id="dob" name="dob" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Gender</label>
                    <select id="gender" name="gender">
                      <option value="male" id="male">Male</option>
                      <option value="female" id="female">Female</option>
                      <option value="other" id="other">Other</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <textarea class="md-textarea form-control" name="address" id="address" rows="3" required></textarea>
                  </div>
                  <div class="form-group">
                    <label>Grade Applying for(i.e 1-7):</label>
                    <input type="number" id="grade" name="grade" step="1" min="1" max="7" class="form-control p_input" required>
                  </div>
                  <div class="form-group">
                    <label>Upload Recommendation Letter:</label>
                    <input type="file" accept="file/pdf, file/docx" id="recommendation" name="recommendation" class="form-control p_input" required>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Register</button>
                  </div>
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
    <!-- endinject -->

  </body>

</html>