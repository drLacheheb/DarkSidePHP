<?php require base_path("views/partials/head.php") ?>

<body class="h-full">
<div class="min-h-full">
    <?php require base_path("views/partials/nav.php") ?>
    <?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <button
                    class="text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 mb-10">
                <a href="/notes">
                    return
                </a>
            </button>

            <li><?= $note["body"] ?></li>

            <form method="post" class="mt-10">
                <input type="hidden" name="_method" value="delete">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button type="submit"
                        class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                    Delete
                </button>
            </form>
        </div>
    </main>
</div>
</body>