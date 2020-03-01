<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href = "https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Upload XML File to MySQLi</h3>
		<hr style="border-top:1px dotted #000;" />
		<div class="col-md-4">
			<form method="POST" action="upload.php" enctype="multipart/form-data">
				<h5>Upload XML here</h5>
				<input type="file" name="file"/>
				<br />
				<center><button name="upload" class="btn btn-primary">Upload</button></center>
			</form>
		</div>
		<div class="col-md-8">
			<table class="table table-bordered">
				<thead class="alert-info">
					<tr>
						<th>Firstname</th>
						<th>Lastname</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						require'conn.php';
						
						$query=mysqli_query($conn, "SELECT * FROM `member`") or die(mysqli_error());
						while($fetch=mysqli_fetch_array($query)){
					?>
						<tr>
							<td><?php echo $fetch['firstname']?></td>
							<td><?php echo $fetch['lastname']?></td>
							<td><?php echo $fetch['address']?></td>
						</tr>
					<?php
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>