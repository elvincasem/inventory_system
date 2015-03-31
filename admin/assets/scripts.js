
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
	//$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
	
	
	 $("#employeelist").change(function () {
        var empid = this.value;
		//alert(empid);
        //var firstDropVal = $('#pick').val();
		$.ajax({
					//var eid = document.getElementById("employeelist").value;
					//var empno =$("#employeelist").value;
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "showdesignation", eid: empid},
                    success: function(response) {
						//console.log();
						document.getElementById("designation").value = response;
						
                    }
                });
		
    });
});

//open close item form
$('#additem').click(function() {

        //$('.container').hide();
        $('#itemform').show("slow");
    });

$('#cancelItem').click(function() {

        //$('.container').hide();
        $('#itemform').hide("slow");
    });
$('#refreshitem').click(function() {

        //$('.container').hide();
        location.reload();
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
$('#refreshemployee').click(function() {

        //$('.container').hide();
        location.reload();
    });
	

	//open close pr form
$('#addpr').click(function() {

        //$('.container').hide();
        $('#prform').show("slow");
    });

$('#cancelpr').click(function() {

        //$('.container').hide();
        $('#prform').hide("slow");
    });
$('#refreshpr').click(function() {

        //$('.container').hide();
        location.reload();
    });



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
                        minlength: 1,
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
						$('#employeetable').load(document.URL +  ' #employeetable');
						
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						//$('#employee').load(document.URL +  ' #employee');
						//$('#deletesuccess').show("fast");
						//setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
						return "valid";
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

function editemployee(id){
	
	alert (id);
	
}
function saveEmployee(){
	
	var status = validateEmployee();
	if(status == "valid"){
			setTimeout(function(){$('#employeeform').hide("fast");},800);
	}
	
	
}
function saveandcreateEmployee(){
	
	var status = validateEmployee();
	//setTimeout(function(){$('#employeeform').hide("fast");},800);
	
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
						$('#employeetable').load(document.URL +  ' #employeetable');
						$('#deletesuccess').show("fast");
						setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}


//Item

function validateItem(){
	
	
	//var handleValidationEmployee = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_item');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    description: {
                        minlength: 2,
                        required: true
                    },
					unit: {
                        minlength: 1,
                        required: true
                    },
                    unitcost: {
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
					
					var description = document.getElementById("description").value;
					var unit = document.getElementById("unit").value;
					var unitcost = document.getElementById("unitcost").value;
					
					$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "saveitem", description: description, unit: unit, unitcost: unitcost},
                    success: function(response) {
						//console.log();
						document.getElementById("description").value = "";
						document.getElementById("unit").value = "";
						document.getElementById("unitcost").value = "";

						//$('#itemtable').load(document.URL +  ' #itemtable');
						 location.reload();
						
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						//$('#itemtable').load(document.URL +  ' #itemtable');
						//$('#deletesuccess').show("fast");
						//setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
						return "valid";
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

function saveItem(){
	
	var status = validateItem();
	if(status =="valid"){
		setTimeout(function(){$('#itemform').hide("fast");},800);
	}
	
	
}
function saveandcreateItem(){
	
	var status = validateItem();
	//setTimeout(function(){$('#employeeform').hide("fast");},800);
	
}
function deleteitem(id){
	
	var r = confirm("Are your sure you want to delete this Item?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "deleteitem", itemno: id},
                    success: function(response) {
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						$('#itemtable').load(document.URL +  ' #itemtable');
						$('#deletesuccess').show("fast");
						setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}

function validatePR(){
	
	
	//var handleValidationEmployee = function() {
        // for more info visit the official plugin documentation: 
            // http://docs.jquery.com/Plugins/Validation

            var form1 = $('#form_pr');
            var error1 = $('.alert-error', form1);
            var success1 = $('.alert-success', form1);

            form1.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-inline', // default input error message class
                focusInvalid: false, // do not focus the last invalid input
                ignore: "",
                rules: {
                    prnumber: {
                        minlength: 2,
                        required: true
                    },
					department: {
                        minlength: 1,
                        required: true
                    },
                    offices: {
                        minlength: 1,
                        required: true
                    },
					requestdate: {
                        minlength: 2,
                        required: true
                    },
					purpose: {
                        minlength: 2,
                        required: true
                    },
					employeelist: {
                        minlength: 1,
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
					
					var prnumber = document.getElementById("prnumber").value;
					var department = document.getElementById("department").value;
					var offices = document.getElementById("offices").value;
					var requestdate = document.getElementById("requestdate").value;
					var purpose = document.getElementById("purpose").value;
					var employeelist = document.getElementById("employeelist").value;
					var designation = document.getElementById("designation").value;
					//var unit = document.getElementById("unit").value;
					//var unitcost = document.getElementById("unitcost").value;
					
					$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "savepurchaserequest", prno: prnumber, department: department, offices: offices, requestdate: requestdate, purpose: purpose, requestedby: employeelist, designation: designation},
                    success: function(response) {
						//console.log();
						//document.getElementById("description").value = "";
						//document.getElementById("unit").value = "";
						//document.getElementById("unitcost").value = "";

						//$('#itemtable').load(document.URL +  ' #itemtable');
						 //location.reload();
						
						//alert(response);
						return "valid";
						}
					});
					

                }
            });

			// wrapper function to scroll to an element
			return {
				scrollTo: function (el, offeset) {
            pos = el ? el.offset().top : 0;
            jQuery('html,body').animate({
                    scrollTop: pos + (offeset ? offeset : 0)
                }, 'slow');
				}
				
			}
	
	
}

function savePR(){
	
	var status = validatePR();
	if(status == "valid"){
		setTimeout(function(){$('#itemform').hide("fast");},800);	
	}
	
	
}
function saveandaddpritem(){
	
	var status = validatePR();
	setTimeout(function(){$('#itemform').hide("fast");});
	
	
}

function deletepr(id){
	
	var r = confirm("Are your sure you want to delete this Item?");
    if (r == true) {
        //alert ("You pressed OK!");
		$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: "deletepr", transID: id},
                    success: function(response) {
                        //$('table#resultTable tbody').html(response);
						//alert(response);
						$('#employee').load(document.URL +  ' #employee');
						//alert(response);
						$('#deletesuccess').show("fast");
						setTimeout(function(){$('#deletesuccess').hide("slow");},1500);
                    }
                });
		
    } if(r == false) {
        //txt = "You pressed Cancel!";
		
    }
	
}