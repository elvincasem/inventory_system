<?php
session_start();
//print_r($_SESSION);

include("header.php");

include("sidebar.php");

?>

<div class="span9" id="content">
                    <div class="row-fluid">
                        	<div class="navbar">
                            	<div class="navbar-inner">
	                                <ul class="breadcrumb">
	                                    <i class="icon-chevron-left hide-sidebar"><a href='#' title="Hide Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <i class="icon-chevron-right show-sidebar" style="display:none;"><a href='#' title="Show Sidebar" rel='tooltip'>&nbsp;</a></i>
	                                    <li>
	                                        <a href="index.php">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    
	                                    <li class="active">Purchase Requests</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    
					<!-- begin form -->
					
					<div class="row-fluid">
                    <p>
											<button id="addpr" class="btn btn-large btn-success"><i class="icon-plus-sign"></i> Add Purchase Request</button>
											<button id="refreshpr" class="btn btn-large btn-success"><i class="icon-refresh"></i>Refresh</button>
											
										</p>
					</div>
					<div class="row-fluid">
						<div class="alert alert-success hide" id="deletesuccess">
									<button class="close" data-dismiss="alert"></button>
									Purchase Request deleted!
						</div>
					</div>
                     <!-- validation -->
                    <div class="row-fluid" id="prform" style="display:none;">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add New PR</div>
                            </div>
							
                 <div class="block-content collapse in" id="purchaserequest">
                                <div class="span12">
					<!-- BEGIN FORM-->
					<form action="#" id="form_pr" class="form-horizontal">
						<fieldset>
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert" id="pradderror"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide" id="praddsuccess">
								<button class="close" data-dismiss="alert"></button>
								Purchase Request Added!
							</div>
  							
							<div class="control-group">
  								<label class="control-label">PR Number<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="prnumber" name="prnumber" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Department<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="department" name="department" data-required="1" class="span6 m-wrap" value="DMMMSU-SLUC"/>
  								</div>
  							</div>
							 
							<div class="control-group">
                                          <label class="control-label" for="select01">Offices</label>
                                          <div class="controls">
                                            <select id="offices" name="offices" class="chzn-select">
                                              <option value="">Select...</option>
                                              <?php
														
											$officelist = selectListSQL("SELECT * FROM offices ORDER BY transid ASC");
											//$employeelist = selectListSQL2("SELECT * FROM employee");
											//print_r($employeelist);
											foreach ($officelist as $rows => $link) {
												$officeid = $link['transid'];
												$officename = $link['office'];
												
												echo "<option value='$officeid'>$officename</option>";
											
											}
										?>
                                            </select>
                                          </div>
                                        </div>
							
						
							
							<div class="control-group">
                                          <label class="control-label" for="date01">Request Date</label>
                                          <div class="controls">
                                            <input type="text" class="input-xlarge datepicker" name="requestdate" id="requestdate" value="<?php echo date('Y-m-d') ?>" data-date-format="yyyy-mm-dd">
                                            
                                          </div>
                                        </div>
										
							<div class="control-group">
                                          <label class="control-label" for="textarea2">Purpose</label>
                                          <div class="controls">
                                            <textarea id="purpose" name="purpose" class="input-xlarge textarea" placeholder="Purpose of your request..." style="width: 400px; height: 150px"></textarea>
                                          </div>
                                        </div>
  							
							<div class="control-group">
                                          <label class="control-label" for="select01">Requested By</label>
                                          <div class="controls">
                                            <select id="employeelist" name="employeelist" class="chzn-select">
                                              <option value="">Select...</option>
                                              <?php
														
											$employeelist = selectListSQL("SELECT * FROM employee");
											//$employeelist = selectListSQL2("SELECT * FROM employee");
											//print_r($employeelist);
											foreach ($employeelist as $rows => $link) {
												$eid = $link['eid'];
												$employeeno = $link['empNo'];
												$employeename = $link['fname'] . " ". $link['mname'] ." ". $link['lname'];
												$employeedesignation = $link['designation'];
												
												echo "<option value='$eid' onChange='alert('test')'>$employeename</option>";
											
											}
										?>
                                            </select>
                                          </div>
                                        </div>
							
							<div class="control-group">
  								<label class="control-label">Designation<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="designation" name="designation" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							
  							<div class="form-actions">
  							<!--	<button type="submit" class="btn btn-primary" onClick="savePR();">Save</button>-->
								<button type="submit" class="btn btn-primary" id="savepradditem" onClick="saveandaddpritem();">Save and Add Item</button>
  								
  							</div>
							
							
						</fieldset>
					</form>
					<!-- END FORM-->
				</div>
			    </div>
			</div>
                     	<!-- /block -->
						
						
						
				<!-- item form	-->
				<div class="row-fluid hide" id="pritemform" >
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><h2>Add Item</h2></div>
                            </div>
				<div class="block-content collapse in">
                    <div class="span12">
					<!-- Begin item List-->
					
					<div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example2">
                                        <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Unit</th>
                                                <th>Unit Cost</th>
												<th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
											include_once("assets/functions.php");			
											$itemlist = selectListSQL("SELECT * FROM items ORDER BY itemNo DESC");
											//print_r($employeelist);
											foreach ($itemlist as $rows => $link) {
												$itemNo = $link['itemNo'];
												$description = $link['description'];
												$unit = $link['unit'];
												$unitcost = $link['unitCost'];
												
												echo "<tr class='odd gradeX'>";
												echo "<td>$description</td>";
												echo "<td>$unit</td>";
												echo "<td>$unitcost</td>";
												echo "<td class='center'> 
													
													<button class='btn btn-primary' onClick='showprAddItem($itemNo);'><i class='icon-pencil icon-white'></i> Add to Item List</button>
												
												</td>";
												echo "</tr>";
											}
											
											

										?>
                                        </tbody>
                                    </table>
								
                                </div>
										
					
					
					
					
					
					<!-- BEGIN FORM-->
						
  							
							
							
							<!-- <div id="formstatus">1</div> -->
  							
  							<!-- <div class="form-actions">
  								<button type="submit" class="btn btn-primary" onClick="saveItem();">Add Item</button>
  							</div> -->
							
							<button type="button" class="btn" id="cancelpr">Close</button>
							
							<div id="myModal" class="modal hide">
											<div class="modal-header">
												<button data-dismiss="modal" class="close" type="button">&times;</button>
												<h3 id="itemheader"></h3>
											</div>
											<div class="modal-body">
												<p id="itembody">Modal Example Body</p>
												<p><form action="#" id="form_additem" class="form-horizontal">
						
							<div class="alert alert-error hide">
								<button class="close" data-dismiss="alert"></button>
								You have some form errors. Please check below.
							</div>
							<div class="alert alert-success hide">
								<button class="close" data-dismiss="alert"></button>
								Item added!
							</div>
												<div class="control-group">
  								<label class="control-label">Description<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="description" name="description" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Unit<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="unit" name="unit" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
							<div class="control-group">
  								<label class="control-label">Unit Cost<span class="required">*</span></label>
  								<div class="controls">
  									<input type="text" id="unitcost" name="unitcost" data-required="1" class="span6 m-wrap"/>
  								</div>
  							</div>
												
												</p>
												<button data-dismiss="modal" >Close</button>
											</div>
										</div>
						
					</form>
					<!-- END FORM-->
					</div>
				</div>
				
						</div>
						<!--end row-->
				</div>
					
					
					
                </div> 

<!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class=" pull-left"><h2>Purchase Request</h2></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    
  									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="employee">
										<thead>
											<tr>
												<th>PR No.</th>
												<th>Office</th>
												<th>Request Date</th>
												<th>Requested By</th>
												
												<th>Purpose</th>
												<th>Status</th>
												<th>Action</th>
												
												
											</tr>
										</thead>
										<tbody>
										
											<?php
											include_once("assets/functions.php");
											//$query = "SELECT * FROM pr_list";
											//echo $query;
											$prlist = selectListSQL("SELECT * FROM pr_list ORDER BY transID DESC");
											//print_r($employeelist);
											foreach ($prlist as $rows => $link) {
												$transID = $link['transID'];
												$prNo = $link['prNo'];
												$department = $link['department'];
												$office = $link['section'];
												$prDate = $link['prDate'];
												$purpose = $link['purpose'];
												$requestedBy = $link['requestedBy'];
												$designation = $link['designation'];
												$status = $link['status'];
												
												echo "<tr class='odd gradeX'>";
												echo "<td>$prNo</td>";
												echo "<td>$office</td>";
												echo "<td>$prDate</td>";
												echo "<td>$requestedBy</td>";
												//echo "<td>$designation</td>";
												echo "<td>$purpose</td>";
												echo "<td>$status</td>";
												echo "<td class='center'> 
													<button class='btn btn-mini' onClick='viewpr($transID)'><i class='icon-eye-open'></i> </button>
													<button class='btn btn-primary btn-mini' onClick='editpr($transID)'><i class='icon-pencil icon-white'></i> </button>
													<button class='btn btn-danger notification btn-mini' id='notification' onClick='deletepr($transID)'><i class='icon-remove icon-white'></i> </button>
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

<?php include("footer.php");?>