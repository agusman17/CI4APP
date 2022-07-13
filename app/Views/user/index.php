<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container px-6 mx-auto grid">

    <div class="flex items-center justify-between h-full">
        <nav class="flex mt-9" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <?= $this->include('layout/breadcumb'); ?>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">User</span>
                    </div>
                </li>
            </ol>
        </nav>
        <a href="<?= base_url('user/create'); ?>" class="flex items-center justify-between pl-2 pr-4 py-1 mt-7 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add
        </a>
    </div>

    <div class="w-full my-8 overflow-hidden rounded-lg shadow-xs relative">

        <form class="w-8/12 py-4 px-8" action="user" method="GET">
            <div class="relative w-4/12 max-w-xl mr-2 text-purple-300 focus-within:text-purple-500 float-left">
                <div class="absolute inset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input id="search" name="keyword" class="w-full pl-8 pr-2 text-sm text-gray-500 placeholder-gray-600 border-purple-100 rounded-md focus:placeholder-gray-300 focus:bg-white border-purple-300 focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search user . . . " aria-label="Search">
            </div>
            <button class="w-fit flex items-center px-4 py-1.5 mt-1 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
        </form>

        <div class="w-full overflow-x-auto">
            <hr>
            <table class="w-full whitespace-no-wrap">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Contact</th>
                        <th class="px-4 py-3">Date Created</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php foreach ($users as $user) : ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-md">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=200&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjE3Nzg0fQ" alt="" loading="lazy">
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold"><?= $user['name']; ?></p>
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            <?= $user['email']; ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-md">
                                <?= $user['no_handphone']; ?>
                            </td>
                            <td class="px-4 py-3 text-md">
                                <?= get_ina_date($user['created_at']); ?>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="flex items-center space-x-4 text-md">
                                    <a href="<?= base_url("user/edit/" . $user['id']); ?>" class="w-fit flex items-center pl-2 pr-4 py-1 mt-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-amber-400 border border-transparent rounded-full active:bg-amber-600 hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber">
                                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="<?= base_url("user/" . $user['id']); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="submit" class="w-fit flex items-center px-4 py-1 mt-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-400 border border-transparent rounded-full active:bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red" aria-label="Delete" onclick="return confirm('Apakah Anda Yakin?');">
                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="grid px-4 py-3 text-xs font-bold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
            <span class="flex items-center col-span-3">
                SHOWING <?= 1 + ($currentPage * $dataPerPage) - $dataPerPage; ?>-<?= ($currentPage == $totalPage) ? $totalData : ($currentPage * $dataPerPage); ?>
                OF <?= $totalData; ?>
            </span>
            <span class="col-span-2"></span>
            <!-- Pagination -->
            <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                <?= $pager->links('user', 'custom_pagination'); ?>
            </span>
        </div>

    </div>

</div>

<script>
    <?php if (session()->has("save")) { ?>
        $(function() {
            Swal.fire({
                type: 'success',
                title: 'Data has been saved',
                text: '<?= session("save") ?>'
            })
        });
    <?php } else if (session()->has("update")) {
    ?>
        $(function() {
            Swal.fire({
                type: 'success',
                title: 'Data has been update',
                text: '<?= session("update") ?>'
            })
        });
    <?php } else if (session()->has("delete")) { ?>
        $(function() {
            Swal.fire({
                type: 'success',
                title: 'Data has been delete',
                text: '<?= session("delete") ?>'
            })
        });
    <?php } ?>
</script>

<?= $this->endSection(); ?>