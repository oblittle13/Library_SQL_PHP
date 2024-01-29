<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update a Staff Member</title>
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
                        echo "<form class=\"bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4\" action=\"update_staff_sql.php\" method=post>";

                            $username = $_COOKIE["username"];
                            $password = $_COOKIE["password"];	
                            $conn = new mysqli("vconroy.cs.uleth.ca",$username,$password,$username);
                            $sql = "SELECT *
                                    FROM STAFF, PERSON
                                    WHERE staff_id='$_POST[staff_id]' AND p_id = id";

                            if($conn->connect_errno){
                                echo "Connection Problem!";
                                exit; 
                            }
                            $result = $conn->query($sql);
                            if(!$result){
                            echo "Problem executing select!";
                            exit; 
                            }
                            if($result->num_rows!= 0){
                                $rec=$result->fetch_assoc(); 
                                echo '<div class="mb-6">';
                                    echo "<label class=\"block text-gray-700 mb-2 font-medium\" for=\"firstname\">Name: $rec[firstname] $rec[lastname]</label>";
                                echo '</div>';                                
                                echo '<div class="mb-6">';
                                    echo "<label class=\"block text-gray-700 mb-2 font-medium\" for=\"staff_id\">Current ID:$rec[staff_id]</label>";
                                    echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"staff_id\" value=\"$rec[staff_id]\">";
                                echo '</div>';
                                echo '<div class="mb-6">';
                                    echo "<label class=\"block text-gray-700 mb-2 font-medium\" for=\"add_hours\">Current Hours Worked: $rec[hours_worked]</label>";
                                    echo "<input class=\"rounded py-2 px-2 w-full\" type=\"textl\" name=\"add_hours\" value=\"0\">";
                                echo '</div>';                                

                                echo "<input type=hidden name=\"oldid\" value=\"$_POST[staff_id]\">";
                                echo "<input type=hidden name=\"oldhours\" value=\"$rec[oldhours]\">";

                                echo '<div class="flex flex-col items-center mt-6">';
                                    echo '<button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type=submit name="submit" value="Update">'; 
                                        echo 'Update';
                                    echo '</button>';
                                echo '</div>';
                            } else {
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
