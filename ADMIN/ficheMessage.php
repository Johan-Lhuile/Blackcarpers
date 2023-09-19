<?php
session_start();

if ($_SESSION['USER']['role'] != 'ADMIN') {
    header('location: ../PUBLIC/index.php');
    exit;
} else {
    $idContact = $_GET['id'];

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM contact WHERE idContact = $idContact";

        $query = $pdo->query($sql);

        $contact = $query->fetch();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Mes Messages';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';
?>

    <div class="flex justify-around items-center ">

        <?php
        require_once '../INCLUDES/sidebar_admin.php';
        ?>
        <div class="info d-flex flex-column  bg-secondary m-5 rounded-4">

            <h4 class="m-3">Nom: <?= $contact["nameC"] ?></h4>
            <h5 class="m-3">Email: <?= $contact["emailC"] ?></h5>
            <h5 class="m-3">Téléphone: <?= $contact["phoneC"] ?></h5>
            <p>Message:<?= $contact["message"] ?></p>

        </div>

         <form  class=" d-flex  m-5">
            <legend>REPONDRE:</legend>
            <textarea name="repondre" cols="30" rows="10"></textarea>
            <button type="submit" class="btn btn-primary mt-4">Envoyer</button>
        </form>

    </div>  

<?php

    require_once '../INCLUDES/footer.php';
}
?>