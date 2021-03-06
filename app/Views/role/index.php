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
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Role</span>
                    </div>
                </li>
            </ol>
        </nav>
        <a href="<?= base_url('role/create'); ?>" class="flex items-center justify-between pl-2 pr-4 py-1 mt-7 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Add
        </a>
    </div>

    <div class="w-full my-8 overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap table-fixed">
                <thead>
                    <tr class="text-xs font-semibold tracking-wide text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                        <th class="px-4 py-3 w-3/4 text-left">Role Name</th>
                        <th class="px-4 py-3 w-1/4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    <?php foreach ($roles as $role) : ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 w-3/4">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold"><?= $role['name'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 w-1/4 text-md text-center">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="<?= base_url('role/edit/' . $role['id']); ?>" class="w-fit flex items-center pl-2 pr-4 py-1 mt-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-amber-400 border border-transparent rounded-full active:bg-amber-600 hover:bg-amber-500 focus:outline-none focus:shadow-outline-amber" aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                        </svg>
                                        Edit
                                    </a>

                                    <form action="<?= base_url('role/' . $role['id']); ?>" method="POST">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="w-fit flex items-center px-4 py-1 mt-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-400 border border-transparent rounded-full active:bg-red-600 hover:bg-red-500 focus:outline-none focus:shadow-outline-red" aria-label="Delete" onclick="return confirm('Apakah Anda Yakin?');">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
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