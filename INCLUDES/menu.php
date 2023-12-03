<!--header-->
<nav class="w-full backdrop-blur bg-[#36FF24]/50 ">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <!-- Mobile menu button-->
        <button type="button" id="button-menu" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
          <span class="absolute -inset-0.5"></span>
          <span class="sr-only ">Open main menu</span>
          <!--
            Icon when menu is closed.

            Menu open: "hidden", Menu closed: "block"
          -->
          <svg class="block h-6 w-6" id="burger" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
          <!--
            Icon when menu is open.

            Menu open: "block", Menu closed: "hidden"
          -->
          <svg class="hidden h-6 w-6" id="cross" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex flex-shrink-0 items-center">
          <a href="../PUBLIC/index.php"><img class="h-12 w-auto" src="../MEDIA/logo.png" alt="Your Company"></a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class=" flex space-x-4">
            <a href="../PUBLIC/galerie.php" class=" text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold">GALERIE</a>
            <a href="../PUBLIC/partenariats.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold">PARTENARIATS</a>
            <a href="../PUBLIC/evenements.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold">EVENEMENTS</a>
            <a href="../PUBLIC/contact.php" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold">CONTACT</a>
            <?php
            if (!isset($_SESSION['USER'])) {
              echo "<a id='button' href='../PUBLIC/connexion.php'>
      <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'>CONNEXION</h2>
    </a>";
            } else {
              if ($_SESSION['USER']['role'] === 'USER') {
                echo "<a id='button' href='../USERS\dashboardUsers.php'>
    <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'>Mon Compte</h2>
    </a>";
              } else {
                echo "<a id='button' href='../ADMIN\dashboard.php'>
    <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'> ADMIN </h2>
    </a>";
              }
            }
            ?>

          </div>
        </div>
      </div>


      <!-- Profile dropdown -->
      <div class="relative ml-3">
        <div>
          <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">Open user menu</span>
            <!-- <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt=""> -->
          </button>
        </div>


      </div>
    </div>
  </div>
  </div>

  <!-- Mobile menu, show/hide based on menu state. -->
  <div class="hidden sm:hidden" id="mobile-menu">
    <div class="space-y-1 px-2 pb-3 pt-2">

      <a href="../PUBLIC/galerie.php" class=" text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">GALERIE</a>
      <a href="../PUBLIC/partenariats.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">PARTENARIATS</a>
      <a href="../PUBLIC/evenements.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">EVENEMENTS</a>
      <a href="../PUBLIC/contact.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">CONTACT</a>
      <?php
      if (!isset($_SESSION['USER'])) {
        echo "<a href='../PUBLIC/connexion.php'>
      <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'>CONNEXION</h2>
    </a>";
      } else {
        if ($_SESSION['USER']['role'] === 'USER') {
          echo "<a id='button' href='../USERS\dashboardUsers.php'>
    <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'>Mon Compte</h2>
    </a>";
        } else {
          echo "<a id='button' href='../ADMIN\dashboard.php'>
    <h2 class='text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-lg font-bold'> ADMIN </h2>
    </a>";
        }
      }
      ?>

    </div>
  </div>
</nav>
