<?php

session_start();
$_SESSION = array();
session_destroy();
// header("location: index.php?Sucessfully=logout");
echo'  <script>
        alert("Sucessfully logout ")
        document.location.href = "index.php?Sucessfully=logout";
      </script>';
?>
