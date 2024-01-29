<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a Person</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>
<?php
include_once("header.php");
echo '<div class="relative min-h-screen flex">';
    include_once("dashboard.php");
   echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';
        
      echo '<h1 class="text-xl font-semibold pb-10">Update a Library</h1>';
if(isset($_COOKIE["username"])){


echo "<form class=\"bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4\" action=\"update_person_sql.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	

	$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
	if($conn->connect_errno)
	{
	   echo "Connection Problem!";
	   exit; 
	}
	
	$sql = "select * from PERSON where id='$_POST[id]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
	  //  echo "Library Name: <input type=textl name=\"lname\" value=\"$rec[lname]\"><br><br>";
	  //  echo "Library Address: <input type=text name=\"laddress\" value=\"$rec[laddress]\"><br><br>";
	  //  echo "Library Phone Number: <input type=text name=\"lphone\" value=\"$rec[lphone]\"><br><br>";
	  //  echo "<input type=hidden name=\"oldname\" value=\"$_POST[lname]\">";
	  //  echo "<input type=submit name=\"submit\" value=\"Update\">"; 
    echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="id">ID:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"id\" value=\"$rec[id]\">";
    echo '</div>';
		echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="firstname">First Name:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"firstname\" value=\"$rec[firstname]\">";
    echo '</div>';
    echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="lastname">Last Name:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"lastname\" value=\"$rec[lastname]\">";
    echo '</div>';
    echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="address">Address:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"address\" value=\"$rec[address]\">";
    echo '</div>';
    echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="dob">Date of Birth:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"date\" name=\"dob\" value=\"$rec[dob]\">";
    echo '</div>';
    echo '<div class="mb-6">';
        echo '<label class="block text-gray-700 mb-2 font-medium" for="email">Email:</label>';
        echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"email\" value=\"$rec[email]\">";
    echo '</div>';


    $sql2 = "select lname from LIBRARY"; 
    $result2 = $conn->query($sql2);
    echo '<div class="mb-6">';
      echo '<label class="block text-gray-700 mb-2 font-medium" for="email">Library:</label>';
        echo '<select class="rounded w-full py-2 px-2" name="lib_name">';
          while($val2 = $result2->fetch_assoc()) {
            if ($val2[lname] == $rec[lib_name]) {
              echo "<option selected value='$val2[lname]'>$val2[lname]</option>"; 
            } else {
              echo "<option value='$val2[lname]'>$val2[lname]</option>"; 
            }
          }
        echo "</select>"; 
        // echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"lib_name\" value=\"$rec[lib_name]\">";
    echo '</div>';

		echo "<input type=hidden name=\"oldid\" value=\"$_POST[id]\">";

		echo '<div class="flex flex-col items-center mt-6">';
			echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name="submit" value="Update">'; 
				echo 'Update';
			echo '</button>';
		echo '</div>';

	}
	else
	{
		echo "<p class=\"text-xl font-semibold\">Umm...you may want to enter some data. ;) </p>"; 
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
