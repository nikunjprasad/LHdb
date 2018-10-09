<?php 
session_start();
if(!(session_id()=='' || !isset($_SESSION['login'])))
{
  header("Location:/code/security.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/loginstyle.css">
 </head>



<body>

<div id="background"></div>

<a href="work.php"><button type="button" class="cancelbtn">Home</button></a>
    
  <form action="login.php" method="POST">   <!-- was security.php -->
  <div class="container">
      <h1>Login</h1>
    <div class="uname">
    <label><b>User  ID </b></label>
    <input type="text" placeholder="Enter User ID" name="uname" required>
      </div>
      <br>
      <div class="passwd">
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
      </div> 
      <br>
      <div class="select">
          <label for="designation"><b>Designation</b></label>
    <select id="designation" name="who">
	<option value="Security">Security</option>
      <option value="Warden">Warden</option>
      
    </select>
      </div>
      <br>
      <br>
      
    <button type="submit" name="login">Login</button>
      <br>
  </div>
      

</form>

<?php

function logins(){
$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id=$_POST["uname"];
$password=$_POST["psw"];
$who=$_POST["who"];


if(strcmp($who, "Security")==0)    
    {
    	//$gate=$_POST["gate"];
    	$sql= "SELECT * FROM Security WHERE '$id'=SecurityID and '$password'=Password";
    	$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
    		
		while($row=$result->fetch_assoc()) 
    		{

      
				//$s1="UPDATE Security SET gate='$gate' WHERE '$id'=SecurityID";
				//if($conn->query($s1) === TRUE) ;
					;		
				//else;
					
      		}
		$_SESSION['login']=$_POST['uname'];
		header("Location:/code/security.php");
		}
		else
    			echo '<script> alert("auth failed. Try again")</script>';
      
    }
	
else if(strcmp($who, "Warden")==0)
	{ 
		$sql= "SELECT * FROM Warden WHERE '$id'=WardenID and '$password'=Password";
    	$result = $conn->query($sql);
    	if($result->num_rows>0){
        $_SESSION['loginw']=$_POST['uname'];
    		header("Location:/code/warden/warden.php");
      }
		
		else
    			echo '<script> alert("auth failed. Try again")</script>';
      
    }

$conn->close();
}
if(isset($_POST['login']))
{
   logins();
} 
?>


</body>
    

    
  

</html>
