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

            <form class="max-w-sm mx-auto mt-10" method="POST">
                <label for="body" class="block mb-2 text-sm font-medium text-gray-900">
                    Your new Note
                </label>
                <div>
                    <textarea name="body" id="body" rows="4"
                              class="block p-2.5 w-full text-sm
                              <?= empty($errors['body']) ?
                                  "text-gray-900 bg-gray-50 rounded-lg border border-gray-300 " :
                                  "bg-red-50 border-red-500 text-red-900 placeholder-red-700" ?>"
                              placeholder="Leave a comment..."><?= $body ?? '' ?></textarea>
                    <?php if (isset($errors['body'])): ?>
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>
                            <?= $errors['body'] ?></p>
                    <?php endif ?>
                </div>

                <button type="submit"
                        class="block w-9/12 mx-auto mt-5 text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    submit
                </button>
            </form>

        </div>
    </main>
</div>
</body>