
<?php 
session_start();
if(session_id()=='' || !isset($_SESSION['login']))
{
  header("Location:/code/latelogin.php");
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
    body, html, .container{
     height: 100%;
}
        input[type=text]{
           
    text-align: center;
    width: 80%;
    padding: 10px 18px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}
.right input[type=text]{
  width: 60%;
  padding: 8px 15px;
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
        .right{
            z-index:1;
            line-height:80 px;
            margin: auto;
            margin-top:-100 px;
            position: relative;
            bottom:5%;
            font-size: 20px;
            padding: 5%;
        }
        .nav{
            font-size: 18px !important;
            margin-top: 10px !important;
        }
        
        .bod{
            z-index:1;
            line-height:80 px;
            margin: auto;
            margin-top:-100 px;
            position: absolute;
            top:10%;
            width: 100%;
            font-size: 20px;
        }
        .container{
            left: 0;
            position: absolute;
            width: 100%;
        }
        #rectangle{
            width:370px;
            height:670px;
            background-color: darksalmon;
            z-index: -1;
        }  

        .win{
          width:100%;
          overflow: scroll;
          height:300px;          
        z-index: 1;
        } 
        
      .col-md-3{   
        background-color: darksalmon;
      }  

      .flef{
          padding: 27vh 0 35vh 0;
        /*padding: 50% 0 70% 0;*/
      }
      
        body{
            text-align: center;
            z-index: 0;
        }
        button, input[type="submit"]{
        
    background-color: #010001;
    color: white;
    padding: 14px 20px;
    margin: 8px auto;
    border: none;
    cursor: pointer;
    width: 30%;
    text-align: center;
   
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
    margin-top:3%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: center;
    padding: 6px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
.row{
  z-index: 1;
}
.hi{
  font-size: 22px;
float: left;
margin-left: 3%;
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
      <li><a href="security.php">Home</a></li>                <!--change this to security.html -->
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
  <form class="flef" action="latelogin.php" method="POST">
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
            $sql3="SELECT * FROM LateReg WHERE Student_RollNo='$roll' ORDER BY TimeOut desc";
            $result3 = $conn->query($sql3);
            
                echo "<div class='col-md-12 win'><table>"; 
                echo "<tr><th>Roll No:</th><th>Time Out</th><th>Time In</th></tr>";
                while($rowmov=$result3->fetch_assoc())
                {  
                  if(isset($rowmov['TimeIn']))
                  {
                    echo "<tr><td>" . $rowmov['Student_RollNo'] . "</td><td>". date("d/m/y H:i", strtotime($rowmov['TimeOut'])) . "</td><td>". date("d/m/y H:i", strtotime($rowmov['TimeIn'])) . "</td></tr>";
                  }
                  else
                    echo "<tr><td>" . $rowmov['Student_RollNo'] . "</td><td>".  date("d/m/y H:i", strtotime($rowmov['TimeOut']))  . "</td><td>". "" . "</td></tr>";
                    
                }
                echo "</table></div></div><div class='row'>"; 
            
            
            if($rowstatus['Status']=='1'){
              //echo '<script>alert("In")</script>';
              ?>
              <div class="right col-md-12">
              <form action="php/Signout_Late.php" method="POST">
              
              <input type="submit" value="Sign out" name="signout">
              </form>
              </div>
              <?php
            }
            else{
              //echo '<script>alert("Out")</script>';
              ?>
              <div class="right col-md-12">
             
              <form action="php/SignIn_Late.php" method="POST">
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
