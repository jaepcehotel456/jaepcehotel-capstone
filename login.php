<?php 
session_start();
include('header.php');
?>

<!-- Log in Section -->
    <section class="login-section spad">
      <div class="container text-center mb-3">
      <div class="text-left">
        <a class="btn btn-primary" href="?page_id=home" role="button">Back to Home</a>
      </div>
      </div>
        <div class="container">
            <div class="row">
               <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin">
            <div class="card-header">
                    <h3 class="card-title text-center">Sign In
                    </h3>
                </div>
         
            <form class="form-signin" method="POST" enctype="multipart/form-data" action="login-process">
               <div class="card-body">
              <div class="form-label-group">
                <input type="text" id="inputUser" class="form-control" name="username" required autofocus>
                <label for="inputUser">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control"  name="password" required>
                <label for="inputPassword">Password</label>
              </div>

         

              <!-- <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"><a href="admin-dashboard.html" class="text-white">login as admin / owner</a></button> -->
               <button class="btn btn-lg btn-primary btn-block text-uppercase" name="submit" type="submit" ><!-- <a href="?page_id=login-process" class="text-white"> -->login</a></button>

<!--                  <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"><a href="manager-dashboard.html" class="text-white">login as manager</a></button>
              <div class="d-block btn-center"> -->
               
                <center><a type="button" name="view" id="<?php echo $row['forgotpass']; ?>"  data-target="#view_data_modal" data-toggle="modal"><p class="text-center text-capitalize py-2">Forget Password</p></a></center>
                <!-- <a href="#forget-password.html"><p class="text-center text-capitalize py-2">forget password</p></a> -->
              
              <hr class="my-2">
                    <p class="text-center text-capitalize py-2">not a member yet?</p>
                    <div class="d-block btn-center">
                        <a href="?page_id=register" class="btn-join btn-lg btn-primary text-uppercase">join now</a>
                    </div>
             </div>
<!--              <h5 class="text-danger text-center"><?=msg; ?></h5> -->
            </form>
          </div>
        </div>
      </div>
            </div>
        </div>
    </section>
    <!-- Log in Section -->

       <!-- VIEW Forgot pass -->
         <!-- add class modal -->
  <div class="modal fade" id="view_data_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Forgot Password</h5>
            </div>
                <div class="modal-body">
                    <div class="">
                        <form method="POST" id="insert_form">
                            <div class="col-lg-12">
                              

                                <!-- Notes -->
                                    <div class="row">
                                      <div class="col-md-12" text-align="center">
                                            <div class="form-group mb-4">
                                             <p><b>To reset your password. Please contact the administrator! </p>
                                             <p>Send us a message at administrator@jaepcehotel.com or call us at (032 1234)</p>
                                             
                                            </div>
                                      </div>
                                      
                                    </div>
                                                                       
                                  
                                    

                            </div>
                              <div class="col-lg-12">
                                  <div class="container">
                                      <div class="row">
                                              
                                      
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      </div>            
                                  </div>
                            </div>
                            <hr>
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>


