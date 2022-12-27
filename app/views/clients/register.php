<?php require APPROOT ."/views/inc/header.php"?>

<div class="containner py-16 bg-gray-100">
    <div class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
        <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Register</h2>
        <p class="text-sm text-gray-500 text-center">Create an account to be one of our clients</p>

        <form action="" method="post">
            <div class="pt-4">
                <label for="full_name" class="text-sm text-gray-600 block">Full Name</label>
                <input type="text" name="email" placeholder="Enter your full name" id="full_name" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0">
            </div>
            <div class="pt-4">
                <label for="full_name" class="text-sm text-gray-600 block">Username</label>
                <input type="text" name="username" placeholder="Enter your username" id="username" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0">
            </div>
            <div class="pt-4">
                <label for="email" class="text-sm text-gray-600 block">Email Adress</label>
                <input type="email" name="email" placeholder="Email Adress" id="email" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0">
            </div>
            <div class="pt-4">
                <label for="password" class="text-sm text-gray-600 block">Password</label>
                <input type="password" name="password" placeholder="Password" id="email" class="block w-full mt-1 text-sm text-gray-600 border border-gray-500 rounded-md focus:border-primary focus:ring-0">
            </div>
            <div class="pt-4">
                <button type="input" class="block w-full text-center bg-primary py-2 text-white hover:border hover:border-primary  transition rounded"> Register</button>
            </div>
        </form>

        <p class="mt-4 text-sm text-gray-500 text-center">Already have an account ? <a href="<?=URLROOT?>/clients/login" class="text-primary">Login</a></p>
    </div>
</div>
<?php require APPROOT ."/views/inc/footer.php"?>