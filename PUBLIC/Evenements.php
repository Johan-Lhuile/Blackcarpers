<?php 
session_start();

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM evenements JOIN documents ON idEvenements = documents.fk_id AND categories = 'event' GROUP BY evenements.titre ORDER BY documents.created_at DESC";

        $query = $pdo->query($sql);

        $evenements = $query->fetchAll();

        $sql = " SELECT * FROM evenements JOIN documents ON idEvenements = documents.fk_id AND categories = 'event' GROUP BY documents.liens ORDER BY created_at DESC";

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

    <section class="p-4 lg:p-8 dark:bg-gray-800 dark:text-gray-100">
	<div class="container mx-auto space-y-12">
		<div class="flex flex-col overflow-hidden rounded-md shadow-sm lg:flex-row">
			<img src="<?=$evenement['liens']?>" alt="" class="h-80 dark:bg-gray-500 aspect-video">
			<div class="flex flex-col justify-center flex-1 p-6 dark:bg-gray-900">
				<span class="text-xs text-white uppercase dark:text-gray-400">Rejoind l'aventure</span>
				<h3 class="text-3xl text-white font-bold"><?=$evenement['titre']?></h3>
				<p class="my-6 text-white dark:text-gray-400"><?=$evenement['description']?></p>
                <a href="">
				<button type="button" class="px-6 py-3 font-semibold rounded bg-[#36FF24]/70 text-gray-100">Je télecharge la fiche d'inscription</button>
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