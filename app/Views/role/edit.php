<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-6 mx-auto grid">

    <div class="flex items-center justify-between h-full">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Role
        </h2>
    </div>

    <nav class="flex" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <?= $this->include('layout/breadcumb'); ?>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Edit</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="px-4 py-3 my-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="<?= base_url('role/' . $role['id']); ?>" method="post">
            <?= csrf_field(); ?>

            <input type="hidden" name="_method" value="PUT" />

            <label class="block text-sm mb-6">
                <span class="text-gray-700 dark:text-gray-400">Role Name</span>
                <?php
                $errColorName = 'gray';
                $hiddenName = 'hidden';
                if ($validation->hasError('name')) {
                    $errColorName = 'red';
                    $hiddenName = '';
                }
                ?>
                <input name="name" value="<?= $role['name']; ?>" class="block w-full mt-1 text-sm border-<?= $errColorName; ?>-300 dark:border-gray-200 dark:bg-gray-700 focus:border-<?= $errColorName; ?>-400 focus:outline-none focus:shadow-outline-<?= $errColorName; ?> dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Example : Admin Keuangan">
                <span class="text-xs text-red-600 dark:text-red-400">
                </span>
            </label>

            <button type="submit" class="flex items-center justify-center px-4 py-2 mb-6 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                Submit
            </button>
        </form>
    </div>

</div>
<?= $this->endSection(); ?>