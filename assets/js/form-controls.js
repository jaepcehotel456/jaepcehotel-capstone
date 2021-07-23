//== Class definition

var FormControls = function () {
    //== Private functions
    
    var demo1 = function () {
        $( "#m_form_1" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true,
                    minlength: 10 
                },
                url: {
                    required: true 
                },
                digits: {
                    required: true,
                    digits: true
                },
                creditcard: {
                    required: true,
                    creditcard: true 
                },
                phone: {
                    required: true,
                    phoneUS: true 
                },
                option: {
                    required: true
                },
                options: {
                    required: true,
                    minlength: 2,
                    maxlength: 4
                },
                memo: {
                    required: true,
                    minlength: 10,
                    maxlength: 100
                },

                checkbox: {
                    required: true
                },
                checkboxes: {
                    required: true,
                    minlength: 1,
                    maxlength: 2
                },
                radio: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                mApp.scrollTo(alert, -200);
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
            }
        });       
    }

    var demo2 = function () {
        $( "#addMemberForm" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                address: {
                    required: true
                },
                birthdate: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                person_type: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email is required"
                },
                fname: {
                    required: "First Name is required"
                },
                lname: {
                    required: "Last Name is required"
                },
                contact: {
                    required: "Contact Number is required",
                    number:"Please enter numbers Only"
                },
                address: {
                    required: "Address is required"
                },
                birthdate: {
                    required: "Birth Day is required"
                },
                password: {
                    required: "Password is required"
                }
            },
            
            //display error alert on form submit  

            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                $('#addMemberModal').animate({ scrollTop: 0 }, "slow");   
                },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }

    var demo5 = function () {
        $( "#editFormMember" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                address: {
                    required: true
                },
                birthdate: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                },
                person_type: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email is required"
                },
                fname: {
                    required: "First Name is required"
                },
                lname: {
                    required: "Last Name is required"
                },
                contact: {
                    required: "Contact Number is required",
                    number:"Please enter numbers Only"
                },
                address: {
                    required: "Address is required"
                },
                birthdate: {
                    required: "Birth Day is required"
                },
                password: {
                    required: "Password is required"
                }
            },
            
            //display error alert on form submit  

            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_2_msg');
                alert.removeClass('m--hide').show();
                $('#personUpdateModal').animate({ scrollTop: 0 }, "slow");
            },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }



    var demo3 = function () {
        $( "#m_form_3" ).validate({
            // define validation rules
            rules: {
                //=== Client Information(step 3)
                //== Billing Information
                billing_card_name: {
                    required: true
                },
                billing_card_number: {
                    required: true,
                    creditcard: true
                },
                billing_card_exp_month: {
                    required: true
                },
                billing_card_exp_year: {
                    required: true
                },
                billing_card_cvv: {
                    required: true,
                    minlength: 2,
                    maxlength: 3
                },

                //== Billing Address
                billing_address_1: {
                    required: true
                },
                billing_address_2: {
                    
                },
                billing_city: {
                    required: true
                },
                billing_state: {
                    required: true
                },
                billing_zip: {
                    required: true,
                    number: true
                },

                billing_delivery: {
                    required: true
                }
            },
            
            //display error alert on form submit  
            invalidHandler: function(event, validator) {
                mApp.scrollTo("#m_form_3"); 

                swal({
                    "title": "", 
                    "text": "There are some errors in your submission. Please correct them.", 
                    "type": "error",
                    "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                });
            },

            submitHandler: function (form) {
                //form[0].submit(); // submit the form
                swal({
                    "title": "", 
                    "text": "Form validation passed. All good!", 
                    "type": "success",
                    "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                });

                return false;
            }
        });       
    }
    var demo4 = function () {
        $( "#changePassForm" ).validate({
            // define validation rules
            rules: {
                newPassword: {
                    required: true,
                    minlength: 8
                },
                confirmPassword: {
                    required: true,
                    minlength: 8,
                    equalTo : "#newPassword"
                }
            },
            messages: {
                newPassword: {
                    required: "This Field is required",
                    minlength: "Enter atleast 8 characters"
                },
                confirmPassword: {
                    required: "This Field is required",
                    minlength: "Enter atleast 8 characters"
                }
            },
            
            // //display error alert on form submit  
            // invalidHandler: function(event, validator) {
            //     mApp.scrollTo("#changePassForm"); 

            //     swal({
            //         "title": "", 
            //         "text": "There are some errors in your submission. Please correct them.", 
            //         "type": "error",
            //         "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
            //     });
            // },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
                // swal({
                //     "title": "", 
                //     "text": "Form validation passed. All good!", 
                //     "type": "success",
                //     "confirmButtonClass": "btn btn-secondary m-btn m-btn--wide"
                // });

                return false;
            }
        });       
    }

    
    var demo6 = function () {
        $( "#addEmployeeForm" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                address: {
                    required: true
                },
                birthdate: {
                    required: true
                },
                salary: {
                    required: true,
                    minlength: 1,
                    maxlength: 9999999
                },
                emp_type: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email is required"
                },
                fname: {
                    required: "First Name is required"
                },
                lname: {
                    required: "Last Name is required"
                },
                contact: {
                    required: "Contact Number is required",
                    number:"Please enter numbers Only"
                },
                address: {
                    required: "Address is required"
                },
                birthdate: {
                    required: "Birth Day is required"
                },
                salary: {
                    required: "Salary is required"
                }
            },
            
            //display error alert on form submit  

            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_1_msg');
                alert.removeClass('m--hide').show();
                $('#addEmployee').animate({ scrollTop: 0 }, "slow");   
                },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }

    var demo7 = function () {
        $( "#editEmployeeForm" ).validate({
            // define validation rules
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                lname: {
                    required: true,
                    minlength: 2,
                    maxlength: 50
                },
                contact: {
                    required: true,
                    number: true,
                    minlength: 11,
                    maxlength: 11
                },
                address: {
                    required: true
                },
                birthdate: {
                    required: true
                },
                salary: {
                    required: true,
                    minlength: 1,
                    maxlength: 9999999
                },
                emp_type: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Email is required"
                },
                fname: {
                    required: "First Name is required"
                },
                lname: {
                    required: "Last Name is required"
                },
                contact: {
                    required: "Contact Number is required",
                    number:"Please enter numbers Only"
                },
                address: {
                    required: "Address is required"
                },
                birthdate: {
                    required: "Birth Day is required"
                },
                salary: {
                    required: "Salary is required"
                }
            },
            
            //display error alert on form submit  

            invalidHandler: function(event, validator) {     
                var alert = $('#m_form_2_msg');
                alert.removeClass('m--hide').show();
                $('#personUpdateModal').animate({ scrollTop: 0 }, "slow");   
                },

            submitHandler: function (form) {
                form[0].submit(); // submit the form
            }
        });       
    }


    return {
        // public functions
        init: function() {
            demo1(); 
            demo2();
            demo3(); 
            demo4(); 
            demo5(); 
            demo6(); 
            demo7(); 
            demo8(); 

        }
    };
}();

jQuery(document).ready(function() {    
    FormControls.init();
});