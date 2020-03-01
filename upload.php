<?php
	require_once'conn.php';
	if(ISSET($_POST['upload'])){
		$file_name=$_FILES['file']['name'];
		$exp=explode('.', $file_name);
		$name=end($exp);
		
		if($name=="xml"){
			$query=mysqli_query($conn, "SELECT * FROM `member`") or die(mysqli_error());
			$count=mysqli_num_rows($query);
			
			if($count >0){
				echo"<script>alert('XML file is already uploaded!')</script>";
				echo"<script>window.location='index.php'</script>";
			}else{
				$xml = simplexml_load_file(''.$file_name);
				foreach($xml->member as $member){
					$firstname=$member->firstname;
					$lastname=$member->lastname;
					$address=$member->address;
					
					mysqli_query($conn, "INSERT INTO `member` VALUES('', '$firstname', '$lastname', '$address')") or die(mysqli_error());
				}
				
				header('location:index.php');
			}

		}else{
			echo"<script>alert('This is not a XML file')</script>";
				echo"<script>window.location='index.php'</script>";
		}
	}
?>