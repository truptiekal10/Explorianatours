<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

 $conn = mysqli_connect($servername, $username, $password, $dbname);
 
  if($conn->connect_error){
    die("connection failed" . $conn->connect_error );
	}
	else
	{
	 if($_SERVER["REQUEST_METHOD"] == "POST")
	 {
	  $email=$_POST['email'];
	  $password=$_POST['password'];
	  $query="select * from usersinfo where email='".$email."' and password='".$password."'limit 1";
	  $result=mysqli_query($conn,$query);
	     if(mysqli_num_rows($result)==1)
		  {
		     
		   echo "login successful";
		     header("location:main.html");
			
		 }
		 else
		 {
		   echo"you have entered invalid email or password";
		 }
	    }
 	}
   mysqli_close($conn);
?>	