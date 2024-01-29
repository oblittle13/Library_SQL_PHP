<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return a Book</title>
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

      $sql = "delete from CHECKS_OUT where m_id = '$_POST[mem_id]' and b_isbn = '$_POST[isbn]'";


      if($conn->query($sql)) { 
         // echo "<h3> Library updated!</h3>";
         echo '<h3 class="text-xl font-semibold pb-10">';
            echo "Book ISBN: $_POST[isbn] : was returned by Member ID: $_POST[mem_id]! ";
         echo '</h3>';

         $conn->query("update BOOK set checked_out = FALSE where isbn = '$_POST[isbn]'");


      } 
      else {
         $err = $conn->errno; 
         if($err == 1062 || $conn->query($sql2)) {
              // echo "<h3> Library updated!</h3>";
            echo "<p class=\"text-xl font-semibold\">The book is an ISBN of $_POST[isbn] was not previously checked out!</p>"; 
         } 
         else {
            echo "error code $err";
         }
         
      }

      // echo "<a href=\"main.php\">Return</a> to Home Page.";

      } 
      else {
         header('Location:login_first.php'); 
      }
   echo '</div>';
echo '</div>';
?>

</body>
</html?>