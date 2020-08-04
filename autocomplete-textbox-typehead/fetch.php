<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "phpnative");
$request = mysqli_real_escape_string($connect, $_POST["query"]);
$query = "
 SELECT * FROM countries WHERE country_name LIKE '%".$request."%'
";

$result = mysqli_query($connect, $query);

$data = array();

if(mysqli_num_rows($result) > 0)
{
 while($row = mysqli_fetch_assoc($result))
 {
  $data[] = $row["country_name"];
 }
 echo json_encode($data);
}

?>