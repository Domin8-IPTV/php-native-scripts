<?php
//delete.php
$connect = mysqli_connect("localhost", "root", "", "phpnative");
if(isset($_POST["id"]))
{
 foreach($_POST["id"] as $id)
 {
  $query = "DELETE FROM customers WHERE id = '".$id."'";
  mysqli_query($connect, $query);
 }
}
?>