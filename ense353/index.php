<?php
session_start();
$conn= new mysqli("localhost","root","","mydb");
	if($conn->connect_error){
    		die("connection failed:" .$conn->connect_error);
  }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movie Subscriptions</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }   

    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    .col-sm-4{
      position: relative;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li class=""><a href="employees.php">Employees</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php 
  if (isset($_SESSION['username'])) { ?>
        <li class=""><a href="mySubscription.php">mySubscriptions</a></li>
        <li class=""><a href='#'> <?=$_SESSION['username']?></a></li>
        <li class=""><a href="logout.php">LOGOUT</a></li>
        <?php
      }
        else{
          ?>
        <li class =""><a href="ENSE353login.php"> Login</a></li>
        <li class=""><a href="ENSE353_Signup.php">SignUP</a></li>  
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>

<?php 
if(!isset($_SESSION['username'])){
  echo " Please log in to catch up on our latest movie List";
}
?>
<?php

  if(isset($_SESSION['username'])){
  $sql= "SELECT * FROM movie WHERE Api_id='299534' AND uid='$_SESSION[uid]'";
  $result=$conn->query($sql) or die($conn->error);
  $row = $result->fetch_assoc();
  if($result->num_rows =='0'){
?>

<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">End Game</div>
        <div class="panel-body"><img src="Avengers_Endgame.jpg" class="img-thumbnail" alt="img"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="endgame" id="299534" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
  <?php }  } ?>

  <?php
  if(isset($_GET['endgame'])){
    $sql="INSERT INTO movie (Api_id, uid,movie_bool) VALUES ('299534' , '$_SESSION[uid]','1')";
    $res = $conn->query($sql) or die($conn->error); 
    header("Location: ./index.php");
    exit();
  }
  ?>
  <?php
  if(isset($_SESSION['username'])){
  //$sql= "SELECT * FROM movie WHERE uid = '53' AND mid='2'";
  $sql= "SELECT * FROM movie WHERE Api_id='338970' AND uid='$_SESSION[uid]'";
  $result=$conn->query($sql);
  $row = $result->fetch_assoc();
  if($result->num_rows =='0'){
?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Tomb Raider</div>
        <div class="panel-body"><img src="TombRaider.jpeg" class="img-thumbnail" alt="Hello sir"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="tombraider" id="338970" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
    <?php }  }?>
    <?php
  if(isset($_GET['tombraider'])){
    $sql="INSERT INTO movie (Api_id, uid, movie_bool) VALUES ('338970' , '$_SESSION[uid]','1')";
    $res = $conn->query($sql) or die($conn->error); 
    header("Location: ./index.php");
    exit();
  }
  ?>
    
    <?php
  if(isset($_SESSION['username'])){
    $sql= "SELECT * FROM movie WHERE Api_id='1726' AND uid='$_SESSION[uid]'";
  $result=$conn->query($sql);
  $row = $result->fetch_assoc();
  if($result->num_rows =='0'){
?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">IronMan</div>
        <div class="panel-body"><img src="IronMan.jpg" class="img-thumbnail" alt="Hello sir"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="ironman" id="1726" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
  </div>
</div><?php }  }?><br>
<?php
  if(isset($_GET['ironman'])){
    $sql="INSERT INTO movie (Api_id, uid, movie_bool) VALUES ('1726' , '$_SESSION[uid]','1')";
    $res = $conn->query($sql) or die($conn->error); 
    header("Location: ./index.php");
    exit();
  }
  ?>

<?php
  if(isset($_SESSION['username'])){
    $sql= "SELECT * FROM movie  WHERE Api_id='320288' AND uid='$_SESSION[uid]'";
  $result=$conn->query($sql);
  $row1 = $result->fetch_assoc();
  if($result->num_rows =='0'){
?>
<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Dark Phoenix</div>
        <div class="panel-body"><img src="DarkPhoenix.jpeg" class="img-thumbnail" alt="Hello sir"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="darkpheonix" id="320288" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
    <?php }  }?>
    <?php
    if(isset($_GET['darkpheonix'])){
    $sql="INSERT INTO movie (Api_id, uid, movie_bool) VALUES ('320288' , '$_SESSION[uid]','1')";
    $res = $conn->query($sql) or die($conn->error); 
    header("Location: ./index.php");
    exit();
    }
    ?>

    <?php
    if(isset($_SESSION['username'])){
    $sql= "SELECT * FROM movie  WHERE Api_id='335984' AND uid='$_SESSION[uid]'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows =='0'){
    ?>
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Blade Runner</div>
        <div class="panel-body"><img src="BladeRunner.jpeg" class="img-thumbnail" alt="Hello sir"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="bladerunner" id="335984" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
    <?php }  }?>
    <?php
    if(isset($_GET['bladerunner'])){
    $sql="INSERT INTO movie (Api_id, uid, movie_bool) VALUES ('335984' , '$_SESSION[uid]','1')";
    $res = $conn->query($sql) or die($conn->error); 
    header("Location: ./index.php");
    exit();
    }
    ?>

    <?php
    if(isset($_SESSION['username'])){
    $sql= "SELECT * FROM movie  WHERE Api_id='475557' AND uid='$_SESSION[uid]'";
    $result=$conn->query($sql);
    $row = $result->fetch_assoc();
    if($result->num_rows =='0'){
    ?>
      <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">Joker</div>
        <div class="panel-body"><img src="Joker.jpeg" class="img-thumbnail" alt="Hello sir"></div>
        <form action="index.php" method="GET">
        <div class="panel-footer"><input type="submit" class="btn btn-primary" name="joker" id="475557" value="Subscribe"></input></div>
        </form>
      </div>
    </div>
  </div>
    <?php }  }?>
    <?php
    if(isset($_GET['joker'])){
      $sql="INSERT INTO movie (Api_id, uid, movie_bool) VALUES ('475557' , '$_SESSION[uid]','1')";
      $res = $conn->query($sql) or die($conn->error); 
      header("Location: ./index.php");
      exit();
    }
    ?>
</div><br><br>

<footer class="container-fluid text-center">
  <p>@ Alish 2020</p>  
 
</footer>

</body>
</html>