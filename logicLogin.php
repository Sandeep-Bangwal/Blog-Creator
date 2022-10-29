<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconn.php';
    $email = $_POST["email_id"];
    $password = $_POST["password"]; 
      $sql = "Select * from `users` where email_id='$email' AND password='$password'";
      $result = mysqli_query($conn, $sql);
       $num = mysqli_num_rows($result);
       $row= mysqli_fetch_assoc($result);
       if ($num == 1){
          $login = true;
           session_start();
           $_SESSION['loggedin'] = true;
           $_SESSION['sno'] = $row['sno'];
//   if user alredy create blog    
          $sql=" SELECT * FROM `blogtitle` WHERE user_id = $_SESSION[sno] LIMIT 1";
          $result = mysqli_query($conn, $sql); 
          if(mysqli_num_rows($result)==1){
            while ($row = mysqli_fetch_assoc($result)){
               $noReslt=false;
               $title_id =$row['title_id'];    
            }
            header("location: home.php?title_id=$title_id");
            exit();
         }

// if user 1st time login
         else{

            header("location: blogTitle.php?check=$_SESSION[sno]");
            exit();  
         }       
      } 
       else{
       echo'  <script>
         alert("Invalid Credentials / password incorrect ")
         document.location.href = "login.php";
       </script>';
      }  
}
?>

   