<?php
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	// Database connection
	$conn = new mysqli('localhost','shravan','8971613489','mydata');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into na(username, email, password) values(?, ?, ?)");
		$stmt->bind_param("sss", $username, $email, $password);
		$stmt->execute();
		$stmt_result = $stmt->get_result();
		if($stmt_result->num_rows > 0){
           $data = $stmt_result->fetch_assoc();
		   if($data['password']===$password){
			echo "<h2>Registration successfully...</h2>";
		   }else{
			echo "<h2>invalid email or password</h2>";
		   }
		}else{
			echo "<h2>invalid email or password</h2>";
		}
		
	}
?>
