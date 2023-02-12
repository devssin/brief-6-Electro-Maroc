<?php require APPROOT . "/views/inc/header.php" ?>
<?php require  APPROOT . '/views/inc/navbar.php' ?>


<!-- linktree -->
<div class="containner py-4 flex items-center gap-3 bg-gray-100">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Shop</p>
</div>
<!-- linktree end-->

<!-- Shop wrapper  -->
<div class="containner grid md:grid-cols-4 gap-6 pt-4 pb-12 items-start bg-gray-100">
    <!-- Side Bar  -->
    <div class="col-span-1 px-4 py-6 shadow rounded overflow-hidden bg-white">
        <div class="divide-y divide-gray-200 space-y-5">
            <!-- Catergories filter -->
            <div class="pt-3">
                <h3 class="text-gray-800 text-xl font-medium uppercase mb-3">Categories</h3>
                <?php  foreach($data['categories'] as $category) :?>
                <div class="flex items-center mb-2">
                    <input type="radio" name="category"  class="text-red-100 focus:ring-0 cursor-pointer rounded-full" value="">
                    <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer"><?=$category->name?></label>

                </div>
               <?php endforeach?>
            </div>
        </div>
    </div>
    <!-- Side Bar end -->

    <div class="col-span-3">
        <!-- Sorting -->
        <div class="">
            <select name="sorting" id="sort" class="w-44 text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary ">
                <option value="">Default Sorting</option>
                <option value="">Price Hight - Low</option>
                <option value="">Price Low - High</option>
                <option value="">Latest Products</option>
            </select>
        </div>
        <!-- Sorting end -->

        <div class="grid md:grid-cols-3 gap-6 mt-4">
            <!-- Single Product -->
            <?php foreach($data['products'] as $product) :?>
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- Product img -->
                <div class="relative ">
                    <img src="<?= $product->img ?>" alt="" class="w-full max-h-[200px] object-contain">
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition duration-700">
                        <a href="" class="text-white text-lg w-9 h-9 rounded-full bg-primary flex justify-center items-center  hover:bg-gray-700 transition ">
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
                        <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition"><?= substr($product->name, 0, 30)?> ...</h4>
                    </a>
                    <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                        <p class="text-xl font-semibold text-primary"><?=$product->offrePrice?> DH</p>
                        <p class="text-sm text-gray-400 line-through"><?=$product->finalPrice?> DH</p>

                    </div>

                    <a href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Add to cart
                    </a>
                </div>
                <!-- End Product Content -->

            </div>
            <!-- End Single Product -->
            <?php endforeach?>

        </div>
    </div>
</div>

    <!-- Shop wrapper end -->

    <?php require APPROOT . '/views/inc/footer.php' ?>