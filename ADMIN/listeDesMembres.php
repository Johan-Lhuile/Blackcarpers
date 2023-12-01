<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM users";

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

    <div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>


        <div class="container p-2 mx-auto sm:p-4 text-gray-100 max-w-3xl bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg ">
            <h2 class="mb-4 text-2xl font-semibold ">Liste des membres</h2>
            <div class="flex flex-col overflow-x-auto text-xs">
                <div class="flex text-left ">

                    <div class="w-32 px-2 py-3 sm:p-3">Nom</div>
                    <div class="w-32 px-2 py-3 sm:p-3">Prénom</div>
                    <div class="flex-1 px-2 py-3 sm:p-3">Email</div>
                    <div class="hidden w-24 px-2 py-3 text-right sm:p-3 sm:block">Téléphone</div>
                </div>
                <?php foreach ($users as $user) : ?>
                    <a href="./ficheMembre.php?id=<?= $user["idUsers"] ?>">

                        <div class="flex border-b border-opacity-20 ">
                            <div class="w-32 px-2 py-3 sm:p-3">
                                <p><?= $user["name"] ?></p>
                            </div>
                            <div class="w-32 px-2 py-3 sm:p-3">
                                <p><?= $user["surname"] ?></p>
                            </div>
                            <div class="flex-1 block px-2 py-3 truncate sm:p-3 sm:w-auto"><?= $user["email"] ?></div>
                            <div class="hidden w-24 px-2 py-3 text-right sm:p-3 sm:block">
                                <p><?= $user["phone"] ?></p>
                            </div>
                        </div>
                    </a>
                <?php endforeach ?>
            </div>
                
        </div>
    </div>

    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>