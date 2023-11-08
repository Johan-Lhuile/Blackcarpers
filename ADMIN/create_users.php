<?php

session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    $title = "Ajout d'un pirate";

    require_once '../INCLUDES/header.php';
    require_once "../INCLUDES/menu.php";
    require_once '../INCLUDES/titre_page.php';

?>

<div class="m-auto max-w-7xl flex justify-around items-center">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>
        
    <div class=" bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Ajouter un adhérent</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form class="space-y-6" action="./CRUD/createUsers.php" method="POST">
      <div>
        <label for="name" class="block text-sm font-medium leading-6 text-white">Nom</label>
        <div class="mt-2">
          <input id="text" name="name" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="surname" class="block text-sm font-medium leading-6 text-white">Prénom</label>
        <div class="mt-2">
          <input id="text" name="surname" type="text" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div>
        <label for="email" class="block text-sm font-medium leading-6 text-white">Email</label>
        <div class="mt-2">
          <input id="email" name="email" type="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
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
    require_once "../INCLUDES/footer.php";
}
?>