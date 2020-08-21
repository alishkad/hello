<?php
session_start();
$conn= new mysqli("localhost","root","","mydb");
	if($conn->connect_error){
    		die("connection failed:" .$conn->connect_error);
  }
  
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
<title>Subscription</title>
   
<style>
.post {
    overflow: hidden;
    padding: 50px 50px 30px 50px;
    margin-bottom: 40px;
    border: 1px solid #E7EBED;
    border-radius: 8px;
    background: #FFF;
}
.comments,.more{
    display: block;
    float: right;
    width: 88px;
    padding: 5px 5px;
    margin-right: 10px;
    background-color: #4CAF50;
    color: white;
    border-radius: 8px;
    text-align: center;
    text-decoration: none;
}
body {
    font-family: 'Open Sans', sans-serif;
    font-size: 10pt;
    background-color: #707070;
}
#header-wrapper {
    background: #181818;
}
#page {
    overflow: hidden;
    padding: 5em 0em 0em 0em;
}
.container {
    width: 1200px;
    margin: 0px auto;
}
#logo {
    position: relative;
    float: left;
    width: 480px;
}
#logo h1 a {
    display: block;
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    font-weight: 400;
    text-decoration: none;
    text-transform: uppercase;
    line-height: 60px;
    color: #FFF;
}
#menu a:hover {
    text-decoration: underline;
}
#menu a {
    display: block;
    line-height: 60px;
    text-decoration: none;
    text-transform: uppercase;
    color: #FFF;
}
#menu {
    float: right;
}
#menu li {
    float: left;
    padding: 0px 2em;
}
#menu ul {
    list-style: none;
    line-height: normal;
}
#header {
    overflow: hidden;
    height: 60px;
}
</style>
</head> 
<body class="is-demo">
<div id="header-wrapper">
	<div id="header" class="container">
		<div id="logo">
        <h1><a href="#">My Subscriptions</a></h1>
		</div>
		<div id="menu">
			<ul>
				<li><a href="./index.php" accesskey="1" title="">Homepage</a></li>
				<li><a href="#" accesskey="2" title=""> <?=$_SESSION['username']?></a></li>
			</ul>
		</div>
	</div>
</div>
 
<div id="page" class="container">
	<div id="content">
        <?php
        if(isset($_SESSION['username'])){
        $sql= "SELECT * FROM movie WHERE Api_id='299534' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">End Game</a></h2>
			<div class="entry">
                <img src="Avengers_Endgame.jpg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;"> <p class="links"><a href="./movie_info.php?movie_id=299534" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Uendgame" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Uendgame'])){
            $sql="DELETE FROM movie WHERE Api_id ='299534' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>


		<?php
        if(isset($_SESSION['username'])){
            $sql= "SELECT * FROM movie WHERE Api_id='338970' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">Tomb Raider</a></h2>
			<div class="entry">
                <img src="TombRaider.jpeg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;"> <p class="links"><a href="./movie_info.php?movie_id=338970" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Utombraider" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Utombraider'])){
            $sql="DELETE FROM movie WHERE Api_id ='338970' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>
		<?php
        if(isset($_SESSION['username'])){
        $sql= "SELECT * FROM movie WHERE Api_id='335984' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">Blade Runner</a></h2>
			<div class="entry">
                <img src="BladeRunner.jpeg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;">
                <p class="links"><a href="./movie_info.php?movie_id=335984" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Ubladerunner" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Ubladerunner'])){
            $sql="DELETE FROM movie WHERE Api_id ='335984' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>
        <?php
        if(isset($_SESSION['username'])){
        $sql= "SELECT * FROM movie WHERE Api_id='320288' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">Dark Pheonix</a></h2>
			<div class="entry">
                <img src="DarkPhoenix.jpeg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;"> <p class="links"><a href="./movie_info.php?movie_id=320288" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Udarkpheonix" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Udarkpheonix'])){
            $sql="DELETE FROM movie WHERE Api_id ='320288' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>
        <?php
        if(isset($_SESSION['username'])){
        $sql= "SELECT * FROM movie WHERE Api_id='1726' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">Iron man</a></h2>
			<div class="entry">
                <img src="IronMan.jpg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;"> <p class="links"><a href="./movie_info.php?movie_id=1726" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Uironman" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Uironman'])){
            $sql="DELETE FROM movie WHERE Api_id ='1726' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>
        <?php
        if(isset($_SESSION['username'])){
        $sql= "SELECT * FROM movie WHERE Api_id='475557' AND uid='$_SESSION[uid]'";
        $result=$conn->query($sql) or die($conn->error);
        $row = $result->fetch_assoc();
        if($result->num_rows =='1'){
        ?>
        <div class="post">
			<h2 class="title"><a href="#">Joker</a></h2>
			<div class="entry">
                <img src="Joker.jpeg" class="img-thumbnail" alt="img" width="360" height="500" style="float:left;"> <p class="links"><a href="./movie_info.php?movie_id=475557" class="more">More info</a></p>
                <form action="mySubscription.php" method="GET"><input type="submit" name="Ujoker" class="cancelbtn" value="unsubscribe"></form> 
			</div>
        </div>
        <?php } }?>

        <?php
        if(isset($_GET['Ujoker'])){
            $sql="DELETE FROM movie WHERE Api_id ='475557' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: ./mySubscription.php");
            exit();
        }
        ?>
        
        <div style="clear: both;">&nbsp;</div>
	</div>
</div>

<footer class="container-fluid text-center">
  <p>@ Alish 2020</p> 
</body>

</html>
