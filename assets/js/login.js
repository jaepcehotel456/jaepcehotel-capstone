//== Class Definition

var SnippetLogin = function() {



    var login = $('#m_login');



    var showErrorMsg = function(form, type, msg) {

      var alert = $('<div class="m-alert m-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
            <span></span>\
        </div>');



        form.find('.alert').remove();

        alert.prependTo(form);

        alert.animateClass('fadeIn animated');

        alert.find('span').html(msg);

    }



    //== Private Functions



    var displaySignUpForm = function() {

        login.removeClass('m-login--forget-password');

        login.removeClass('m-login--signin');



        login.addClass('m-login--signup');

        login.find('.m-login__signup').animateClass('flipInX animated');

    }



    var displaySignInForm = function() {

        login.removeClass('m-login--forget-password');

        login.removeClass('m-login--signup');



        login.addClass('m-login--signin');

        login.find('.m-login__signin').animateClass('flipInX animated');

        

    }



    var displayForgetPasswordForm = function() {

        login.removeClass('m-login--signin');

        login.removeClass('m-login--signup');



        login.addClass('m-login--forget-password');

        login.find('.m-login__forget-password').animateClass('flipInX animated');

    }



    var handleFormSwitch = function() {

        $('#m_login_forget_password').click(function(e) {

            e.preventDefault();

            displayForgetPasswordForm();

        });



        $('#m_login_forget_password_cancel').click(function(e) {

            e.preventDefault();

            displaySignInForm();

        });



        $('#m_login_signup').click(function(e) {

            e.preventDefault();

            displaySignUpForm();

        });



        $('#m_login_signup_cancel').click(function(e) {

            e.preventDefault();

            displaySignInForm();

        });

    }



    var handleSignInFormSubmit = function() {

        $('#m_login_signin_submit').click(function(e) {

            e.preventDefault();

            var btn = $(this);

            var form = $(this).closest('form');



            form.validate({

                rules: {

                    username: {

                        required: true

                  

                    },

                    password: {

                        required: true

                    }

                }

            });



            if (!form.valid()) {

                return;

            }

            

            let g = window.location.origin+'/api/AdminLoginProcess';

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({

                type:"POST",

               

                data: {

                    username: username.value,

                    password: password.value

                },

                url: window.location.origin+'/jicc/api/AdminLoginProcess',

                success: function(response, status, xhr, $form) {

                    // similate 2s delay

                    if(response == "0")

                    {

                        setTimeout(function() {

                            window.location.replace("http://localhost/jicc/admin/AdminDashboard");

                        }, 2000);

                    }

                    else if(response == "01")

                    {

                        setTimeout(function() {

                            window.location.replace("http://localhost/jicc/admin/AdminDashboard");

                        }, 2000);

                    }

                    else if(response == "1")

                    {

                        setTimeout(function() {

                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

                            showErrorMsg(form, 'danger', 'Your account is locked. Please contact the system administrator.');

                        }, 2000);

                    }

                    else if(response == "2")

                    {

                        setTimeout(function() {

                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

                            showErrorMsg(form, 'danger', 'Incorrect username or password. Please try again.');

                        }, 2000);



                    }

                    else{

                        setTimeout(function() {

                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

                            showErrorMsg(form, 'danger', 'Something went wrong we are currently fixing it.');

                        }, 2000);

                    }

                	

                }

            });

        });

    }



    var handleSignUpFormSubmit = function() {

        $('#m_login_signup_submit').click(function(e) {

            e.preventDefault();



            var btn = $(this);

            var form = $(this).closest('form');



            form.validate({

                rules: {

                    fname: {

                        required: true

                    },

                    lname: {

                        required: true

                    },

                    email: {

                        required: true,

                        email: true

                    },

                    birthdate: {

                        required: true,

                        date:true

                    },

                    contact: {

                        required: true,

                        digits:true,

                        minlength: 11,

                        maxlength: 11

                    },

                   

                    password: {

                        required: true,

                        minlength: 8

                    },

                    agree: {

                        required: true

                    }

                }

            });



            if (!form.valid()) {

                return;

            }



            let h = window.location.origin+'/controller/registerProcess';

            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

            form.ajaxSubmit({

                url: '',

                success: function(response, status, xhr, $form) {

                	// similate 2s delay

                	setTimeout(function() {

	                    btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false);

	                    form.clearForm();

	                    form.validate().resetForm();



	                    // display signup form

	                    displaySignInForm();

	                    var signInForm = login.find('.m-login__signin form');

	                    signInForm.clearForm();

	                    signInForm.validate().resetForm();



	                    showErrorMsg(signInForm, 'success', 'Thank you. To complete your registration please check your email.');

	                }, 2000);

                }

            });

        });

    }



    var handleForgetPasswordFormSubmit = function() {

        $('#m_login_forget_password_submit').click(function(e) {

            e.preventDefault();

           

            var btn = $(this);

            var form = $(this).closest('form');



            form.validate({

                rules: {

                    email: {

                        required: true,

                        email: true

                    }

                }

            });



            if (!form.valid()) {

                return;

            }



            btn.addClass('m-loader m-loader--right m-loader--light').attr('disabled', true);

           

            form.ajaxSubmit({

                type:"POST",

                data: {

                    email: m_email.value

                },

                url: window.location.origin+'/api/EmailProcess.php',

                success: function(response, status, xhr, $form) { 

       

                    if(response == 1){

                    // similate 2s delay

                    setTimeout(function() {

                        btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove 

                        form.clearForm(); // clear form

                        form.validate().resetForm(); // reset validation states



                        // display signup form

                        displaySignInForm();

                        var signInForm = login.find('.m-login__signin form');

                        signInForm.clearForm();

                        signInForm.validate().resetForm();



                        showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');

                    }, 2000);

                    }

                    else{

                        // similate 2s delay

                        setTimeout(function() {

                            btn.removeClass('m-loader m-loader--right m-loader--light').attr('disabled', false); // remove 

                            form.clearForm(); // clear form

                            form.validate().resetForm(); // reset validation states



                            // display signup form

                            displaySignInForm();

                            var signInForm = login.find('.m-login__signin form');

                            signInForm.clearForm();

                            signInForm.validate().resetForm();



                            showErrorMsg(signInForm, 'error', 'Your email did not match in any of our records. Please contact the administrator');

                        }, 2000);

                    }

                	

                }

            });

        });

    }



    //== Public Functions

    return {

        // public functions

        init: function() {

            handleFormSwitch();

            handleSignInFormSubmit();

            handleSignUpFormSubmit();

            handleForgetPasswordFormSubmit();

        }

    };

}();



//== Class Initialization

jQuery(document).ready(function() {

    SnippetLogin.init();

});