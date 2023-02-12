<?php require APPROOT . "/views/inc/header.php" ?>
<?php require  APPROOT . '/views/inc/navbar.php' ?>
<!-- linktree end-->
<div class="containner py-4 flex items-center gap-3">
    <a href="<?= URLROOT ?>/pages" class="text-primary text-base">
        <i class="fas fa-home"></i>
    </a>

    <span class="text-sm text-gray-400">
        <i class="fas fa-chevron-right"></i>
    </span>
    <p class="text-gray-600 font-medium">Account</p>
</div>
<!-- linktree end-->

<!-- Account wrapper -->
<div class=" relative containner grid md:grid-cols-12 items-start pt-6 pb-16 gap-6 bg-gray-100">

    <!-- Side Bar -->
        <?php require APPROOT . "/views/inc/account_sidebar.php" ?>
    <!-- Side Bar End-->


    <!-- Profile Infos -->
    <div class="col-span-9 grid md:grid-cols-3 gap-4">
        <!-- Single Card -->
        <div class="shadow rounded bg-white p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-800 ">Personal Infos</h3>
                <a href="" class="text-sm font-light text-primary underline">Edit</a>
            </div>
            <div class="space-y-2 mt-4">
                <p class="text-sm text-gray-600">Yassine AAYNE ALHAYATE</p>
                <p class="text-sm text-gray-600">06 04 99 73 39</p>
                <p class="text-sm text-gray-600">yassin.aaynealhayate@gmail.com</p>
            </div>
        </div>

        <!-- Single Card -->
        <div class="shadow rounded bg-white p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-800 ">Adress Infos</h3>
                <a href="" class="text-sm font-light text-primary underline">Edit</a>
            </div>
            <div class="space-y-2 mt-4">
                <p class="text-sm text-gray-600">08 Strees X New York</p>
                <p class="text-sm text-gray-600">New York City </p>
                <p class="text-sm text-gray-600">Unated State</p>
            </div>
        </div>
    </div>
    <!-- Profile Infos End -->

</div>
<!-- Account wrapper end-->

<?php require APPROOT . "/views/inc/footer.php" ?>
<?php require APPROOT ."/views/inc/scripts.php"?>