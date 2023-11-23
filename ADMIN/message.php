<?php

session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM contact";

        $query = $pdo->query($sql);

        $contacts = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes messages';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
}

?>

<div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

    <?php
    require_once '../INCLUDES/sidebar_admin.php';

    ?>

<div class="container p-2 mx-auto sm:p-4 text-gray-100 max-w-3xl bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg divide-y divide-gray-100">
	<h2 class="mb-4 text-2xl font-semibold leadi">Emails</h2>
	<div class="flex flex-col overflow-x-auto text-xs">
		<div class="flex text-left ">

			<div class="w-32 px-2 py-3 sm:p-3">Sender</div>
			<div class="flex-1 px-2 py-3 sm:p-3">Messages</div>
			<div class="w-24 px-2 py-3 text-right sm:p-3 sm:block">Reçu le :</div>
		</div>
        <?php foreach ($contacts as $contact) : ?>
		<div class="flex border-b border-opacity-20">

			<div class="w-32 px-2 py-3 sm:p-3">
				<p><?= $contact["nameC"] ?></p>
			</div>
			<a class="flex-1 block w-50 truncate px-2 py-3  sm:p-3 " href="./ficheMessage.php?id=<?=$contact['idContact']?>">
			<p><?= $contact["message"] ?></p>
			</a>
			<div class="w-24 px-2 py-3 text-right sm:p-3 sm:block ">
				<?= $contact["created_at"] ?>
			</div>
		</div>
        <?php endforeach ?>
	</div>
</div>



</div>

<?php
require_once '../INCLUDES/footer.php';

?>