<?php
include '../includes/conn.inc.php';

$getId = $_GET['id'];

$query = "UPDATE p8_students_registration SET status = 'yes' WHERE id = '$getId';";
$stmt = mysqli_query($link, $query);




?>

<script type="text/javascript">
	window.location = "display_students_info.php";
</script>