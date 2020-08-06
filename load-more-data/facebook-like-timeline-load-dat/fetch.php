<?php

//fetch.php;

$connect = new PDO("mysql:host=localhost; dbname=phpnative", "root", "");

if(isset($_POST["last_id"]))
{
 //sleep(5);
 if($_POST["last_id"] != '')
 {
  $query = "
  SELECT * FROM tbl_post 
  WHERE id < '".$_POST["last_id"]."'
  ORDER BY id DESC 
  LIMIT 4
  ";
 }
 else
 {
  $query = "
  SELECT * FROM tbl_post 
  ORDER BY id DESC 
  LIMIT 4
  ";
 }

 $statement = $connect->prepare($query);

 $statement->execute();

 $total_row = $statement->rowCount();

 $output = '';
 $not_found = '';
 $last_id = 0;
 if($total_row > 0)
 {
  $result = $statement->fetchAll();
  $count = 0;
  $class = '';
  foreach($result as $row)
  {   
   if($count%2 != 0)
   {
    $class = 'class="timeline-inverted"';
   }
   else
   {
    $class = '';
   }
   $output .= '
   <li '.$class.'>
    <div class="timeline-badge primary"><a><i class="fa fa-dot-circle-o" aria-hidden="true"></i></a></div>
    <div class="timeline-panel">
     <div class="timeline-heading">
      <div class="col-md-12" style="padding:15px; background-color:#eee; border-bottom:#ddd 1px solid;"><h3>'.$row["post_title"].'</h3></div>
     </div>
     <div class="timeline-body">
      <div class="row">
       <div class="col-md-4">
        <img src="images/'.$row["post_image"].'" class="img-thumbnail img-fluid" />
       </div>
       <div class="col-md-8">
        <p>'.$row["post_description"].'</p>
       </div>
      </div>
     </div>
    </div>
   </li>';
   $last_id = $row["id"];
   $count++;
  }
 }
 else
 {
  $not_found = '
  <div align="center" class="alert alert-info">No more data found</div>
  ';
 }

 $output .= '<li class="clearfix" id="clearfix_id" data-last_id="'.$last_id.'" style="float: none;"></li>';

 $test_output = array(
  'timeline_output' => $output,
  'no_data_output' => $not_found
 );

 echo json_encode($test_output);
}

?>