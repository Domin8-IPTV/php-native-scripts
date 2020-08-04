<?php
//insert.php
/*echo $_POST["framework"];
echo '<br />';
echo $_POST["hidden_framework"];*/

$connect = mysqli_connect("localhost", "root", "", "phpnative");
$query = "INSERT INTO languages(name) VALUES ('".$_POST["hidden_framework"]."')";
if(mysqli_query($connect, $query))
{
 echo 'Data Inserted';
}
?>