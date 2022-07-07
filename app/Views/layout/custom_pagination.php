<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Table navigation">
    <ul class="inline-flex items-center">
        <?php if ($pager->hasPrevious()) : ?>
            <li>
                <a href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple">
                    <span aria-hidden="true"><?= lang('Pager.first') ?></span>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getPrevious() ?>" class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple" aria-label="<?= lang('Pager.previous') ?>">
                    <strong>
                        < </strong>
                </a>
            </li>
        <?php endif ?>

        <?php foreach ($pager->links() as $link) : ?>
            <li <?= $link['active'] ? 'class="px-3 py-1 text-white transition-colors duration-150 bg-purple-600 border border-r-0 border-purple-600 rounded-md focus:outline-none focus:shadow-outline-purple' : '' ?>>
                <a href="<?= $link['uri'] ?>" class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <?php if ($pager->hasNext()) : ?>

            <li>
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">
                    <strong> > </strong>
                </a>
            </li>
            <li>
                <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>" class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple">
                    <span aria-hidden="true"><?= lang('Pager.last') ?></span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>