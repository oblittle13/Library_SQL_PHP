<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Delete a Member</title>
      <script src="https://cdn.tailwindcss.com"></script>    
   </head>
   <body>
      <?php
         include_once("header.php");
         echo '<div class="relative min-h-screen flex">';
            include_once("dashboard.php");
            echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';
               echo '<h1 class="text-xl font-semibold pb-10">Delete a Member</h1>';
               if(isset($_COOKIE["username"])) {
                  echo '<form class="bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="delete_member_sql.php" method=post>';

                  $username = $_COOKIE["username"];
                  $password = $_COOKIE["password"];    
                  $conn = new mysqli("localhost",$username,$password, "library");
                  $sql ="   SELECT *
                            FROM PERSON, MEMBER
                            WHERE id = p_id
                        "; 
                  $result = $conn->query($sql);

                  if($result->num_rows != 0) {
                     echo '<label class="block text-gray-700 mb-2 font-medium" for="member_id">Select Member to Delete from Database:</label>';
                     echo '<select class="rounded w-full py-2 px-2" name="member_id">'; 
                        while($val = $result->fetch_assoc()) {
                           echo "<option value=$val[member_id]>ID: $val[member_id] - $val[firstname] $val[lastname]</option>"; 
                        }
                     echo "</select>"; 
                     echo '<div class="flex flex-col items-center mt-6">';
                        echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name=\"submit\" value=\"Delete\">'; 
                           echo 'Delete';
                        echo '</button>';
                     echo '</div>';
                  } else {
                     echo "<p class=\"text-xl font-semibold\">This Library Has No Members</p>"; 
                  }
                  echo "</form>";
               } else {
                  header('Location:login_first.php'); 
               }

            echo '</div>';
         echo '</div>';
      ?>
   </body>
</html>