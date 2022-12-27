<?php require APPROOT . "/views/inc/header.php" ?>
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
<div class="containner grid grid-cols-12 items-start pt-6 pb-16 gap-6 ">
    <!-- Side Bar -->
    <div class="col-span-3">
        <!-- Account Profile  -->
        <div class="flex items-center gap-4 px-4 py-3 shadow">
            <div class="flex-shrink-0">
                <img src="<?=URLROOT?>/public/img/avatar.png" alt="avatar" class="w-14 h-14 rounded-full border border-primary">
            </div>
            <div class="flex-grow">
                <p class="text-sm text-gray-500 font-italic">Welcome</p>
                <h4 class="text-lg text-gray-700 font-medium">Nissay</h4>
            </div>
        </div>
        <!-- Account Profile End -->
    </div>
    <!-- Side Bar End -->

    <!-- Profile Infos -->
    <div class="col-span-9">

    </div>
    <!-- Profile Infos End -->

</div>
<!-- Account wrapper end-->

<?php require APPROOT . "/views/inc/footer.php" ?>