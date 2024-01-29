<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete a Library</title>
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

      $sql = "update BOOK set isbn='$_POST[isbn]', title='$_POST[title]', author='$_POST[author]', lib_name='$_POST[lib_name]' where isbn='$_POST[oldisbn]'"; 
      if($conn->query($sql)) { 
         // echo "<h3> Library updated!</h3>";
         echo '<h3 class="text-xl font-semibold pb-10">';
            echo "Book ISBN: $_POST[isbn] : $_POST[title] by $_POST[author] at $_POST[lib_name] was updated!";
         echo '</h3>';

      } 
      else {
         $err = $conn->errno; 
         if($err == 1062) {
              // echo "<h3> Library updated!</h3>";
            echo "<p class=\"text-xl font-semibold\">The book is an ISBN of $_POST[isbn] already exists!</p>"; 
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