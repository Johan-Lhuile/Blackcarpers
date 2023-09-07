<header>
  <nav>
    <a href="../PUBLIC/index.php">
      <img
        id="logo"
        src="../MEDIA/logo.png"
        alt="logo"
        width="300px"
        height="200px"
    /></a>

    <a id="button" href="../PUBLIC/Galerie.php">
      <h2>GALERIE</h2>
    </a>

    <a id="button" href="../PUBLIC/Partenariats.php">
      <h2>PARTENARIATS</h2>
    </a>

    <a id="button" href="../PUBLIC/Evenements.php">
      <h2>EVENEMENTS</h2>
    </a>

    <a id="button" href="../PUBLIC/contact.php">
      <h2>CONTACT</h2>
<?php
  if(!isset($_SESSION['USER'])){
    echo "<a id='button' href='../PUBLIC/connexion.php'>
      <h2>CONNEXION</h2>
    </a>";
  }else{
    if($_SESSION['USER']['role'] === 'USER'){
    echo "<a id='button' href='../USERS\dashboardUsers.php'>
    <h2>Mon Compte</h2>
    </a>";
    }else{
      echo "<a id='button' href='../ADMIN\dashboard.php'>
    <h2> ADMIN </h2>
    </a>";
    }
  }
?>    
  </nav>
</header>
