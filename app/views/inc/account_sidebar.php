<div class="  md:col-span-3 col-span-12 transistion">
    <!-- Account Profile  -->
    <div class="flex items-center gap-4 px-4 py-3 shadow bg-white rounded-lg">
        <div class="flex-shrink-0">
            <img src="<?= URLROOT ?>/public/img/avatar.png" alt="avatar" class="w-14 h-14 rounded-full border border-primary">
        </div>
        <div class="flex-grow">
            <p class="text-sm text-gray-500 font-italic">Welcome</p>
            <h4 class="text-lg text-gray-700 font-medium"><?=$_SESSION['client_username']?></h4>
        </div>
    </div>
    <!-- Account Profile End -->

    <!-- Profile Links -->
    <div class="mt-4 bg-white p-4 rounded-lg shadow-lg divide-y divide-gray-300 space-y-4 text-gray-800">
        <div class="space-y-1 pl-8">
            <a href="<?=URLROOT?>/accounts/editInfos/<?=$_SESSION['client_session']?>" class="relative text-primary block font-medium uppercase transistion">
                <span class="absolute -left-8 top-0">
                    <i class="far fa-address-card"></i>

                </span>
                Manage Account
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                Profile Infos
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                Manage Adress
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                Manage Password
            </a>

        </div>
        <div class="space-y-1 pl-8">
            <a href="<?=URLROOT?>/accounts/orders" class="relative text-primary block font-medium uppercase transistion">
                <span class="absolute -left-8 top-0">
                    <i class="far fa-address-card"></i>

                </span>
                Orders History
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                My Orders
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                Bought items
            </a>
            <a href="" class="relative text-sm hover:text-primary block font-medium uppercase transistion">
                My Cancelations
            </a>


        </div>
        <div class="space-y-1 pl-8">
            <a href="" class=" my-4 relative text-sm hover:text-primary block font-medium uppercase transistion">
                <span class="absolute -left-8 top-0">
                    <i class="far fa-heart"></i>

                </span>
                Wishlist
            </a>
        </div>
        <div class="space-y-1 pl-8">
            <a href="<?=URLROOT?>/clients/logout" class=" mt-4 mb-2 relative text-sm hover:text-primary block font-medium uppercase transistion">
                <span class="absolute -left-8 top-0">
                    <i class="fas fa-sign-out"></i>

                </span>
                Logout
            </a>
        </div>
    </div>
    <!-- Profile Links End -->
</div>
