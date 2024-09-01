


<!doctype html>
<?php 
    if(isset($_GET['email_address'])){
        $email = $_GET['email_address'];
      
    }else{
        header('Location: ./auth-new-password.php?email-missing=true');
    } 
?>
<html lang="en">

<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>All Marc Spares </title>
      
      <!-- Favicon -->
<link rel="shortcut icon" href="../assets/images/AMSpares.jpg">
      <link rel="stylesheet" href="../assets/css/backend-plugin.min.css">
      <link rel="stylesheet" href="../assets/css/backende209.css?v=1.0.0">
      <link rel="stylesheet" href="../assets/vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="../assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="../assets/vendor/remixicon/fonts/remixicon.css">  </head>
  <body class=" ">
  
  
    
    
      <div class="wrapper">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Plaese enter new password</h2>
                                 <p>Password must match.</p>
                                 <form action="update_password.php" method="POST">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control"  name="password" id="password" type="password" placeholder=" ">
                                             <label>New Password</label>
                                          </div>
                                          <div class="floating-label form-group">
                                            <input class="floating-input form-control"  name="r_password" id="r_password" type="password" placeholder=" ">
                                            <label>Re-type Password</label>
                                         </div>
                                         <div class="floating-label form-group">
                                         <input class="floating-input form-control" name= "email_address" id="email_address" type="text" value=" <?=$email; ?>" hidden>
                                       </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="button" class="btn btn-danger"  onclick="window.location.href='auth-recoverpw.php'">Back</button>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="../assets/images/AMSpares.jpg" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="../assets/js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="../assets/js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="../assets/js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="../assets/js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="../assets/js/app.js"></script>
  </body>

</html>