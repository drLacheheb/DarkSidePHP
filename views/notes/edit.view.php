<?php require base_path("views/partials/head.php") ?>

<body class="h-full">
<div class="min-h-full">
    <?php require base_path("views/partials/nav.php") ?>
    <?php require base_path("views/partials/banner.php") ?>

    <main>
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

            <button
                    class="text-white bg-blue-700 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">
                <a href="/notes">
                    Cansel
                </a>
            </button>

            <form class="max-w-sm mx-auto" method="POST">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900">
                    Your new Note
                </label>
                <div>
                    <textarea name="body" id="body" rows="4"
                              class="block p-2.5 w-full text-sm
                              <?= isset($errors['body']) ?
                                  "bg-red-50 border-red-500 text-red-900 placeholder-red-700" :
                                  "text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " ?>"
                              placeholder="Leave a comment..."><?= $body ?? $note['body'] ?></textarea>
                    <?php if (isset($errors['body'])): ?>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                            <?= $errors['body'] ?></p>
                    <?php endif ?>
                </div>

                <button type="submit"
                        class="block w-9/12 mx-auto mt-5 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Update
                </button>
            </form>
        </div>
    </main>
</div>
</body>