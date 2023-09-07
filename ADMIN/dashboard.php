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
    $title = 'Mes Pirates';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';

?>

    <div class="d-flex m-5">
        <div class="sidebar d-flex flex-column w-25 bg-secondary m-5 rounded-4">

            <a href=""><button type="button" class="btn btn-primary btn-lg m-3 ">LISTE DES MEMBRES</button></a>
            <a href="./create_users.php"><button type="button" class="btn btn-primary btn-lg m-3">AJOUTER UN MEMBRE</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PUBLICATIONS</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">PARTENAIRES</button></a>
            <a href=""><button type="button" class="btn btn-primary btn-lg m-3">EVENEMENTS</button></a>
            <a href="../SRC/deconnexion.php"><button type="button" class="btn btn-primary btn-lg m-3">DECONNEXION</button></a>

        </div>

        <div class="main bg-secondary w-75 m-5 rounded-4">

            <table class="table_patient">
                <tbody>
                    <tr>
                        <th scope="row">NOM</th>
                        <th scope="row">PRENOM</th>
                        <th scope="row">EMAIL</th>
                        <th scope="row">TELEPHONE</th>
                        <th scope="row"></th>

                    </tr>
                    <?php foreach ($users as $user) : ?>

                        <tr>
                            <th scope="row"><?= $user["name"] ?></th>
                            <td><?= $user["surname"] ?></td>
                            <td><?= $user["email"] ?></td>
                            <td><?= $user["phone"] ?></td>
                            <td><a href="./ficheMembre.php?id=<?= $user["idUsers"] ?>"><button class="btn btn-primary">Voir</button></a></td>

                        </tr>


                    <?php endforeach; ?>

                </tbody>

            </table>


        </div>

    </div>
<?php

    require_once '../INCLUDES/footer.php';
}
?>