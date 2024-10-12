<?php require base_path("views/partials/head.php") ?>

<body class="h-full">
<div class="min-h-full">
    <?php require base_path("views/partials/nav.php") ?>
    <?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <a class="text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5" href="/notes">
                return
            </a>
            <div class="mt-10">
                <li><?= $note["body"] ?></li>
            </div>

            <div class="mt-10 flex">

                <a class="text-white bg-yellow-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-5"
                   href="<?= "/note/edit?id=" . $note["id"] ?>">Edit</a>

                <form method="post">
                    <input type="hidden" name="_method" value="delete">
                    <input type="hidden" name="id" value="<?= $note['id'] ?>">
                    <button type="submit"
                            class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </main>
</div>
</body>