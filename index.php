<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Home</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
  <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

  <link rel="stylesheet" href="css/style.css">

<style type="text/css">

/** OVERRIDE HYPERLINK FORMATTING **/

.card .button-container input[type=submit] {
  outline: 0;
  cursor: pointer;
  position: relative;
  display: inline-block;
  background: 0;
  width: 240px;
  border: 2px solid #e3e3e3;
  padding: 20px 0;
  font-size: 24px;
  font-weight: 600;
  line-height: 1;
  text-transform: uppercase;
  overflow: hidden;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container input[type=submit] {
  position: relative;
  z-index: 1;
  color: #ddd;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container input[type=submit]:before {
  content: '';
  position: absolute;
  top: 50%;
  left: 50%;
  display: block;
  background: #ed2553;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  margin: -15px 0 0 -15px;
  opacity: 0;
  -webkit-transition: .3s ease;
  transition: .3s ease;
}
.card .button-container input[type=submit]:hover, .card .button-container input[type=submit]:active, .card .button-container input[type=submit]:focus {
  border-color: #ed2553;
}
.card .button-container input[type=submit]:hover, .card .button-container input[type=submit]:active, .card .button-container input[type=submit]:focus {
  color: #ed2553;
}
.card .button-container input[type=submit]:active, .card .button-container input[type=submit]:focus {
  color: #ffffff;
}
.card .button-container input[type=submit]:active:before, .card .button-container input[type=submit]:focus:before {
  opacity: 1;
  -webkit-transform: scale(10);
  transform: scale(10);
}

</style>
</head>

<body>
<div class="pen-title">
  <h1>Welcome to Nick's Garage!</h1>
</div>


<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
  //3.1.1 Assigning posted values to variables.
  $username = $_POST['username'];
  $password = $_POST['password'];

  //3.1.2 Checking the values are existing in the database or not
  $query = "SELECT * FROM `user_management` WHERE username='$username' and password='$password'";
   
  $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
  $count = mysqli_num_rows($result);

  //3.1.2 If the posted values are equal to the database values, then session will be created for the user.
  if ($count == 1){
    $_SESSION['username'] = $username;
  } else {
    //3.1.3 If the login credentials doesn't match, he will be shown with an error message.
    $fmsg = "Invalid Login Credentials.";
  }
}


//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
?>

<form method="POST">
    <script>
    $(document).ready(function() {

    setInterval ( function()
    {
        $.ajax ( {
            url: 'get_shadow.php',
            type: 'POST',
            data: "data",
            success: function(data){
                    var response = data.split(",,,,,")
                    $('#garage-status').html("GARAGE " + response[0]);
                    $('#garage-description').html(response[1]);
                 }
            }
            );
    },1000);


    });
    </script>
  <div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title" id="garage-status"></h1>
    <form>
        <div class="button-container">
          <button>Open</button>
        </div>

      <div class="input-container">
        <div id="garage-description"><span>Getting status...</span></div>
      </div>

      <div class="button-container">
        <input type="submit" id="logout" name="logout" alt="logout" value="Logout" />
      </div>
    </form>
  </div>

<?php
    if (isset($_POST['logout'])) {
      header('Location: logout.php');
    }
?>
</form>

<?php
} else {
?>


<!-- <div class="rerun"><a href="">Rerun Pen</a></div> -->
<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form method="POST">
      <div class="input-container">
        <input type="text" id="Username" required="required" name="username"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required" name="password"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button type="submit"><span>Go</span></button>
      </div>
      <!-- <div class="footer"><a href="#">Forgot your password?</a></div> -->
    </form>
  </div>

<!--
  TODO: Add Registration Feature
  
  <div class="card alt">
    <div class="toggle"></div>
    <h1 class="title">Register
      <div class="close"></div>
    </h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Repeat Password" required="required"/>
        <label for="Repeat Password">Repeat Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Next</span></button>
      </div>
    </form>
  </div>

-->

</div>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

<?php 
//3.2 When the user visits the page first time, simple login form will be displayed.
}
?>

</body>
</html>
