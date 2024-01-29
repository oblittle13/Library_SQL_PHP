<!DOCTYPE html>
<html? lang="en">
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
          if(isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
            $password = $_COOKIE["password"];
            $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
            $sql =" SELECT *
                    FROM STAFF, PERSON
                    WHERE p_id = id AND staff_id=$_POST[status];
                  "; 
            $result = $conn->query($sql);
            if($conn->connect_errno) {
                echo "Connection issues";
                exit; 
            }
            echo '<div class="rounded bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4">';
              echo '<h1 class="text-xl font-semibold pb-10">Staff Information</h1>';
              if($result->num_rows != 0)  { 	
                $rec = $result->fetch_assoc();
                echo '<table class="rounded-xl w-full text-med text-left text-gray-600">
                  <thead class="text-xs text-white uppercase bg-blue-400" >
                    <tr>
                      <th class="py-3 px-6">Staff ID</th>
                      <th class="py-3 px-6">First Name</th>
                      <th class="py-3 px-6">Last Name</th>
                      <th class="py-3 px-6">Address</th>
                      <th class="py-3 px-6">Date of Birth</th>
                      <th class="py-3 px-6">Email</th>
                      <th class="py-3 px-6">Total Hours</th>
                      <th class="py-3 px-6">Library</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="bg-blue-200">';
                      echo "<td class=\"py-4 px-6\">$rec[staff_id]</td>
                      <td class=\"py-4 px-6\">$rec[firstname]</td>
                      <td class=\"py-4 px-6\">$rec[lastname]</td>
                      <td class=\"py-4 px-6\">$rec[address]</td>
                      <td class=\"py-4 px-6\">$rec[dob]</td>
                      <td class=\"py-4 px-6\">$rec[email]</td>
                      <td class=\"py-4 px-6\">$rec[hours_worked]</td>
                      <td class=\"py-4 px-6\">$rec[lib_name]</td>
                    </tr>
                  </tbody>
                </table>";
            
              } else {
                echo "<p class=\"text-xl font-semibold\">Staff member with ID:$_POST[staff_id] does not exist!</p>"; 
              }
            echo '</div>';
          }
          else {
            header('Location:login_first.php'); 
          }
        echo '</div>';
      echo '</div>';
    ?>
  </body>
</html?>