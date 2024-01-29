<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Library</title>
    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body>
<?php include_once("header.php"); ?>
<div class="relative min-h-screen flex">
    <?php include_once("dashboard.php"); ?>
    <div class="flex-1 m-8 p-10 bg-blue-50 drop-shadow-xl rounded-md text-gray-800" id="content">
        
        <h1 class="text-xl font-semibold pb-10">Insert a Library</h1>

        <form class="rounded-lg bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="insert_library_sql.php" method=post>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="lname">
                Library Name: 
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="lname">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="laddress">
                Library Address: 
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="laddress">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="lphone">
                Library Phone Number: 
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="lphone">
            </div>
            <button class="rounded w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit" value="Insert" name="submit">
                Insert
            </button>
        </form> 
    </div>
</div>
</body>
</html>
