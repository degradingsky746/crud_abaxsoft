<?php
 
// including crud php files
include "create.php";
include "delete.php";
include "update.php";
?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="scr.js"></script>
<link rel="stylesheet" href="style.css">
<script>
$(document).ready(function(){
	
	$('[data-toggle="tooltip"]').tooltip();
	
});
</script>
</head>
<body>
    <div class="container">
		<div class="table-responsive">
			<div class="table-wrapper">
				<div class="table-title">
					<div class="row">
						<div class="col-xs-6">
							<h2>Manage <b>Employees</b></h2>
						</div>
						<div class="col-xs-6">
							<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>						
						</div>
					</div>
				</div>
				<table class="table table-striped table-hover">
					
					<?php
                    
                    require_once "config.php";
                    
                    
                    $sql = "SELECT * FROM employees";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                        echo   "<thead>
									<tr>
										<th>#</th>
										<th>Name</th>
										<th>Email</th>
										<th>Mobile</th>
										<th>State</th>
										<th>City</th>
										<th>Address</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>";
                        while($row = mysqli_fetch_array($result)){
                        		
							echo "<tr>";
							echo "<td>".$row['id']."</td>";
							echo "<td>".$row['name']."</td>";
							echo "<td>".$row['email']."</td>";
							echo "<td>".$row['mobile']."</td>";
							echo "<td>".$row['state']."</td>";
							echo "<td>".$row['city']."</td>";
							echo "<td>".$row['address']."</td>";
							
							
							echo '	
								<td>
									<a href="#editEmployeeModal" class="edit" data-toggle="modal" onclick=\'update_load('.$row["id"].',"'.$row["name"].'","'.$row["email"].'","'.$row["mobile"].'","'.$row["state"].'","'.$row["city"].'","'.$row["address"].'")\'><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
									<a href="#deleteEmployeeModal" class="delete" data-toggle="modal" onclick="del_load('.$row["id"].')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
								</td>';
							echo "</tr>";
						}
					}else
						{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    }
						?>
					</tbody>
				</table>
			</div>
		</div>        
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
		      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="add-form">
			        <div class="modal-header">						
						<h4 class="modal-title">Add Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter your name...">
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="mail" class="form-control" placeholder="Enter your email...">
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" class="form-control" placeholder="Enter your mobile number...">
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select name="state" class="form-control" id="state-dropdown">
                            <option value="">Select State</option>
            					<?php
                   
				                    require_once "config.php";
				                    
				                    
				                    $sql = "SELECT * FROM state";
				                    if($result = mysqli_query($link, $sql)){
				                        if(mysqli_num_rows($result) > 0){
				                        	while($row = mysqli_fetch_array($result)){
				                        		echo '<option value="'.$row[name].'">'.$row[name].'</option>';
				                        	}}}
                        		?>									
                            </select>
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="city" class="form-control" id="city-dropdown">
                            	<option value="">Select City</option>
                            </select>
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="address" class="form-control" placeholder="Enter your address..."></textarea>
                            <span class="invalid"></span>
                        </div>
                    </div>
                        <input type="button" class="btn btn-primary" value="Submit" onclick="validate()">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
        </div>
		</div>
	</div>
	<script type="text/javascript">
		$('#state-dropdown').on('change', function() {
		
		var state_name = this.value;
		$.ajax({
		url: "load_cities.php",
		type: "POST",
		data: {
		state_name: state_name
		},
		cache: false,
		success: function(result){
		$("#city-dropdown").html(result);
		}
		});
		});
	</script>
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" id="u-form">
					<div class="modal-header">						
						<h4 class="modal-title">Edit Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="uname" class="form-control is-invalid" id="uname" placeholder="Enter your name...">
                        	<span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" name="umail" class="form-control" id="umail" placeholder="Enter your mail...">
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="umobile" class="form-control" id="umobile" placeholder="Enter your mobile number...">
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>State</label>
                            <select name="ustate" class="form-control" id="ustate">
                            	<option value="">Select State</option>
                            	<?php
				                    require_once "config.php";
				                    $sql = "SELECT * FROM state";
				                    if($result = mysqli_query($link, $sql)){
				                        if(mysqli_num_rows($result) > 0){
				                        	while($row = mysqli_fetch_array($result)){
				                        		echo '<option value="'.$row[name].'">'.$row[name].'</option>';
				                        	}}}
                        		?>
                            </select>
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <select name="ucity" class="form-control" id="ucity">
                            <option value="">Select City</option>
                            </select>
                            <span class="invalid"></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea name="uaddress" class="form-control" id="uaddress" placeholder="Enter your address..."></textarea>
                            <span class="invalid"></span>
                        </div>
                    </div>
					<input type="hidden" name="uid" value="-1" id="uid_val"/>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="button" class="btn btn-info" value="Save" onclick="uvalidate()">
					</div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$('#ustate').on('change', function() {
		
		var state_name = this.value;
		$.ajax({
		url: "load_cities.php",
		type: "POST",
		data: {
		state_name: state_name
		},
		cache: false,
		success: function(result){
		$("#ucity").html(result);
		}
		});
		});
	</script>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<div class="modal-header">						
						<h4 class="modal-title">Delete Employee</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<input type="hidden" name="del_id" value="-1" id="del_id_val"/>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<input type="submit" class="btn btn-danger" value="Delete">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>