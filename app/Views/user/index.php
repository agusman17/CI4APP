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
        <div class="relative w-4/12 my-4 mx-8 max-w-xl mr-2 text-purple-300 focus-within:text-purple-500 float-left">
            <div class="absolute inset-y-0 flex items-center pl-2">
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <input id="search" name="keyword" onkeyup="reloadTable(1)" class="w-full pl-8 pr-2 text-sm text-gray-500 placeholder-gray-600 border-purple-100 rounded-md focus:placeholder-gray-300 focus:bg-white border-purple-300 focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="Search user . . . " aria-label="Search">
        </div>

        <div id="getTable"></div>

        <p id="manuk"></p>

    </div>

    <div class="flex items-center justify-center">
        <div id="loading-spinner" class="mt-10" style="display:none">
            <div class="grid grid-cols-2">
                <svg role="status" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                </svg>
                <!-- ... -->
                <div class="loading-text">Loading ...</div>
            </div>
        </div>
    </div>

</div>

<script>
    reloadTable(1)

    function reloadTable(pageNumber) {
        keyword = document.getElementById("search").value;
        $.ajax({
            url: "<?= base_url("user/getTable") ?>",
            data: {
                page_user: pageNumber,
                keyword: keyword
            },
            beforeSend: function(f) {
                document.getElementById("loading-spinner").style.display = "block";
                document.getElementById("getTable").style.display = "none";
            },
            success: function(data) {
                document.getElementById("loading-spinner").style.display = "none";
                document.getElementById("getTable").style.display = "block";
                $('#getTable').html(data);
            }
        })
    }
</script>

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