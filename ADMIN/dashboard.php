<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM USERS";

        $query = $pdo->query($sql);

        $users = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'MES PIRATES';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';

?>
    
    <div class="flex justify-around items-center">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>

        <main class="bg-gradient-to-t from-[#36FF24]/50 to-black/60 rounded-lg">
            <div class="row">

                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="text-white border border-white p-4">NOM</th>
                            <th class="text-white border border-white p-4">PRENOM</th>
                            <th class="text-white border border-white p-4">EMAIL</th>
                            <th class="text-white border border-white p-4">TELEPHONE</th>
                            <th class="text-white border border-white p-4">Consulter</th>
                        </tr>
                    </thead>
                    <?php foreach ($users as $user) : ?>

                        <tbody>
                            <tr>
                                <td class="text-white border border-white p-4"><?= $user["name"] ?></td>
                                <td class="text-white border border-white p-4"><?= $user["surname"] ?></td>
                                <td class="text-white border border-white p-4"><?= $user["email"] ?></td>
                                <td class="text-white border border-white p-4"><?= $user["phone"] ?></td>
                                <td class=" border border-white p-4"><a href="./ficheMembre.php?id=<?= $user["idUsers"] ?>"><button class="bg-[#36FF24] p-2 rounded-lg text-center font-bold shadow-md shadow-[#36FF24]">Voir</button></a></td>
                            </tr>
                        </tbody>


                    <?php endforeach; ?>

                    

                </table>


            </div>
        </main>

    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>