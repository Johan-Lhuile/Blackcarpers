<?php
session_start();

$id = $_GET['id'];
$token = $_GET['token'];
require_once '../SRC/connect_BDD.php';
$pdo = new PDO($attr, $user, $pass, $opts);


$sql = "SELECT * FROM users WHERE token = :token";

$query = $pdo->prepare($sql);

$query->bindValue(":token", $token, PDO::PARAM_STR);

$query->execute();

$users = $query->fetch();

if ($users) {


    $id = $users['idUsers'];
    $token = $users['token'];

    $title = "Connexion";
    require_once "../INCLUDES/header.php";
    require_once "../INCLUDES/menu.php";
?>

    <div class="max-w-2xl mx-auto my-24 rounded-lg isolate bg-gradient-to-t from-[#36FF24]/20 to-black/60 px-6 py-24 sm:py-32 lg:px-8">
        <div class="absolute inset-x-0 top-[-10rem] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[-20rem]" aria-hidden="true">
        </div>
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-100 sm:text-4xl">NOUVEAU MOT DE PASSE </h2>
            <p class="mt-2 text-lg leading-8 text-gray-100"></p>
        </div>
        <form method="POST" class="mx-auto mt-16 max-w-xl sm:mt-20">
            <div class="sm:col-span-2">

                <div class="sm:col-span-2">
                    <label for="email" class="block text-sm font-semibold leading-6 text-gray-100">Mot de passe</label>
                    <div class="mt-2.5">
                        <input type="password" name="pass1" id="pass" autocomplete="email" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="pass" class="block text-sm font-semibold leading-6 text-gray-100"> Verifier Mot de passe</label>
                    <div class="mt-2.5">
                        <input type="password" name="pass2" id="pass" autocomplete="pass" class="block w-full rounded-md border-0 px-3.5 py-2 mb-5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                </div>


            </div>
            <div class="mt-10">
                <button type="submit" class="block w-full rounded-md bg-[#36FF24]/80 px-3.5 py-2.5 text-center text-sm font-semibold text-black shadow-sm hover:bg-[#36FF24]/70 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-lime-600">Soumettre</button>
            </div>


        </form>
    </div>



<?php
    require_once "../INCLUDES/footer.php";




    if (isset($_POST['pass1']) && $_POST['pass1'] === $_POST['pass2']) {

        $password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);

        $token = bin2hex(random_bytes(16));

        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " UPDATE users SET password = :password, token = :token WHERE idUsers = $id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':token', $token, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['sucess'] = 'Mot de passe modifié';

        header('location: ../PUBLIC/connexion.php');
    }
}else{
    $_SESSION['error'] = 'Erreur page introuvable';
    header('location: ../PUBLIC/connexion.php');
}
