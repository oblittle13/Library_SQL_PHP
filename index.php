<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="flex items-center justify-center h-screen">
    <div class="w-full max-w-md">
        <div class="flex mb-10">
            <h1 class="m-auto font-medium text-5xl text-blue-500">Libraries of Wendy</h1>
        </div>
        <form class="bg-blue-50 drop-shadow-lg px-8 pt-6 pb-8 mb-4 rounded-lg" action="set_session_credentials.php" method="post">
            <div class="flex mb-6">
		<h2 class="m-auto font-medium text-3xl text-blue-500">Login</h2>
	    </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="username">
                    Username
                </label>
                <!-- <input class="shadow appearance-none border w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="text" placeholder="Username"> -->
                <?php
                    if (isset($_GET["cred"]) && $_GET["cred"] == 'failed') {
                        echo '<input class="rounded shadow appearance-none border border-red-400 w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="text" placeholder="Username">';
                    } else {
                        echo '<input class="rounded shadow appearance-none border w-full py-2 px-2 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="username" type="text" placeholder="Username">';
                    }
                ?>
            </div>
            <div class="mb-8">
                <label class="block text-gray-700 text-lg font-bold mb-2" for="password">
                    Password
                </label>
                <!-- <input class="shadow appearance-none border border-red-400 w-full py-2 px-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************"> -->
                <?php
                    if (isset($_GET["cred"]) && $_GET["cred"] == 'failed') {
                        echo '<input class="rounded shadow appearance-none border border-red-400 w-full py-2 px-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************">';
                        echo "<p class='text-red-400 text-med italic'>Incorrect Username/Password.</p>";
                    } else {
                        echo '<input class="rounded shadow appearance-none border w-full py-2 px-2 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" name="password" type="password" placeholder="******************">';
                    }
                ?>
            </div>
            <div class="flex flex-col items-center">
                <button class="w-full rounded bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 focus:outline-none focus:shadow-outline" type="submit" value="Login">
                    Login
                </button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
