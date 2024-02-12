<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert a Book</title>
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

         $conn = new mysqli("localhost",$username,$password, "library");
         if($conn->connect_errno)
         {
            echo "Connection Issue!";
            exit;
         }

         $sql = "insert into BOOK (isbn, title, author, genre, checked_out, lib_name) values ('$_POST[isbn]','$_POST[title]','$_POST[author]', '$_POST[genre]', 'false', '$_POST[lib_name]' )";
         if($conn->query($sql))
         {
            echo '<h3 class="text-xl font-semibold pb-10">';
               echo "The Book $_POST[title] was added!";
            echo '</h3>';

         } else {
            $err = $conn->errno;
            if($err == 1062)
            {
               echo '<h3 class="text-xl font-semibold pb-10">';
                  echo "The book $_POST[title] by $_POST[author] already exists with ISBN: $_POST[isbn]!";
               echo '</h3>';
            } else {
               // echo "<p>MySQL error code $err </p>";
               echo '<p class="text-lg font-semibold pb-10">';
                  echo "MySQL error code $err";
               echo '</p>';
            }

         }

         // echo "<a href=\"main.php\">Return</a> to Home Page.";

         } else {
            header('Location:login_first.php');
         }

   echo '</div>';
echo '</div>';

?>

</body>
</html>


