<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="containner py-4 flex items-center gap-3">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Account</p>
</div>

<div class="absolute bottom-5 right-5 z-50">
    <?php flash('cart_message') ?>
</div>

<div class=" relative containner grid md:grid-cols-12 items-start pt-6 pb-16 gap-6 bg-gray-100">



    <!-- Side Bar -->
    <?php require APPROOT . "/views/inc/account_sidebar.php" ?>
    <!-- Side Bar End-->


    <!-- Profile Infos -->
    <div class="col-span-9 grid md:grid-cols-3 gap-4">
        <div class="col-span-2 space-y-5">
            <?php 
                if(count($data['cart_items']) == 0){
                    echo "<h3 class='text-2xl font-semibold text-red-800 '>Your cart is empty</h3>";
                }else{
                    echo "<h3 class='text-2xl font-semibold text-gray-800 '>Your cart</h3>";
                }
            
            ?>
            <?php foreach ($data['cart_items'] as $item) : ?>
                <div class="bg-white p-5 rounded-md flex justify-between shadow-lg items-center gap-3 relative ">
                    <div class="">
                        <img src="<?= $item->img ?>" alt="" class="w-20 h-20 rounded-full">

                    </div>
                    <div class="">
                        <h3 class="text-gray-500 text-center text-sm"><?= $item->name ?></h3>
                        <p class="text-gray-500 text-center text-sm"><?= $item->buyPrice ?> DH</p>
                    </div>

                    <div class=" flex justify-center items-center space-x-3">
                        <button class="w-5 h-5 rounded-full bg-green-600 flex justify-center items-center text-white" onclick="decreaseQuantity(<?=$item->id_product?>)" > <i class="fas fa-minus"></i> </button>
                        <p class="text-gray-500 text-center text-sm" id="qte<?=$item->id_product?>" > <?= $item->quantity ?> </p>
                        <button class="w-5 h-5 rounded-full bg-green-600 flex justify-center items-center text-white" onclick="increaseQuantity(<?=$item->id_product?>)" > <i class="fas fa-plus"></i> </button>
                    </div>
                    <a  href="<?=URLROOT?>/carts/delete/<?=$item->id_product?>" class="w-5 h-5 rounded-full bg-red-600 flex justify-center items-center absolute right-3 top-2 text-white"> <i class="fas fa-times"></i></a>
                </div>
            <?php endforeach; ?>


        </div>

        <div class="col-span-1">
            <div class="bg-white p-4 rounded-md space-y-4 shadow-lg">
                <h3 class="text-2xl font-semibold text-gray-800 ">Cart Summary</h3>
                <div class="flex justify-between items-center">
                    <p class="text-gray-600 text-lg">Subtotal:</p>
                    <p class="text-primary font-bold" id="totalPrice" > <?= empty($data['total'] ) ? '0' : $data['total']?> DH</p>
                </div>
                <a href="<?=URLROOT?>/orders/checkout" class="block w-full rounded-md px-4 py-2 text-white text-lg bg-primary hover:bg-blue-800 transition duration-200 text-center"> Proced to checkout</a>
            </div>
        </div>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/scripts.php'; ?>