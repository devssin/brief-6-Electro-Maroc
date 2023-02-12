<div class=" relative col-span-1 bg-gray-700 py-10 text-center overflow-y-hidden">
    <h1 class="text-xl font-bold text-white">Welcome <span class="font-black"><?= ucwords($_SESSION['admin_session']) ?></span></h1>
    <div class="space-y-4 my-10">
        <a href="<?=URLROOT?>/dashboard/products" class="block w-full hover:bg-gray-900 py-3  text-white hover:text-primary transition duration-100">
            <h6 class="text-md font-medium">
                <i class="fas fa-box mr-2"></i> Products
            </h6>
        </a>
        <a href="<?=URLROOT?>/dashboard/categories" class="block w-full hover:bg-gray-900 py-3  text-white hover:text-primary transition duration-100">
            <h6 class="text-md font-medium">
                <i class="fas fa-tags mr-2"></i> Categories
            </h6>
        </a>
        <a href="" class="block w-full hover:bg-gray-900 py-3  text-white hover:text-primary transition duration-100">
            <h6 class="text-md font-medium">
                <i class="fas fa-money-check mr-2"></i> Orders
            </h6>
        </a>
        <a href="<?= URLROOT ?>/admins/logout" class="block w-full hover:bg-gray-900 py-3  text-white hover:text-primary transition duration-100">
            <h6 class="text-md font-medium">
                <i class="fas fa-sign-out mr-2"></i> Logout
            </h6>
        </a>
    </div>
    <a href="<?= URLROOT ?>/pages" class="text-center absolute bottom-5 inset-x-0 ">
        <h2 class="font-black text-xl text-white">ELECTRO <span class="font-poppins text-primary">MAROC</span></h2>
    </a>
</div>