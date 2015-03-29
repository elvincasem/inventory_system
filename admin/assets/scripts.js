
$(function() {
    // Side Bar Toggle
    $('.hide-sidebar').click(function() {
	  $('#sidebar').hide('fast', function() {
	  	$('#content').removeClass('span9');
	  	$('#content').addClass('span12');
	  	$('.hide-sidebar').hide();
	  	$('.show-sidebar').show();
	  });
	});

	$('.show-sidebar').click(function() {
		$('#content').removeClass('span12');
	   	$('#content').addClass('span9');
	   	$('.show-sidebar').hide();
	   	$('.hide-sidebar').show();
	  	$('#sidebar').show('fast');
	});
});

//open close employee form
$('#addemployee').click(function() {

        //$('.container').hide();
        $('#employeeform').show("slow");
    });

$('#cancelemployee').click(function() {

        //$('.container').hide();
        $('#employeeform').hide("slow");
    });




function saveEmployee(){
	
	//FormValidation.init();
	var status = validateEmployee();
	
	
	
	//alert (status);
	
	
}

function validateEmployee(){
	
	
	//var handleValidationEmployee = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_employee');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    empno: {
                        minlength: 2,
                        required: true
                    },
					lname: {
                        minlength: 2,
                        required: true
                    },
                    fname: {
                        minlength: 2,
                        required: true
                    },
					mname: {
                        minlength: 2,
                        required: true
                    },
					designation: {
                        minlength: 2,
                        required: true
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit              
                    success1.hide();
                    error1.show();
                    FormValidation.scrollTo(error1, -200);
                },

                highlight: function (element) { // hightlight error inputs
                    $(element)
                        .closest('.help-inline').removeClass('ok'); // display OK icon
                    $(element)
                        .closest('.control-group').removeClass('success').addClass('error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.control-group').removeClass('error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .addClass('valid').addClass('help-inline ok') // mark the current input as valid and display OK icon
                    .closest('.control-group').removeClass('error').addClass('success'); // set success class to the control group
					//document.getElementById("formstatus").innerHTML = "ok";
					//status = document.getElementById("formstatus").innerHTML;
                },

                submitHandler: function (form) {
					
                    success1.show();
                    //error1.hide();
					
					var empno = document.getElementById("empno").value;
					var lname = document.getElementById("lname").value;
					var mname = document.getElementById("mname").value;
					var fname = document.getElementById("fname").value;
					var designation = document.getElementById("designation").value;
					$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "saveemployee", empid: empno, lname: lname, mname: mname, fname: fname, designation: designation},
                    success: function(response) {
						//console.log();
						document.getElementById("empno").value = "";
						document.getElementById("lname").value = "";
						document.getElementById("fname").value = "";
						document.getElementById("mname").value = "";
						document.getElementById("designation").value = "";
						$('#employee').load(document.URL +  ' #employee');
						setTimeout(function(){$('#employeeform').hide("fast");},800);
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						//$('#employee').load(document.URL +  ' #employee');
						//$('#deletesuccess').show("fast");
						//setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
                    }
                });
					
					//form.submit();
                }
            });
			//return "ok";
			// wrapper function to scroll to an element
			return {
				scrollTo: function (el, offeset) {
            pos = el ? el.offset().top : 0;
            jQuery('html,body').animate({
                    scrollTop: pos + (offeset ? offeset : 0)
                }, 'slow');
        }
				
			}
			

    //}
	
	
}

function editemployee(){
	
	alert ("test");
	
}

function deleteemployee(id){
	
	var r = confirm("Are your sure you want to delete this employee?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "deleteemployee", eid: id},
                    success: function(response) {
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						$('#employee').load(document.URL +  ' #employee');
						$('#deletesuccess').show("fast");
						setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}