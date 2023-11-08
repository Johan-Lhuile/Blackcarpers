<?php 
session_start();

try {
  require_once '../SRC/connect_BDD.php';
  $pdo = new PDO($attr, $user, $pass, $opts);

  $sql = " SELECT * FROM documents INNER JOIN evenements WHERE idEvenements = documents.fk_id";

  $query = $pdo->query($sql);

  $evenements = $query->fetchAll();

} catch (PDOException $e) {
  throw new PDOException($e->getMessage());
}
require_once "../INCLUDES/header.php";
require_once "../INCLUDES/menu.php";
?>
<body>
  <main>
    <h1>Notre Team, nos Intenables...</h1>
  </main>
       
<?php 
require_once "../INCLUDES/footer.php";
?>      
    
</body>
</html>