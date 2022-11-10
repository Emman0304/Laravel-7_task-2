$(function(){
    var $registerForm = $("#myForm");
 
    
     $("#bday").datepicker({
     onSelect: function(value, ui) {
         var today = new Date(),
             Myage = today.getFullYear() - ui.selectedYear;
         $('#age').val(Myage);
     },
        
     dateFormat: 'dd-mm-yy',changeMonth: true,changeYear: true,yearRange:"c-100:c+0"
     
 });
 
     if($registerForm.length){
         $registerForm.validate({
             rules:{
                firstname:{
                     required: true
                    },
                 lastname:{
                     required: true
                 },
                 mname:{
                     required: true
                 },
                 age:{
                     required: true
                 },
                 bday:{
                     required: true
                 },
                 bplace:{
                     required: true
                 },
                 contact:{
                     required: true
                 },
                 email:{
                     required: true,
                     email: true
                 },
                 address:{
                     required: true
                 },    
                                                
             },
             messages:{
                 firstname:{
                     required: 'First name is required'
                 },
                 lastname:{
                     required: 'Last name is required'
                 },
                 mname:{
                     required: 'type (none) if unaplicable'
                 },
                 bday:{
                     required: 'Birth date is required'
                 },
                 age:{
                     required: 'Age is required'
                 },
                 bplace:{
                     required: 'Birth place is required'
                 },
                 contact:{
                     required: 'Contact is required'
                 },
                 email:{
                     required: 'Email is required',
                     email:'Please enter valid email'
                 },
                 address:{
                     required: 'Address is required'
                 },
                 
             }
             
         }),
 
        //  $("#fname_error_message").hide();
        //  $("#lname_error_message").hide();
        //  $("#mname_error_message").hide();
        //  $("#email_error_message").hide();
        //  $("#age_error_message").hide();
 
        //  var error_fname = false;
        //  var error_lname = false;
        //  var error_mname = false;
        //  var error_email = false;
        //  var error_age = false;
 
        //  $("#firstname").focusout(function(){
        //      check_fname();
        //  });
        //  $("#lastname").focusout(function(){
        //      check_lname();
        //  });
        //  $("#mname").focusout(function(){
        //      check_mname();
        //  });
        //  $("#email").focusout(function(){
        //      check_age();
        //  });
        //  $("#age").focusout(function(){
        //      check_age();
        //  });
 
        //  function check_fname() {
        //      var pattern = /^[a-zA-Z\s]+$/;
        //      var fname = $("#firstname").val();
        //      if (pattern.test(fname) && fname !== '') {
        //      $("#fname_error_message").hide();
        //      $("#firstname").css("border-bottom","2px solid #34F458");
        //      } else {
        //      $("#fname_error_message").html("Should contain only Characters");
        //      $("#fname_error_message").show();
        //      $("#firstname").css("border-bottom","2px solid #F90A0A");
        //      error_fname = true;
        //      }
        //  }
        //  function check_lname() {
        //      var pattern = /^[a-zA-Z\s]+$/;
        //      var lname = $("#lastname").val();
        //      if (pattern.test(lname) && lname !== '') {
        //      $("#lname_error_message").hide();
        //      $("#lastname").css("border-bottom","2px solid #34F458");
        //      } else {
        //      $("#lname_error_message").html("Should contain only Characters");
        //      $("#lname_error_message").show();
        //      $("#lastname").css("border-bottom","2px solid #F90A0A");
        //      error_fname = true;
        //      }
        //  }
        //  function check_mname() {
        //      var pattern = /^[a-zA-Z\s]+$/;
        //      var age = $("#mname").val();
        //      if (pattern.test(age) && age !== '') {
        //      $("#mname_error_message").hide();
        //      $("#mname").css("border-bottom","2px solid #34F458");
        //      } else {
        //      $("#mname_error_message").html("Should contain only Characters");
        //      $("#mname_error_message").show();
        //      $("#mname").css("border-bottom","2px solid #F90A0A");
        //      error_fname = true;
        //      }
        //  }
 
        //  function check_email() {
        //      var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        //      var email = $("#email").val();
        //      if (pattern.test(email) && email !== '') {
        //         $("#email_error_message").hide();
        //         $("#email").css("border-bottom","2px solid #34F458");
        //      } else {
        //         $("#email_error_message").html("Invalid Email");
        //         $("#email_error_message").show();
        //         $("#email").css("border-bottom","2px solid #F90A0A");
        //         error_email = true;
        //      }
        //   }
 
        //   function check_age() {
        //      var age = $("#age").val();
        //      if (age >= 18) {
        //      $("#age_error_message").hide();
        //      $("#age").css("border-bottom","2px solid #34F458");
        //      } else {
        //      $("#age_error_message").html("18 years old below is not allowed!");
        //      $("#age_error_message").show();
        //      $("#age").css("border-bottom","2px solid #F90A0A");
        //      error_fname = true;
        //      }
        //  }
 
 
         $registerForm.submit(function() {

                $("#fname_error_message").hide();
                    $("#lname_error_message").hide();
                    $("#mname_error_message").hide();
                    $("#email_error_message").hide();
                    $("#age_error_message").hide();
            
                    var error_fname = false;
                    var error_lname = false;
                    var error_mname = false;
                    var error_email = false;
                    var error_age = false;
            
                    $("#firstname").focusout(function(){
                        check_fname();
                    });
                    $("#lastname").focusout(function(){
                        check_lname();
                    });
                    $("#mname").focusout(function(){
                        check_mname();
                    });
                    $("#email").focusout(function(){
                        check_age();
                    });
                    $("#age").focusout(function(){
                        check_age();
                    });
        
                function check_fname() {
                    var pattern = /^[a-zA-Z\s]+$/;
                    var fname = $("#firstname").val();
                    if (pattern.test(fname) && fname !== '') {
                    $("#fname_error_message").hide();
                    $("#firstname").css("border-bottom","2px solid #34F458");
                    } else {
                    $("#fname_error_message").html("Should contain only Characters");
                    $("#fname_error_message").show();
                    $("#firstname").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                    }
                }
                function check_lname() {
                    var pattern = /^[a-zA-Z\s]+$/;
                    var lname = $("#lastname").val();
                    if (pattern.test(lname) && lname !== '') {
                    $("#lname_error_message").hide();
                    $("#lastname").css("border-bottom","2px solid #34F458");
                    } else {
                    $("#lname_error_message").html("Should contain only Characters");
                    $("#lname_error_message").show();
                    $("#lastname").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                    }
                }
                function check_mname() {
                    var pattern = /^[a-zA-Z\s]+$/;
                    var age = $("#mname").val();
                    if (pattern.test(age) && age !== '') {
                    $("#mname_error_message").hide();
                    $("#mname").css("border-bottom","2px solid #34F458");
                    } else {
                    $("#mname_error_message").html("Should contain only Characters");
                    $("#mname_error_message").show();
                    $("#mname").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                    }
                }
        
                function check_email() {
                    var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                    var email = $("#email").val();
                    if (pattern.test(email) && email !== '') {
                        $("#email_error_message").hide();
                        $("#email").css("border-bottom","2px solid #34F458");
                    } else {
                        $("#email_error_message").html("Invalid Email");
                        $("#email_error_message").show();
                        $("#email").css("border-bottom","2px solid #F90A0A");
                        error_email = true;
                    }
                }
        
                function check_age() {
                    var age = $("#age").val();
                    if (age >= 18) {
                    $("#age_error_message").hide();
                    $("#age").css("border-bottom","2px solid #34F458");
                    } else {
                    $("#age_error_message").html("18 years old below is not allowed!");
                    $("#age_error_message").show();
                    $("#age").css("border-bottom","2px solid #F90A0A");
                    error_fname = true;
                    }
                }

             error_fname = false;
             error_lname = false;
             error_age = false;
             error_email = false;
             error_age = false;
         
 
             check_fname();
             check_lname();
             check_age();
             check_email();
             check_age();
             
 
             if (error_fname === false && error_lname === false && error_age === false && error_email === false && error_age === false) {
             alert("Verifying, click 'ok' ");
             return true;
             } else {
                 alert("There are mistakes in your inputs");
             return false;
             }
         });
 
 
 
         }
 
     
 
 })
 
 
 