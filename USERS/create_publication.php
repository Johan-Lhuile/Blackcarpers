<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'USER') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Post';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    
?>

    <div class="m-auto max-w-7xl flex justify-around items-center sm:flex-row">

        <?php
        require_once '../INCLUDES/sidebar_user.php'
        ?>

        <div class="flex flex-col p-6 rounded-md sm:p-10 bg-gradient-to-t from-[#36FF24]/50 to-black/60 bg-gray-900 text-gray-100">
        <div class="mb-8 text-center">
            <h1 class="my-3 text-4xl font-bold">Créer ta publication</h1>
            <p class="text-sm text-gray-400"></p>
        </div>
        <form action="./CRUD/traitement_create_publication.php?id=<?= $idUser ?>" method="POST" class="space-y-12">
            <div class="space-y-4">
                <div>
                    <label for="title" class="block mb-2 text-sm">Titre</label>
                    <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                </div>
                <div>
                    <label for="description" class="block mb-2 text-sm">Titre</label>
                    <textarea rows="10" cols="35" placeholder="Description..." class="p-4 rounded-md resize-none text-gray-100 bg-gray-900"></textarea>                </div>
                <div>
                    <div class="flex justify-between mb-2">
                        <label for="images" class="text-sm">Photos</label>
            
                    </div>
                    <input type="file" name="images" multiple id="images" class="w-full px-3 py-2 border rounded-md border-gray-700 bg-gray-900 text-gray-100">
                </div>
            </div>
            <div class="space-y-2">
                <div>
                    <button type="submit" class="w-full px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">Soumettre</button>
                </div>

            </div>
        </form>
    </div>
    </div>
    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>