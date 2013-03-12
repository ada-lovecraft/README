<!DOCTYPE html>
<base href="<?php echo @\Utils::getBaseUrl(); ?>" />
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>README</title>
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
		<div class="row">
		    <div class="span4 offset4">
		      <div class="well">
		        <legend>Sign in to ReadMe</legend>
		        <form method="POST" action="login" accept-charset="UTF-8">
			        <?php if (isset($SESSION['fail'])): ?>
			            <div class="alert alert-error">
			                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $SESSION['fail']; ?>
			            </div>      
			        <?php endif; ?>
		            <input class="span3" placeholder="Username" type="text" name="username">
		            <input class="span3" placeholder="Password" type="password" name="password"> 
		            <label class="checkbox">
		                <input type="checkbox" name="remember" value="1"> Remember Me
		            </label>
		            <button class="btn-info btn" type="submit">Login</button>      
		        </form>    
		      </div>
		    </div>
		</div>
	  	<hr>
		<footer>
			<p>&copy; 3Bound Studios 2013</p>
		</footer>
	</div><!--/.fluid-container-->

	<div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Login</h3>
	  </div>
	  <div class="modal-body">
	    <p>
	    	<form class="form-inline" id="loginForm" action="login">
	  			<input type="text" class="input-large" name="user" placeholder="Email">
				<input type="password" class="input-large"  name="password" placeholder="Password">
		</p>
			<div class="alert alert-error hide" id="loginFailure">
			</div>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	    <input type="submit" class="btn btn-primary" id="loginButton" value="Login">
	    </form>

	  </div>
	</div>


	<div id="editorModal" class="modal hide fade" tabindex="-1" role="editor" aria-labelledby="Editor Modal" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Create a post</h3>
	  </div>
	  <div class="modal-body">
	  		<form class="form-horizontal">
	  			<div class="control-group">
	  				<textarea class="span6" rows="8" name="preview" enabled="false"></textarea>
	  			</div>
	  			<div class="control-group">
					<textarea rows="8" name="editor" enabled="true" class="span6"></textarea>
				</div>
				<div class="control-group">
					<button class="btn btn-small" data-dismiss="modal" aria-hidden="true">Close</button>
	  				<input type="submit" class="btn btn-primary btn-small" id="loginButton" value="Post">
	  			</div>
	  		</form>
			

	  <div class="modal-footer">
	  </div>
	</div>


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
	<script src="ui/js/jquery.belvedere.js"></script>

	<script>

	
	</script>

</body>
</html>