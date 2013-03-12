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
				<a class="brand" href="#">README <span class="byline"> dot text</span></a>		
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row-fluid">
	        <?php if (isset($SESSION['success'])): ?>
	            <div class="alert alert-success fade">
	                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $SESSION['success']; ?>
	            </div>      
	        <?php endif; ?>
	        <?php if (isset($SESSION['fail'])): ?>
	            <div class="alert alert-error fade">
	                <a class="close" data-dismiss="alert" href="#">x</a><?php echo $SESSION['fail']; ?>
	            </div>      
	        <?php endif; ?>
			<div class="span2">
				<div class="well sidebar-nav">
					<ul class="nav nav-list">
						<li><a href="#">Archive</a></li>
						<?php if ($SESSION['auth']): ?>
							
								<li><a href="admin">Admin</a></li>
								<li><a href="logout">Logout</a></li>
							
							<?php else: ?>
								<li><a href="login">Login</a></li>
							
						<?php endif; ?>
						<!-- page list -->
					</ul>
				</div><!--/.well -->
			</div><!--/span-->
			<div class="span10" id="content">
				<div class="alert alert-success hide" id="successAlert">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <p></p>
				</div>
				<div class="alert alert-error hide" id="errorAlert">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <p></p>
				</div>
				
				<?php foreach (($latestPosts?:array()) as $post): ?>
					<article >
						<?php echo $post['body']; ?>
						
						<p>
					    	<i class="icon-user"></i> <a href="#"><?php echo $post['authorName']; ?></a> 
					    	| <i class="icon-calendar"></i> <?php echo $post['created']; ?>
						</p>
						<?php if ($SESSION['auth']): ?>
							<p>
								<a href="edit/<?php echo $post['title']; ?>">Edit</a> 
							</p>
						<?php endif; ?>
				  	</article>
			  	<?php endforeach; ?>
			</div><!--/span-->
		</div><!--/row-->
	  	<hr>
		<footer>
			<p>&copy; 3Bound Studios 2013</p>
		</footer>
	</div><!--/.fluid-container-->
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

</body>
</html>