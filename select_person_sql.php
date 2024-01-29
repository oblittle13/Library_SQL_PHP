<!DOCTYPE html>
<html? lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select a Person</title>
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

      $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
      if($conn->connect_errno) {
          echo "Connection issues";
          exit; 
      }
      // echo '<label class="block text-gray-700 mb-2 font-bold text-3xl" for="lname">';
      //     echo "$_POST[lname]";
      // echo '</label>';
      echo '<div class="rounded bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4">';


      $sql = "select * from PERSON where id='".$_POST[id]."'";
      $result = $conn->query($sql); 
      if($result->num_rows != 0)  { 	
          
          $rec = $result->fetch_assoc();

          echo '<table class="rounded-xl w-full text-med text-left text-gray-600">';
            echo '<thead class="text-xs text-white uppercase bg-blue-400" >';
                echo "<tr>";
                  echo '<th class="py-3 px-6">ID</th>';
                  echo '<th class="py-3 px-6">First Name</th>';
                  echo '<th class="py-3 px-6">Last Name</th>';
                  echo '<th class="py-3 px-6">Address</th>';
                  echo '<th class="py-3 px-6">Date of Birth</th>';
                  echo '<th class="py-3 px-6">Email</th>';
                  echo '<th class="py-3 px-6">Library</th>';
                echo "</tr>";
            echo "</thead>";
            
            echo "<tbody>";
                echo '<tr class="bg-blue-200">';
                  echo "<td class=\"py-4 px-6\">$rec[id]</td>";
                  echo "<td class=\"py-4 px-6\">$rec[firstname]</td>";
                  echo "<td class=\"py-4 px-6\">$rec[lastname]</td>"; 
                  echo "<td class=\"py-4 px-6\">$rec[address]</td>"; 
                  echo "<td class=\"py-4 px-6\">$rec[dob]</td>"; 
                  echo "<td class=\"py-4 px-6\">$rec[email]</td>"; 
                  echo "<td class=\"py-4 px-6\">$rec[lib_name]</td>"; 
                echo "</tr>";
            echo "</tbody>";
      
          echo "</table>";
      echo '</div>';
      }
      else {
          echo "<p class=\"text-xl font-semibold\">Person with ID:$_POST[id] does not exist!</p>"; 
      }
    }
    else {
      header('Location:login_first.php'); 
    }
  echo '</div>';
echo '</div>';
?>

</body>
</html?>