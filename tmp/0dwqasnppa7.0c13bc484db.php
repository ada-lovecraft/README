<base href="<?php echo Utils::getBaseUrl(); ?>"/>
<html>
	<head>
	<title>
		Hello, world!
	</title>
	</head>
	<body>
		<?php echo $name; ?><br/>
		<?php foreach (($latestPosts?:array()) as $post): ?>
		    <a href="#"><?php echo $post['title']; ?></a>
		<?php endforeach; ?>
	</body>
</html>