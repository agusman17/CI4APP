<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Table navigation">
    <ul class="inline-flex items-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <button onclick="reloadTable(1)" aria-label="<?= lang('Pager.first') ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </button>
            </li>
            <li>
                <button onclick="reloadTable(<?= $pager->getPreviousPageNumber(); ?>)" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="<?= lang('Pager.previous') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple' : '' ?>>
                <button onclick="reloadTable(<?= $link['title']; ?>)" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    <?= $link['title'] ?>
                </button>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>

            <li>
                <button onclick="reloadTable(<?= $pager->getNextPageNumber(); ?>)" aria-label="<?= lang('Pager.next') ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                    </svg>
                </button>
            </li>
            <li>
                <button onclick="reloadTable(<?= $pager->getPageCount() ?>)" aria-label="<?= lang('Pager.last') ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </button>
            </li>
        <?php endif ?>
    </ul>
</nav>