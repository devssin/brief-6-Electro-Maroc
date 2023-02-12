<?php if (isAdminLoggedIn()) : ?>
  <div class="containner flex justify-between py-3 bg-gray-700 sticky top-0 z-50">
    <div class="flex items-center space-x-4">
      <h3 class="text-white text-lg font-bold mr-5">Welcome <span class="text-primary"><?= ucwords($_SESSION['admin_session'])?></span></h3>
      <a href="<?= URLROOT ?>/dashboard/products" class="text-white text-sm font-bold hover:text-primary transition duration-100"><i class="fas fa-box mr-2"></i> Products</a> 
      <a href="<?= URLROOT ?>/dashboard/categories" class="text-white text-sm font-bold hover:text-primary transition duration-100"><i class="fas fa-tags mr-2"></i> Categories</a> 
      <a href="<?= URLROOT ?>/dashboard/products" class="text-white text-sm font-bold hover:text-primary transition duration-100"><i class="fas fa-money-check mr-2"></i> Orders</a> 
      
    </div>
    <div class="flex items-center space-x-3">
      <a href="<?= URLROOT ?>/admins/logout" class="text-white text-sm font-bold"><i class="fas fa-sign-out mr-2"></i> Logout</a>
    </div>
  </div>
<?php endif ?>
<header class="bg-white shadow-sm py-4">

  <div class="containner flex justify-between items-center ">
    <!-- Logo -->
    <a href="/">
      <h2 class="font-black">ELECTRO <span class="font-poppins text-primary">MAROC</span></h2>
    </a>
    <!-- Search Bar -->
    <div class="w-full max-w-xl relative flex">
      <span class="absolute top-3 left-3 text-lg text-gray-400">
        <i class="fas fa-search"></i>
      </span>
      <input type="text" class="w-full border border-primary border-r-0 pl-10 py-3 pr-5 rounded-l-md focus:outline-primary " placeholder="Search">
      <button class="bg-primary border border-primary text-white px-8  rounded-r-md hover:bg-transparent hover:text-primary transition">Search</button>
    </div>

    <!-- Icons -->
    <div class="flex items-center space-x-6">
      <a href="" class="text-center text-gray-400 hover:text-primary transistion relative">
        <div class="text-xl">
          <i class="far fa-heart"></i>

        </div>
        <span class="text-xs leading-3">WISHLIST</span>
        <span class="absolute bg-primary text-white top-0 right-0 w-5 h-5 rounded-full text-xs flex justify-center items-center">8</span>
      </a>
      <a href="" class="text-center text-gray-400 hover:text-primary transistion relative">
        <div class="text-xl">
          <i class="fas fa-shopping-bag"></i>

        </div>
        <span class="text-xs leading-3">CARD</span>
        <span class="absolute bg-primary text-white top-0 -right-3 w-5 h-5 rounded-full text-xs flex justify-center items-center">8</span>
      </a>
      <a href="<?= URLROOT ?>/clients/account" class="text-center text-gray-400 hover:text-primary transistion relative">
        <div class="text-xl">
          <i class="far fa-user"></i>

        </div>
        <span class="text-xs leading-3">ACCOUNT</span>
      </a>
    </div>
  </div>
</header>

<nav class="bg-gray-800">
  <div class="containner flex">
    <!-- ALL CATEGORIES -->
    <div class="px-8 py-4 bg-primary text-white cursor-pointer flex items-center relative group">
      <span><i class="fas fa-bars"></i></span>
      <span class="capitalize ml-2">All Categories</span>

      <!-- Categories -->
      <div class="absolute left-0 top-full w-full   bg-white shadow-md py-3 divide-y divide-gray-400 divide-dahsed opacity-0 group-hover:opacity-100 transition duration-700 invisible group-hover:visible">
        <a href="" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
          <img src="<?= URLROOT ?>/public/img/computer.svg" alt="" class="w-4 h-4 object-contain">
          <span class="ml-6 text-sm text-gray-400">Computers</span>
        </a>
        <a href="" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
          <img src="<?= URLROOT ?>/public/img/mobile.svg" alt="" class="w-4 h-4 object-contain">
          <span class="ml-6 text-sm text-gray-400">Mobiles</span>
        </a>
        <a href="" class="flex items-center px-6 py-3 hover:bg-gray-100 transition">
          <img src="<?= URLROOT ?>/public/img/Camera.svg" alt="" class="w-4 h-4 object-contain">
          <span class="ml-6 text-sm text-gray-400">Cameras</span>
        </a>
      </div>
    </div>


    <!-- Nav Links -->
    <div class="flex justify-between items-center flex-grow pl-12">
      <div class="flex items-center space-x-6">
        <a href="" class=" text-white hover:text-gray-400 transition">Home</a>
        <a href="<?= URLROOT ?>/shop" class=" text-white hover:text-gray-400 transition">Shop</a>
        <a href="" class=" text-white hover:text-gray-400 transition">About</a>
        <a href="" class=" text-white hover:text-gray-400 transition">Contact us</a>

      </div>
      <div class="flex items-center space-x-6">
        <a href="<?= URLROOT ?>/clients/login" class=" text-white hover:text-gray-400 transition">Login</a>
        <a href="<?= URLROOT ?>/clients/register" class=" text-white hover:text-gray-400 transition">Register</a>
      </div>

    </div>
  </div>
</nav>