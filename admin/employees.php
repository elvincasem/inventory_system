<?php
session_start();
//print_r($_SESSION);

include_once("header.php");

include_once("sidebar.php");

?>

<div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="../admin">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    
	                                    <li class="active">Employees</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    
                    
                     <!-- validation -->
                    <div class="row-fluid">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Employees</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
					<!-- BEGIN FORM-->
					<form action="#" id="form_employee" class="form-horizontal">
						<fieldset>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Your form validation is successful!
							</div>
  							<div class="control-group">
  								<label class="control-label">Employee No.<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="empno" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Last Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="lname" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">First Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="fname" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Middle Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="mname" data-required="0" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Designation<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" name="designation" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div id="formstatus">1</div>
  							
  							<div class="form-actions">
  								<button type="submit" class="btn btn-primary" onClick="saveEmployee();">Save</button>
  								<button type="button" class="btn">Cancel</button>
  							</div>
						</fieldset>
					</form>
					<!-- END FORM-->
				</div>
			    </div>
			</div>
                     	<!-- /block -->
		    </div>
                     <!-- /validation -->
                    
                </div>

<?php include("footer.php");?>