<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class="containner py-4  bg-gray-100">
    <div class="flex items-center gap-3">

        <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
            <i class="fas fa-home"></i>
        </a>

        <span class="text-sm text-gray-400">
            <i class="fas fa-chevron-right"></i>
        </span>
        <p class="text-gray-600 font-medium">Checkout</p>
    </div>

    <div class="grid grid-cols-5 py-5 gap-3">
        <div class="col-span-2">

            <div class="max-w-5xl mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden relative">
                <div class="flex justify-between items-center">
                    <h2 class=" text-2xl font-semibold text-gray-700 mb-2">Shipping Infos</h2>
                    <a href="<?= URLROOT ?>/accounts/editInfos/<?= $_SESSION['client_session'] ?>" class="bg-primary hover:bg-blue-700 transition duration-150 text-white px-3 py-2 rounded-md ">Edit Infos</a>
                </div>


                <div class="my-4 space-x-4">
                    Full Name : <span class="text-gray-500"><?= $data['fullName'] ?></span>
                </div>
                <hr class="my-4">
                <div class="my-4 space-x-4">
                    Phone Number : <span class="text-gray-500"><?= $data['tel'] ?></span>
                </div>
                <hr class="my-4">
                <div class="my-4 space-x-4">
                    Email : <span class="text-gray-500"><?= $data['email'] ?></span>
                </div>
                <hr class="my-4">
                <div class="my-4 space-x-4">
                    Address: <span class="text-gray-500"><?= $data['adress'] ?></span>
                </div>
                <hr class="my-4">
                <div class="my-4 space-x-4">
                    <span>City: <span class="text-gray-500"><?= $data['ville'] ?></span> </span>
                    <span>Zip Code: <span class="text-gray-500"><?= $data['code_postal'] ?></span> </span>

                </div>
                <hr class="my-4">

            </div>
        </div>
        <div class="col-span-3">

            <div class="max-w-5xl mx-auto shadow-lg bg-white rounded-md px-6 py-6 overflow-hidden">
                <h2> Checkout Summary</h2>
                <?php foreach($data['cartItems'] as $item): ?>
                    <div class="flex justify-betweeen items-center my-8">
                        <div class="flex items-center gap-4">
                            <img src="<?= $item->img ?>" alt="" class="w-20 h-20 object-cover">
                            <div class="flex flex-col">
                                <h3 class="text-lg font-semibold text-gray-700"><?= $item->name ?></h3>
                                <span class="text-gray-500"><?= $item->quantity ?> x <?= $item->buyPrice ?> DH</span>
                            </div>
                       
                        </div>
                    </div>
                <?php endforeach; ?>
                <hr class="my-4">
                <div class="flex justify-between items-center my-8">
                    <h3 class="text-lg font-semibold text-gray-700">Total</h3>
                    <span class="text-gray-500"><?= $data['total'] ?> DH</span>
                </div>
                <div class="mt-4">
                    <button class="block w-full text-center bg-primary hover:bg-blue-700 transition duration-150 text-white px-3 py-2 rounded-md " onclick="checkout()" >Checkout</button>
                </div>
            </div>
            
        </div>
    </div>
</div>


<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/scripts.php'; ?>