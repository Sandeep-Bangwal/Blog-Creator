<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/loginpage.css">
    <title>Blog-Creator</title>
</head>
<body>
    <?php
include 'dbconn.php';
session_start();
 
 ?>
  <?php
  $method = $_SERVER['REQUEST_METHOD'];
        if($method== 'POST'){
            $title_name = $_POST['title_name'];
            $Url =$_POST['Url'];
            //insert intodb `user_id` 
        
        $sql = "INSERT INTO `blogtitle`(`title_name`, `Url`, `user_id`) VALUES ('$title_name','$Url','$_SESSION[sno]')";
        $result = mysqli_query($conn, $sql);
       
       if($result){
        $sql1=" SELECT * FROM `blogtitle` WHERE user_id = $_SESSION[sno] LIMIT 1";
        $result1 = mysqli_query($conn, $sql1); 
        while ($row = mysqli_fetch_assoc($result1)){
            $title_id =$row['title_id'];  
        }  
         
        echo    "
            <script>
              alert('Successfully Added');
              document.location.href = 'home.php?title_id=$title_id';
            </script>
            ";
        
      }
      else{
           //echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          echo '
     <strong>Error!</strong> We are facing some technical issue and your entry ws not submitted successfully! We regret the inconvinience caused!';   
             
        }
        }
    ?>
  

<div  class="center">
<h1>Choose name for your Blog</h1>
    <form action="" method="post">
    <div class="input_txt">
    <label for="text" >Title</label>
    <br>
        <input type="text" name="title_name" required>
    </div>
    <div class="input_txt">
    <label for="text" >URL</label>
    <br>
        <input type="text" name ="Url" required>
    </div>
        <input type="submit" value="Submit">
        <div class="signup_link">
        </div>
    </form>
<div>

</body>
</html>