<?php require APPROOT . "/views/inc/header.php" ?>

<div class="grid grid-cols-5 h-screen max-h-screen ">

    <?php require APPROOT . '/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4 py-8">
        <div class="my-5 "><?php flash('login_success') ?></div>
        <div class="my-5 "><?php flash('product_success') ?></div>
        <div class="flex justify-between items-center p-4">
            <h4 class="text-gray-500 text-lg">Total Products : <?= count($data['products']) ?></h4>
            <a href="<?= URLROOT ?>/products/add" class="px-4 py-3 bg-primary text-white rounded-md">Add Product</a>
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
                        <tr class=" 
                            <?= $product->qte < 10 ? 'bg-red-100 dark:bg-red-700' : 'bg-white hover:bg-gray-50' ?>
                        border-b ">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" title="<?= $product->name ?>">
                                <?php
                                if ($product->qte < 10) :
                                ?>
                                    <span class="text-red-500 text-lg mr-2" title="Stock is Low"><i class="fas fa-exclamation-triangle"></i></span>
                                <?php endif; ?>

                                <?= substr($product->name, 0, 10) ?> ...
                            </th>
                            <td class="px-6 py-4">
                                <img src="<?= $product->img ?>" alt="" class="w-10 h-10">
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->code_bar ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->buyPrice ?> DH
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->finalPrice ?> DH
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->offrePrice ?> DH
                            </td>
                            <td class="px-6 py-4 <?= $product->qte < 10 ? 'text-red-500' : '' ?>">
                                <?= $product->qte ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $product->category ?>
                            </td>
                            <td class="px-6 py-4 flex justify-center space-x-3">
                                <a href="<?= URLROOT ?>/products/edit/<?= $product->id ?>" class="text-blue-600 text-lg hover:text-blue-800 transition duration-200" title="Edit"><i class="far fa-edit"></i></a>
                                <a href="<?= URLROOT ?>/products/delete/<?= $product->id ?>" class="text-red-500 text-lg hover:text-red-800 transition duration-200" title="Delete"><i class="fas fa-trash"></i></a>
                                <?php
                                if ($product->hidden == 0) :
                                ?>
                                    <a href="<?= URLROOT ?>/products/hide/<?= $product->id ?>" class="text-yellow-500 text-lg hover:text-yellow-800 transition duration-200" title="hide"> <i class="fas fa-eye-slash"></i></a>
                                <?php else : ?>
                                    <a href="<?= URLROOT ?>/products/unhide/<?= $product->id ?>" class="text-yellow-500 text-lg hover:text-yellow-800 transition duration-200" title="unhide"> <i class="fas fa-eye"></i></a>

                                <?php endif; ?>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>


    </div>
</div>
<?php require APPROOT . "/views/inc/scripts.php" ?>