<?php
session_start();

require 'connection.php';
$conn = Connect();

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_SESSION['login_customer'])) {
  $username = $_SESSION['login_customer'];
  $sql = "DELETE FROM rentedcars WHERE customer_username = '$username'";

  if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
        header("location: mybookings.php");
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }
}

mysqli_close($conn);

?>