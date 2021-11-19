<?php
    session_start();
    if (isset($_SESSION["lgUserID"])) {
        unset($_SESSION["lgUserName"]);
        unset($_SESSION["lgUserID"]);
     
        header('location: index.php');
      
    }
   
    ?>