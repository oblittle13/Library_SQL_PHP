<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Book</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>
<?php

include_once("header.php");
echo '<div class="relative min-h-screen flex">';
    include_once("dashboard.php");
   echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';

      if (isset($_COOKIE["username"])) {
            
         $username = $_COOKIE["username"];
         $password = $_COOKIE["password"];

         $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);

         $isbn = $_POST[isbn];
         $title = $_POST[title];
         $author = $_POST[author];
         $lib_name = $_POST[lib_name];
         $sql1 = "delete from BOOK where isbn='$isbn' and lib_name='$lib_name'"; 
         $sql2 = "delete from BOOK where title='$title' and author='$author' and lib_name = '$lib_name'";



         if($conn->query($sql1) && !empty($isbn) ) { 
            echo '<h3 class="text-xl font-semibold pb-10">';
               echo "Book $isbn was deleted from $lib_name!";
            echo '</h3>';
         } else if ( !empty($title) && !empty($author) && $conn->query($sql2)) {
            echo '<h3 class="text-xl font-semibold pb-10">';
               echo "Book $title by $author was deleted from $lib_name!";
            echo '</h3>';
         }
         else {
            $err = $conn->errno; 
            $errtxt = $conn->error; 
            if($err == 1451) {
               if(!empty($isnb)) {echo "<h3 class=\"text-xl font-semibold\">Cannot delete book $_POST[isbn]!</h3>"; } 
               else {"<h3 class=\"text-xl font-semibold\">Cannot delete book $_POST[title] by $_POST[author]!</h3>";}
               echo "Someone currently has this book checked out."; 
            }
            else {
               echo "You got an error code of $err. $errtxt"; 
            }
         }
         // echo "<br><br><a href=\"main.php\">Return</a> to Home Page."; 
      } else {
         header('Location:login_first.php'); 
      }

   echo '</div>';
echo '</div>';
?>

</body>
</html?>