<!DOCTYPE html>
<html >
<head>
    <!-- font awesome links -->
    <script src="https://kit.fontawesome.com/6e2a8b2838.js" crossorigin="anonymous"></script> 
    <!-- css links -->
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Blog</title>
</head>
<body>
<?php 
include 'dbconn.php';
include 'navbaar.php';
?>

<!-- display blog with img and content -->
<div class="blog-content">
        <ul class="blog-groups">
            <?php
            $id= $_GET['title_id'];
            $url= "http://localhost/Blog/home.php?title_id=$id";
            $sql = "SELECT * FROM `blogpost` WHERE `post_user_id`= $_SESSION[sno] AND `title_id_post` = $id ";
            $noReslt= true;
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result)==0){
                echo'
                <div style="text-align: center; margin-top: 200px;">
                <h1>No Post <br> Post that you create will show Up</h1>
                </div> ';   
              }
              else{
            while ($row = mysqli_fetch_assoc($result)){
                $post_id =$row['post_id'];
                $post_title = $row['post_title'];
                $post_desc =$row['post_desc'];
                $sql2 ="SELECT * FROM `blogtitle` WHERE title_id = '$id'";
                $result2 = mysqli_query($conn, $sql2);
                $row2= mysqli_fetch_assoc($result2);
            echo'
            <li>
                <div class="card">
                    <div class="img-part">
                    <span class="image" style="background-image: url(images/'.$row["image"].');"></span>
                 </div>
                    <div class="main-content">
                        <div class="head" style =" display: flex, margin-bottom: 10px; justify-content: space-between;" >
                            <a href="#" class="catogry">Catogry: '. $row2['title_name'].'</a>
                            <span "style="color: black;"><a href="delt_post.php?post_id='.$post_id.'&title_id='.$id.'"><i class="fa fa-trash" aria-hidden="true"></i></a></span>
                        </span>
                        </div>
                        <div class="body">
                            <h2 class="title">'.$row['post_title'].'</h2>
                            <p class="desc">'.substr($post_desc,0, 130).'></p>
                        </div>
                        <div class="footer">
                            <div class="social-media">
                                <span>
                                <a href="https://facebook.com/share.php?u='. $url.'"><img src="images/icons/facebook.png"/></a>
                                <a href="https://twitter.com/share?text='.$post_title.'&url='.$url.'"><img src="images/icons/twitter.png"/></a>
                                <a href="https://api.whatsapp.com/send?text='. $url.'"><img src="images/icons/whatsapp.png"/></a>  
                                 </span>
                            </div>
                            <a href="viewBlog.php?post_id='.$post_id.'&title_id='.$id.'" class="button">Read more →</a>
                        </div>
                    </div>
                </div>
            </li>';
            }
        }
            ?>
        </ul>
    </div>

</div>
</body>
</html>