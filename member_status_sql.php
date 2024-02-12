<!DOCTYPE html>
<html? lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Member Status</title>
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
            // echo '<label class="block text-gray-700 mb-2 font-bold text-3xl" for="lname">';
            //     echo "$_POST[lname]";
            // echo '</label>';
            echo '<div class="rounded bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4">
              <h1 class="text-xl font-semibold pb-10">Membership Information</h1>';
              // Person and member information
              $sql =" SELECT *
                      FROM MEMBER as M, PERSON as P
                      WHERE M.p_id = P.id AND M.member_id=$_POST[status];
                    "; 
              $result = $conn->query($sql); 
              if($result->num_rows != 0)  { 	
                $rec = $result->fetch_assoc();
                echo '<table class="rounded-xl w-full text-med text-left text-gray-600">
                  <thead class="text-xs text-white uppercase bg-blue-400" >
                    <tr>
                      <th class="py-3 px-6">Member ID</th>
                      <th class="py-3 px-6">ID</th>
                      <th class="py-3 px-6">First Name</th>
                      <th class="py-3 px-6">Last Name</th>
                      <th class="py-3 px-6">Address</th>
                      <th class="py-3 px-6">Date of Birth</th>
                      <th class="py-3 px-6">Email</th>
                      <th class="py-3 px-6">Library</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="bg-blue-200">';
                      echo "<td class=\"py-4 px-6\">$rec[member_id]</td>
                      <td class=\"py-4 px-6\">$rec[id]</td>
                      <td class=\"py-4 px-6\">$rec[firstname]</td>
                      <td class=\"py-4 px-6\">$rec[lastname]</td> 
                      <td class=\"py-4 px-6\">$rec[address]</td> 
                      <td class=\"py-4 px-6\">$rec[dob]</td> 
                      <td class=\"py-4 px-6\">$rec[email]</td> 
                      <td class=\"py-4 px-6\">$rec[lib_name]</td> 
                    </tr>
                  </tbody>
                </table>";
            
              } else {
                echo "<p class=\"text-xl font-semibold\">Member with ID:$_POST[member_id] does not exist!</p>"; 
              }
              // Books that the member has checked out 
              // display over due books in red
              // $sql =" SELECT b_isbn, title, checkout_date, return_date
              //         FROM BOOK as B, CHECKS_OUT as CO
              //         WHERE B.isbn = CO.b_isbn AND CO.m_id=$_POST[status];
              //       "; 

              $sql = "SELECT b_isbn, title, checkout_date, return_date
                      FROM BOOK as B, CHECKS_OUT as CO
                      WHERE B.checked_out=TRUE AND B.isbn = CO.b_isbn AND B.isbn in (
                        SELECT b_isbn FROM CHECKS_OUT WHERE m_id = '$_POST[status]'
                      )";
              $result = $conn->query($sql);
              if($result->num_rows != 0)  { 	
                //$rec = $result->fetch_assoc();
                echo '<h1 class="text-xl font-semibold pb-10 mt-10">Current books checked out</h1>
                <table class="rounded-xl w-full text-med text-left text-gray-600">
                  <thead class="text-xs text-white uppercase bg-blue-400" >
                    <tr>
                      <th class="py-3 px-6">Book ISBN</th>
                      <th class="py-3 px-6">Title</th>
                      <th class="py-3 px-6">Checkout Date</th>
                      <th class="py-3 px-6">Return Date</th>
                    </tr>
                  </thead>
                  <tbody>';
                    // check if book is past due
                    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                      date_default_timezone_set('America/Edmonton');
                      $now = date('Y-m-d');
                      $return_date = $row['return_date'];
                      $return_date = date('Y-m-d', strtotime(str_replace('-', '/', $return_date)));
                      if ($return_date > $now) {
                        echo "<tr class=\"bg-blue-200\">
                          <td class=\"py-4 px-6\">$row[b_isbn]</td>
                          <td class=\"py-4 px-6\">$row[title]</td>
                          <td class=\"py-4 px-6\">$row[checkout_date]</td>
                          <td class=\"py-4 px-6\">$row[return_date]</td>
                        </tr>";
                      } else {
                        echo "<tr class=\"bg-red-200\">
                          <td class=\"py-4 px-6\">$row[b_isbn]</td>
                          <td class=\"py-4 px-6\">$row[title]</td>
                          <td class=\"py-4 px-6\">$row[checkout_date]</td>
                          <td class=\"py-4 px-6\">$row[return_date]</td>
                        </tr>";
                      }
                    }
                  echo '</tbody>
                </table>';
              }
              else {
                  echo "<p class=\"text-xl font-semibold mt-10\">No books checked out.</p>"; 
              }
            echo '</div>';
          } else {
            header('Location:login_first.php'); 
          }
        echo '</div>';
      echo '</div>';
    ?>
  </body>
</html?>