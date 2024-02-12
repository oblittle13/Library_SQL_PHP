<!DOCTYPE html>
<html lang="en">
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
      echo '<h1 class="text-xl font-semibold pb-10">Return a Book</h1>';
if(isset($_COOKIE["username"])){

   echo '<form class="bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="checks_out_return_sql.php" method=post>';

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("localhost",$username,$password, "library");

   $sql = "select * from BOOK where isbn in (select b_isbn from CHECKS_OUT where m_id = '$_POST[member_id]')";
   $result = $conn->query($sql);


   if($result->num_rows != 0)
   {
      echo '<label class="block text-gray-700 mb-2 font-medium" for="isbn">Book:</label>';
      echo '<select class="rounded w-full py-2 px-2" name="isbn">'; 
      while($val2 = $result->fetch_assoc())
      {
         echo "<option value='$val2[isbn]'>$val2[isbn] : $val2[title] by $val2[author] at $val2[lib_name]</option>"; 

      }
      echo "</select>"; 
      // echo "<input type=submit name=\"submit\" value=\"View\">"; 

      echo "<input type=hidden name=\"check_isbn\" value=\"$_POST[isbn]\">";
      echo "<input type=hidden name=\"mem_id\" value=\"$_POST[member_id]\">";

      echo '<div class="flex flex-col items-center mt-6">';
         echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name="submit" value="View">'; 
            echo 'Return';
         echo '</button>';
      echo '</div>';
   }
   else
   {
      echo "<p class=\"text-xl font-semibold\">This Member has no Books checked out! </p>"; 
   }

   echo "</form>";
}
else
{
   header('Location:login_first.php'); 
}

   echo '</div>';
echo '</div>';

?>
 
</body>
</html> 