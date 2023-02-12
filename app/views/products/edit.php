<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="grid grid-cols-5 h-screen max-h-screen ">

    <?php require APPROOT . '/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4 bg-gray-100 pt-10">
        <div class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
            <div class="">
                <?php flash('errors'); ?>

            </div>
            <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Edit Product </h2>
            <p class="text-gray-400 text-sm text-center mb-2"><?=$data['name']?></p>
            <img src="<?=$data['image']?>" alt="" class="w-10 h-10 rounded-full mx-auto">

            <form action="<?= URLROOT?>/products/edit/<?=$data['id']?>" method="post" enctype="multipart/form-data">
                <div class="pt-4 grid grid-cols-2 gap-2">
                    <div>
                        <label for="email" class="text-sm text-gray-600 block ">Product Name</label>
                        <input type="text" name="name" placeholder="Product Name" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['name']?>">
                    </div>
                    <div>
                        <label for="code_bar" class="text-sm text-gray-600 block ">Code Bar</label>
                        <input type="text" name="code_bar" placeholder="Product Code Bar" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['code_bar']?>">
                        
                    </div>
                </div>
                <div class="pt-4">
                    <label for="image" class="text-sm text-gray-600 block ">Product Image</label>
                    <input type="file" name="image" placeholder="Image" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0">       
                </div>
                <div class="pt-4">
                    <label for="description" class="text-sm text-gray-600 block ">Product Description</label>
                    <textarea name="description" id="" cols="20" rows="3" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0">
                        <?=$data['description']?>
                    </textarea>
                    
                </div>
                <div class="pt-4 grid grid-cols-3 gap-2">
                    <div>
                        <label for="buyPrice" class="text-sm text-gray-600 block ">Buy Price</label>
                        <input type="number" name="buyPrice" placeholder="Buy Price" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['buyPrice']?>">
                        
                    </div>
                    <div>
                        <label for="offrePrice" class="text-sm text-gray-600 block ">Offre Price</label>
                        <input type="number" name="offrePrice" placeholder="Offre Price" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['offrePrice']?>">
                       
                    </div>
                    <div>
                        <label for="" class="text-sm text-gray-600 block ">Final Price</label>
                        <input type="number" name="finalPrice" placeholder="Final Price" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['finalPrice']?>">
                       
                    </div>
                </div>
                <div class="pt-4 grid grid-cols-2 gap-2">
                    <div>
                        <label for="" class="text-sm text-gray-600 block ">Quantity</label>
                        <input type="number" name="quantity" placeholder="Quantity" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?=$data['quantity']?>">
                       
                    </div>
                    <div>
                        <label for="category" class="text-sm text-gray-600 block ">Category</label>
                        <select name="category" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0">
                            <option value="0">Category</option>
                            <?php foreach ($data['categories'] as $category) : ?>
                              

                                <option value="<?= $category->id ?>" selected ="<?= $category->id === $data['category'] ? 'selected' : ''?>"><?= $category->name ?></option>

                            <?php endforeach; ?>
                            
                        </select>
                        
                    </div>
                </div>
                <div class="pt-4">
                    <button type="input" class="block w-full text-center bg-primary py-2 text-white  hover:bg-sec   transition duration-300  rounded"> Login</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php require APPROOT . '/views/inc/scripts.php'; ?>