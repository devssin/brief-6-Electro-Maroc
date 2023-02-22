<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="grid grid-cols-5 h-screen max-h-screen ">

    <?php require APPROOT . '/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4">
        <div class="my-5 "><?php flash('category_success') ?></div>
        <div class="flex justify-between items-center p-4">
            <h4 class="text-gray-500 text-lg">Total Orders : <?= count($data['orders']) ?></h4>
            <?php flash('order_success')?>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Client Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Products
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Creation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Sent
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Delivery
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['orders'] as $order) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $order->id ?>
                            </th>
                            <td class="px-6 py-4 ">
                                <?= $order->fullName ?>
                                <i class="fas fa-eye text-primary text-lg hover:text-blue-800 transition duration-150 mr-10 cursor-pointer" title="see client details" onclick="getClientDetails(<?= $order->id_client ?>)"></i>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->totalProducts ?>
                                <i class="fas fa-eye text-primary text-lg hover:text-blue-800 transition duration-150 mr-10 cursor-pointer" title="see products" onclick="getProducts(<?=$order->id?>)" ></i>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->creation_date ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->sent_date ? $order->sent_date : 'Not yet' ?>
                            <td class="px-6 py-4">
                                <?= $order->delivery_date ? $order->delivery_date : 'Not yet' ?> </td>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-xs text-center px-2 py-1 rounded-lg <?php
                                                                                        switch ($order->state) {
                                                                                            case 'On Hold':
                                                                                                echo 'bg-yellow-200 text-yellow-800';
                                                                                                break;
                                                                                            case 'Confirmed':
                                                                                                echo 'bg-blue-200 text-blue-800';
                                                                                                break;
                                                                                            case 'Delivered':
                                                                                                echo 'bg-green-200 text-green-800';
                                                                                                break;
                                                                                            case 'Canceled':
                                                                                                echo 'bg-red-200 text-red-800';
                                                                                                break;
                                                                                        }
                                                                                        ?>"><?= $order->state ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <?= $order->totalPrice ?> DH
                            </td>
                            <td class="px-6 py-4 space-x-3">
                                <a href="<?=URLROOT?>/orders/confirmeOrder/<?=$order->id?>" class="font-medium text-green-600 hover:text-green-800 transition duration-150" title="Confirm"><i class="fas fa-check-circle"></i></a>
                                <a href="<?=URLROOT?>/orders/deliverOrder/<?=$order->id?>" class="font-medium text-blue-600 hover:text-blue-800 transition duration-150" title="Delivered"><i class="fas fa-truck"></i></a>
                                <a href="<?=URLROOT?>/orders/cancelOrder/<?=$order->id?>" class="font-medium text-red-600 hover:text-red-800 transition duration-150" title="Cancel"><i class="fas fa-ban"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>

    <?php require APPROOT . '/views/inc/scripts.php'; ?>