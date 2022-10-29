<?php
include 'dbconn.php';
$id = $_GET['post_id'];
$id2 = $_GET['title_id'];

            $delete = mysqli_query($conn,"DELETE FROM `blogpost` WHERE post_id = {$id}");
        
header("Location: http://localhost/Blog/home.php?title_id=$id2");
// http://localhost/forms/index.php");

mysqli_close($conn);
?>