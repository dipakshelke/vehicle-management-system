<?php
   $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = '';
   $conn = new mysqli('localhost','root','','tecvehicle');
   
   
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   else
   {
  // echo 'Connected successfully';
   }
   ?>