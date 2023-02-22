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

<div class="absolute bottom-5 right-5 z-50">
    <?php flash('login_success') ?>
    <?php flash('infos_success') ?>

</div>
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
                <a href="<?=URLROOT?>/accounts/editInfos/<?=$data->id?>" class="text-sm font-light text-primary underline">Edit</a>
            </div>
            <div class="space-y-2 mt-4">
                <p class="text-sm text-gray-600"> <?=ucwords($data->fullName)?></p>
                <p class="text-sm text-gray-600">
                    <?php 
                        if(!empty($data->tel)){
                            echo $data->tel;
                        }else{
                            echo "No phone number";
                        }    
                    ?>
                </p>
                <p class="text-sm text-gray-600"><?=$data->email?></p>
            </div>
        </div>

        <!-- Single Card -->
        <div class="shadow rounded bg-white p-4">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-medium text-gray-800 ">Adress Infos</h3>
                <a href="<?=URLROOT?>/accounts/editInfos/<?=$data->id?>" class="text-sm font-light text-primary underline">Edit</a>
            </div>
            <div class="space-y-2 mt-4">
                <p class="text-sm text-gray-600"><?=$data->adress?></p>
                <p class="text-sm text-gray-600"><?=$data->ville?> </p>
                <p class="text-sm text-gray-600"><?= $data->code_postal?></p>
            </div>
        </div>
    </div>
    <!-- Profile Infos End -->

</div>
<!-- Account wrapper end-->

<?php require APPROOT . "/views/inc/footer.php" ?>
<?php require APPROOT . "/views/inc/scripts.php" ?>