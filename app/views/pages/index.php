<?php require APPROOT . "/views/inc/header.php"; ?>
<?php require  APPROOT . '/views/inc/navbar.php' ?>
<!-- Banner Section -->
<div class="bg-cover bg-no-repeat bg-center py-36" style='background-image:url("<?php echo URLROOT ?>/public/img/banner.png");'>
    <div class="containner">
        <h1 class="text-5xl text-white font-medium capitalize mb-4">
            best cellection for <br> Electronic devices
        </h1>
        <p class="text-white">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto doloribus ducimus <br> tempore sit dolorem atque nam. Id veritatis temporibus aliquam.
        </p>
        <div class="mt-12">
            <a href="" class="bg-primary border border-primary text-white px-8 py-4 rounded-md hover:bg-transparent hover:text-primary transition duration-700">Shop Now</a>
        </div>
    </div>
</div>

<!-- Features section -->

<div class="containner py-16">
    <div class="w-10/12 grid md:grid-cols-3 gap-6 mx-auto justify-center">
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="<?= URLROOT ?>/public/img/delivery.svg" alt="" class="h-12 w-12 object-cover">
            <div>
                <h4 class="font-medium text-lg capitalize">Free Shipping</h4>
                <p class="text-sm text-gray-700">Order over 500DH</p>
            </div>
        </div>
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="<?= URLROOT ?>/public/img/money-refund.svg" alt="" class="h-12 w-12 object-cover">
            <div>
                <h4 class="font-medium text-lg capitalize">Money refund</h4>
                <p class="text-sm text-gray-700">7 days money returns</p>
            </div>
        </div>
        <div class="border border-primary rounded-sm px-3 py-6 flex justify-center items-center gap-5">
            <img src="<?= URLROOT ?>/public/img/customer-support.svg" alt="" class="h-12 w-12 object-cover">
            <div>
                <h4 class="font-medium text-lg capitalize">24H/7 Support</h4>
                <p class="text-sm text-gray-700">Customer Support</p>
            </div>
        </div>
    </div>

</div>

<!-- Categories section -->

<div class="containner py-16">
    <h2 class="text-3xl text-center font-medium text-gray-800 uppercase mb-6">Shop By Category</h2>

    <div class="grid md:grid-cols-3 gap-3 bg">
        <!-- single category -->
        <?php foreach ($data['categories'] as $category) : ?>
            <div class="relative rounded-md overflow-hidden group max-h-[250px]">
                <img src="<?=  $category->img ?>" class="w-full object-contain" alt="">
                <a href="<?= URLROOT ?>/products/category/<?= $category->id ?>" class="absolute inset-0 bg-black bg-opacity-40 flex justify-center items-center text-white text-xl font-roboto font-medium group-hover:bg-opacity-70  transition duration-700"><?= $category->name ?></a>
            </div>
        <?php endforeach; ?>
        <!-- single Categories end -->

       

    </div>


</div>

<!-- New Arrivals Section -->
<div class="containner py-16 bg-gray-100">
    <h2 class="text-3xl text-center font-medium text-gray-800 uppercase mb-6">Top New Arrivals</h2>
    <!-- Products Grid   -->
    <div class="grid md:grid-cols-4 gap-6">
        <!-- Single Product -->
        <?php foreach($data['products'] as $product) : ?>
            <?php if($product->hidden === 0) :?>

        <div class="bg-white shadow rounded overflow-hidden group">
            <!-- Product img -->
            <div class="relative ">
                <img src="<?= $product->img?>" alt="" class="w-full max-h-[200px] object-contain">
                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-700">
                    <a href="<?=URLROOT?>/shop/single/<?=$product->id?>" class="text-white text-lg w-9 h-9 rounded-full bg-primary flex justify-center items-center  hover:bg-gray-700 transition ">
                        <i class="fas fa-search"></i>
                    </a>
                    <a href="" class="text-white text-lg w-9 h-9 rounded-full bg-primary flex justify-center items-center hover:bg-gray-700 transition ">
                        <i class="far fa-heart"></i>
                    </a>
                </div>

            </div>
            <!-- End product Image -->


            <!-- Product Content -->
            <div class="pt-4 pb-3 px-4">
                <a href="<?=URLROOT?>/shop/single/<?=$product->id?>">
                    <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition"><?=substr($product->name , 0, 30)?></h4>
                </a>
                <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                    <p class="text-xl font-semibold text-primary"><?=$product->buyPrice?> DH</p>
                    <p class="text-sm text-gray-400 line-through"><?=$product->finalPrice?> DH</p>

                </div>

                <button onclick="addToCart(<?=$product->id?>)" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                    <i class="fas fa-shopping-bag mr-2"></i>
                    Add to cart
                </button>
            </div>
            <!-- End Product Content -->

        </div>
        <?php endif; ?>
        <?php endforeach; ?>
        <!-- End Single Product -->

        
    </div>
</div>



<?php require APPROOT . "/views/inc/footer.php"; ?>
<?php require APPROOT . "/views/inc/scripts.php"; ?>