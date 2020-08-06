
<?php 
//insert.php
$connect = mysqli_connect("localhost", "root", "", "phpnative");
if(isset($_POST["framework"]))
{
 $framework = '';
 foreach($_POST["framework"] as $row)
 {
  $framework .= $row . ', ';
 }
 $framework = substr($framework, 0, -2);
 $query = "INSERT INTO languages(name) VALUES('".$framework."')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>