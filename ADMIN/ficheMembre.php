<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $idUser = $_GET['id'];

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM users WHERE idUsers = $idUser";

        $query = $pdo->query($sql);

        $user = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes Pirates';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

<div class="flex flex-col justify-around items-center m-auto max-w-7xl sm:flex-row sm:h-5/6">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>
        <div class="w-full p-4 m-auto bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg sm:max-w-2xl">
            <div class="px-4 sm:px-0">
                <h3 class="text-base font-semibold leading-7 text-gray-100">Fiche membres</h3>
                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-100">Detail personnel.</p>
            </div>
            <div class="mt-6 border-t border-gray-100">
                <dl class="divide-y divide-gray-100">
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Nom</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><?= $user["name"] ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Prénom</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><?= $user["surname"] ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Email</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><?= $user["email"] ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Téléphone</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><?= $user["phone"] ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Points</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><?= $user["points"] ?></dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Points de participation</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0">
                            <form action="./CRUD/update_point.php?id=<?= $idUser ?>" method="post">
                                <input class=" text-gray-900 mb-5" type="number" name="points" min="0" max="100" value="<?= $user["points"] ?>">
                                <button class="flex justify-center rounded-md bg-lime-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 " type="submit">Attribuer</button>
                            </form>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Rôle</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0">
                            <form action="./CRUD/update_role.php?id=<?= $idUser ?>" method="post">
                                <div class="form-check ">
                                    <input type="radio" name="role" id="role" value="USER">
                                    <label for="optionsRadios1">
                                        Utilisateur
                                    </label>
                                </div>
                                <div class="mb-5">
                                    <input type="radio" name="role" id="role" value="ADMIN">
                                    <label for="optionsRadios2">
                                        Administrateur
                                    </label>
                                </div>
                                <button class="flex justify-center rounded-md bg-lime-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-lime-500 " type="submit">Valider</button>
                        </dd>
                    </div>
                    <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                        <dt class="text-sm font-bold leading-6 text-gray-100">Supprimer ce compte</dt>
                        <dd class="mt-1 text-sm leading-6 text-gray-100 sm:col-span-2 sm:mt-0"><button class="inline-flex justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto"><a class="m-auto" href="./CRUD/deleteUsers.php?id=<?= $user["idUsers"] ?>">Supprimer</a></button></dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>