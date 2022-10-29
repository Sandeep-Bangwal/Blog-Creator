<?php 
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'dbconn.php';
    $email = $_POST['email_id'];
    $password = $_POST['password'];
    $cpss = $_POST['cpassword'];
    //if user already exists
    $existsql= "SELECT * FROM `users` WHERE email_id = '$email'";
    $result = mysqli_query($conn, $existsql);
    $numRows = mysqli_num_rows($result);
    if($numRows>0){
      echo'  <script>
        alert("username already in use ")
        document.location.href = "singup.php";
      </script>';
    }
    // if all correct
    if(($pss == $cpss) && $numRows==false){
        $sql = "INSERT INTO `users` ( `email_id`, `password`, `user_time`) VALUES ('$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result){
            $showAlert = true;
            header("location: login.php?singupsuccess=true");
            exit();
        }
        
    }
    // if password not match
    else{
        echo'  <script>
        alert("Passwords do not match ")
        document.location.href = "singup.php";
      </script>';
    }
}

?>
