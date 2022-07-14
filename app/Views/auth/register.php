<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create account</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url("assets/css/tailwind.output.css"); ?>" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="<?= base_url("assets/js/init-alpine.js"); ?>"></script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="<?= base_url("assets/images/create-account-office.jpeg"); ?>" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="<?= base_url("assets/images/create-account-office-dark.jpeg"); ?>" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Create account
                        </h1>

                        <form action="<?= base_url("register"); ?>" method="post">
                            <?= csrf_field(); ?>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Name</span>
                                <?php
                                $errColorName = 'purple';
                                $hiddenName = 'hidden';
                                if ($validation->hasError('name')) {
                                    $errColorName = 'red';
                                    $hiddenName = '';
                                }
                                ?>
                                <input name="name" value="<?= old('name'); ?>" class="block w-full mt-1 text-sm border-<?= $errColorName; ?>-300 dark:border-gray-600 dark:bg-gray-700 focus:border-<?= $errColorName; ?>-400 focus:outline-none focus:shadow-outline-<?= $errColorName; ?> dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Example : Rudi">
                                <span class="text-xs text-red-600 dark:text-red-400 <?= $hiddenName ?>">
                                    <?= $validation->getError('name'); ?>
                                </span>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Email</span>
                                <?php
                                $errColorEmail = 'purple';
                                $hiddenEmail = 'hidden';
                                if ($validation->hasError('email')) {
                                    $errColorEmail = 'red';
                                    $hiddenEmail = '';
                                }
                                ?>
                                <input name="email" value="<?= old('email'); ?>" class="block w-full mt-1 text-sm border-<?= $errColorEmail; ?>-300 dark:border-gray-600 dark:bg-gray-700 focus:border-<?= $errColorEmail; ?>-400 focus:outline-none focus:shadow-outline-<?= $errColorEmail; ?> dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Example : rudi@gmail.com">
                                <span class="text-xs text-red-600 dark:text-red-400 <?= $hiddenEmail ?>">
                                    <?= $validation->getError('email'); ?>
                                </span>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <?php
                                $errColorPassword = 'purple';
                                $hiddenPassword = 'hidden';
                                if ($validation->hasError('password')) {
                                    $errColorPassword = 'red';
                                    $hiddenPassword = '';
                                }
                                ?>
                                <input name="password" <?= old('password'); ?> type="password" class="block w-full mt-1 text-sm border-<?= $errColorPassword; ?>-300 dark:border-gray-600 dark:bg-gray-700 focus:border-<?= $errColorPassword; ?>-400 focus:outline-none focus:shadow-outline-<?= $errColorPassword; ?> dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Fill with strong password">
                                <span class="text-xs text-red-600 dark:text-red-400 <?= $hiddenPassword ?>">
                                    <?= $validation->getError('password'); ?>
                                </span>
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">
                                    Confirm password
                                </span>
                                <?php
                                $errColorPasswordConf = 'purple';
                                $hiddenPasswordConf = 'hidden';
                                if ($validation->hasError('passconf')) {
                                    $errColorPasswordConf = 'red';
                                    $hiddenPasswordConf = '';
                                }
                                ?>
                                <input name="passconf" <?= old('passconf'); ?> type="password" class="block w-full mt-1 text-sm border-<?= $errColorPasswordConf; ?>-300 dark:border-gray-600 dark:bg-gray-700 focus:border-<?= $errColorPasswordConf; ?>-400 focus:outline-none focus:shadow-outline-<?= $errColorPasswordConf; ?> dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Your confirmation password">
                                <span class="text-xs text-red-600 dark:text-red-400 <?= $hiddenPasswordConf ?>">
                                    <?= $validation->getError('passconf'); ?>
                                </span>
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No. Handphone</span>
                                <input name="no_handphone" value="<?= old('no_handphone'); ?>" id="no_handphone" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="+62XXXXXXXXXX" />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Address</span>
                                <input name="address" value="<?= old('address'); ?>" id="address" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Trini RT 01 RW 16 Trihanggo Sleman DI Yogyakarta" />
                            </label>

                            <div class="block w-full mt-6 text-sm">
                                <label class="flex items-center dark:text-gray-400">
                                    <?php
                                    $errAgreement = 'purple';
                                    $hiddenAgreement = 'hidden';
                                    if ($validation->hasError('agreement')) {
                                        $errAgreement = 'red';
                                        $hiddenAgreement = '';
                                    }
                                    ?>
                                    <input name="agreement" id="agreement" type="checkbox" class="text-purple-600 form-checkbox border-<?= $errAgreement; ?>-300 focus:border-<?= $errAgreement; ?>-400 focus:outline-none focus:shadow-outline-<?= $errAgreement; ?> dark:focus:shadow-outline-gray" />
                                    <span class="ml-2 w-full">
                                        I agree to the
                                        <span class="underline">privacy policy</span>
                                    </span>
                                </label>
                                <span class="text-xs text-red-600 dark:text-red-400 <?= $hiddenAgreement ?>">
                                    <?= $validation->getError('agreement'); ?>
                                </span>
                            </div>

                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="#">
                                Create account
                            </button>

                        </form>

                        <hr class="my-8" />

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="<?= base_url("login"); ?>">
                                Already have an account? Login
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>