<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {
	if (empty($_POST['customer_username']) || empty($_POST['customer_password'])) {
		$error = "Username or Password is invalid";
	} else {

		// Define $username and $password
		$customer_username = $_POST['customer_username'];
		$customer_password = $_POST['customer_password'];
		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		require 'connection.php';
		$conn = Connect();




// SQL query to fetch information of registerd users and finds user match.
$query = "SELECT customer_username, customer_password FROM customers WHERE customer_username=? LIMIT 1";



$stmt = $conn->prepare($query);
    $stmt->bind_param('s', $customer_username);
    $stmt->execute();
    $result = $stmt->get_result();
	  // Fetch the row
	  $user = $result->fetch_assoc();

	  if($user) {
		// Verify the password
		if (password_verify($customer_password, $user['customer_password'])) {
		  $_SESSION['login_customer']=$customer_username; // Initializing Session
		  header("location: index.php");
		} else {
		  $error = "Username or Password is invalid";
		}
	  } else {
		$error = "Username or Password is invalid";
	  }



mysqli_close($conn); // Closing Connection
}
}
 ?>