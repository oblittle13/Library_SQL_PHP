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

   echo '<form class="bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="checks2_out_return.php" method=post>';

   $username = $_COOKIE["username"];
   $password = $_COOKIE["password"];	

   $conn = new mysqli("localhost",$username,$password, "library");

   $sql = "select m.member_id, p.firstname, p.lastname from MEMBER as m, PERSON as p where m.p_id = p.id AND m.member_id in (select member_id from MEMBER)";
   $result = $conn->query($sql);

   if($result->num_rows != 0)
   {
      echo '<label class="block text-gray-700 mb-2 font-medium" for="member_id">Member:</label>';
      // echo "Library Name: <select name=\"lname\">";
      echo '<select class="rounded w-full py-2 px-2" name="member_id">'; 
      while($val = $result->fetch_assoc())
      {
         echo "<option value='$val[member_id]'>$val[member_id] : $val[firstname] $val[lastname]</option>"; 

      }
      echo "</select>"; 
      // echo "<input type=submit name=\"submit\" value=\"View\">"; 

      echo '<div class="flex flex-col items-center mt-6">';
         echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name="submit" value="View">'; 
            echo 'Return';
         echo '</button>';
      echo '</div>';
   }
   else
   {
      echo "<p class=\"text-xl font-semibold\">There are no Members left in the Libraries! </p>"; 
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