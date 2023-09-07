<?php 
session_start();
$title = "Contact";
require_once "../INCLUDES/header.php";
require_once "../INCLUDES/menu.php";
?>
<body>

  <form  class="form-group mx-auto container-md" action="../ADMIN\CRUD\traitement_contact.php" method="POST">

    <legend>Nous contacter</legend>

      <label for="Name" class="form-label mt-4">Nom et prénom:</label>
      <input type="text" class="form-control " name="name" id="Nom" required>

      <label for="Phone" class="form-label mt-4">Téléphone:</label>
      <input type="tel" class="form-control" name="phone" id="tel" required>

      <label for="Email" class="form-label mt-4">E-mail:</label>
      <input type="email" class="form-control" name="email" id="email" required>

      <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Votre message...."></textarea>

      <!-- <p>J'accepte les conditions générales du site: <input type="checkbox" class="form-check-input" name="OK" id="OK"></p> -->
            
      <button type="submit" class="btn btn-dark">Envoyer</button>
</form>
<?php 
require_once "../INCLUDES/footer.php";
?>
</body>
</html>



