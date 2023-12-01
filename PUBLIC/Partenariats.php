<?php
session_start();

try {
  require_once '../SRC/connect_BDD.php';
  $pdo = new PDO($attr, $user, $pass, $opts);

  $sql = " SELECT * FROM partenaires";

  $query = $pdo->query($sql);

  $partenaires = $query->fetchAll();
} catch (PDOException $e) {
  throw new PDOException($e->getMessage());
}
$title = 'Nos partenaires';
require_once '../INCLUDES/header.php';
require_once '../INCLUDES/menu.php';
require_once '../INCLUDES/titre_page.php';


?>

<?php foreach ($partenaires as $partenaire) : ?>
  <div class=" max-w-6xl mx-auto my-24 rounded-lg bg-[#36FF24]/40">

    <div class="flex flex-col sm:flex-row my-8 rounded-lg justify-between gap-x-20 p-6">

      <div class="flex flex-col">

        <p class="text-3xl font-bold leading-6 text-gray-100"><?= $partenaire["nameP"] ?></p>
        <p class="mt-1 text-md leading-6 text-gray-100"><?= $partenaire["emailP"] ?></p>
        <p class="mt-1 text-md leading-6 text-gray-100"><?= $partenaire["phoneP"] ?></p>
        <p class="mt-1 text-md leading-6 text-gray-100">Responsable: <?= $partenaire["responsable"] ?></p>
        <p class="mt-1 text-md leading-6 text-gray-100">Membres:<br> <?= $partenaire["nbTeam"] ?></p>
      </div>

      <div class="flex flex-col ">

        <div class="flex flex-col sm:flex-row">
        <a href="<?= $partenaire["lien"] ?>" target="_blank" rel="noopener noreferrer"><img src="<?= $partenaire["logo"] ?>" alt="" class="object-contain object-center rounded-md h-72"></a>
        <div class="flex flex-row m-6 items-center">
        <a class="m-2 sm:m-6 p-2 font-bold text-gray-100 text-xl border-solid border-2 border-white bg-[#36FF24]/50 rounded-lg hover:bg-[#36FF24]/40" href="<?= $partenaire["lienF"] ?>" target="_blank" rel="noopener noreferrer">Son Facebook</a>
        <a class="m-2 sm:m-6 p-2 font-bold text-gray-100 text-xl border-solid border-2 border-white bg-[#36FF24]/50 rounded-lg hover:bg-[#36FF24]/40" href="<?= $partenaire["lien"] ?>" target="_blank" rel="noopener noreferrer">Sa Boutique </a>
        </div>
        </div>
        <p class=" mt-1 sm:mt-8 text-lg leading-8 text-gray-100"><?= $partenaire["message"] ?></p>

      </div>
    </div>
  </div>
<?php endforeach; ?>



</div>

<?php
require_once '../INCLUDES/footer.php'

?>