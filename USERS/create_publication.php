<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'USER') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Post';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
    
?>

    <div class="flex flex-col justify-around items-center sm:flex-row m-auto max-w-7xl ">

        <?php
        require_once '../INCLUDES/sidebar_user.php'
        ?>

        <div class="flex flex-col p-6 rounded-md sm:p-10 bg-gradient-to-t from-[#36FF24]/50 to-black/60 bg-gray-900 text-gray-100">
            <div class="mb-8 text-center">
                <h1 class="my-3 text-4xl font-bold">Créer ta publication</h1>
                <p class="text-sm text-gray-400"></p>
            </div>
            <form action="./CRUD/traitement_create_publication.php?id=<?= $idUser ?>" method="POST" enctype="multipart/form-data" class="space-y-12">
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block mb-2 text-sm">Titre</label>
                        <input type="text" name="titre" id="title" class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                    </div>
                    <div>
                        <label for="description" class="block mb-2 text-sm">Description</label>
                        <textarea name="description" rows="10" cols="35" placeholder="Description..." class="p-4 rounded-md resize-none text-gray-100 bg-gray-900"></textarea>
                    </div>
                    <div>
                        <div class="flex justify-between mb-2">
                            <label for="image" class="text-sm">Photos</label>

                        </div>
                        <input type="file" name="image[]" multiple id="image" class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                    </div>
                </div>
                <div class="space-y-2">
                    <div>
                        <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-[#36FF24]/70 text-gray-900">Soumettre</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>