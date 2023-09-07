<?php 
session_start();
$title = "Contact";
require_once "../INCLUDES/header.php";
require_once "../INCLUDES/menu.php";
?>
<body>

  <form class="form-group mx-auto container-md" action="../SRC/">

    <legend>Nous contacter</legend>

      <label for="NameContact" class="form-label mt-4">Votre Nom:</label>
      <input type="text" class="form-control " name="Nom" id="Nom" required>

      <label for="SurnameContact" class="form-label mt-4">Votre Prénom:</label>
      <input type="text" class="form-control" name="Prenom" id="Prenom" required>

      <label for="PhoneContact" class="form-label mt-4">Votre téléphone:</label>
      <input type="tel" class="form-control" name="tel" id="tel">

      <label for="EmailContact" class="form-label mt-4">Votre E-mail:</label>
      <input type="email" class="form-control" name="email" id="email" required>

      <textarea name="MessageContact" class="form-control" id="message" cols="30" rows="10" placeholder="Votre message...."></textarea>

      <p>J'accepte les conditions générales du site: <input type="checkbox" class="form-check-input" name="OK" id="OK"></p>
            
      <button type="submit" class="btn btn-dark">Envoyer</button>
</form>
<?php 
require_once "../INCLUDES/footer.php";
?>
</body>
</html>



