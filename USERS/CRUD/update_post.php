<?php
session_start();

if ($_SESSION['USER']['role'] != 'USER') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $id = $_GET['id'];

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM publications WHERE idPublications = $id";

        $query = $pdo->query($sql);

        $post = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes Verif';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>
        <div class="grid gap-8 grid-cols-1 m-auto md:grid-cols-1 max-w-7xl ">
            <div class="max-w-xs m-auto p-6 rounded-md shadow-md bg-[#36FF24]/40 text-gray-50">
                <img src="<?= $post['liens'] ?>" alt="" class=" object-cover object-center rounded-md h-72 bg-gray-500">
                <div class="mt-6 mb-2">
                    <span class="block text-xs font-medium tracki uppercase text-violet-400"></span>
                    <input class="rounded-md w-full text-xl text-gray-800 font-semibold tracki" value="<?= $post['titre'] ?>"></input>
                </div>
                <textarea class="block mt-8 w-full rounded-md border-0 py-1.5 text-gray-800" rows="10"><?= $post['description'] ?></textarea>
                <div>
                    <button type="submit" class="w-full mt-8 px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">C'est OK, publier</button>
                </div>


            </div>
        </div>
    </div>

<?php

    require_once '../INCLUDES/footer.php';
}
?>