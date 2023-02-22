<?php require APPROOT ."/views/inc/header.php"?>
<?php require APPROOT ."/views/inc/navbar.php"?>
<div class="containner py-16 bg-gray-100">
    <div class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
        <div class="my-3">
            <?php flash('register_success'); ?>
        </div>
        <div class="my-3">
            <?php flash('login_errors'); ?>
        </div>
        <div class="my-3">
            <?php flash('not_logged'); ?>
        </div>
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Login</h2>
        <p class="text-sm text-gray-500 text-center">Login if you are one of our clients</p>

        <form action="<?=URLROOT?>/clients/login" method="post">
            <div class="pt-4">
                <label for="username" class="text-sm text-gray-600 block">Email Adress</label>
                <input type="text" name="username" placeholder="Username" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?=$data['username']?>">
            </div>
            <div class="pt-4">
                <label for="password" class="text-sm text-gray-600 block">Password</label>
                <input type="password" name="password" placeholder="Password"  class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0" value="<?=$data['password']?>">
            </div>
            <div class="pt-4">
                <button type="input" class="block w-full text-center bg-primary py-2 text-white hover:border hover:border-primary  transition rounded"> Login</button>
            </div>
        </form>

        <p class="mt-4 text-sm text-gray-500 text-center">You don't have an account ? <a href="<?=URLROOT?>/clients/register" class="text-primary">Register</a></p>
    </div>
</div>
<?php require APPROOT ."/views/inc/footer.php"?>
<?php require APPROOT ."/views/inc/scripts.php"?>