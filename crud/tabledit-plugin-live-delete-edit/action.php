<?php  
//action.php
$connect = mysqli_connect('localhost', 'root', '', 'phpnative');

$input = filter_input_array(INPUT_POST);

$first_name = mysqli_real_escape_string($connect, $input["first_name"]);
$last_name = mysqli_real_escape_string($connect, $input["last_name"]);

if($input["action"] === 'edit')
{
 $query = "
 UPDATE users 
 SET first_name = '".$first_name."', 
 last_name = '".$last_name."' 
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM users 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>