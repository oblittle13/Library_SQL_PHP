<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login First</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>

    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-full max-w-md">
            <div class="bg-blue-50 drop-shadow-lg px-8 pt-6 pb-8 mb-4 rounded-lg">
            
        
                <?php
                echo '<div class="flex">';
                    echo '<h3 class="m-auto font-medium text-3xl text-blue-500 pb-10">';
                        echo "You are not logged in!";
                    echo '</h3>';
                echo '</div>';
                echo '<div class="flex flex-col items-center text-center">';
                    echo '<a href="index.php" class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline">';
                        echo "Login First";
                    echo '</a>';
                echo '</div>';
                ?>
            </div>
        </div>
    </div>
</body>
</html>