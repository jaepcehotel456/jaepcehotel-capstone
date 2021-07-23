<?php include('navbar.php'); ?>
      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Registration</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

 <!-- Register Page Content -->
        <section class="section-register py-2">
                <form class="form-register" method="POST" action="register-process" enctype="multipart/form-data">
                    <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">about you</h3>
                                        <div class="row">
                                           

                                            <div class="col-sm-3">
                                                <div class="form-label-group">
                                                    <p>Title*</p>
                                                    <select name="gender" required>
                                                        <option disabled="Please select...">Please select...</option>
                                                        <option value="Mr.">Mr.</option>
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mrs.">Mrs.</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <p>Firstname*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputFirstname" class="form-control"  name='fname' required autofocus>
                                                    <label for="inputFirstname">Firstname</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <p>Middle Initial*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputMiddlename" class="form-control"  name='midname' maxlength="1">
                                                    <label for="inputMiddlename">M.I</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <p>Lastname*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputLastname" class="form-control"  name='lname' required>
                                                    <label for="inputLastname">Lastname</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>Email Address*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputEmail" class="form-control" name='email' required>
                                                    <label for="inputEmail">Email Address</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Birthdate*</p>
                                                <div class="form-group">
                                                    <input type="date" class="form-control" name="birthdate">
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Profile Picture*</p>
                                                <div class="form-group">
                                                   <input type="file" class="form-control" id="name" name="image_link" required>
                                                         </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">login details</h3>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>Username*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputUsername" class="form-control"  name="username" required>
                                                    <label for="inputUsername">Username</label>
                                                </div>
                                            </div>
                                    <!--  -->
                                            <div class="col-sm-4">
                                                <p>Password*</p>
                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword" class="form-control"  name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autofocus>
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Confirm Password*</p>
                                                <div class="form-label-group">
                                                    <input type="password" id="inputConfirm" class="form-control"  name="confirm_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required autofocus>
                                                    <label for="inputConfirm">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4"></div>
                                            <div class="col-sm-8">
                                                 <p class="info-pass d-block">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.</p>
                                               </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                    <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">your address</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Address*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputAddress" class="form-control"  name="address" required>
                                                    <label for="inputAddress">Address</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>City*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputCity" class="form-control"  name='city' required autofocus>
                                                    <label for="inputCity">City</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Post Code*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputPostCode" class="form-control"  name="postcode" required>
                                                    <label for="inputPostCode">Post Code</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <!-- <div class="form-label-group">
                                                    <p>Country/Region*</p>
                                                    <select>
                                                        <option>Country/Region</option>
                                                        <option>Country/Region 1</option>
                                                        <option>Country/Region 2</option>
                                                    </select>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">contact information</h3>
                                        <div class="row">
                                             <div class="col-sm-2">
                                                <div class="form-label-group">
                                                    <p>Country Code</p>
                                                    <select name="country">
                                                        <option disabled="Please Select..">Please Select..</option>
                                                        <option value="Philippines">Philippines</option>
                                                        <option value="Australia">Australia</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- <div class="col-sm-5">
                                                <p>Area Code*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputAreaCode" class="form-control" placeholder="Area Code" required autofocus>
                                                    <label for="inputAreaCode">Area Code</label>
                                                </div>
                                            </div> -->
                                     
                                         <div class="col-sm-5">
                                                <p>Phone Number*</p>
                                                <div class="form-label-group">
                                                    <input type="tel" id="inputPhoneNumber" class="form-control"  name="contactnumber" required>
                                                    <label for="inputPhoneNumber" class="label-test">Phone Number</label>
                                                    <input type="hidden" name="person_type" value="guest">
                                                </div>
                                            </div>
                                       </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

              

                      <div class="row my-5" style="background-color:black">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container"> 
                                       <div class="row">
                                                <div class="col-sm-1 px-0">
                                                 <div class="custom-control custom-checkbox mb-2">
                                                    <input type="checkbox" class="custom-control" id="customCheck1">
                                                </div></div>
                                                <div class="col-sm-11">
                                                      I have read and understood the <a href="img/2dbox_instructions_20201026.pdf" target="_blank">JAEPCE Hotel terms & conditions</a>
                                                      </div>
                                               
                                                    
                                             </div>

                                              <div class="d-block">
                                                         <button class="btn-join btn-lg btn-primary text-uppercase" name="registerbtn">join now</button>
                                                     </div>

                                       </div> 
                                    </div>
                                </div>
                            </div>
                         </div>
                     </form>
                 </div>
          </section>
        <!-- Register Page Content End -->

  
   <script type="text/javascript">
       var inputPassword = document.getElementById("inputPassword")
          , inputConfirm = document.getElementById("inputConfirm");

        function validatePassword(){
          if(inputPassword.value != inputConfirm.value) {
            inputConfirm.setCustomValidity("Passwords Don't Match");
          } else {
            inputConfirm.setCustomValidity('');
          }
        }

        inputPassword.onchange = validatePassword;
        inputConfirm.onkeyup = validatePassword;
   </script>