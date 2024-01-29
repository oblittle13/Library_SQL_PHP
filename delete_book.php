<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php include_once("header.php"); ?>
<div class="relative min-h-screen flex">
    <?php include_once("dashboard.php"); ?>
    <div class="flex-1 m-8 p-10 bg-blue-50 drop-shadow-xl rounded-md text-gray-800" id="content">

        <h1 class="text-xl font-semibold pb-10">Delete a Book</h1>
        <h1 class="text-xl font-semibold pb-10">Either enter the Title and Author or ISBN, you must enter the Library this book belongs to:</h1>

        <form class="rounded-lg bg-blue-100 shadow-md px-8 pt-6 pb-8 mb-4" action="delete_book_sql.php" method=post>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="isbn">
                ISBN:
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="isbn">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="title">
                Book Title:
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="title">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="author">
                Author's Name:
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="author">
            </div>
	    <div class="mb-6">
                <label class="block text-gray-700 mb-2 font-medium" for="lib_name">
                This Book Belongs To The Library:
                </label>
                <input class="rounded py-2 px-2 w-full" type=text name="lib_name">
            </div>
            <button class="rounded w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit" value="Delete" name="submit">
                Delete
            </button>
        </form>
    </div>
</div>
</body>
</html>