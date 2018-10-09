<?php 
session_start();
if(session_id()=='' || !isset($_SESSION['login']))
{
  header("Location:/code/login.php");
}
?>
<?php

$servername = "localhost";
$user = "root";
$pass = "password";
$dbname="LHdb";

$conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
        .paswd{
            font-size: 20px;
          margin-top: 30%;
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
      <li><a style="color: white" href="security.php"><b>Home</b></a></li>                <!--change this to security.html -->
      <li><a href="normallogin.php">Normal Login</a></li>
      <li><a href="latelogin.php">Late login</a></li>
        
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
	<p class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?php 
          $id=$_SESSION['login'];
          $sql= "SELECT Name FROM Security WHERE '$id'=SecurityID";
          $result = $conn->query($sql);
          $row=$result->fetch_assoc();
          echo $row["Name"]; ?></p>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <p>Welcome 
  <?php echo $row["Name"]; ?>!!<br></p>
    
  <!--<p>A navigation bar is a navigation header that is placed at the top of the page.</p> -->
</div> -->

<div class="paswd"><a href="php/changepass.php">Change password</a></div>

</body>
</html>
