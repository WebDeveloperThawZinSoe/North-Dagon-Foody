<?php
   $connection = mysqli_connect("localhost","root","","foody");
   if(!$connection){
       echo "<h1 style='color:red'> Database Connection is Fail </h1>";
   }
?>