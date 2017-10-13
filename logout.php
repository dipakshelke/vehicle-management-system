<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: /mini_project/index.php");
   }
?>