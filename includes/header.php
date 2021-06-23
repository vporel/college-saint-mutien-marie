<header class="container-fluid">
	<div class="row">
		<div class="col-12 col-md-5 offset-md-1" id="site-name">
			<h3 class="d-none d-md-block">College Saint <br>Mutien Marie</h3>
			<a href="index.php"class="d-md-none h3">College Saint Mutien Marie</a>
		</div>
		<div class="col-6 d-none d-md-block">
			<div id="header-contact" class="row">
				<div class=" col-md-6" >
					<i class="fas fa-map-marker-alt"></i>
					<address>
						<i>Yaoundé, Rue xxxxxxx</i>
					</address>
				</div>
				<div class="col-md-6">
					<i class="fas fa-phone-alt"></i>
					<address>
						<i>6-XX-XX-XX-XX</i><br>
						<a href="#"><i class="icon fab fa-facebook"></i></a>
						<a href="#"><i class="icon fab fa-twitter"></i></a>
						<a href="#"><i class="icon far fa-envelope"></i></a>

					</address>
				</div>
			</div>
		</div>
 		<nav class="col-12 p-0 navbar navbar-expand nav-dark sticky-top">
 			<ul class="navbar-nav pl-2">
 			<?php foreach ($nav_links as $en_text=>$link) { ?>
	 			<li class="nav-item <?php if($en_text == $page) echo 'active'; ?>">
 					<a class="" href="index.php?page=<?=$en_text; ?>"><?= ucfirst($link["text"]); ?></a>
				</li>
 			<?php } ?>
 			</ul>
 		</nav>
 		
	<?php if(isset($_GET['page'])){ ?>
		<h4 class="col-12"id="site-nav-position">
			<span class="bg"></span>
			<span>
				<strong class="c-second">
					<?= ucfirst($nav_links[$page]["text"]) ?>
				</strong>
				<i><?php if(isset($title_message)) echo " - ".$title_message; ?></i>
			</span>
 		</div>
	<?php } ?>
 	</div>
</header>
<span id="message" style="display:none">
	<em data-message-exist="<?= isset($message) ?>" style="display:none;">
		<?php if(isset($message)) echo $message; ?>
	</em> 
	<p></p>
	<img src="icons/png/delete.png"alt="Close" class="icon icon-black" onclick="$('#message').fadeOut(250);"/>
</span>
 <script language="javascript">
 	
 </script>