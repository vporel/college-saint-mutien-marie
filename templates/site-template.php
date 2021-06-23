<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link rel="shortcut icon" href="images/"/>
	<title>College - <?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css"/>

	<link rel="stylesheet" type="text/css" href="css/site-template.css"/>
	<?php
		if(isset($styles))
			foreach($styles as $style){
				echo '<link rel="stylesheet" type="text/css" href="'.$style.'"/>';
			}
	?>
	
</head>
<body>
	<!-- Page header -->
	<?php include "../includes/header.php"; ?>

	<!-- Page -->
	<div class="container-fluid" id="page">
		<div class="row">
			<!-- Page content top -->
			<div class="col-12">
				<?php if(isset($content_top)) echo $content_top; ?>
			</Div>

			<div class="col-12" id="page-middle">
				<div class="row">
					<?php if(!isset($show_aside) OR $show_aside){ ?>
						<article id="content" class="col-12 col-md-8 order-md-1">
							<?= $content ?>
						</article>
						<aside class="col-12 col-md-4 order-md-2" id="news">
							<?php include "../includes/aside.php"; ?>
						</aside>
					<?php } else { ?>
						<article id="content" class="col-12">
							<?= $content ?>
						</article>
					<?php } ?>
					
				</div>
			</div>

			<!-- Page content top -->
			<div class="col-12">
				<?php if(isset($content_bottom)) echo $content_bottom; ?>
			</Div>
		</div>
	</div>	
	<!-- Page footer -->
	<?php include "../includes/footer.php"; ?>

	<!-- Scripts -->
	<script language="javascript"src="js/jquery.js"></script>
	<script language="javascript"src="css/bootstrap/bootstrap.min.js"></script>
	<script language="javascript"src="js/doc-functions.js"></script>
	<?php
		if(isset($scripts))
			foreach($scripts as $script){
				echo '<script language="javascript" src="'.$script.'"></script>';
			}
	?>
</body>
</html>