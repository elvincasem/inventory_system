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
	                                        <a href="#">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    
	                                    <li class="active">Items</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
					<div class="row-fluid">
                    <p>
											<button id="additem" class="btn btn-large btn-success"><i class="icon-plus-sign"></i> Add Item</button>
											<button id="refreshitem" class="btn btn-large btn-success"><i class="icon-refresh"></i>Refresh</button>
											
										</p>
					</div>
					<div class="row-fluid">
						<div class="alert alert-success hide" id="deletesuccess">
									<button class="close" data-dismiss="alert"></button>
									Item deleted!
						</div>
					</div>
                     <!-- validation -->
                    <div class="row-fluid" id="itemform" style="display:none;">
                         <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add New Item</div>
                            </div>
							
                 <div class="block-content collapse in">
                                <div class="span12">
					<!-- BEGIN FORM-->
					<form action="#" id="form_item" class="form-horizontal">
						<fieldset>
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
							
							<!-- <div id="formstatus">1</div> -->
  							
  							<div class="form-actions">
  								<button type="submit" class="btn btn-primary" onClick="saveItem();">Save</button>
								<button type="submit" class="btn btn-primary" onClick="saveandcreateItem();">Save and Create New</button>
  								<button type="button" class="btn" id="cancelItem">Cancel</button>
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
					 
                    
					<div class="row-fluid" id="itemtable">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Bootstrap dataTables with Toolbar</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <div class="table-toolbar">
                                      
                                      </div>
                                      <div class="btn-group pull-right">
                                         <button data-toggle="dropdown" class="btn dropdown-toggle">Tools <span class="caret"></span></button>
                                         <ul class="dropdown-menu">
                                            <li><a href="#">Print</a></li>
                                            <li><a href="#">Save as PDF</a></li>
                                            <li><a href="#">Export to Excel</a></li>
                                         </ul>
                                      </div>
                                   </div>
                                    
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
													
													<button class='btn btn-primary' onClick='edititem($itemNo)'><i class='icon-pencil icon-white'></i> Edit</button>
													<button class='btn btn-danger notification' id='notification' onClick='deleteitem($itemNo)'><i class='icon-remove icon-white'></i> Delete</button>
												</td>";
												echo "</tr>";
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