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
		<script>
		//jQuery(document).ready(function() {   
			   
			//});

		</script>
        <script>
		
	
        $(function() {
            // Easy pie charts
            $('.chart').easyPieChart({animate: 1000});
        });
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
	});
		


</script>
    </body>

</html>