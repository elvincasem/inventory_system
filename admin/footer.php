</div>
<hr>
            <footer>
                <p>&copy; DMMMSU-SLUC MIS <?php echo date('Y');?></p>
            </footer>
        </div>
        <!--/.fluid-container-->
		<script language="javascript">
		var status;
		</script>
        <script src="vendors/jquery-1.9.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
		
        <script src="vendors/easypiechart/jquery.easy-pie-chart.js"></script>
		        <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
				        <script src="assets/DT_bootstrap.js"></script>
        <script src="assets/scripts.js"></script>
		<script type="text/javascript" src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
		<script src="assets/form-validation.js"></script>
		<script src="vendors/jGrowl/jquery.jgrowl.js"></script>
		<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
		<script src="vendors/bootstrap-datepicker.js"></script>
		<script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>
		<link href="vendors/datepicker.css" rel="stylesheet" media="screen">
		<script>
		//jQuery(document).ready(function() {   
			   
			//});

		</script>
        
		<script type="text/javascript">
		
		
		
	jQuery(document).ready(function($) {
		$('.logout').click(function(){
    			logout();
    		});
		function logout(){
				$.ajax({
                    url: 'assets/functions.php',
                    type: 'get',
                    data: {action: 'logout'},
                    success: function(response) {
						if(response=="loggedout"){
							//document.getElementById("message").style.display="block";
							window.location.replace("../");
						}
						
                    }
                });
	}
	
	$(function() {
            //$(".datepicker").datepicker({dateFormat: "yy-mm-dd"});
			//$("#requestdate").datepicker({ dateFormat: "yy-mm-dd" }).val()
			$('.datepicker').datepicker({format: 'yyyy-mm-dd'});
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
	
	
	});
		


</script>
    </body>

</html>