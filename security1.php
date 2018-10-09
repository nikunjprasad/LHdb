

<?php

$servername = "localhost";
$user = "root";
$pass = "";
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
    	$gate=$_POST["gate"];
    	$sql= "SELECT * FROM Security WHERE '$id'=SecurityID and '$password'=Password";
    	$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
    		//echo "Login successful";
		while($row=$result->fetch_assoc()) 
    		{

      
				$s1="UPDATE Security SET gate='$gate' WHERE '$id'=SecurityID";
				if($conn->query($s1) === TRUE) ;
							
				else;
					
      		}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
  <title>Security</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        .nav{
            font-size: 18px !important;
            margin-top: 10px !important;
        }
        
        .container{
            z-index:1;
            left:0;
            line-height:80 px;
            margin: auto;
            margin-top:-100 px;
            position: absolute;
            top:45%;
            width: 100%;
            font-size: 40px;
        }
        body{
            text-align: center;
            z-index: 0;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a style="color: white" href="security.html"><b>Home</b></a></li>                <!--change this to security.html -->
      <li><a href="normallogin.html">Normal Login</a></li>
      <li><a href="latelogin.html">Late login</a></li>
        
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Complete Status
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="php/Movement_full.php">Normal Register</a></li>
          <li><a href="php/late.php">Late Register</a></li>
          
        </ul>
      </li>
        
    </ul>

	

    <ul class="nav navbar-nav navbar-right">
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> xxxx</p>
      <li><a href="login.html"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <p>Welcome xxxx!!<br>Your duty started at xx:xx - xxxx Gate</p>
    
  <!--<p>A navigation bar is a navigation header that is placed at the top of the page.</p> -->
</div> -->

</body>
</html>
<?php

		}
		else
{
		header("Location: http://localhost:3000/code/login.html");
    		echo '<script> alert("auth failed. Try again")</script>';
}
      
    }
	
else if(strcmp($who, "Warden")==0)
	{
		$sql= "SELECT * FROM Warden WHERE '$id'=WardenID and '$password'=Password";
    	$result = $conn->query($sql);
    	if($result->num_rows>0)
    		echo "Login Succesful";
    	else
    		echo "auth failed. Try again";
	}    

$conn->close();
?>




