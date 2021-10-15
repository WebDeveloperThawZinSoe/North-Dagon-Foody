<?php

use ParagonIE\Sodium\Core\Curve25519\Ge\P2;
use plainview\sdk_broadcast\collections\html;

    session_start();

    $mysqli = new mysqli("localhost","root","","foody");

    if ($mysqli -> connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
   

    /*************************

        Security Function Start 

    *************************/

    function xss_filter($data){
       $data = htmlspecialchars($data);
       return $data;
    }

    function encrypt_password($data){
        $crypt1 = md5($data);
        $crypt2 = sha1($data);
        $crypt3 = crypt($crypt2,$crypt1);
        return $crypt3;
    }

     /*************************

        Security Function End 

    *************************/

    /*************************

        Ready to use function start 

    *************************/

    function img_filter($image,$success,$error,$gen_name){
        $name = $image["name"];
        $tmp_name = $image["tmp_name"];
        $error = $image["error"];
        $size = $image["size"];
        $type  = $image["type"];
        
        
        if($error == 0){
          if($type == "image/png" || $type == "image/jpg" || $type == "image/jpeg" || $type == "image/gif"){
              if($size < 10000000){
                  move_uploaded_file($tmp_name,"upload/".$gen_name);
                 //  $_SESSION["success"] = "Image  Upload Success";
                 //  header("location:$success");
              }else{
                  echo "File size is too big";
              }
          }else{
             $_SESSION["error"] = "We Accept Only JPG PNG and JPEG";
             header("location:$error");
          }
        }else{
             $_SESSION["error"] = "Image has error";
             header("location:$error");
        }
 
        
        global $gen_name;
 
     }
 
     //genderate name 
    //  function generate_name($data){
    //      $file_name = $data["name"];
    //      return rand(0,100) . '__' . $file_name;
    //  }


    //Delete 
    function DeleteData($tableName,$id,$connect,$success,$error){
        $sql = "DELETE FROM $tableName WHERE id='$id'";
        $result = mysqli_query($connect,$sql);
        if($result){
            $_SESSION["success"] = "Delete Success";
            header("location:$success");
        }else{
            $_SESSION["error"] = "Delete Fail";
            header("location:$error");
        }
    }

    /*************************

         Ready to use function end

    *************************/


    if(isset($_POST["add_user"])){
       $username = xss_filter($_POST["username"]);
       $password = encrypt_password(xss_filter($_POST["password"]));
       $safe_username = $mysqli -> real_escape_string($username);
       $sate_password = $mysqli -> real_escape_string($password);
       $image = $_FILES["image"];
       $gen_name = rand(0,100) . "__" . $image["name"];
       img_filter($image,"member.php","member.php", $gen_name);


       $sql = "INSERT INTO member(username,password,image) VALUES ('$safe_username','$sate_password','$gen_name') ";

       if (!$mysqli -> query($sql)) {
         $_SESSION["error"] = "Create Member Fail";
       }else{
         $_SESSION["success"] = "Create Member Success";
       }

       $mysqli -> close();       
      
       header("location:member.php");
      
    }


    if(isset($_GET["delete_user"])){
       $id = $_GET["delete_user"];
       DeleteData("member",$id,$mysqli,"member.php","member.php");
    }

    if(isset($_POST["add_category"])){
        $username = xss_filter($_POST["username"]);
        $safe_username = $mysqli -> real_escape_string($username);
        $image = $_FILES["image"];
        $gen_name = rand(0,100) . "__" . $image["name"];
        img_filter($image,"category.php","category.php", $gen_name);
        $sql = "INSERT INTO category(name,image) VALUES ('$safe_username','$gen_name') ";

        if (!$mysqli -> query($sql)) {
          $_SESSION["error"] = "Create Category Fail";
        }else{
          $_SESSION["success"] = "Create Category Success";
        }
 
        $mysqli -> close();       
       
        header("location:category.php");
    }

    if(isset($_GET["delete_category"])){
        $id = $_POST["delete_category"];
        DeleteData("category",$id,$mysqli,"category.php","category.php");
    }

    if(isset($_POST["add_menu"])){
        $name = xss_filter($_POST["name"]);
        $price = xss_filter($_POST["price"]);
        $category = xss_filter($_POST["category"]);
        $description = xss_filter($_POST["description"]);
        $feature_image = $_FILES["feature_image"];
        $image = $_FILES["image"];
        $image_name = $_FILES["image"]["name"];
        $file_name = implode(",",$image_name);
       
        if(!empty($image_name)){
            foreach($image_name as $key=>$value){
                // $gen_name = rand(0,1000) . "_" . $value;
                // $targetFilePath = "upload/" . $gen_name;
                $targetFilePath = "upload/" . $value;
                move_uploaded_file($_FILES["image"]["tmp_name"][$key],$targetFilePath);
                // $gen_name2 = rand(0,1000) . "_" . $feature_image["name"];
                $targetFilePath = "upload/" . $feature_image["name"];
                move_uploaded_file($_FILES["feature_image"]["tmp_name"],$targetFilePath);
                // echo $gen_name2;
            }
            $feature_image = $feature_image["name"];
            // echo $gen_name2;
            $sql = "INSERT INTO menu(name,price,category,description,feature_image,images) VALUES ('$name','$price','$category','$description','$feature_image','$file_name')";


            if (!$mysqli -> query($sql)) {
                $_SESSION["error"] = "Menu data add fail ";
              }else{
                $_SESSION["success"] = "Menu data add success";
              }
       
              $mysqli -> close();       
             
              header("location:menu.php");
           
            
        } 
    }

    if(isset($_POST["login"])){
       $username = $_POST["username"];
       $passwrod = $_POST["password"];
       $password =  encrypt_password($password);
       $sql = "SELECT * FROM member WHERE username='$username' && password='$password' ";

       if($mysqli -> query($sql)){
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
       }

       $mysqli -> close();  
       header("location:index.php");
    }
        
?>