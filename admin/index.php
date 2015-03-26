<?php
session_start();
print_r($_SESSION);

?>
<button class="logout"> logout</button>
<script src="../assets/jquery-1.10.2.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.logout').click(function(){
    			logout();
    		});
		function logout(){
				$.ajax({
                    url: '../assets/functions.php',
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