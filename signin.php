<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST['Submit']))
{	 
     $name = $_POST['name'];
     $contact = $_POST['contact'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
     $city = $_POST['city'];
	 
	 $sql = "INSERT INTO usersinfo (name,contact,email,password,city)
	 VALUES ('$name','$contact','$email','$password','$city')";
	 if (mysqli_query($connection, $sql))
     {
		echo '<script>alert("Data Saved")</script>';
         header("location:main.html");
	 } 
    else 
    {
		echo '<script>alert("Data not Saved")</script>';
        
	 }
	 mysqli_close($connection);
}
?>