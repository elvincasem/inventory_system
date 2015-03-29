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
                    <div class="row-fluid">
                    <p>
											<button id="addemployee" class="btn btn-large btn-success"><i class="icon-plus-sign"></i> Add Employee</button>
											<button id="refreshemployee" class="btn btn-large btn-success"><i class="icon-refresh"></i>Refresh</button>
											
										</p>
					</div>
					<div class="row-fluid">
						<div class="alert alert-success hide" id="deletesuccess">
									<button class="close" data-dismiss="alert"></button>
									Employee deleted!
						</div>
					</div>
                     <!-- validation -->
                    <div class="row-fluid" id="employeeform" style="display:none;">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add Employees</div>
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
								Employee added!
							</div>
  							<div class="control-group">
  								<label class="control-label">Employee No.<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="empno" name="empno" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Last Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="lname" name="lname" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">First Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="fname" name="fname" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Middle Name<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="mname" name="mname" data-required="0" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Designation<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="designation" name="designation" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<!-- <div id="formstatus">1</div> -->
  							
  							<div class="form-actions">
  								<button type="submit" class="btn btn-primary" onClick="saveEmployee();">Save</button>
								<button type="submit" class="btn btn-primary" onClick="saveandcreateEmployee();">Save and Create New</button>
  								<button type="button" class="btn" id="cancelemployee">Cancel</button>
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
					 
					 
					 <div class="row-fluid" id="employeetable">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class=" pull-left"><h2>Employee List</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="employee">
										<thead>
											<tr>
												<th>Employee No.</th>
												<th>Name</th>
												<th>Designation</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
										
											<?php
											include_once("assets/functions.php");
											$query = "SELECT * FROM employee";
											//echo $query;
											$employeelist = selectListSQL("SELECT * FROM employee ORDER BY eid DESC");
											//print_r($employeelist);
											foreach ($employeelist as $rows => $link) {
												$eid = $link['eid'];
												$employeeno = $link['empNo'];
												$employeename = $link['fname'] . " ". $link['mname'] ." ". $link['lname'];
												$employeedesignation = $link['designation'];
												echo "<tr class='odd gradeX'>";
												echo "<td>$employeeno</td>";
												echo "<td>$employeename</td>";
												echo "<td>$employeedesignation</td>";
												echo "<td class='center'> 
													
													<button class='btn btn-primary' onClick='editemployee($eid)'><i class='icon-pencil icon-white'></i> Edit</button>
													<button class='btn btn-danger notification' id='notification' onClick='deleteemployee($eid)'><i class='icon-remove icon-white'></i> Delete</button>
												</td>";
											}
											
											

										?>
											
											
										</tbody>
									</table>
								
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					 
					 
					 
                    
                </div>

<?php include("footer.php");?>