<nav class="flex items-center justify-between flex-wrap bg-blue-600 p-4 drop-shadow-lg">
  <div class="flex items-center flex-shrink-0 text-white mr-4">
    <div class="text-3xl pr-2">
    📚
    </div>
     <span class="font-semibold text-2xl tracking-tight">Libraries of Wendy</span>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="ml-2 text-sm lg:flex-grow">
          <span class="block mt-4 lg:inline-block lg:mt-0 text-green-300">
        Logged in as: 
        <?php 
        if(isset($_COOKIE["username"])){ 
            echo $_COOKIE["username"]; 
        } else {
            echo '<span class="text-red-500">ERROR<span>';
        }
        ?>
        </span>
    </div>
    <div>
      <a href="logout.php" class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-gray-700 hover:bg-white mt-4 lg:mt-0 mr-4">Logout</a>
    </div>
  </div>
</nav>
