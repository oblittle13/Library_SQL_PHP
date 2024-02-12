<!DOCTYPE html>
<html? lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update a Member</title>
        <script src="https://cdn.tailwindcss.com"></script>    
    </head>
    <body>
        <?php
            include_once("header.php");
            echo '<div class="relative min-h-screen flex">';
                include_once("dashboard.php");
                echo '<div class="flex-1 m-8 p-10 bg-blue-50 shadow-lg rounded text-gray-800" id="content">';
                    if (isset($_COOKIE["username"])) { 
                        $username = $_COOKIE["username"];
                        $password = $_COOKIE["password"];
                        $conn = new mysqli("localhost",$username,$password, "library");
                        $sql =  "   UPDATE MEMBER 
                                    SET member_id = '$_POST[member_id]'
                                    WHERE member_id = '$_POST[oldid]'
                                "; 
                        if($conn->query($sql)) { 
                            echo '<h3 class="text-xl font-semibold pb-10">';
                                echo "Member was updated!";
                            echo '</h3>';
                        } else {
                            $err = $conn->errno; 
                            if($err == 1062) {
                                echo "<p class=\"text-xl font-semibold\">Member ID already exists!</p>"; 
                            } else {
                                echo "error code $err";
                            }
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
