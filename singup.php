<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/loginpage.css">
    <title>Blog</title>
</head>
<body>
<div class="center">
      <h1>SingUp</h1>
      <form action="logicSingup.php" method="post">
        <div class="input_txt">
        <label>Email</label>
        <br>
          <input type="email" name="email_id"required>  
        </div>
        <div class="input_txt">
        <label>Password</label>
        <br>
          <input type="password" name="password"required>
        </div>
        <div class="input_txt">
        <label>Confirm Password</label>
        <br>
          <input type="password" name="cpassword"required>
        </div>
        <input type="submit" value="SingUp">
        <div class="signup_link">
          Already Account? <a href="login.php">Login</a>
        </div>
      </form>
    </div> 
</body>
</html>
