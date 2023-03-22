<?php require APPROOT . '/views/inc/header.php' ?>

<div class="containner bg-gray-200 py-10 min-h-screen relative">
    <a href="<?=URLROOT?>/accounts/orders" class="text-gray-700 text-lg absolute top-6 left-6"> Go Back</a>
    <div class="max-w-2xl bg-white mx-auto p-5 rounded-lg shadow-md">
        <a href="<?= URLROOT ?>">
            <h2 class="font-black text-center">ELECTRO <span class="font-poppins text-primary">MAROC</span></h2>

        </a>
        <h3 class="text-gray-700 text-center font-bold my-5">Bill Number <?= $data['commande']->id ?></h3>
        <hr>
        <div class="flex justify-between items-center my-6">
            <div class="space-y-4">
                <p class="text-gray-500 font-bold"> Full Name: <span class="text-gray-700"><?= $data['commande']->fullName ?></span> </p>
                <p class="text-gray-500 font-bold"> Phone Number: <span class="text-gray-700"><?= $data['commande']->phone ?></span> </p>
                <p class="text-gray-500 font-bold"> Date Creation: <span class="text-gray-700"><?= $data['commande']->creation_date ?></span> </p>
            </div>
            <div class="space-y-4">
                <p class="text-gray-500 font-bold"> Adress: <span class="text-gray-700"><?= $data['commande']->adress ?></span> </p>
                <p class="text-gray-500 font-bold"> City: <span class="text-gray-700"><?= $data['commande']->city ?></span> </p>
                <p class="text-gray-500 font-bold"> Zip Code: <span class="text-gray-700"><?= $data['commande']->code_postal ?></span> </p>

            </div>



        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-md">
                <thead class="text-xs text-white uppercase bg-primary">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Qty
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($data['products'] as $product):?>
                    <tr class="bg-gray-50 hover:bg-gray-100 border-b border-black">
                        <th scope="row" class="px-6 py-4 text-xs font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?=$product->name?>
                        </th>
                        <td class="px-6 py-4">
                            <?=$product->qte?>
                        </td>
                        <td class="px-6 py-4">
                            <?=$product->buyPrice?> DH
                        </td>
                    </tr>
                    <?php endforeach ;?>
                    
                </tbody>
                <tfoot>
                    <tr class="font-semibold text-gray-900 bg-gray-200">
                        <th scope="row" class="px-6 py-3 text-base">Total</th>
                        <td class="px-6 py-3"></td>
                        <td class="px-6 py-3"><?=$data['totalPrice']?> DH</td>
                    </tr>
                </tfoot>
            </table>

        </div>

    </div>
</div>
</div>

<?php require APPROOT . '/views/inc/scripts.php' ?>