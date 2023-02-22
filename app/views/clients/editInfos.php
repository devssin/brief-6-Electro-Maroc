<?php require APPROOT . '/views/inc/header.php'; ?>
<?php require APPROOT . '/views/inc/navbar.php'; ?>

<div class=" relative containner grid md:grid-cols-12 items-start pt-6 pb-16 gap-6 bg-gray-100">



    <!-- Side Bar -->
    <?php require APPROOT . "/views/inc/account_sidebar.php" ?>
    <!-- Side Bar End-->


    <!-- Profile Infos -->
    <div class="col-span-9">
        <div class="max-w-5xl mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
            <div class="my-3">
                <?php flash('register_errors'); ?>
            </div>
            <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Edit Infos</h2>
            
            <form action="<?= URLROOT ?>/accounts/editInfos/<?=$data['id']?>" method="post">
                <div class="pt-4 grid grid-cols-2 gap-2">
                    <div class="">
                        <label for="full_name" class="text-sm text-gray-600 block">Full Name</label>
                        <input type="text" name="fullName" placeholder="Enter your full name" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['fullName'] ?>">
                    </div>
                    <div class="">
                        <label for="full_name" class="text-sm text-gray-600 block">Username</label>
                        <input type="text" name="username" placeholder="Enter your username" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['username'] ?>" readonly>
                    </div>
                </div>
                <div class="pt-4 grid grid-cols-2 gap-2">

                    <div class="">
                        <label for="email" class="text-sm text-gray-600 block">Email Adress</label>
                        <input type="email" name="email" placeholder="Email Adress" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['email'] ?>" readonly>
                    </div>
                    <div class="">
                        <label for="phone" class="text-sm text-gray-600 block">Phone Number</label>
                        <input type="text" name="phone" placeholder="Phone Number" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['phone'] ?>">
                    </div>
                </div>
                <div class="pt-4">
                    <label for="adress" class="text-sm text-gray-600 block">Adress</label>

                    <textarea name="adress" cols="10" rows="4" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0">
                        <?= $data['adress'] ?>
                    </textarea>
                </div>
                <div class="pt-4 grid grid-cols-2 gap-2">
                    <div class="">
                        <label for="ville" class="text-sm text-gray-600 block">City</label>
                        <input type="text" name="ville" placeholder="Email Adress" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['ville'] ?>">
                    </div>
                    <div class="">
                        <label for="code_postal" class="text-sm text-gray-600 block">Zip code</label>
                        <input type="text" name="code_postal" placeholder="Phone Number" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?= $data['code_postal'] ?>">
                    </div>
                </div>
                <div class="pt-4">
                    <button type="input" class="block w-full text-center bg-primary py-2 text-white hover:border hover:border-primary  transition rounded"> Submit</button>
                </div>
            </form>

        </div>
    </div>

</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<?php require APPROOT . '/views/inc/scripts.php'; ?>