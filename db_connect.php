<?php    

	$link = mysql_connect("localhost", "root", "");
	if(!$link) {
		die("Could not connect to host");
	}
	
	$seldb = mysql_select_db("ptixiaki");
	if(!$seldb) {
		die("Could not connect to database");
	}
?>
