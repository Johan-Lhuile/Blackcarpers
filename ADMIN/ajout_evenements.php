<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Evenement';

    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>

        <div class=" bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <form action="./CRUD/traitement_newEvenement.php" method="POST" enctype="multipart/form-data">

                <legend class="block text-xl font-medium py-8 text-white">Ajouter un evenement</legend>

                <label for="titre" class="block text-lg font-semibold leading-6 text-white">Titre:</label>
                <div class="mt-2.5">
                <input type="text" name="titre" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                </div>
                <label for="description" class="block text-lg font-semibold leading-6 text-gray-100">Description :</label>
                <div class="mt-2.5">
                    <input type="text" name="description" id="description"  class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                </div>

                <label for="image" class="block text-lg pb-4 font-semibold leading-6 text-white">Ajouter l'affiche:</label>
                <input type="file" class="block w-full mb-10 rounded-md border-0 py-1.5 text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" name="affiche">

                <label for="image" class="block text-lg pb-4 font-semibold leading-6 text-white">Ajouter le dossier d'inscription (.PDF):</label>
                <input type="file" class="block w-full mb-10 rounded-md border-0 py-1.5 text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" name="docPdf">

                <label for="date" class="block text-lg font-semibold leading-6 text-white">Date:</label>
                <div class="mt-2.5">
                <input type="datetime-local" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" name="start" id="date">
                </div>
                <div class="mt-2.5">
                <input type="datetime-local" class="w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" name="end" id="date">
                </div>
                <button type="submit" class="bg-[#36FF24] p-1 w-full text-black rounded-md text-center font-bold shadow-sm shadow-[#36FF24]">Valider</button>
            </form>
        </div>

    </div>

<?php

    require_once '../INCLUDES/footer.php';
}
?>