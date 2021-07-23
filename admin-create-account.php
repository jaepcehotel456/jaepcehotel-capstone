<?php include('admin/admin-navbar.php'); ?>


      <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section" style="background-image: url('../img/hero/hero-2.jpg'); 
    background-repeat: no-repeat; background-size: cover ">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text text-left">
                        <h2 class="text-white">Admin Create Account</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->

<!-- Register Page Content -->
        <section class="section-register py-2">
            <div class="container">
                <form class="form-register">
                    <div class="row my-5" style="background-color:#dfa974">
                        <div class="col-sm-12 mx-auto">
                            <div class="card card-register my-5">
                                <div class="card-body">
                                    <div class="container">
                                        <h3 class="card-title">Create Account</h3>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-label-group">
                                                    <p>First Name</p>
                                                      <div class="form-label-group">
                                                    <input type="text" id="inputFirstname" class="form-control" placeholder="Firstname" required>
                                                    <label for="inputFirstname">Firstname</label>
                                                </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Initial*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputInitial" class="form-control" placeholder="Initial" required>
                                                    <label for="inputInitial">Initial</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Lastname*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputLastname" class="form-control" placeholder="Lastname" required autofocus>
                                                    <label for="inputLastname">Lastname</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p>Position*</p>
                                                <select>
                                                        <option>Please select...</option>
                                                        <option>Title 1</option>
                                                        <option>Title 2</option>
                                                    </select>
                                            </div>
                                            <div class="col-sm-4">
                                                <p>Age*</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputAge" class="form-control" placeholder="Firstname" required>
                                                    <label for="inputAge">Age</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <p>Username</p>
                                                <div class="form-label-group">
                                                    <input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
                                                    <label for="inputUsername">Username</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>Password</p>
                                                <div class="form-label-group">
                                                    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required autofocus>
                                                    <label for="inputPassword">Password</label>
                                                </div>
                                            </div>
                                        </div>
                                          <div class="row">
                                            <div class="col-sm-6">
                                                 <p>Schedule*</p>
                                                <select>
                                                        <option>Monday</option>
                                                        <option>Title 1</option>
                                                        <option>Title 2</option>
                                                    </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <p>*</p>
                                                <select>
                                                        <option>Friday</option>
                                                        <option>Title 1</option>
                                                        <option>Title 2</option>
                                                    </select>
                                            </div>

                                        </div>
                                         <div class="row my-3">
                                               <a href="admin-dashboard.html" class="btn btn-info btn-sm text-right text-white" > Create</a>  
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

 