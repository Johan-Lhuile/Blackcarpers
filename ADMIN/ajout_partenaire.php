<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = 'Ajouter un Partenaire';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div class="m-auto max-w-7xl flex justify-around items-center">

        <?php
        require_once '../INCLUDES/sidebar_admin.php'
        ?>


        <div class=" bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Ajouter un partenaire</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="./CRUD/traitement_ajout_partenaire.php" method="POST">
                <div>
                        <label for="files" class="block text-sm font-medium leading-6 text-white">Logo</label>
                        <div class="mt-2">
                            <input id="files" name="logo" type="file" required class="block w-full rounded-md border-0 py-1.5 text-gray-100 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="nameP" class="block text-sm font-medium leading-6 text-white">Nom</label>
                        <div class="mt-2">
                            <input id="text" name="nameP" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="emailP" class="block text-sm font-medium leading-6 text-white">Email</label>
                        <div class="mt-2">
                            <input id="email" name="emailP" type="email" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="phoneP" class="block text-sm font-medium leading-6 text-white">Téléphone</label>
                        <div class="mt-2">
                            <input id="text" name="phoneP" type="text" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <label for="lienF" class="block text-sm font-medium leading-6 text-white">Lien Facebook</label>
                        <div class="mt-2">
                            <input id="text" name="lienF" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="lien" class="block text-sm font-medium leading-6 text-white">Lien Boutique</label>
                        <div class="mt-2">
                            <input id="text" name="lien" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="dateCreation" class="block text-sm font-medium leading-6 text-white">Date de création</label>
                        <div class="mt-2">
                            <input id="text" name="dateCreation" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="adresse" class="block text-sm font-medium leading-6 text-white">Adresse</label>
                        <div class="mt-2">
                            <input id="text" name="adresse" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="responsable" class="block text-sm font-medium leading-6 text-white">Responsable</label>
                        <div class="mt-2">
                            <input id="text" name="responsable" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="nbTeam" class="block text-sm font-medium leading-6 text-white">Nombre de membres</label>
                        <div class="mt-2">
                            <input id="text" name="nbTeam" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium leading-6 text-white">Message</label>
                        <div class="mt-2">
                            <textarea id="text" name="message" type="text" required cols="60" rows="10" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"></textarea>
                        </div>
                    </div>



                    <div>
                        <button type="submit" class="btn-menu">Ajouter</button>
                    </div>
                </form>

            </div>
        </div>

    </div>





<?php

    require_once '../INCLUDES/footer.php';
}
?>