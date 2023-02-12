<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="grid grid-cols-5 h-screen max-h-screen ">

    <?php require APPROOT . '/views/inc/dashboard_sidebar.php' ?>
    <div class="col-span-4 overflow-y-auto px-4 bg-gray-100 pt-10">
        <div class="max-w-lg mx-auto shadow-lg bg-white rounded-md px-6 py-4 overflow-hidden">
            <div class="">
                <?php flash('category_errors'); ?>
            </div>
            <h2 class="text-center text-2xl font-semibold text-gray-700 mb-2">Add Category</h2>

            <form action="<?= URLROOT ?>/categories/edit/<?= $data['id']?>" method="post" enctype="multipart/form-data">
                <div>
                    <label for="email" class="text-sm text-gray-600 block ">Category Name</label>
                    <input type="text" name="name" placeholder="Category Name" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="<?= $data['name'] ?>">
                </div>
                <div class="pt-4">
                    <label for="image" class="text-sm text-gray-600 block ">Category Image</label>
                    <input type="file" name="image" placeholder="Image" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0" value="">
                </div>
                <div class="pt-4">
                    <label for="description" class="text-sm text-gray-600 block ">Category Description</label>
                    <textarea name="description" id="" cols="20" rows="3" class="block w-full mt-1 text-sm  border  rounded-md  focus:ring-0">
                        <?= $data['description'] ?>

                    </textarea>

                </div>

                <div class="pt-4">
                    <button type="input" class="block w-full text-center bg-primary py-2 text-white  hover:bg-sec   transition duration-300  rounded"> Submit</button>
                </div>
            </form>
        </div>
    </div>

</div>
<?php require APPROOT . '/views/inc/scripts.php'; ?>