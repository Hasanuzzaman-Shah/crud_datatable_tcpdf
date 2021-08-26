<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Database Project</title>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="datatable/dataTable.bootstrap.min.css">
	<style>
		
	.page-header {
    padding: 20px;
    margin: 20px 0 20px;
    border-bottom: 1px solid while;
	border-radius: 10px;
	background-image: linear-gradient(45deg,tomato,skyblue);
	box-shadow: 6px 6px 15px chartreuse;
	
    
}
		.height10{
			height:10px;
		}
		.mtop10{
			margin-top:10px;
		}
		.modal-label{
			position:relative;
			top:7px
		}
.orange-highlight{
    color: lightgreen;

}
.tomato-highlight{
    color: tomato;
}
a.btn.btn-primary {
	
    background-image: linear-gradient(45deg,yellow,tomato);
	
	
}
.link-button{
    transition: .3s;
}
.link-button:hover{
    transform: scale(1.1);
}

.button{
	text-align : center;
}

.modal-body {
    position: relative;
    padding: 15px;
	background-image: linear-gradient(45deg,skyblue,tomato);
}
.modal-header {
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
	background-image: linear-gradient(45deg,greenyellow,lightgreen);
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
	background-image: linear-gradient(45deg,aqua,white );
	
}
}
  


	</style>
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">  <span class="orange-highlight">Enter Your</span> <span class="tomato-highlight">Data</span></h1>
	<div class="row">
		<div class="col-sm-8 col-sm-offset-2">
			<div class="row">
			<?php
				if(isset($_SESSION['error'])){
					echo
					"
					<div class='alert alert-danger text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['error']."
					</div>
					";
					unset($_SESSION['error']);
				}
				if(isset($_SESSION['success'])){
					echo
					"
					<div class='alert alert-success text-center'>
						<button class='close'>&times;</button>
						".$_SESSION['success']."
					</div>
					";
					unset($_SESSION['success']);
				}
			?>
			</div>
			<div class="row button">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary link-button "><span class="glyphicon glyphicon-plus create  "></span> Create New </a>
				
			</div>
			<div class="height10">
			</div>
			<div class="row">
				<table id="myTable" class="table table-bordered table-striped  ">
					<thead>
						<th>ID</th>
						<th>FirstName</th>
						<th>LastName</th>
						<th>Address</th>
						<th>Action</th>
					</thead>
					<tbody>
						<?php
							include_once('connection.php');
							$sql = "SELECT * FROM members";

							//use for MySQLi-OOP
							$query = $conn->query($sql);
							while($row = $query->fetch_assoc()){
								echo 
								"<tr>
									<td>".$row['id']."</td>
									<td>".$row['firstname']."</td>
									<td>".$row['lastname']."</td>
									<td>".$row['address']."</td>
									<td>
										<a href='#edit_".$row['id']."' class='btn btn-success btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-edit'></span> Update </a>
										<a href='#delete_".$row['id']."' class='btn btn-danger btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-trash'></span> Delete</a>
									</td>
								</tr>";
								include('edit_delete_modal.php');
							}
						
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php include('add_modal.php') ?>

<script src="jquery/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="datatable/jquery.dataTables.min.js"></script>
<script src="datatable/dataTable.bootstrap.min.js"></script>
<!-- generate datatable on our table -->
<script>
$(document).ready(function(){
	//inialize datatable
    $('#myTable').DataTable();

    //hide alert
    $(document).on('click', '.close', function(){
    	$('.alert').hide();
    })
});
</script>
</body>


</html>