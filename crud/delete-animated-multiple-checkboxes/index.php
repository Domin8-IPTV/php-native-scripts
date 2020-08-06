<?php

//index.php

include('database_connection.php');

$query = "SELECT * FROM employees ORDER BY id DESC";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

?>

<html>  
    <head>  
        <title>Delete Multiple Records using PHP Ajax with Animated Effect</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        
    </head>  
    <body>  
        <div class="container">  
            <br />
   <div class="table-responsive">  
    <h3 align="center">Delete Multiple Records using PHP Ajax with Animated Effect</h3><br />
    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="5%"><button type="button" name="delete_all" id="delete_all" class="btn btn-danger btn-xs">Delete</button></th>
                            <th width="20%">Name</th>
                            <th width="38%">Address</th>
                            <th width="7%">Gender</th>
                            <th width="25%">Designation</th>
                            <th width="5%">Age</th>
                        </tr>
                        </thead>
                        <?php
                        foreach($result as $row)
                        {
                            echo '
                            <tr>
                                <td>
                                    <input type="checkbox" class="delete_checkbox" value="'.$row["id"].'" />
                                </td>
                                <td>'.$row["name"].'</td>
                                <td>'.$row["address"].'</td>
                                <td>'.$row["gender"].'</td>
                                <td>'.$row["designation"].'</td>
                                <td>'.$row["age"].'</td>
                            </tr>
                            ';
                        }
                        ?>
                    </table>
                </div>
   </div>  
  </div>
    </body>  
</html> 
<style>
.removeRow
{
    background-color: #FF0000;
    color:#FFFFFF;
}
</style>
<script>  
$(document).ready(function(){ 

    $('.delete_checkbox').click(function(){
        if($(this).is(':checked'))
        {
            $(this).closest('tr').addClass('removeRow');
        }
        else
        {
            $(this).closest('tr').removeClass('removeRow');
        }
    });

    $('#delete_all').click(function(){
        var checkbox = $('.delete_checkbox:checked');
        if(checkbox.length > 0)
        {
            var checkbox_value = [];
            $(checkbox).each(function(){
                checkbox_value.push($(this).val());
            });

            $.ajax({
                url:"delete.php",
                method:"POST",
                data:{checkbox_value:checkbox_value},
                success:function()
                {
                    $('.removeRow').fadeOut(1500);
                }
            });
        }
        else
        {
            alert("Select atleast one records");
        }
    });

});  
</script>