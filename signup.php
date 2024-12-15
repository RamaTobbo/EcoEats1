<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <script src="formValidation.js"></script>
    <title>Document</title>
</head>
<body>
  <div id='backtohome'>  <a href='Home.php'>Back Home</a>/<span>Account</span></div>
    <div id="sign">

        <div><h2>Create an account</h2></div>
        <form name='signupform' onsubmit='return signupFormvalidation()' method='POST' action='signup.php' >
      <div>  <span>User Name</span></div>
      <div>   <input type='text' placeholder='First Name' name='name'> <span id='name'></span></div>
     
      <div>  <span>Email<span></div>
      <div>  <input type='email' placeholder='Email' name='email'>  <span id='email'></span></div>
    
      <div>  <span>Password<span></div>
      <div>  <input type='password' placeholder='Password' name='password'>  <span id='pass'></span></div>
    
      <div>  <span>Confirm Password<span></div>
      <div>  <input type='password' placeholder='Confirm Password' name='confirmpass'> <span id='confirmpass'></span></div>
     
      <div>  <input type='submit' id='create' value='Create'><span id='user' style='color:red'></span></div>  </form>
      <div id='forgotpassSignup'>
        <div><p>Already have an account?<a href='login.php'>Login!</a></p></div>
     
    </div>
    </div>
    <?php

require_once 'connection.php';

if (
    isset($_POST["name"]) && !empty($_POST["name"])
    && isset($_POST["email"]) && !empty($_POST["email"])
    && isset($_POST["password"]) && !empty($_POST["password"])
    && isset($_POST["confirmpass"]) && !empty($_POST["confirmpass"])
) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];

    
  
    $sql = "SELECT * FROM user WHERE Name = '$name' ";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      echo "<script>document.getElementById('user').innerHTML = 'User already exists!';</script>";

        
        
    }
    else{
      $hashedPassword = password_hash($pass, PASSWORD_DEFAULT);
      $qry = "INSERT INTO `user` (`UserID`, `Name`, `email`, `password`, `RoleID`) 
        VALUES (null, '$name', '$email', '$hashedPassword', 2)";

        
        $conn->query($qry);
        header('Location:login.php');
    }

}
?>

</body>
</html>