<?php
$connect = mysqli_connect("localhost", "root", "", "phpnative");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM students WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>
