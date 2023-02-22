<?php require APPROOT . "/views/inc/header.php" ?>
<?php require  APPROOT . '/views/inc/navbar.php' ?>

<!-- linktree -->
<div class="containner py-4 flex items-center gap-3">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Shop</p>
    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Single product</p>

</div>

<div class="containner grid md:grid-cols-2 gap-6 py-20">
    <div class="">
        <img src="<?= $data->img ?>" alt="" style="width: 400px; height:400px;" class="border-primary">
    </div>
    <div>
        <h3 class="text-3xl text-gray-700 font-semibold uppercase mb-2"><?=$data->name?></h3>
        <div class="flex items-center mb-4">
            <div class="flex gap-1 items-center text-sm text-yellow-400">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>

            <p class="text-xs text-gray-300 ml-4">(20 Reviews)</p>
        </div>
        <div class="flex items-center gap-4 mb-3">
            <h2 class="text-md font-medium text-gray-800">Availability :</h2>
            <p class="text-sm text-green-600 ">In stock</p>
        </div>
        <div class="flex items-center gap-4 mb-3">
            <h2 class="text-md font-medium text-gray-800">Category :</h2>
            <p class="text-sm text-gray-600 "><?=$data->category?></p>
        </div>
        <div class="flex items-center gap-4 mb-3">
            <h2 class="text-md font-medium text-gray-800">Code Bare :</h2>
            <p class="text-sm text-gray-600 "><?=$data->code_bar?></p>
        </div>
        <div class="flex items-center gap-4 mb-3">

            <h2 class="text-md font-medium text-gray-800">Price :</h2>

            <p class="text-md font-semibold text-primary"><?=$data->offrePrice?> DH</p>
            <p class="text-sm text-gray-600  line-through"><?=$data->finalPrice?> DH</p>
        </div>
        <p class="text-sm text-gray-500">
            <?=$data->description?>
        </p>

        <div class="pt-4">
            <h2 class="text-md font-medium text-gray-800">Quantity :</h2>
            <div class="flex border border-gray-300 divide-x divide-gray-400 w-max">
                <div class="flex justify-center items-center h-10 w-10 cursor-pointer hover:text-primary hover:scale-130 transition duration-500">+</div>
                <div class="flex justify-center items-center h-10 w-10">1</div>
                <div class="flex justify-center items-center h-10 w-10">-</div>
            </div>
        </div>
        <div class="pt-4 flex items-center gap-6">
            <button onclick="addToCart(<?=$data->id?>)" class="text-center text-white bg-primary border border-primary px-5 py-3 hover:bg-transparent hover:border-primary hover:text-primary transition rounded-b">
                <i class="fas fa-shopping-bag mr-2"></i>
                Add to cart
            </button>
            
        </div>
    </div>
</div>


<!-- linktree end-->

<?php require APPROOT . "/views/inc/footer.php" ?>
<?php require APPROOT . "/views/inc/scripts.php" ?>