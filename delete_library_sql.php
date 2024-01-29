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
                  $lname = $_POST[lname];
                  $sql = "delete from LIBRARY where lname='$lname'"; 

                  if($conn->query($sql)) { 
                     echo '<h3 class="text-xl font-semibold pb-10">';
                        echo "Library $lname was deleted!";
                     echo '</h3>';
                  } else {
                     $err = $conn->errno; 
                     $errtxt = $conn->error; 
                     if($err == 1451) {
                        echo "<h3 class=\"text-xl font-semibold\">Cannot delete library $_POST[lname]!</h3> 
                        One or more people and/or books are assigned to $_POST[lname].";
                     } else {
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