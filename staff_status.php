<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Status</title>
    <script src="https://cdn.tailwindcss.com"></script>    
  </head>
  <body>
    <?php
      include_once("header.php");
      echo '<div class="relative min-h-screen flex">';
        include_once("dashboard.php");
        echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';
          echo '<h1 class="text-xl font-semibold pb-10">Select a Staff member</h1>';
            if(isset($_COOKIE["username"])){
              echo '<form class="bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="staff_status_sql.php" method=post>';
              $username = $_COOKIE["username"];
              $password = $_COOKIE["password"];	
              $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
              $sql = "SELECT *
                      FROM STAFF, PERSON
                      WHERE p_id = id";
              $result = $conn->query($sql);
              if($result->num_rows != 0) {
                echo '<label class="block text-gray-700 mb-2 font-medium" for="status">
                  Staff Member Name:
                </label>';
                echo '<select class="rounded w-full py-2 px-2" name="status">'; 
                  while($val = $result->fetch_assoc()) {
                    echo "<option value='$val[staff_id]'>$val[staff_id] - $val[firstname] $val[lastname]</option> "; 
                  }
                echo "</select>";
                echo '<div class="flex flex-col items-center mt-6">';
                  echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name="submit" value="View">'; 
                      echo 'View Status';
                  echo '</button>';
                echo '</div>';
              } else {
                echo "<p class=\"text-xl font-semibold\">Umm...you may want to enter some data. ;) </p>"; 
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
