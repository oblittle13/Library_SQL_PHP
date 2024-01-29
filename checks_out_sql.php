<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout a Book</title>
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
      $sql = "insert into CHECKS_OUT values ('$_POST[mem_id]', '$_POST[check_isbn]', '$_POST[checkout_date]', '$_POST[return_date]')"; 

      $sql2 = "select * from BOOK where isbn = '$_POST[check_isbn]' and checked_out = FALSE";
      $val = $conn->query($sql2)->fetch_assoc();

      $sql3 = "select firstname, lastname from PERSON where id = (select p_id from MEMBER where member_id = '$_POST[mem_id]')";
      $rec = $conn->query($sql3)->fetch_assoc();


      if($conn->query($sql) && $conn->query($sql2)) { 
         // echo "<h3> Library updated!</h3>";
         echo '<h3 class="text-xl font-semibold pb-10">';
            echo "Book ISBN: $_POST[check_isbn] : $val[title] by $val[author] at $val[lib_name] was checked out by $rec[firstname] $rec[lastname] (Membership ID: $_POST[mem_id])! ";
         echo '</h3>';

         $conn->query("update BOOK set checked_out = TRUE where isbn = '$_POST[check_isbn]'");

      } 
      else {
         $err = $conn->errno; 
         if($err == 1062 || $conn->query($sql2)) {
              // echo "<h3> Library updated!</h3>";
            echo "<p class=\"text-xl font-semibold\">The book is an ISBN of $val[isbn] already is checked out!</p>"; 
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