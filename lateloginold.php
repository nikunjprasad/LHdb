<?php 
session_start();
if(session_id()=='' || !isset($_SESSION['login']))
{
  header("Location:/code/login.php");
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
        input[type=text]{
           
    text-align: center;
    width: 20%;
    padding: 10px 18px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
        .leftmenu{
            text-align: left;
            z-index:1;
            left:0;
            line-height:80 px;
            margin: auto;
            margin-top:-100 px;
            position: absolute;
            top:45%;
            width: 100%;
            font-size: 20px;
        }
        .nav{
            font-size: 18px !important;
            margin-top: 10px !important;
        }
        
        
        #rectangle{
            width:370px;
            height:670px;
            background-color: darksalmon;
            z-index: -1;
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
        button {
        margin-left: 150px;
    background-color: #010001;
    color: white;
    padding: 14px 20px;
    /*margin: 8px auto;*/
    border: none;
    cursor: pointer;
    width: 7%;
    text-align: center;
   
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
      <li><a  href="security.php">Home</a></li>                <!--change this to security.html -->
      <li><a href="normallogin.php">Normal Login</a></li>
      <li><a style="color: white" href="latelogin.php"><b>Late login</b></a></li>
        
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
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
  
<div class="leftmenu">
<form action="latelogin.php" method="POST">
  <div class="uname">
      <label><b><p>Roll No</p></b></label>
    <input type="text" placeholder="Enter RollNo" name="roll" required>
  </div>
  <div class="Go">
  <button type="submit" value="Submit" name="sign">Go</button>
 </div>
  <!--<p>A navigation bar is a navigation header that is placed at the top of the page.</p> -->
  </form>
    </div>
    
    <div id="rectangle"></div>
    
  <?php 

      function fetchdata(){
        $servername = "localhost";
        $user = "root";
        $pass = "password";
        $dbname="LHdb";

        $conn = new mysqli($servername,$user,$pass,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

          $roll=$_POST["roll"];
         // echo '<script>alert("hey '.$roll.'")</script>';
          $sql1= "SELECT * FROM Student WHERE RollNo='$roll'";
          $result1 = $conn->query($sql1);
          //echo '<script>alert("hey '.$roll.'")</script>';
          if($result1->num_rows > 0)
          {
            //echo '<script>alert("In")</script>';
            $sql2= "SELECT * FROM st_status WHERE '$roll'=Student_RollNo";
            $result2 = $conn->query($sql2);
            $rowstatus=$result2->fetch_assoc();
            if($rowstatus['Status']=='1')
              echo '<script>alert("In")</script>';
            else
              echo '<script>alert("Out")</script>';

          }
          else echo '<script>alert("Invalid Roll Number")</script>';

$conn->close();
}
if(isset($_POST['sign']))
{
   fetchdata();
} 
?>

    
</body>
</html>
