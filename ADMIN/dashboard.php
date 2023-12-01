<?php
session_start();

$idUser = $_SESSION['USER']['idUsers'];

if ($_SESSION['USER']['role'] != 'ADMIN') {
    $_SESSION['error'] = "Vous n'avez pas accés à cette page";
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM users WHERE idUsers = $idUser ";

        $query = $pdo->query($sql);

        $user = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    $title = 'Mon Compte';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
	require_once '../INCLUDES/message.php';
?>

    <div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">
		
        <?php
        require_once '../INCLUDES/sidebar_admin.php'
        ?>

<section class="p-6  text-gray-50">
	<form action="./CRUD/traitement_profil_admin.php" method="POST" class="container flex flex-col mx-auto space-y-12">
		<fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm bg-gradient-to-t from-[#36FF24]/50 to-black/60">
			<div class="space-y-2 col-span-full lg:col-span-1">
				<p class="font-medium">Informations personnelles</p>
				<p class="text-xs">Modifications des infos</p>
			</div>
			<div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
				<div class="col-span-full sm:col-span-3">
					<label for="firstname" class="text-sm">Prénom</label>
					<input name="firstname" id="firstname" type="text" value="<?=$user['surname']?>" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
				</div>
				<div class="col-span-full sm:col-span-3">
					<label for="lastname" class="text-sm">Nom</label>
					<input name="name" id="lastname" type="text" value="<?=$user['name']?>" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
				</div>
				<div class="col-span-full sm:col-span-3">
					<label for="email" class="text-sm">Email</label>
					<input name="email" id="email" type="email" value="<?=$user['email']?>" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
				</div>
				<div class="col-span-full sm:col-span-3">
					<label for="phone" class="text-sm">Téléphone</label>
					<input name="phone" id="phone" type="text" value="<?=$user['phone']?>" class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
				</div>
				<!-- <div class="col-span-full">
					<label for="bio" class="text-sm">Photo</label>
					<div class="flex items-center space-x-2">
						<img src="../MEDIA/avatar_1699450451139.png" alt="" class="w-10 h-10 rounded-full bg-gray-500 bg-gray-700">
						<button type="button" class="px-4 py-2 border rounded-md border-gray-100">Change</button>
					</div>
				</div> -->
                <div class="space-y-2">
                <div>
                    <button type="submit" class=" px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">Modifier</button>
                </div>

            </div>
			</div>
		</fieldset>
		<fieldset class="grid grid-cols-4 gap-6 p-6 rounded-md shadow-sm bg-gradient-to-t from-[#36FF24]/50 to-black/60">
			<div class="space-y-2 col-span-full lg:col-span-1">
				<p class="font-medium">Mot de passe</p>
				<p class="text-xs">Changement de mot de passe</p>
			</div>
			<div class="grid grid-cols-6 gap-4 col-span-full lg:col-span-3">
				<div class="col-span-full sm:col-span-3">
					<label for="pass1" class="text-sm">Mot de passe</label>
					<input name="pass1" id="pass1" type="password"  class="w-full rounded-md focus:ring focus:ri focus:ri border-gray-700 text-gray-900">
				</div>


                <div class="space-y-2">
                <div>
                    <button type="submit" class=" px-8 py-3 font-semibold rounded-md bg-green-400 text-gray-900">Modifier</button>
                </div>
			</div>
		</fieldset>
	</form>
</section>


    </div>



    <?php

    require_once '../INCLUDES/footer.php';
}
    ?>