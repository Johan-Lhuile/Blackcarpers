<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $idContact = $_GET['id'];

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM contact WHERE idContact = $idContact";

        $query = $pdo->query($sql);

        $contact = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes Messages';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

<div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>
        <div class="max-w-3xl p-24 bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg divide-y divide-gray-100">

            <h4 class="mt-1 text-lg p-4 leading-5 text-gray-100">Nom: <?= $contact["nameC"] ?></h4>
            <h5 class="mt-1 text-lg p-4 leading-5 text-gray-100">Email: <?= $contact["emailC"] ?></h5>
            <h5 class="mt-1 text-lg p-4 leading-5 text-gray-100">Téléphone: <?= $contact["phoneC"] ?></h5>
            <p class="mt-1 text-lg p-4 leading-5 text-gray-100">Message: <?= $contact["message"] ?></p>

        </div>
    </div>  

<?php

    require_once '../INCLUDES/footer.php';
}
?>