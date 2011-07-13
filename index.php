<!doctype html>
<html>
	<header>
	<link rel="stylesheet" type="text/css" href="common.css" />
	<?php 
		require("xml.php");

		$text = new Text();
		$text->addParagraph("Welcome.xml");
		
		$pictures = new Pictures();
		$pictures->addPicture("title.xml");
	?>
	</header>
	<body>

		<?php 
			$pictures->printHTML();
		?>
		<div id = "main_flow" >
		<?php
			$text->printHTML();
		?>
		<div>
	</body>
	<footer>
	</footer>

