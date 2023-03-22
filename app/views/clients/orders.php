<?php require APPROOT . "/views/inc/header.php" ?>
<?php require APPROOT . "/views/inc/navbar.php" ?>

<div class="containner py-4 flex items-center gap-3">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Account</p>
</div>

<div class=" relative containner grid md:grid-cols-12 items-start pt-6 pb-16 gap-6 bg-gray-100">



    <!-- Side Bar -->
    <?php require APPROOT . "/views/inc/account_sidebar.php" ?>
    <!-- Side Bar End-->

    <div class="col-span-9">
        <div class="flex justify-between items-center">
            <h2 class="my-4 text-lg font-black">My Orders</h2>
            <?php flash('order_success');?>
            <?php flash('order_errors');?>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
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
                            Date Delivered
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
                                <?= $order->totalProducts ?>
                                <i class="fas fa-eye text-primary text-lg hover:text-blue-800 transition duration-150 mr-10 cursor-pointer" title="see products" onclick="getProducts(<?= $order->id ?>)"></i>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->creation_date ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->sent_date ? $order->sent_date : 'Not yet' ?>
                            </td>
                            <td class="px-6 py-4 ">
                                <?= $order->delivery_date ? $order->delivery_date : 'Not yet' ?> </td>
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
                                                                                                echo 'bg-red-400 text-red-800';
                                                                                                break;
                                                                                        }
                                                                                        ?>"><?= $order->state ?></div>
                            </td>
                            <td class="px-6 py-4">
                                <?= $order->totalPrice ?> DH
                            </td>
                            <td class="px-6 py-4">
                                <a href="<?= URLROOT ?>/accounts/cancelOrder/<?= $order->id ?>" class="font-medium text-red-600 hover:text-red-800 transition duration-150" title="Cancel"><i class="fas fa-ban"></i></a>
                                <a href="<?= URLROOT ?>/orders/bill/<?= $order->id ?>" class="font-medium text-primary hover:text-blue-700 transition duration-150" title="See Bill"><i class="fas fa-file-invoice ml-3"></i></a>
                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>
</div>

<?php require APPROOT . "/views/inc/footer.php" ?>
<?php require APPROOT . "/views/inc/scripts.php" ?>