<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a Book</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>
<?php

include_once("header.php");
echo '<div class="relative min-h-screen flex">';
    include_once("dashboard.php");
   echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';

if(isset($_COOKIE["username"])) {
   $username = $_COOKIE["username"]; 
   $password = $_COOKIE["password"];

   $conn = new mysqli("localhost",$username,$password, "library");
   if($conn->connect_errno) {
      echo "Connection issues";
      exit; 
   }
   echo '<label class="block text-gray-700 mb-2 font-bold text-3xl" for="title">';
      echo "$_POST[title]";
   echo '</label>';
   echo '<div class="rounded bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4">';

   // echo "<p>$_POST[lname]</p>";

   $sql = "select * from BOOK where isbn='".$_POST['isbn']."'";
   $result = $conn->query($sql); 
   if($result->num_rows != 0)  { 	
      
      $rec = $result->fetch_assoc();

      echo '<table class="rounded-xl w-full text-med text-left text-gray-600">';
         echo '<thead class="text-xs text-white uppercase bg-blue-400" >';
            echo "<tr>";
               echo '<th class="py-3 px-6">ISBN</th>';
               echo '<th class="py-3 px-6">Title</th>';
               echo '<th class="py-3 px-6">Author</th>';
               echo '<th class="py-3 px-6">Genre</th>';
               echo '<th class="py-3 px-6">Checked Out?</th>';
               echo '<th class="py-3 px-6">Library</th>';
            echo "</tr>";
         echo "</thead>";
         
         echo "<tbody>";
            echo '<tr class="bg-blue-200">';
               echo "<td class=\"py-4 px-6\">$rec[isbn]</td>";
               echo "<td class=\"py-4 px-6\">$rec[title]</td>";
               echo "<td class=\"py-4 px-6\">$rec[author]</td>"; 
               echo "<td class=\"py-4 px-6\">$rec[genre]</td>";
               echo "<td class=\"py-4 px-6\">$rec[checked_out]</td>";
               echo "<td class=\"py-4 px-6\">$rec[lib_name]</td>";
            echo "</tr>";
         echo "</tbody>";
	
      echo "</table>";
   echo '</div>';
   }
   else {
      echo "<p class=\"text-xl font-semibold\">The book $_POST[title] does not exist!</p>"; 
   }
}
else {
   header('Location:login_first.php'); 
}

// echo "<a href=\"main.php\">Return</a> to Home Page."; 

echo '</div>';
echo '</div>';
?>

</body>
</html?>