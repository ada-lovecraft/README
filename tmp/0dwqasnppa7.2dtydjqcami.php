<!DOCTYPE html>
<base href="<?php echo @\Utils::getBaseUrl(); ?>" />
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bootstrap, from Twitter</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Le styles -->
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">	
	<link href="http://twitter.github.com/bootstrap/assets/css/bootstrap-responsive.css" rel="stylesheet">

	<link href="ui/css/theme.css" rel="stylesheet">

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Le fav and touch icons -->
	<link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/images/apple-touch-icon-114x114.png">


</head>
<body>
	<div class="navbar">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">README <span class="byline"> a blog platform for developers</span></a>		
			</div>
		</div>
	</div>

	<div class="container-fluid">
		 <?php if (isset($SESSION['success'])): ?>
	            <div class="alert alert-success">
	                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $SESSION['success']; ?>
	            </div>      
	        <?php endif; ?>
	        <?php if (isset($SESSION['fail'])): ?>
	            <div class="alert alert-error">
	                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $SESSION['fail']; ?>
	            </div>      
	        <?php endif; ?>
		<div class="row">
			<div class="span2">
				<div class="sidebar-nav">
					<div class="well">
						<ul class="nav nav-list"> 
						  <li class="nav-header">Admin Menu</li>        
						  <li><a href="admin/create"><i class="icon-pencil"></i> New Post</a></li>
						  <li><a href="logout"><i class="icon-share"></i> Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
			 <div class="span4 ">
		      <div class="well">
		        <legend>Create a new user</legend>
		        <form method="POST" action="admin/newuser" accept-charset="UTF-8">
					<input class="span3" placeholder="Email" type="text" name="email" />
		            <input class="span3" placeholder="Username" type="text" name="username" />
		            <input class="span3" placeholder="Password" type="password" name="password" id="password" />
		            <input class="span3" placeholder="Confirm Password" type="password" name="confirmPassword" id="confirm" />
		            <button class="btn-info btn" type="submit" id="createButton" disabled="disabled">Create</button>      
		        </form>    
		      </div>
		    </div>
		</div><!--/row-->
	  	<hr>
		<footer>
			<p>&copy; 3Bound Studios 2013</p>
		</footer>
	</div><!--/.fluid-container-->
		 
	<!-- Modal -->
<!-- Button to trigger modal -->
 
<!-- Modal -->
	


	<!-- Le javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-transition.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-alert.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-modal.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-dropdown.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-scrollspy.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-tab.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-tooltip.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-popover.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-button.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-collapse.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-carousel.js"></script>
	<script src="https://raw.github.com/twitter/bootstrap/master/js/bootstrap-typeahead.js"></script>

	<script>


	$('#password').keyup(checkPasswords);
	$('#confirm').keyup(checkPasswords);

	function checkPasswords(evt) {
		if($('#confirm').val() == $('#password').val() && $('#confimr').val() != '') {
			$('#createButton').removeAttr('disabled');

		} else {
			$('#createButton').attr('disabled','disabled');
		}
	}

	</script>

</body>
</html>