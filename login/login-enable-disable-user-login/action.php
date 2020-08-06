<?php

	if(isset($_POST['action'])){
		include("database_connection.php");
		if($_POST['action'] == 'fetch'){
			$output = "";
			$query = "SELECT * FROM `user_details` WHERE user_type = 'user' ORDER BY user_name ASC";
			$statment = $connect->prepare($query);
			$statment->execute();
			$result = $statment->fetchAll();
			$output .= '
				<table class="table table-bordered table-striped">
					<tr>
						<td>Name</td>
						<td>Email</td>
						<td>Status</td>
						<td>Action</td>
					</tr>
			';
			foreach($result as $row){
				$status = "";
				if($row["user_status"] == "Active"){
					$status = '<span class="label label-success">Active</span>';
				}
				else {
					$status = '<span class="label label-danger">Inactive</span>';
				}
				$output .= '
					<tr>
						<td>' . $row['user_name'] . '</td>
						<td>' . $row['user_email'] . '</td>
						<td>' . $status . '</td>
						<td>
							<button type="button" 
									name="action" 
									class="btn btn-info btn-xs action" 
									data-user_id="'.$row['user_id'].'" 
									data-user_status="'.$row['user_status'].'"
							>Action</button>
						</td>
					</tr>
				';
			}
			$output .= '</table>';
			echo $output;
		}
		if($_POST['action'] == 'change_status'){
			$status = '';
			if($_POST['user_status'] == 'Active'){
				$status = 'Inactive';
			}
			else {
				$status = 'Active';
			}
			$query = 'Update `user_details` SET user_status = :user_status WHERE user_id = :user_id';
			$statment = $connect->prepare($query);
			$statment->execute(
				array(
					':user_status' => $status,
					':user_id' => $_POST['user_id']
				)
			);
			$result = $statment->fetchAll();
			if(isset($result)){
				echo '<div class="alert alert-success">User status has been set to <strong>'.$status.'</strong></div>';
			}
		}
		
		
	}


?>