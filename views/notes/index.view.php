<?php require base_path("views/partials/head.php") ?>

<body class="h-full">
<div class="min-h-full">
    <?php require base_path("views/partials/nav.php") ?>
    <?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <?php foreach ($notes as $note): ?>
                <li><a href="<?= "/note?id=" . $note["id"] ?>"><?= $note["body"] ?></a></li>
            <?php endforeach; ?>
        </div>

        <button class="ml-10 mt-10 text-white bg-green-700 font-medium rounded-lg text-sm px-5 py-2.5 ">
            <a href="/note/create">
                Create new note
            </a>
        </button>

    </main>
</div>
</body>