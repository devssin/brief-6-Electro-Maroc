<?php require APPROOT . "/views/inc/header.php" ?>



<!-- linktree -->
<div class="containner py-4 flex items-center gap-3">
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
<div class="containner grid md:grid-cols-4 gap-6 pt-4 pb-12 items-start">
    <!-- Side Bar  -->
    <div class="col-span-1 px-4 py-6 shadow rounded overflow-hidden">
        <div class="divide-y divide-gray-200 space-y-5">
            <!-- Catergories filter -->
            <div class="pt-3">
                <h3 class="text-gray-800 text-xl font-medium uppercase mb-3">Categories</h3>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="cat-1" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="cat-1" class="text-gray-600 ml-3 cursor-pointer">Computers</label>
                    <div class="ml-auto text-gray-600 text-sm">(60)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="cat-2" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="cat-2" class="text-gray-600 ml-3 cursor-pointer">Phones</label>
                    <div class="ml-auto text-gray-600 text-sm">(40)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="cat-3" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="cat-3" class="text-gray-600 ml-3 cursor-pointer">Accessoirs</label>
                    <div class="ml-auto text-gray-600 text-sm">(50)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="cat-4" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="cat-4" class="text-gray-600 ml-3 cursor-pointer">Cameras</label>
                    <div class="ml-auto text-gray-600 text-sm">(10)</div>

                </div>
            </div>
            <!-- Brands  filter -->

            <div class="pt-3">
                <h3 class="text-gray-800 text-xl font-medium uppercase mb-3">Brands</h3>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="br-1" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="br-1" class="text-gray-600 ml-3 cursor-pointer">iPhone</label>
                    <div class="ml-auto text-gray-600 text-sm">(60)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="br-2" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="br-2" class="text-gray-600 ml-3 cursor-pointer">Samsung</label>
                    <div class="ml-auto text-gray-600 text-sm">(40)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="br-3" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="br-3" class="text-gray-600 ml-3 cursor-pointer">Sony</label>
                    <div class="ml-auto text-gray-600 text-sm">(50)</div>

                </div>
                <div class="flex items-center mb-2">
                    <input type="checkbox" name="category" id="br-4" class="text-primary focus:ring-0 cursor-pointer rounded-sm">
                    <label for="br-4" class="text-gray-600 ml-3 cursor-pointer">Canon</label>
                    <div class="ml-auto text-gray-600 text-sm">(10)</div>

                </div>
            </div>

            <!-- price filter -->
            <div class="pt-3">
                <h3 class="text-gray-800 text-xl font-medium uppercase mb-3">Price</h3>
                <div class="mt-2 flex items-center gap-3">
                    <input type="text" class="w-full border-gray-400 focus:border-primary focus:ring-0 px-3 py-2 text-sm text-gray-600" placeholder="min">
                    <input type="text" class="w-full border-gray-400 focus:border-primary focus:ring-0 px-3 py-2 text-sm text-gray-600" placeholder="max">
                </div>
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
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- Product img -->
                <div class="relative ">
                    <img src="<?= URLROOT ?>/public/img/macbook.jfif" alt="" class="w-full max-h-[200px] object-contain">
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
                    <a href="">
                        <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition">Mac Book Pro</h4>
                    </a>
                    <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                        <p class="text-xl font-semibold text-primary">10000.00 DH</p>
                        <p class="text-sm text-gray-400 line-through">12000.00 DH</p>

                    </div>

                    <a href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Add to cart
                    </a>
                </div>
                <!-- End Product Content -->

            </div>
            <!-- End Single Product -->

            <!-- Single Product -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- Product img -->
                <div class="relative ">
                    <img src="<?= URLROOT ?>/public/img/iphone-14.jfif" alt="" class="w-full max-h-[200px] object-contain">
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
                    <a href="">
                        <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition">iPhone 14 Pro</h4>
                    </a>
                    <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                        <p class="text-xl font-semibold text-primary">13000.00 DH</p>
                        <p class="text-sm text-gray-400 line-through">15000.00 DH</p>

                    </div>

                    <a href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Add to cart
                    </a>
                </div>
                <!-- End Product Content -->

            </div>
            <!-- End Single Product -->

            <!-- Single Product -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- Product img -->
                <div class="relative ">
                    <img src="<?= URLROOT ?>/public/img/canon.jfif" alt="" class="w-full max-h-[200px] object-contain">
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
                    <a href="">
                        <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition">Canon Eos 4000d</h4>
                    </a>
                    <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                        <p class="text-xl font-semibold text-primary">8000.00 DH</p>
                        <p class="text-sm text-gray-400 line-through">10000.00 DH</p>

                    </div>

                    <a href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Add to cart
                    </a>
                </div>
                <!-- End Product Content -->

            </div>
            <!-- End Single Product -->

            <!-- Single Product -->
            <div class="bg-white shadow rounded overflow-hidden group">
                <!-- Product img -->
                <div class="relative ">
                    <img src="<?= URLROOT ?>/public/img/ps5.jpg" alt="" class="w-full max-h-[200px] object-contain">
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
                    <a href="">
                        <h4 class=" mb-2 text-xl font-medium text-slate-700 hover:text-primary transition">Playstation 5</h4>
                    </a>
                    <div class="flex  items-baseline space-x-2 font-roboto mb-2">
                        <p class="text-xl font-semibold text-primary">5000.00 DH</p>
                        <p class="text-sm text-gray-400 line-through">7500.00 DH</p>

                    </div>

                    <a href="" class="block w-full text-center text-white bg-primary border-primary py-2 hover:bg-transparent hover:text-primary transition rounded-b">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        Add to cart
                    </a>
                </div>
                <!-- End Product Content -->

            </div>
            <!-- End Single Product -->


        </div>
    </div>
</div>

    <!-- Shop wrapper end -->

    <?php require APPROOT . '/views/inc/footer.php' ?>