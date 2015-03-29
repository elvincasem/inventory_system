<?php 
	session_start();
	
	if(isset($_SESSION['userName'])){
		
		header("Location:admin");
		
	}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
		<div class="logo"><img src="admin/images/dmmmsu-logo.png" ></div>
		<div class="title">DMMMSU-SLUC<br/><br/> Inventory Management System</div>
      <form class="form-signin">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" name="username" id="username" class="input-block-level" placeholder="Username">
        <input type="password" name="password" id="password" class="input-block-level" placeholder="Password">
        <!-- <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label> -->
		<div class="alert alert-error" id="message" style="display:none;">
			
			<strong>Error!</strong> Wrong username or password.
		</div>
        <button class="btn btn-large btn-primary btnlogin" type="submit">Sign in</button>
      </form>

    </div> <!-- /container -->
	
    <!-- <script src="vendors/jquery-1.9.1.min.js"></script> -->
	 <script src="admin/assets/jquery-1.10.2.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
	<script src="admin/vendors/jGrowl/jquery.jgrowl.js"></script>
	<script type="text/javascript">
		
    	jQuery(document).ready(function($) {
    		$('.btnlogin').click(function(){
			//alert("a");
    			makeAjaxRequest();
    		});
			
            $('form').submit(function(e){
                e.preventDefault();
                //makeAjaxRequest();
                return false;
            });

            function makeAjaxRequest() {
			
			//$.jGrowl("Hello world!");
                $.ajax({
                    url: 'admin/assets/userlogin.php',
                    type: 'post',
                    data: {username: $('input#username').val(), password: $('input#password').val()},
                    success: function(response) {
						if(response=="invalid"){
							document.getElementById("message").style.display="block";
						}
						else{
							window.location.replace("admin/");
							//alert(response);
						}
                        //$('table#resultTable tbody').html(response);
                    }
                }); 
				
            }
    	});
    </script>
  </body>
</html>