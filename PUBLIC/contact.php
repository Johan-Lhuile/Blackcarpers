<?php 
session_start();
$title = "Contact";
require_once "../INCLUDES/header.php";
require_once "../INCLUDES/menu.php";
?>
<body>
<?php require_once "../INCLUDES/message.php"?>
<div class="isolate max-w-2xl m-auto bg-gradient-to-t from-[#36FF24]/20 to-black/60 px-6 py-24 sm:py-32 lg:px-8">
  <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
  </div>
  <div class="mx-auto max-w-2xl text-center">
    <h2 class="text-3xl font-bold tracking-tight text-white sm:text-4xl">Contactez nous</h2>
    <p class="mt-2 text-lg leading-8 text-white">Laissez nous un message, nous vous répondrons dans les plus bref délais.</p>
  </div>
  <form action="../ADMIN/CRUD/traitement_contact.php" method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
    <div class="sm:col-span-2">
      <div>
        <label for="name" class="block text-sm font-semibold leading-6 text-white">Nom et prénom:</label>
        <div class="mt-2.5">
          <input type="text" name="name" id="name" autocomplete="given-name" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
        </div>
      </div>

      <div class="sm:col-span-2">
        <label for="phone" class="block text-sm font-semibold leading-6 text-white">Téléphone:</label>
        <div class="mt-2.5">
          <input type="tel" name="phone" id="phone" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      <div class="sm:col-span-2">
        <label for="email" class="block text-sm font-semibold leading-6 text-white">Email</label>
        <div class="mt-2.5">
          <input type="email" name="email" id="email" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
        </div>
      </div>
      
      <div class="sm:col-span-2">
        <label for="message" class="block text-sm font-semibold leading-6 text-white">Message</label>
        <div class="mt-2.5">
          <textarea name="message" id="message" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-black shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6"></textarea>
        </div>
      </div>
    </div>
    <div class="mt-10">
      <button type="submit" class="block w-full rounded-md bg-[#36FF24]/70 px-3.5 py-2.5 text-center text-sm font-semibold text-gray-100 shadow-sm hover:bg-[#36FF24]/70 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Envoyer</button>
    </div>
  </form>
</div>
<?php 
require_once "../INCLUDES/footer.php";
?>
</body>
</html>



