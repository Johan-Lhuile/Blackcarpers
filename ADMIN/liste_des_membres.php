<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM USERS";

        $query = $pdo->query($sql);

        $users = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'MES PIRATES';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';

?>

    <div class="flex flex-col justify-around items-center sm:flex-row m-auto max-w-7xl">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>


        <div class="container p-2 mx-auto sm:p-4 text-gray-100 max-w-3xl bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg divide-y divide-gray-100">
            <h2 class="mb-4 text-2xl font-semibold leadi">Liste des membres</h2>
            <div class="flex flex-col overflow-x-auto text-xs">
                <div class="flex text-left dark:bg-gray-700">

                    <div class="w-32 px-2 py-3 sm:p-3">Nom</div>
                    <div class="w-32 px-2 py-3 sm:p-3">Prénom</div>
                    <div class="flex-1 px-2 py-3 sm:p-3">Email</div>
                    <div class="hidden w-24 px-2 py-3 text-right sm:p-3 sm:block">Téléphone</div>
                </div>
                <?php foreach ($users as $user) : ?>
                    <div class="flex border-b border-opacity-20 dark:border-gray-700 dark:bg-gray-900">

                        <div class="w-32 px-2 py-3 sm:p-3">
                            <p><?= $user["name"] ?></p>
                        </div>
                        <div class="w-32 px-2 py-3 sm:p-3">
                            <p><?= $user["surname"] ?></p>
                        </div>
                        <div class="flex-1 block px-2 py-3 truncate sm:p-3 sm:w-auto"><?= $user["email"] ?></div>
                        <div class="hidden w-24 px-2 py-3 text-right sm:p-3 sm:block dark:text-gray-400">
                            <p><?= $user["phone"] ?></p>
                        </div>
                        <div class="hidden w-24 px-2 py-3 text-right sm:p-3 sm:block dark:text-gray-400">
                            <p><a href="./ficheMembre.php?id=<?= $user["idUsers"] ?>"><button class="bg-[#36FF24] p-1 text-black rounded-md text-center font-bold shadow-sm shadow-[#36FF24]">Voir</button></a></p>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>