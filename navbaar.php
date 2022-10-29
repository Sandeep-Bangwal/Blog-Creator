<?php
session_start();
$id= $_GET['title_id'];
include 'dbconn.php';
echo'
<header>
<div class="head">
 <a href="home.php?title_id=' .$id. '" style="color: white;"><i class="fa-brands fa-blogger-b"></i> Blog Creator</a>
 </div>
    <nav>
    <ul class="menu">';
    $sql_get = mysqli_query($conn, "SELECT blogpost.post_user_id ,comment.status FROM blogpost, comment WHERE blogpost.post_user_id = $_SESSION[sno] and comment.status =0 AND blogpost.post_id=comment.post_id");
    $count = mysqli_num_rows($sql_get);
    echo'
    <li class="dropdown">
    <a href="" class="dropbtn"><i class="fa-solid fa-bell"></i><i id="count" >'.$count.'</i></a>
<div class="dropdown-content">';

$sql1 ="SELECT blogpost.post_user_id , comment.post_id FROM blogpost, comment WHERE blogpost.post_user_id =  $_SESSION[sno]  and 
blogpost.post_id=comment.post_id and comment.post_id;
";
$result1 = mysqli_query($conn, $sql1);
//if(mysqli_num_rows($sql_get)){  
while ($row = mysqli_fetch_assoc($result1,)){
 $post_id = $row['post_id']; 
echo'
<a href="viewBlog.php?post_id='.$post_id.'&title_id='.$id.'">Comment Your Blog</a> ';
}
echo'</div>
</li>';


       echo ' <li ><a href="postblog.php?title_id=' .$id. '">Post Blog</a></li>';
 
       echo'<li class="dropdown">
      <a href="" class="dropbtn">My Blog <i class="fa fa-caret-down"></i></a>
    <div class="dropdown-content">';
    $sql = "SELECT `title_id`, `title_name`, `Url` FROM `blogtitle` WHERE `user_id`= $_SESSION[sno]";
$noReslt= true;
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
    echo '<a  href="home.php?title_id=' .$row['title_id']. ' ">' .$row['title_name']. '</a>';
} 
    echo'
    <a href="blogTitle.php">New Blog</a>
    </div>
</li>   
    </ul>
    </nav>
    <a  href="logout.php" class="btn"><button>Logout</button></a>
</header>';

?>