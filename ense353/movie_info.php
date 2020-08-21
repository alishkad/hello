<?php
session_start();
$conn= new mysqli("localhost","root","","mydb");
	if($conn->connect_error){
    		die("connection failed:" .$conn->connect_error);
  }  
?>
<html>
<head>
  <title>Movie_info</title>  
  <link rel="stylesheet" href="stylesheet.css" type="text/css" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Movie_info</a></li>
        <li class=""><a href="./index.php">HOME</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class=""><a href="./mySubscription.php">My_Subscriptions</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
$key = "b0a833c1c4f2dab494dc9b6782b9b246";
$id= $_GET['movie_id'];
//echo $id;
$json = file_get_contents("https://api.themoviedb.org/3/movie/".$id."?api_key=$key");
$json1 = file_get_contents("https://api.themoviedb.org/3/movie/".$id."/credits?api_key=$key");
$json2 = file_get_contents("https://api.themoviedb.org/3/movie/".$id."/videos?api_key=$key");
$result = json_decode($json, true);
$result1 = json_decode($json1, true);
$result_vid = json_decode($json2, true);
$poster_path = $result["poster_path"];
$cast=$result1['cast'];
$cast=array_slice($cast,0,count($cast));
$video=$result_vid['results'][0]['key'];
//echo "<img src=\"https://image.tmdb.org/t/p/w500$poster_path\">";
?>
<div class="container">
    <img src="https://image.tmdb.org/t/p/w500/<?= $poster_path ?>" width="360" height="500" style="float:left;" />;
    <h1 style="float:right; padding-right:400px"><?php print_r($result['original_title'])?></h1>
    <h3 style="padding-top:45px; padding-left:410px; opacity:0.7; font-size: 1.1em; font-weight: 400;font-style: italic;"> <?php print_r($result['tagline']); ?></h3>
    <h3 style="padding-left:410px;">overview</h3>
    <p style="padding-left:410px;"> <?php print_r($result['overview']); ?> </p>
</div>
<div class="container">
    <h3>Cast</h3>
    <div style=" height: 200px; overflow:auto;">
        <p><?php foreach($cast as $c=> $i){print_r($i['name']."<br>");}?></p>
    </div>
    <h3>Video</h3>
    <?php 
    $link="https://www.youtube.com/embed/$video"; ?>
    <iframe width="1136" height="638" src=<?=$link?> frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <form method=post><input type="submit" name="unsub" class="cancelbtn" value ="Unsubscribe" /></form> 
    <?php
    if(isset($_POST['unsub'])){
            $sql="DELETE FROM movie WHERE Api_id ='$id' AND uid='$_SESSION[uid]'";
            $res = $conn->query($sql) or die($conn->error); 
            header("Location: mySubscription.php");
            exit();
        }
    ?>
        <!-- echo $vid; -->
    
        <!-- <?php
        // <!-- <p id="original_title"></p>
        // <p id="overview"></p> 
        // <p id="par"></p>   
        // <image id ="img"></image>
        // <script>
        //     fetch('https://api.themoviedb.org/3/movie/475557?api_key=b0a833c1c4f2dab494dc9b6782b9b246')
        //         .then(response => response.json())
        //         .then((data) =>{
        //             console.log(data.adult);
        //             document.getElementById('original_title').innerHTML = data.original_title;
        //             document.getElementById('overview').innerHTML = data.overview;
        //             document.getElementById('img').setAttribute("src",'https://image.tmdb.org/t/p/w500/'+data.poster_path);
        //         });
                

                

        //  </script>    -->
    ?> -->
</div>    
</body>
</html>