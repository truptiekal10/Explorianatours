<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['insertdata']))
{	 
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 
	 $sql = "INSERT INTO tour (email,password)
	 VALUES ('$email','$password')";
	 if (mysqli_query($connection, $sql))
     {
		echo '<script>alert("Data Saved")</script>';
         header("location:index.php");
	 } 
    else 
    {
		echo '<script>alert("Data not Saved")</script>';
	 }
	 mysqli_close($connection);
}
?>