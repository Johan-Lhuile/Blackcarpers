<?php 
session_start();

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM evenements ORDER BY evenements.created_at DESC";

        $query = $pdo->query($sql);

        $evenements = $query->fetchAll();


    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Nos Evenements';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';

?>

<body>  

<?php foreach($evenements as $evenement) :?>

    <section class=" max-w-7xl m-auto p-4 lg:p-8">
	<div class="container mx-auto space-y-12">
		<div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
			<img src="<?=$evenement['affiche']?>" alt="" class="h-80 object-contain">
			<div class="flex flex-col justify-center flex-1 p-12 dark:bg-gray-900">
				<span class="text-xs text-white uppercase ">Rejoind l'aventure</span>
				<h3 class="text-3xl text-white font-bold"><?=$evenement['titre']?></h3>
				<p class="my-6 text-white "><?=$evenement['description']?></p>
                <a href="<?=$evenement['doc_pdf']?>" download >
				<button type="button" class="px-6 py-3 font-semibold rounded bg-[#36FF24]/70 text-gray-100">Télecharge le dossier d'inscription</button>
                </a>
			</div>
		</div>
		
		</div>
	</div>
</section>

<?php endforeach ?>

  <?php 
require_once "../INCLUDES/footer.php";

?>
</body>
</html>