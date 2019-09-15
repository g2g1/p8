<?php
include '../includes/conn.inc.php';

if($_GET['id']){
	$id = $_GET['id'];
	$query = "DELETE FROM p8_add_books WHERE id = '$id';";
	$stmt = mysqli_query($link, $query);
	?>
	<script type="text/javascript">
		window.location = "display_books.php";
	</script>
	 <?php
}else{
	?>
	<script type="text/javascript">
		window.location = "display_books.php";
	</script>
	 <?php

	
}


?>