<?php
include '../includes/conn.inc.php';

$id = $_GET['id'];
$t = date("d-m-Y");

$query = "UPDATE p8_issue_books SET books_return_date = '$t' WHERE id = '$id';";
$res = mysqli_query($link, $query);

$books_name = '';
$query = "SELECT * FROM p8_issue_books WHERE id = '$id';";
$res = mysqli_query($link, $query);

while($rows = mysqli_fetch_array($res)){
	$books_name = $rows['books_name']; 
}

$query = "UPDATE p8_add_books SET available_qty=available_qty+1 WHERE books_name = '$books_name';";
$finalRes = mysqli_query($link, $query);



?>

<script type="text/javascript">
	
	window.location = "return_book.php";
</script>