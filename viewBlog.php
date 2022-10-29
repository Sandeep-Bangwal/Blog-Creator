<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/6e2a8b2838.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/view.css"> 
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Blog Creator</title>
</head>
<body>
    <?php
        include 'dbconn.php';
        include 'navbaar.php';
       // if user see the comment
        if(isset($_GET['post_id'])){
            $main_id = $_GET['post_id'];
            $Upadte_id =  mysqli_query($conn, "UPDATE `comment` SET status= 1 WHERE post_id =  $main_id");
        }

    ?>
<!-- display blog -->
    <div class="main" style="  display: flex; justify-content: start; ">
<?php 
            $id= $_GET['title_id'];
            $id1= $_GET['post_id'];
            $url= "http://localhost/Blog/index.php?title_id=$id";
            $sql = "SELECT * FROM `blogpost` WHERE `post_user_id`= $_SESSION[sno] AND `post_id` = $id1 ";
            $noReslt= true;
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)){
                $post_id =$row['post_id'];
                $post_title = $row['post_title'];
                $post_desc =$row['post_desc'];
                $time =$row['Time'];
                $sql2 ="SELECT * FROM `blogtitle` WHERE title_id = '$id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2= mysqli_fetch_assoc($result2);
                 echo'  <div class="image-session">
                   <img src="images/'.$row["image"].'" alt="">
                   <br>
                   <span>'. $time .'</span>
                 </div> 
                 <div class="content">
                 <h1>'.$row['post_title'].'</h1>
                 <p> ' . str_replace("\n", '<br >',$post_desc) . ' </p>
              </div>';
            }
         
                 ?>
               
    </div>
<!-- Post Comment -->
<?php
$insert = $_SERVER['REQUEST_METHOD'];
if($insert== 'POST'){
    //insert intodb
$comment_desc = $_POST['comment_desc'];

$sql = "INSERT INTO `comment`( `comment_desc`, `post_id`) VALUES ( '$comment_desc', '$id1')";
$result = mysqli_query($conn, $sql);

if($result){
echo "
<script>
alert('Success!Your Comment has been added!')
</script>";
}
else{
   echo "
   <script>
alert('The Comment was not inserted successfully because of this error ---> '. mysqli_error($conn))
</script>";    
}

}


?>
    <div class="comment">
        <form action="" method="post">
        <div>
         <label for="text">Post Comment</label><br>
        <textarea name="comment_desc" id="" ></textarea>
        </div>
        <button type = "submit" name = "submit">Publish</button>
        </form>
    </div>
<!-- view comment -->
<?php

$sql = "SELECT * FROM `comment` WHERE  `post_id` = $id1 ";
$noReslt= true;
$result = mysqli_query($conn, $sql);
echo'<h3>Comments</h3>';
while ($row = mysqli_fetch_assoc($result)){
    $comment_desc =$row['comment_desc'];
     echo' <div class="view_comment">
     
       <img src="images/icons/user.png" alt="">   
       <p>' . str_replace("\n", '<br >',$comment_desc) . '</p>
 </div>';
}

?>

</body>
</html>
