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
			<div class="span9">
				<div class="span9 well">

					<ul id="editorTabs" class="nav nav-tabs">
					 	<li id="newPostTab" class="active"><a href="#editor__newPost_<?php echo $newPostId; ?>" data-newpost="true" data-toggle="tab">New</a></li>
				  		<?php foreach (($drafts?:array()) as $draft): ?>
							<li><a href="#tab__<?php echo $draft['slug']; ?>" data-newpost="false" data-draftid="<?php echo $draft['id']; ?>" data-draftslug="<?php echo $draft['slug']; ?>" data-toggle="tab"><?php echo $draft['title']; ?></a></li>
				  		<?php endforeach; ?>
					</ul>


  					<form  id="editorForm" method="POST">
				   		<textarea id="formText" name="post"></textarea>
				   	</form>

				   	<div class="hide" id="postHolders">
				   	<?php foreach (($drafts?:array()) as $draft): ?>
				   		<div class="hide" id="content__<?php echo $draft['slug']; ?>"><?php echo $draft['body']; ?></div>
				   	<?php endforeach; ?>
				   </div>

				   	<div class="tab-pane active" id="newPost_<?php echo $newPostId; ?>" style="height: 600px; margin-bottom: 20px;"></div>
				   	<a href="#" role="button" class="btn btn-primary" id="saveButton">Save</a>
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
	<script src="ui/js/epiceditor.min.js"></script>

	<script>
	var editors = new Array();
	var editor = null;
	var currentPost = 'newPost_<?php echo $newPostId; ?>';
	var opts = {
		basePath: '../ui',
		container: 'newPost_<?php echo $newPostId; ?>',
		file: {
			autoSave: 5000
		}
	};

	editor = new EpicEditor(opts).load();
	console.log(editor.getFiles());

	$('a[data-toggle="tab"]').on('shown', function (e) {
	  var selectedDraft = e.target; // activated tab
	  var newPost = $(selectedDraft).data('newpost');
	  var draftId = $(selectedDraft).data('draftid');
	  var draftSlug = $(selectedDraft).data('draftslug');
	  if(!newPost) {
	  	currentPost = draftId;
	  	console.log(draftSlug);
	  	editor.importFile(draftSlug,$('#content__' + draftSlug).text()); 
	  } else {
	  	editor.open('newPost_<?php echo $newPostId; ?>');
	  }
	});


	editor.on('save', editorSave);


	$('#saveButton').click(function (evt) {
		evt.preventDefault();
		activeEditor = $('.tabpane .active');
		console.log(activeEditor);
		/*
  		var theContent = editor.exportFile();
  		$('#postBody').val(theContent);
  		$('#postForm').submit();
  		*/
  	});


  	function editorSave(evt) {
  		if (currentPost == 'newPost_<?php echo $newPostId; ?>' && evt.content != "" && evt.content.indexOf('\n') != -1) {
  			//ajax save draft and rename file

  			var data = {
  				post: editor.exportFile()
  			}
  			$.post('admin/newdraft',data,addNewTab);
  			//add new tab, and switch to it.
  		}
  		console.log(evt);
  	}

  	function addNewTab(data,textStatux,jqXHR) {
  		console.log(data);
  		var obj = jQuery.parseJSON(data);
  		editor.rename('newPost_<?php echo $newPostId; ?>', obj.slug);
  		var tab = $('#newPostTab');
  		var newTab = $(tab).clone(true);
  		 $(newTab).toggleClass('active');

  		$(tab).removeAttr();
  		var tabLink = $(tab).find('a');
  		console.log(tabLink);
  		$(tabLink).attr('href','#tab__'+obj.slug);
  		$(tabLink).data('newpost','false');
  		$(tabLink).data('draftid', obj.id);
  		$(tabLink).data('draftslug',obj.slug);
  		$(tabLink).text(obj.title);
  		$(newTab).prependTo('#editorTabs');

		$('<div>',{
			id: 'content__' + obj.slug,
			text: obj.body
  		}).appendTo('#postHolders');
  	}

	</script>

</body>
</html>