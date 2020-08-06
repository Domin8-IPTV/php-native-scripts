<?php

//insert.php
$connect = new PDO("mysql:host=localhost;dbname=phpnative", "root", "");
$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(isset($_POST["name"]))
{

 $skill = implode(", ", $_POST["skill"]);

 $data = array(
  ':programmer_name'  => $_POST["name"],
  ':programmer_skill'  => $skill
 );
 
 $query = "
 INSERT INTO programmers 
 (programmer_name, programmer_skill) 
 VALUES (:programmer_name, :programmer_skill)
 ";

 $statement = $connect->prepare($query);
 if($statement->execute($data))
 {
  echo '
  <div class="alert alert-success">
   Data Successfully Inserted
  </div>
  ';
 }
 else {
	echo 'Error!';
 }
 
}
?>