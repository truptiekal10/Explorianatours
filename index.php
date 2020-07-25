<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourism";

$connection = mysqli_connect($servername, $username, $password, $dbname);

if($_SERVER["REQUEST_METHOD"] == "POST")
{	 
    $nmsg = $cmsg = $pmsg = $emsg = $cimsg = "";
     $name = $_POST['name'];
     $contact = $_POST['contact'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
     $city = $_POST['city'];
     if(empty($name))
	 {
		 $nmsg="please enter your name";
	 }
    elseif(	!preg_match("/^[a-zA-Z]*$/",$_POST["name"]))
	{
      $nmsg="please enter alphabates only";
	}
    elseif(empty($contact))
     { 
       $cmsg="Please enter your contact number";
    }
    elseif( !preg_match(" /^\d{10}$/",$_POST["contact"]))
    {
        $cmsg="Please enter valid contact";
    }
    elseif(empty($email))
    {
        $emsg="Please enter your email";
    }
    elseif(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i",$_POST["email"]))
    {
        
        $emsg="Please enter valid email";
    }
    elseif(empty($password))
    {
        $pmsg="Please enter your password";
    }
    elseif(!preg_match("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])^",$_POST["password"]))
		{
			
			$pmsg="It must have atleast one character Capital, symbols,numbers ";
		}
     elseif(empty($city))
    {
        $cimsg="Please enter your city";
    }
    
    else
    {
	 $sql = "INSERT INTO usersinfo (name,contact,email,password,city)
	 VALUES ('$name','$contact','$email','$password','$city')";
	 if (mysqli_query($connection, $sql))
     {
		echo '<script>alert("Data Saved")</script>';
         header("location:main.html");
	 } 
    else 
    {
		echo '<script>alert("This Id already in use")</script>';
        
	 }
   }
	 mysqli_close($connection);
}

?>


<!DOCTYPE html>
<html lang="en">
<?php include "login.php"; ?>
<head>
    <!-- Required meta tags always come first -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="node_modules/bootstrap-social/bootstrap-social.css">-->
    
    <link rel="stylesheet" href="css/styles.css">
    <title>Exploriana Tours</title>
</head>
   
    
    <body style="background-image: url(img/11.JPG);background-size: cover;  background-position: center top; background-repeat: no-repeat;height: 500px;width: 100%; ">
   
       

            
            
        
     
          <section class="parent">
                <div class="child">
                    
                     
                     <a  id="reserveButton" class="btn btn-active btn-outline-light btn-lg" data-toggle="modal" data-target="#signinmodal" onclick="$('#yourModal').modal({'backdrop': 'static'});">
                    signup
                    </a>
                    
                     <a  id="reserveButton" class="btn btn-active btn-outline-light btn-lg" data-toggle="modal" data-target="#loginmodal">
                    Login
                    </a><h1 style=" vertical-align:middle; text-align:center;">
                     Exploriana Tours.
                </h1> 
                    <h3 style="text-decoration-color: aliceblue;">Travel is good for Soul;
                    experiences are necessary for Growth
                    </h3>
                    
                    
                
              </div>
           </section> 
        
        <div id="signinmodal" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg" role="content">
                <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title">Sign in Here</h4>
             <button type="button" class="close" data-dismiss="modal">
             &times;</button>
            </div>
         <div class="modal-body">
            <form action="index.php" method="POST">
            
                <div class="form-group">
                    
                   <label for="Inputname">Name</label>
                    <input type="text" class="form-control" id="name" name="name"  placeholder="Enter Your Name" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>">
                   
                    <?php if(isset($nmsg))
                      {
	                    echo $nmsg;
	                  }
                    ?>
                     
               </div>
                
                <div class="form-group">
                  
                  
                 <label for="Inputcontact">Contact Number</label>
                    <input type="number" class="form-control" id="contact"  placeholder="Enter Your Contact Number" name="contact" value="<?php echo isset($_POST["contact"]) ? $_POST["contact"] : ''; ?>">
                  
                   
                    <?php if(isset($cmsg))
                      {
	                    echo $cmsg;
	                  }
                    ?>
                    
             </div>
                
                
                
              <div class="form-group">
                  
                  
                 <label for="InputEmail1">Email address</label>
                    <input type="email" class="form-control" id="lInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                    
                   
                    <?php if(isset($emsg))
                      {
	                    echo $emsg;
	                  }
                    ?>
                     
                  
             </div>
             <div class="form-group">
                 <label for="InputPassword1">Password</label>
                    <input type="password" class="form-control" id="InputPassword1" placeholder="Password" name="password"  value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
               
                   
                    <?php if(isset($pmsg))
                      {
	                    echo $pmsg;
	                  }
                    ?>
            </div>
                
                 <div class="form-group">
                  
                  
                 <label for="Inputcity">City </label>
                    <input type="text" class="form-control" id="city"  placeholder="Enter Your City Name" name="city" value="<?php echo isset($_POST["city"]) ? $_POST["city"] : ''; ?>">
               
                   
                    <?php if(isset($cimsg))
                      {
	                    echo $cimsg;
	                  }
                    ?>
                    
             </div>
                
                
         
             <button type="submit" name="Submit" class="btn btn-primary" >Submit</button>
        </form>
             
         </div>
         </div>
        
        </div>
    </div>
      
        
 <div id="loginmodal" class="modal fade" role="dialog">
     <div class="modal-dialog modal-lg" role="content">
            <div class="modal-content">
           <div class="modal-header">
            <h4 class="modal-title">Login Here</h4>
             <button type="button" class="close" data-dismiss="modal">
             &times;</button>
            </div>
         <div class="modal-body">
        
     
          <form action="login.php" method="post">
              
            
        <div class="col-sm-12 col-md-8"   >  
          <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
             <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>">
                   
                    <?php if(isset($err))
                      {
	                    echo $err;
	                  }
                    ?>
               
                 </div>
          <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" value="<?php echo isset($_POST["password"]) ? $_POST["password"] : ''; ?>">
                   
                    <?php if(isset($perr))
                      {
	                    echo $perr;
	                  }
                    ?>
         </div>
        
   <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              
</form>
       
        
  

   
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>
