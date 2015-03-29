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
	                                        <a href="index.php">Dashboard</a> <span class="divider">/</span>	
	                                    </li>
	                                    
	                                    <li class="active">Purchase Requests</li>
	                                </ul>
                            	</div>
                        	</div>
                    	</div>
                    
					
					<!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Wizard</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <div id="rootwizard">
                                        <div class="navbar">
                                          <div class="navbar-inner">
                                            <div class="container">
                                        <ul>
                                            <li><a href="#tab1" data-toggle="tab">Step 1</a></li>
                                            <li><a href="#tab2" data-toggle="tab">Step 2</a></li>
                                            <li><a href="#tab3" data-toggle="tab">Step 3</a></li>
                                        </ul>
                                         </div>
                                          </div>
                                        </div>
                                        <div id="bar" class="progress progress-striped active">
                                          <div class="bar"></div>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane" id="tab1">
                                               <form class="form-horizontal">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Name</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Email</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Phone</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="tab2">
                                                <form class="form-horizontal">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Address</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">City</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">State</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </form>
                                            </div>
                                            <div class="tab-pane" id="tab3">
                                                <form class="form-horizontal">
                                                  <fieldset>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Company Name</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Contact Name</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                    <div class="control-group">
                                                      <label class="control-label" for="focusedInput">Contact Phone</label>
                                                      <div class="controls">
                                                        <input class="input-xlarge focused" id="focusedInput" type="text" value="">
                                                      </div>
                                                    </div>
                                                  </fieldset>
                                                </form>
                                            </div>
                                            <ul class="pager wizard">
                                                <li class="previous first" style="display:none;"><a href="javascript:void(0);">First</a></li>
                                                <li class="previous"><a href="javascript:void(0);">Previous</a></li>
                                                <li class="next last" style="display:none;"><a href="javascript:void(0);">Last</a></li>
                                                <li class="next"><a href="javascript:void(0);">Next</a></li>
                                                <li class="next finish" style="display:none;"><a href="javascript:;">Finish</a></li>
                                            </ul>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
					
					
                </div>

<?php include("footer.php");?>