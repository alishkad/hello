<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <link rel="stylesheet" href="stylesheet.css" type="text/css" />
  <title>Signup</title>
</head>
<?php
$conn = new mysqli("localhost", "root", "", "mydb");
if ($conn->connect_error) {
  die("connection failed:" . $conn->connect_error);
}
if (isset($_POST['submit_signup'])) {
  $email = trim($_POST["email"]);
  $username = trim($_POST["uname"]);
  $password = trim($_POST["pswd"]);
  //Create a "unique" token.
  $token = bin2hex(openssl_random_pseudo_bytes(16));
  try {
    $sql = "INSERT INTO users (email, username, password, token) VALUES ('$email','$username','$password', '$token')";
    $conn->query($sql);
    $to_email = $email;
    $subject = 'Verification related to your recent sign up';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    // $headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
    $headers[] = 'From: <alish@kadiwala.ursse.org>';

    $message = '<html><body>';
    $message .= '<h1>Please verify your email address</h1>';
    $message .= '<p>';
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]".dirname($_SERVER['PHP_SELF']);
    $message .= $actual_link . '/verifyEmail.php?email=' . $email . '&token=' . $token;
    $message .= '</p>';
    $message .= '</body></html>';

    //check if the email address is invalid $secure_check
    $secure_check = $to_email;
    if ($secure_check == false) {
      echo "Invalid input";
    }
    $res = mail($to_email, $subject, $message, implode("\r\n", $headers));
    //var_dump($res);
    
    header("Location:/ense353/ENSE353login.php?message=A link is sent to your registered email ID. Please click on that link to register. If you cant find the mail yet, Check your SPAM mails.");
    //echo "A link is sent to your registered email ID. Please click on that link to register. If you cant find the mail yet, Check your SPAM mails.";
	//exit();  //to redirect and stop current execution
  } catch (Exception $e) {
    header("Location: signup_for_room.php?message=fail");
    $e->getMessage();
  }
}
?>

<body>

  <form id="SignUp" method="post" action="ENSE353_Signup.php" enctype="multipart/form-data">
    <div class="container">
      <div class="imgcontainer">
        <img src="img_avatar2.png" alt="Avatar" class="avatar">
      </div>
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <table>
        <tr>
          <td></td>
          <td><label id="email_msg" class="err_msg"></label></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td> <input type="text" name="email" size="30" /></td>
        </tr>
        <tr>
          <td></td>
          <td><label id="uname_msg" class="err_msg"></label></td>
        </tr>
        <tr>
          <td>Username: </td>
          <td> <input type="text" name="uname" size="30" /></td>
        </tr>

        <tr>
          <td></td>
          <td><label id="pswd_msg" class="err_msg"></label></td>
        </tr>
        <tr>
          <td>Password: </td>
          <td> <input type="password" name="pswd" size="30" /></td>
        </tr>


      </table>
    </div>
    <br>
    <input type="submit" value="SignUp" id="Submit_button" name="submit_signup" />
    <input type="reset" value="Reset" class="cancelbtn" />
    <span text-align: center>Already have an account? <a href="ENSE353login.php">login</a></span>

  </form>

</body>
<script type="text/javascript">
  document.getElementById("SignUp").addEventListener('submit', SignUpForm);

  function SignUpForm(event) {
    var a = event.currentTarget;
    var x = a[0].value;
    var y = a[1].value;
    var z = a[2].value;
    var rt = true;

    //-- validate email --
    document.getElementById("email_msg").innerHTML = "";
    document.getElementById("uname_msg").innerHTML = "";
    document.getElementById("pswd_msg").innerHTML = "";

    if (x == null || x == "") {
      document.getElementById("email_msg").innerHTML =
        "Email address empty";
      rt = false;
    }
    if (y == null || y == "") {
      document.getElementById("uname_msg").innerHTML =
        "Username empty";
      rt = false;
    }

    if (z == null || z == "") {
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