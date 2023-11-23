<?php
session_start();


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

$title = $post['titre'];
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';
require_once '../INCLUDES/titre_page.php';
?>





<div class="max-w-2xl m-auto p-3 mb-48 rounded-md shadow-md bg-[#36FF24]/40 text-gray-50 ">

    <div class="mt-6 mb-2">
        <section class="py-6 ">
            <div class="container flex justify-center p-4 mx-auto">
                <div class="grid gap-4">
                    <?php foreach ($liens as $lien) : ?>
                        <img src="<?= $lien['liens'] ?>" alt="" class="object-cover w-full">
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <span class="block text-xs font-medium tracki uppercase text-violet-400"></span>
        <p class="rounded-md w-full text-xl p-4 text-gray-100 font-semibold tracki" value=""><?= $post['titre'] ?></p>
    </div>
    <p class="block mt-8 w-full rounded-md border-0 p-4 text-gray-100" rows="10"><?= $post['description'] ?></p>



</div>



<?php

require_once '../INCLUDES/footer.php';

?>