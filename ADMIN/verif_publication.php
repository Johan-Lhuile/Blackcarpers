<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    
    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM publications WHERE isVerified = false ";

        $query = $pdo->query($sql);

        $verifs = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Verifications';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';

?>
    <div class="flex flex-col justify-around items-center sm:flex-row m-auto max-w-7xl">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>

        <div class="main bg-secondary w-75 m-5 rounded-4">

            <table class="table_patient">
                <tbody>

                    <?php foreach ($verifs as $verif) : ?>

                        <tr>
                            <th scope="row"><?= $verif["titre"] ?></th>
                            <td><?= $verif["dateCreation"] ?></td>
                            <td><?= $verif["description"] ?></td>
                            <td><?= $verif["phone"] ?></td>
                            <td><a href="./ficheMembre.php?id=<?= $verif["idUsers"] ?>"><button class="btn btn-primary">Voir</button></a></td>

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
