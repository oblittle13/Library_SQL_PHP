<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<?php include_once("header.php"); ?>
<div class="relative min-h-screen flex">
    <?php include_once("dashboard.php"); ?>
    <div class="round-md flex-1 m-8 p-10 bg-blue-50 drop-shadow-xl  text-gray-800" id="content">
        <h1 class="text-xl font-semibold">Welcome to the Libraries of Wendy Dashboard</h1>
        <h3 class="text-md pt-5">Select from one the operations on the left.</h3>
    </div>
</div>
</body>
</html>
