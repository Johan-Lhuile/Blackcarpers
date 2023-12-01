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

        $sql = " SELECT * FROM publications JOIN documents ON idPublications = documents.fk_id WHERE idPublications = $id";

        $query = $pdo->query($sql);

        $post = $query->fetch();

        $sql = " SELECT liens, idDocuments FROM documents JOIN publications ON idPublications = documents.fk_id WHERE idPublications = $id";

        $query = $pdo->query($sql);

        $liens = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    $title = 'modifier ma publication';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div class="flex flex-col mb-24 justify-around items-center m-auto max-w-7xl sm:flex-row ">

        <?php
        require_once '../INCLUDES/sidebar_user.php';
        ?>


        <div class="max-w-2xl m-auto p-3 mb-24 rounded-md shadow-md bg-[#36FF24]/40 text-gray-50 ">

            <div class="mt-6 mb-2">
                <section class="py-6 ">
                    <div class="container flex justify-center p-4 mx-auto">
                        <div class="grid gap-4">
                            <?php foreach ($liens as $lien) : ?>
                                <img src="<?= $lien['liens'] ?>" alt="" class="object-cover w-full">
                                <button class="flex justify-center rounded-md bg-red-600 px-auto py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500"><a class="m-auto" href="./CRUD/deleteImages.php?id=<?= $lien["idDocuments"] ?>">Supprimer</a></button>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </section>

                <input class="rounded-md w-full text-xl text-gray-800 font-semibold tracki" value="<?= $post['titre'] ?>"></input>
            </div>
            <textarea class="block mt-8 w-full rounded-md border-0 p-4 text-gray-800" rows="10"><?= $post['description'] ?></textarea>
            <div>
                <button type="submit" class="w-full mt-8 px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">Modifier</button>
            </div>


        </div>
    </div>
    </div>

<?php

    require_once '../INCLUDES/footer.php';
}
?>