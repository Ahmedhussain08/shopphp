<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<header class="text-gray-600 body-font">
  <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
    <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
      </svg>
      <span class="ml-3 text-xl">SHOPSTORE</span>
    </a>
    <nav class="md:mr-auto md:ml-4 md:py-1 md:pl-4 md:border-l md:border-gray-400	flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900">First Link</a>
      <a class="mr-5 hover:text-gray-900">Second Link</a>
      <a class="mr-5 hover:text-gray-900">Third Link</a>
      <a class="mr-5 hover:text-gray-900">Fourth Link</a>
    </nav>
    <button class=" rounded-full inline-flex items-center text-base-base justify-center bg-indigo-500 justify-center text-white border-0 border-radius-1.5rem py-1 px-3 focus:outline-blue hover:bg-indigo-400 rounded-full text-base mt-4 md:mt-0"> <?php echo $_SESSION['username'] ?>
      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1 rounded-full" viewBox="0 0 24 24">
        <!-- <path d="M5 12h14M12 5l7 7-7 7"></path> -->
      </svg>
    </button>
    <button href="" class=" rounded-full inline-flex items-center bg-indigo-500 text-white border-0 border-radius-1.5rem py-1 px-3 focus:outline-blue hover:bg-indigo-400 rounded-full text-base mt-4 md:mt-0">
    <a href="logout.php">LOGOUT</a> 
  </button>

  </div>
</header>


</body>
</html>