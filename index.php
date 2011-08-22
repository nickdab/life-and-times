<!doctype html>
<html>
	<header>
	<link rel="stylesheet" type="text/css" href="common.css" />
	<?php 
		require("xml.php");

		$text = new Text();
		$text->addParagraph("Welcome.xml");
		$title = new Text();
		$title->makeTitle();
		
		/*$pictures = new Pictures();
		$pictures->addPicture("title.xml");*/
	?>
	
	</header>
	<body>

		<?php 
			$title->printHTML();
			//$pictures->printHTML();
		?>	
		
		

		<div id = "main_flow">
		
		<?php
			$text->printHTML();
		?>
		</div>
	</body>
	<footer>
	</footer>

