<?php

session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM contact";

        $query = $pdo->query($sql);

        $contacts = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes messages';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
}

?>

<div class="flex justify-around items-center">

    <?php
    require_once '../INCLUDES/sidebar_admin.php'

    ?>


    <ul role="list" class=" bg-[#36FF24]/50 divide-y divide-gray-100">
        <?php foreach ($contacts as $contact) : ?>
            <li class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">

                        <p class="text-sm font-semibold leading-6 text-gray-900"><?= $contact["nameC"] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-800"><?= $contact["emailC"] ?></p>
                        <p class="mt-1 truncate text-xs leading-5 text-gray-800"><?= $contact["phoneC"] ?></p>
                    </div>
                </div>
                <div class="sm:flex sm:flex-col sm:items-end">
                    <p class="truncate text-sm leading-6 text-gray-900 "><?= $contact["message"] ?></p>
                    <a href="./ficheMessage.php?id=<?= $contact["idContact"] ?>"><button class="btn-menu">Voir</button></a>
                <?php endforeach; ?>
                </div>
            </li>
    </ul>




</div>

<?php
require_once '../INCLUDES/footer.php'

?>