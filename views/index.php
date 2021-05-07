<?php

	include("functions.php");

	include("views/header.php");

	if ($_GET['page'] == "dashboard") {

		include("views/dashboard.php");
	
	} else if ($_GET['page'] == "pevents") {
		
		include("views/pevents.php");

	} else if ($_GET['page'] == "cevents") {
		
		include("views/cevents.php");
		
	} 
	else if ($_GET['page'] == "blog") {
		
		include("views/blogs/blog.php");
		
	}
	else if ($_GET['cr'] == "createblog") {
		
		include("views/blogs/add_blog.php");
		
	}
	else {

		include("views/home.php");

	}

	include("views/footer.php");

?>