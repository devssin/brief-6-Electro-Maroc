<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="grid grid-cols-5 h-screen max-h-screen ">

    <?php require APPROOT . '/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4">
    <div class="my-5 "><?php flash('category_success') ?></div>
        <div class="flex justify-between items-center p-4">
            <h4 class="text-gray-500 text-lg">Total Cetegories : <?= count($data['categories']) ?></h4>
            <a href="<?=URLROOT?>/categories/add" class="px-4 py-3 bg-primary text-white rounded-md">Add Category</a>
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
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['categories'] as $category) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= substr($category->name, 0, 20) ?> ...
                            </th>
                            <td class="px-6 py-4">
                                <img src="<?= $category->img ?>" alt="" class="w-10 h-10">
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= substr($category->description, 0, 50) ?> ...
                            </th>
                            <td class="px-6 py-4">
                                <a href="<?=URLROOT?>/categories/edit/<?=$category->id?>" class="text-blue-600 text-lg hover:text-blue-800 transition duration-200"><i class="far fa-edit"></i></a>
                                <a href="<?=URLROOT?>/categories/delete/<?=$category->id?>" class="text-red-500 text-lg hover:text-red-800 transition duration-200"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <?php require APPROOT . '/views/inc/scripts.php'; ?>