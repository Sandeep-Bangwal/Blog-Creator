<?php
require  'dbconn.php';
$id= $_GET['title_id'];
if(isset($_POST["submit"])){
   $post_title = $_POST['post_title'];
   $post_desc =$_POST['post_desc'];
    if($_FILES["image"]["error"] == 4){
      echo
      "<script> alert('Image Does Not Exist please add image'); </script>"
      ;
    }
    else{
      $fileName = $_FILES["image"]["name"];
      $fileSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];
  
      $validImageExtension = ['jpg', 'jpeg', GIF, 'png'];
      $imageExtension = explode('.', $fileName);
      $imageExtension = strtolower(end($imageExtension));
      if ( !in_array($imageExtension, $validImageExtension) ){
        echo
        "
        <script>
          alert('Invalid Image Extension chek agin');
        </script>
        ";
      }
      else if($fileSize > 1000000){
        echo
        "
        <script>
          alert('Image Size Is Too Large agin chek size ');
        </script>
        ";
      }
      else{
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;
  
        move_uploaded_file($tmpName, 'images/' . $newImageName);
        
        $sno = $_POST['sno'];
        $query = "INSERT INTO  `blogpost`(`image`, `post_title`, `post_desc`, `title_id_post`, `post_user_id`)VALUES('$newImageName','$post_title', '$post_desc', '$id', '$sno')";
        mysqli_query($conn, $query);
        echo
        "
        <script>
          alert('Successfully Added blog');
          document.location.href = 'home.php?title_id=$id';
        </script>
        ";
      }
    }
  }
  ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/postblog.css">
    <title>POST-BLOG</title>
</head>
<body>
<?php 
//include 'dbconn.php';
include 'navbaar.php';
?>    
<div class="center">
<div  class="box">         
<form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
            <div>
            
                <label>Blog Title</label>
                <br>
                <input type="text" id="in" name="post_title" placeholder="write a short title">
                <br>
            </div>
            <input type="hidden" name="sno" id="in" value="<?php echo $_SESSION['sno'];?>">
            <div>
              <br>
            <label>Blog Description</label>
            <br>
            <textarea id="desc" name="post_desc"  rows="3"></textarea>
        </div>
        <div>
        <label for="image">Image  </label>
      <input type="file" name="image" accept=".jpg, .jpeg, .png" value=""> <br> <br>
      <button type = "submit" name = "submit">Publish</button>
        </form>
</div>
</div>
</body>
</html>
