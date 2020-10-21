<?php
	
	include 'connection.php';
	
	if(isset($_POST['submit'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$username = mysqli_real_escape_string($conn,$username);
		$password = mysqli_real_escape_string($conn,$password);
		$sql = "SELECT * FROM user WHERE username='$username'
		and password='$password'";
		$result = mysqli_query($conn,$sql) or die(mysql_error());
		$rows = mysqli_num_rows($result);
			   if($rows==1){
			
				   // Redirect user to index.php
			header("Location: welcome.php");
				}else{
		echo "<div class='form'>
	   <h3>Username/password is incorrect.</h3>
	   <br/>Click here to <a href='login.php'>Login</a></div>";
		}
		   }
	


?>