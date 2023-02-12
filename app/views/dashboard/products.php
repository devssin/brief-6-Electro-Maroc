<?php require APPROOT . "/views/inc/header.php" ?>

<div class="grid grid-cols-5 h-screen max-h-screen ">
    
    <?php require APPROOT .'/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4 py-8">
        <div class="my-5 "><?php flash('login_success') ?></div>
        <div class="my-5 "><?php flash('product_success') ?></div>
        <div class="flex justify-between items-center p-4">
            <h4 class="text-gray-500 text-lg">Total Products : <?=count($data['products'])?></h4>
            <a href="<?=URLROOT?>/products/add" class="px-4 py-3 bg-primary text-white rounded-md">Add Product</a>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Code Bar
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Buy Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Offre Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Final Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['products'] as $product) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= substr($product->name, 0, 20) ?> ...
                            </th>
                            <td class="px-6 py-4">
                                <img src="<?= $product->img ?>" alt="" class="w-10 h-10">
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->code_bar ?>
                            </td>
                            <td class="px-6 py-4">
                                <?=$product->buyPrice?> DH
                            </td>
                            <td class="px-6 py-4">
                                <?=$product->finalPrice?> DH
                            </td>
                            <td class="px-6 py-4">
                                <?=$product->offrePrice?> DH
                            </td>
                            <td class="px-6 py-4">
                                <?=$product->qte?>
                            </td>
                            <td class="px-6 py-4">
                                <?=$product->category?>
                            </td>
                            <td class="px-6 py-4 flex justify-center space-x-3">
                                <a href="<?=URLROOT?>/products/edit/<?=$product->id?>" class="text-blue-600 text-lg hover:text-blue-800 transition duration-200"><i class="far fa-edit"></i></a>
                                <a href="<?=URLROOT?>/products/delete/<?=$product->id?>" class="text-red-500 text-lg hover:text-red-800 transition duration-200"><i class="fas fa-trash"></i></a>
                            </td>

                           
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php require APPROOT . "/views/inc/scripts.php" ?>