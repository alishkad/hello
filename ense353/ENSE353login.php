<html>
<head>
<title> login</title>
<link rel="stylesheet" href="stylesheet.css" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){  
    $("#message").fadeOut(20000);
});
</script>

<?php

$db='myDatabase'; 
$conn= new mysqli("localhost","root","","mydb");
	if($conn->connect_error){
    		die("connection failed:" .$conn->connect_error);
	}
if (isset($_POST['submit_login'])) {
	$nameErr="";
	if (empty($_POST["username"])) {
 	   $nameErr = "Name is required";
  	} else {
  	  $username = trim($_POST["username"]);
  	}
  
 	 if (empty($_POST["pswd"])) {
    	$pswdErr = "Email is required";
  	} else {
   	 $password = trim($_POST["pswd"]);
 	 }
	try {
            $sql = "SELECT * FROM users WHERE (username='$username' AND password ='$password' AND verified ='1')";
            $result=$conn->query($sql);
            $row = $result->fetch_assoc();
            if($username == $row["username"] && $password == $row["password"])
            {
                session_start();
                $_SESSION["username"] = $row["username"];
                $_SESSION["uid"] = $row["uid"];
                header("Location:index.php?message=Login_successfull");
                exit();	//to redirect and stop current execution
            }
            else{
                header("Location: ENSE353login.php?message=NO_user_found_OR_Email_Not_Verified");
                exit();
            }
        }
    catch (Exception $e) {
            header("Location: ENSE353login.php?message=fail");
            $e->getMessage();
	}
}
?>

</head>
<body>

<h2>Login Form</h2>
<span id="message"> <?= isset($_GET['message']) ? $_GET['message'] : ''; ?> </span>
	<form id="LoginForm" method="post" action="ENSE353login.php">
	  <div class="imgcontainer">
	    <img src="img_avatar2.png" alt="Avatar" class="avatar">
	  </div>
	
	  <div class="container">
	   <table>         
		<tr>       
		<td><b>Username:</b><label id="uname_msg" class="err_msg"></label></td></tr> 
		<tr><td> <input type="text" name="username" size="50" placeholder="username"/></td></tr>
		 
		 <tr>
		 <td><b>Password:</b><label id="pswd_msg" class="err_msg"></label></td></tr> 
		 <tr>
		 <td> <input type="password" name="pswd" size="50" placeholder="password"/></td>
		 </tr>
	 	</table>
	 	<input type="submit" id="Submit_button" value="Login" name="submit_login" /> 
	  </div>
	 
	  	<input type="reset" class="cancelbtn" value ="Cancel" />	  
	    <span style="float:right;">Dont have account? <a href="ENSE353_Signup.php">Register</a></span>
	</form>

</body>
<script type="text/javascript">
document.getElementById("LoginForm").addEventListener('submit', LoginForm);

function LoginForm(event) {
  var x = event.currentTarget;
  var user = x[0].value;
  var pass = x[1].value;
  var rt = true;

  document.getElementById("uname_msg").innerHTML = "";
  document.getElementById("pswd_msg").innerHTML = "";

  if (user == null || user == "") {
    document.getElementById("uname_msg").innerHTML =
      "Username empty";
    rt = false;
  }

  if (pass == null || pass == "" ) {
    document.getElementById("pswd_msg").innerHTML =
      "Please enter the password.";
    rt = false;
  }

  if (rt == false) {
    event.preventDefault();
  } 
}

</script>
</html>