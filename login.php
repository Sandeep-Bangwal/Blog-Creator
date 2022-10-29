<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/loginpage.css">

    <title>Blog-login</title>
</head>
<body>
<div class="center">
      <h1>Login</h1>
      <form action = "logicLogin.php" method="post">
        <div class="input_txt">
        <label>Email</label>
        <br>
          <input type="text" name="email_id" required>  
        </div>
        <div class="input_txt">
        <label>Password</label>
        <br>
          <input type="password" name="password" required>
        </div>
        <br>
        <div class="pass">Forgot Password?</div>
        <input type="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="singup.php">Signup</a>
        </div>
      </form>
    </div> 
</body>
</html>