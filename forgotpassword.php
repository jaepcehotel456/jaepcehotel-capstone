<?php 
session_start();
error_reporting(0);
session_destroy();
include('dbconnections.php');
?>


<!-- UNFINISHED FORGOTPASSWORD. PARA NI SA LIVE SYSTEM/WEBSITE :) -->

<!DOCTYPE html>
<html lang="en" >
	<!-- begin::Head -->
	<head>
		<meta charset="utf-8" />
		<title>
			Jaepce Hotel
		</title>
		<meta name="description" content="Latest updates and statistic charts">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
          WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
		</script>
		<!--end::Web font -->
        <!--begin::Base Styles -->
		<link href="assets/css/vendors.bundle.css" rel="stylesheet" type="text/css" />
		<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
		<!--end::Base Styles -->
		<link rel="shortcut icon" href="img/default-image1.jpg" />
	</head>
	<!-- end::Head -->
    <!-- end::Body -->
	<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default"  >
		<!-- begin:: Page -->
		<div class="m-grid m-grid--hor m-grid--root m-page">
			<div class="m-grid__item m-grid__item--fluid m-grid m-grid--hor m-login m-login--signin m-login--2 m-login-2--skin-3" id="m_login" style="background-image: url(../assets/images/bg-2.jpg);">
				<div class="m-grid__item m-grid__item--fluid	m-login__wrapper">
					<div class="m-login__container">
						<div class="m-login__logo">
							<a href="#">
							<img src="img/default-image1.jpg" width="150vw">
							</a>
						</div>
						<div class="m-login__signin">
							<div class="m-login__head">
								<h3 class="m-login__title">
                                    Jaepce Hotel
								</h3>
							</div>
                           

<?php
$valueOfUrl = $_GET['securedtoken'];
$valueOfUrl = mysqli_real_escape_string($databaseconnection,$valueOfUrl);
$sqlQuery = "SELECT * FROM person WHERE guid = '$valueOfUrl' ";
$executeQuery = mysqli_query($databaseconnection,$sqlQuery);
$hasvalue = mysqli_num_rows($executeQuery);
if($hasvalue > 0 && isset($_GET['securedtoken'])){
    while ($row = mysqli_fetch_array($executeQuery)) {
?>

					<form class="m-login__form m-form" action="forgotpasswordprocess" method="POST">
								<div class="form-group m-form__group">
									<input class="form-control m-input" type="password" placeholder="New Password" name="password" id="password">
                                    <input hidden name="personid" value="<?php echo $row['person_id']; ?>">
								</div>
								<div class="row m-login__form-sub">
									<div class="col m--align-left m-login__form-left">
										<label class="m-checkbox m-checkbox--focus">
											<input type="checkbox" name="remember">
											Remember me
											<span></span>
										</label>
									</div>
								</div>
								<div class="m-login__form-action">
									<button id="m_login_signin_submit" type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn">
										Reset Password
									</button>
								</div>
                            </form>
                           <?php
                        
                        } }
                        else{
                             ?>
                            <form class="m-login__form m-form">
                            <div class="form-group m-form__group">
                               <h2>The link you have visited has already expired!</h2>
                            </div>
                        </form>
                            <?php 
                        }
                         ?>

   

						</div>
				
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->
    	<!--begin::Base Scripts -->
		<script src="assets/js/vendors.bundle.js" type="text/javascript"></script>
		<script src="assets/js/scripts.bundle.js" type="text/javascript"></script>
	</body>
	<!-- end::Body -->
</html>



