<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    require_once '../SRC/connect_BDD.php';
    if (isset($_GET['page']) && !empty($_GET['page'])) {
        $currentPage = (int) strip_tags($_GET['page']);
    } else {
        $currentPage = 1;
    }

    $pdo = new PDO($attr, $user, $pass, $opts);

    $sql = "SELECT COUNT(*) AS nb_publications FROM publications ";

    $query = $pdo->prepare($sql);

    $query->execute();

    $result = $query->fetch();

    $nbPublications = (int) $result['nb_publications'];

    $parPage = 10;

    $pages = ceil($nbPublications / $parPage);

    $premier = ($currentPage * $parPage) - $parPage;

    //--------------------------------------PAGINATION-----------------------------------------------------------//

    $sql = "SELECT * FROM publications JOIN documents ON idPublications = documents.fk_id AND isVerified = false
      GROUP BY publications.titre ORDER BY documents.created_at DESC limit :premier, :parpage ";

    $query = $pdo->prepare($sql);

    $query->bindvalue(':premier', $premier, PDO::PARAM_INT);

    $query->bindvalue(':parpage', $parPage, PDO::PARAM_INT);

    $query->execute();

    $posts = $query->fetchAll();

    $sql = "SELECT surname FROM users JOIN publications ON publications.idUsers = users.idUsers";

    $query = $pdo->prepare($sql);

    $query->execute();

    $users = $query->fetch();

    $title = 'Notre Team, nos Intenables...';
    require_once "../INCLUDES/header.php";
    require_once "../INCLUDES/menu.php";
    require_once '../INCLUDES/titre_page.php';

?>

    <body>
        <main>
            <div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

                <?php
                require_once '../INCLUDES/sidebar_admin.php';

                ?>
                <?php foreach ($posts as $post) : ?>
                    <form action=""></form>
                    <div class="grid gap-8 grid-cols-1 m-auto md:grid-cols-3 max-w-7xl ">
                        <div class="max-w-xs m-auto p-6 rounded-md shadow-md bg-[#36FF24]/40 text-gray-50">
                            <a href="./verif_post.php?id=<?= $post['idPublications'] ?>"><img src="<?= $post['liens'] ?>" alt="" class=" object-cover object-center rounded-md h-72 bg-gray-500"></a>
                            <div class="mt-6 mb-2">
                                <span class="block text-xs font-medium tracki uppercase dark:text-violet-400"><?= $users['surname'] ?></span>
                                <input class="rounded-md w-full text-xl text-gray-800 font-semibold tracki" value="<?= $post['titre'] ?>"></input>
                            </div>
                            <textarea class="block mt-8 w-full rounded-md border-0 py-1.5 text-gray-800" rows="10"><?= $post['description'] ?></textarea>
                            <div>
                                <button type="submit" class="w-full mt-8 px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">C'est OK, publier</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!---------------------------------------PAGINATION------------------------------------------------->
            <div class="flex items-center justify-between border-t mt-10 max-w-7xl m-auto border-gray-200 bg-[#36FF24]/40 px-4 py-3 sm:px-6">
                <div class="flex flex-1 justify-between  sm:hidden ">
                    <div class="<?= ($currentPage == 1) ? "hidden" : "" ?>">
                        <a href="./verif_publications.php?page=<?= $currentPage - 1 ?>" class=" relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</a>
                    </div>
                    <div class="<?= ($currentPage == $pages) ? "hidden" : "" ?>">
                        <a href="./verif_publications.php?page=<?= $currentPage + 1 ?>" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</a>
                    </div>
                </div>
                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-200">
                            <span class="font-medium"><?= $nbPublications ?></span>
                            resultats
                        </p>
                    </div>
                    <div>
                        <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                            <div class="<?= ($currentPage == 1) ? "hidden" : "" ?>">
                                <a href="./Galerie.php?page=<?= $currentPage - 1 ?>" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                    <span class="sr-only">Précédent</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                            <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:outline-offset-0" -->
                            <?php for ($page = 1; $page <= $pages; $page++) : ?>
                                <a href="./Galerie.php?page=<?= $page ?>" aria-current="page" class="relative z-10 inline-flex items-center bg-gray-500 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"><?= $page ?></a>
                            <?php endfor ?>
                            <div class="<?= ($currentPage == $pages) ? "hidden" : "" ?>">
                                <a href="./Galerie.php?page=<?= $currentPage + 1 ?>" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                                    <span class="sr-only">Suivant</span>
                                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>

            </div>
            <!---------------------------------------PAGINATION------------------------------------------------->

        </main>
    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>