<header class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-6" id="site-name">
			<h3 class="d-none d-md-block">College Saint <br>Mutien Marie</h3>
		</div>
		<div class="d-none d-md-block col-md-3 header-contact">
			<img src="public/icons/png/pin.png"alt=""height="30">
			<address>
				<strong>Position</strong><br>
				<i>Yaoundé, Rue xxxxxxx</i>
			</address>
		</div>
		<div class="d-none d-md-block col-md-3 header-contact">
			<img src="public/icons/png/phone.png"alt=""height="30">
			<address>
				<strong>Call</strong><br>
				<i>6-XX-XX-XX-XX</i><br>
				<a href="#"><img src="public/icons/png/facebook.png"alt=""height="20"></a>
				<a href="#"><img src="public/icons/png/twitter.png"alt=""height="20"></a>
				<a href="#"><img src="public/icons/png/email.png"alt=""height="20"></a>

			</address>
		</div>
 		<nav class="col-12 p-0 navbar navbar-expand-sm nav-dark">
			<a href="index.php"class="d-md-none navbar-brand h3">College Saint Mutien Marie</a>
 			<button class="navbar-toggler"data-target="#nav-content"data-toggle="collapse"><img src="public/icons/png/menu.png"height="40"/></button>
 			<div id="nav-content" class="collapse navbar-collapse">
 			<ul class="navbar-nav first-level pl-2 pl-md-5">
 			<?php foreach ($nav_links as $en_text=>$link) { ?>
	 			<li class="nav-item <?php if($en_text == $page) echo 'active'; ?>">
 					<a class="" href="index.php?page=<?=$en_text; ?>"><?= ucfirst($link["text"]); ?></a>
 				<?php if(key_exists("sub-links",$link)){ ?>
 					<ul class="navbar-nav second-level">
 					<?php foreach ($link["sub-links"] as $sublink_en_text => $sublink) {?>
	 					<li class="nav-item">
 							<a class="" href="index.php?page=<?= $en_text; ?>&amp;part=<?= $sublink_en_text; ?>"><?= ucfirst($sublink["text"]); ?></a>
		 				<?php if(key_exists("sub-links", $sublink)){ ?>
		 					<ul class="navbar-nav third-level">
		 					<?php foreach ($sublink["sub-links"] as $sublink2_en_text => $sublink2) {?>
			 					<li class="nav-item">
		 							<a class="" href="index.php?page=<?= $en_text; ?>&amp;part=<?= $sublink_en_text; ?>&amp;part_2=<?= $sublink2_en_text; ?>"><?= ucfirst($sublink2["text"]); ?></a>
				 				</li>
		 					<?php } ?>
		 					</ul>
		 				<?php } ?>
		 				</li>
 					<?php } ?>
 					</ul>
 				<?php } ?>
				</li>
 			<?php } ?>
 			</ul>
 			</div>
 		</nav>
 		<div class="col-12"id="site-nav-position">
 			<h4 class="p-1">
 			<?php
 				if(isset($part)) echo ucfirst($nav_links[$page]["sub-links"][$part]["text"]);
 				if(isset($part_2)) echo " > ".ucfirst($nav_links[$page]["sub-links"][$part]["sub-links"][$part_2]["text"]);
 			?>
 			</h4>
 		</div>
 	</div>
</header>
<span id="message" style="display:none">
	<em data-message-exist="<?= isset($message) ?>" style="display:none;">
		<?php if(isset($message)) echo $message; ?>
	</em> 
	<p></p>
	<img src="public/icons/png/delete.png"alt="Close" class="icon icon-black" onclick="$('#message').fadeOut(250);"/>
</span>
 <script language="javascript">
 	
 </script>