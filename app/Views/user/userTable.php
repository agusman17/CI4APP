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

    <!-- PAGINATION -->
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