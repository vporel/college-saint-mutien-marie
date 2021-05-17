<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="public/images/"/>
	<title>College - <?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/fontawesome/css/fontawesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/fontawesome/css/brands.min.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/fontawesome/css/solid.min.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/fontawesome/css/regular.min.css"/>
	<link rel="stylesheet" type="text/css" href="public/css/site-template.css"/>
	<?php
		if(isset($styles))
			foreach($styles as $style){
				echo '<link rel="stylesheet" type="text/css" href="'.$style.'"/>';
			}
	?>
	
</head>
<body>
	<?php include "includes/header.php"; ?>
	<!-- Page content -->
	<?= $content ?>

	<!-- Scripts -->
	<script language="javascript"src="public/js/jquery.js"></script>
	<script language="javascript"src="public/css/bootstrap/bootstrap.min.js"></script>
	<script language="javascript"src="public/css/fontawesome/js/fontawesome.min.js"></script>
	<script language="javascript"src="public/js/doc-functions.js"></script>
	<?php
		if(isset($scripts))
			foreach($scripts as $script){
				echo '<script language="javascript" src="'.$script.'"></script>';
			}
	?>
</body>
</html>