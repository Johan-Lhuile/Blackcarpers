<?php 
$title = "Connexion";
require_once "../INCLUDES/header.php";
require_once "../INCLUDES/menu.php";
?>
<h2>Connexion reservée aux membres de l'association</h2>
<form action="../SRC/connexion.php" class="mx-auto" method="POST">
  <fieldset>
    <legend>Connexion</legend>

    <div class="form-group">
      <label for="email" class="form-label mt-4">Email </label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Entrer email">
    </div>
    <div class="form-group">
      <label for="pass" class="form-label mt-4 ">Password</label>
      <input type="password" name="pass" class="form-control mb-5" id="pass" placeholder="Password" autocomplete="off">
    </div>
    </fieldset>
    <button type="submit" class="btn btn-light">Connexion</button>
  </fieldset>
</form>

<?php
require_once "../INCLUDES/footer.php";
?>