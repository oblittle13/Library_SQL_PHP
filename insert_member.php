<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Insert a Member</title>
      <script src="https://cdn.tailwindcss.com"></script>    
   </head>
   <body>
      <?php
         include_once("header.php");
         echo '<div class="relative min-h-screen flex">';
            include_once("dashboard.php");
            echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">
               <h1 class="text-xl font-semibold pb-10">Add a new Member</h1>';
               if (isset($_COOKIE["username"])) {
                  echo '<form class="rounded-lg bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="insert_member_sql.php" method=post>';
                  $username = $_COOKIE["username"];
                  $password = $_COOKIE["password"];
                  $conn = new mysqli("localhost",$username,$password, "library");
                  $sql ="  SELECT * 
                           FROM PERSON
                           WHERE id NOT IN(
                              SELECT p_id
                              FROM MEMBER
                              WHERE id = p_id
                           )
                        ";    
                  $result = $conn->query($sql);

                  if($result->num_rows != 0) {
                     echo '<div class="mb-6">
                        <label class="block text-gray-700 mb-2 font-medium" for="p_id">Person:</label>
                        <select class="rounded w-full py-2 px-2" name="p_id">'; 
                           while($val = $result->fetch_assoc()) {
                              echo "<option value='$val[id]'>ID: $val[id] - $val[firstname] $val[lastname]</option>"; 
                           }
                        echo '</select>
                     </div>
                     <div class="flex flex-col items-center mt-6">
                        <button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name=\"submit\" value=\"Insert\"> 
                           Insert
                        </button>
                     </div>';
                  }
                  else {
                     echo "<p class=\"text-xl font-semibold\">There are no unassigned people in the system! </p>"; 
                  }
                  echo "</form>";
               } 
               else {
                  header('Location:login_first.php'); 
               }
            echo '</div>';
         echo '</div>';
      ?>
   </body>
</html>