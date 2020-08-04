<?php  
	$connect = mysqli_connect("localhost", "root", "", "phpnative");
	$sql = "DELETE FROM persons WHERE id = '".$_POST["id"]."'";  
	if(mysqli_query($connect, $sql)){  
		echo 'Data Deleted';  
	}  
 ?>