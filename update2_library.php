<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a Library</title>
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


echo "<form class=\"bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4\" action=\"update_library_sql.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	

	$conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
	if($conn->connect_errno)
	{
	   echo "Connection Problem!";
	   exit; 
	}
	
	$sql = "select * from LIBRARY where lname='$_POST[lname]'";

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
			echo '<label class="block text-gray-700 mb-2 font-medium" for="lname">Library Name:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"lname\" value=\"$rec[lname]\">";
		echo '</div>';
		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="laddress">Library Address:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"laddress\" value=\"$rec[laddress]\">";
		echo '</div>';
		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="lphone">Library Phone:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"lphone\" value=\"$rec[lphone]\">";
		echo '</div>';

		echo "<input type=hidden name=\"oldname\" value=\"$_POST[lname]\">";

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
