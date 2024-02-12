<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a Book</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>
<?php
include_once("header.php");
echo '<div class="relative min-h-screen flex">';
    include_once("dashboard.php");
   echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';
        
      echo '<h1 class="text-xl font-semibold pb-10">Update a Book</h1>';
if(isset($_COOKIE["username"])){


echo "<form class=\"bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4\" action=\"update_book_sql.php\" method=post>";

	$username = $_COOKIE["username"];
	$password = $_COOKIE["password"];	

	$conn = new mysqli("localhost",$username,$password, "library");
	if($conn->connect_errno)
	{
	   echo "Connection Problem!";
	   exit; 
	}
	
	$sql = "select * from BOOK where isbn='$_POST[isbn]'";

	$result = $conn->query($sql);
	if(!$result)
	{
	   echo "Problem executing select!";
	   exit; 
	}
        if($result->num_rows!= 0)
	{
	   $rec=$result->fetch_assoc(); 
		
		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="lname">ISNB:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"isbn\" value=\"$rec[isbn]\">";
		echo '</div>';

        echo "<input type=hidden name=\"oldisbn\" value=\"$_POST[isbn]\">";

		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="laddress">Book Title:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"title\" value=\"$rec[title]\">";
		echo '</div>';
		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="author">Author Name:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"author\" value=\"$rec[author]\">";
		echo '</div>';
		echo '<div class="mb-6">';
			echo '<label class="block text-gray-700 mb-2 font-medium" for="lib_name">Library Access:</label>';
			echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"lib_name\" value=\"$rec[lib_name]\">";
		echo '</div>';

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