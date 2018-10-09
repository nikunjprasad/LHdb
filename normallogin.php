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
  <link rel="stylesheet" href="css/sidecolorstyle.css">
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!--<div class="navbar-header">
      <a class="navbar-brand" href="#">WebSiteName</a>
    </div> -->
    <ul class="nav navbar-nav">
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <li><a href="security.php">Home</a></li>                <!--change this to security.html -->
      <li><a style="color: white" href="normallogin.php"><b>Normal Login</b></a></li>
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
<div class="bod">
<div class="container">
<div class="row">
<div class="col-md-3 row-height">
<div class="clearfix">
  <form class="flef" action="normallogin.php" method="POST">
  <div class="uname">
      <label><b><p>Roll No</p></b></label>
    <input type="text" placeholder="Enter RollNo" name="roll" required>
  </div>
  <div class="Go">
  <button type="submit" value="Submit" name="sign">Go</button>
 </div>
  </form>
  </div>
</div>
<div class="col-md-9">
        
        <div class="row">
    
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
          $_SESSION['st_roll']=$roll;
         // echo '<script>alert("hey '.$roll.'")</script>';
          $sql1= "SELECT * FROM Student WHERE RollNo='$roll'";
          $result1 = $conn->query($sql1);
          //echo '<script>alert("hey '.$roll.'")</script>';
          if($result1->num_rows > 0)
          {
            //echo '<script>alert("In")</script>';
            ?>
            <div class="hi">
              <br><b>Hey
              <?php
              $rowstud=$result1->fetch_assoc();
              echo " ".$rowstud['Name'];
              ?>
              <div class="toright">
              Warnings: 
              <?php
              $sql2= "SELECT * FROM st_status WHERE '$roll'=Student_RollNo";
            $result2 = $conn->query($sql2);
            $rowstatus=$result2->fetch_assoc();
            echo " ".$rowstatus['Warning'];
            ?>
            </div>
               </b>
            </div>
            <?php
            $sql3="SELECT * FROM Movement WHERE Student_RollNo='$roll' ORDER BY TimeOut desc";
            $result3 = $conn->query($sql3);
            
                echo "<div class='col-md-12 win'><table>"; 
                echo "<tr><th>Roll No:</th><th>Place</th><th>Time Out</th><th>Time In</th><th>Remarks</th></tr>";
                while($rowmov=$result3->fetch_assoc())
                {  
                  if(isset($rowmov['TimeIn']))
                  {
                    echo "<tr><td>" . $rowmov['Student_RollNo'] . "</td><td>". $rowmov['Place'] . "</td><td>". date("d/m/y H:i", strtotime($rowmov['TimeOut'])) . "</td><td>". date("d/m/y H:i", strtotime($rowmov['TimeIn'])) . "</td><td>". $rowmov['Remarks'] . "</td></tr>";
                  }
                  else
                    echo "<tr><td>" . $rowmov['Student_RollNo'] . "</td><td>". $rowmov['Place'] . "</td><td>".  date("d/m/y H:i", strtotime($rowmov['TimeOut']))  . "</td><td>". "" . "</td><td>". $rowmov['Remarks'] . "</td></tr>";
                    
                }
                echo "</table></div></div><div class='row'>"; 
            
            
            if($rowstatus['Status']=='1'){
              //echo '<script>alert("In")</script>';
              ?>
              <div class="right col-md-12">
              <form action="php/SignOut_Normal.php" method="POST">
              <label><b><p>Place</p></b></label>
              <input type="text" name="place" required>
              <input type="submit" value="Sign out" name="signout">
              </form>
              </div>
              <?php
            }
            else{

              //echo '<script>alert("Out")</script>';
              ?>
              <div class="right col-md-12">
             
              <form action="php/SignIn_Normal.php" method="POST">
              <input type="submit" value="Sign in" name="signin">
              </form>
              </div>
              <?php
            }

          }
          else echo '<script>alert("Invalid Roll Number")</script>';

$conn->close();
}

if(isset($_POST['sign']))
{
   fetchdata();
} 

?>
</div>
    
    </div>
</div>
</div>
   </div> 
</body>
</html>
