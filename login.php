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
    <div id="login">

        <div><h2>Login</h2></div>
        <form name='myform' onsubmit='return loginFormvalidation()' method='POST'>
      <div>  <span>Email<span></div>
    
      <div>   <input type='email' placeholder='Email' name='email'> <span id='email'></span></div>
     
      <div>  <span>Password<span></div>
      <div>  <input type='password' placeholder='Password' name='pass'> <span id='pass'></span></div>
     
      <div>  <input type='submit' value='Login' ></div>  </form>
      <div id='forgotpassSignup'>
        <div><p>Forgot your password?</p></div>
        <div><a href='signup.php'>New Customer?Sign Up!</a></div>
    </div>
    </div>
    <?php
require_once 'connection.php';

if (
    isset($_POST['email']) && !empty($_POST['email'])
    && isset($_POST['pass']) && !empty($_POST['pass'])
) {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

  
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

      
        if (password_verify($pass, $row['password']) || $row['password']==$pass) {
            session_start();
            $_SESSION['isloggedin'] = 1;
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $row['UserID'];
            $_SESSION['role_id'] = $row['RoleID'];
            

                header('Location: Home.php');
      
           
        
        } else {
           
            header('Location: login.php');
        }
    } else {
     
        header('Location: signup.php');
    }
}
?>

  
</body>
</html>