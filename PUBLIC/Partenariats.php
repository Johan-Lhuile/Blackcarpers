<?php
session_start();

    try {
        require_once '../SRC/connect_BDD.php';
        $pdo = new PDO($attr, $user, $pass, $opts);

        $sql = " SELECT * FROM partenaires";

        $query = $pdo->query($sql);

        $partenaires = $query->fetchAll();
    } catch (PDOException $e) {
        throw new PDOException($e->getMessage());
    }
    $title = 'Nos partenaires';
    require_once '../INCLUDES/header.php';
    require_once '../INCLUDES/menu.php';
    require_once '../INCLUDES/titre_page.php';


?>


    <ul role="list" class="max-w-4xl mx-auto my-24 bg-[#36FF24]/50 divide-y divide-gray-100">
        <?php foreach ($partenaires as $partenaire) : ?>
            <li class="flex my-12 rounded-lg justify-between gap-x-20 p-12">
                <div class="flex min-w-0 gap-x-4">
                    <div class="min-w-0 flex-auto">

                        <p class="text-xl font-bold leading-6 text-gray-900"><?= $partenaire["nameP"] ?></p>
                        <p class="mt-1 text-sm leading-5 text-gray-800"><?= $partenaire["emailP"] ?></p>
                        <p class="mt-1 text-sm leading-5 text-gray-800"><?= $partenaire["phoneP"] ?></p>
                        <p class="mt-1 text-sm leading-5 text-gray-800">Responsable: <?= $partenaire["responsable"] ?></p>
                        <p class="mt-1 text-sm leading-5 text-gray-800">Membres: <?= $partenaire["nbTeam"] ?></p>
                    </div>
                </div>
                <div class="sm:flex sm:flex-col sm:items-end">
                    <p class="text-lg leading-6 text-gray-900"><?= $partenaire["message"] ?></p>

                <?php endforeach; ?>
                </div>
            </li>
    </ul>




</div>

<?php
require_once '../INCLUDES/footer.php'

?>
    
    <!-- <div class="main-partenaire">
      <div class="main-P">
        <a href="http://fatal-carpe.fr/index.php?"
          ><img
            src="../MEDIA/fatalcarpe.jpg"
            alt="fatalcarpe"
            height="300px"
            width="600px"
        /></a>
        <div class="text">
          <h3>FATAL CARPE <a href="https://www.facebook.com/fatalcarpe" target="_blank"><i class="bi bi-facebook"></i></a><a href="http://fatal-carpe.fr/index.php?" target="_blank"><div class="ion-ios-cart"></div></a></h3>
          <p> 
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
            odit vitae eligendi, ad expedita fuga officiis blanditiis quas
            dignissimos voluptatum obcaecati exercitationem maxime quidem
            explicabo, consequatur excepturi quibusdam repudiandae architecto
            libero. Deserunt similique adipisci totam atque culpa animi ex
            itaque repellendus nihil mollitia suscipit laudantium voluptas, quia
            facilis veritatis ipsa eius. Recusandae, rerum nobis voluptas vel
            delectus perspiciatis nesciunt nisi nostrum corrupti tenetur quia.
            Illum, odit. Numquam aliquid illo nostrum maiores, itaque deleniti.
            Sunt asperiores temporibus pariatur, cum eius ad?
          </p>
        </div>
      </div>

      <div class="main-P">
        <a href="https://www.zigapeche.fr/"
          ><img src="../media/zigapeche-aire-sur-la-lys.jpg" alt="" height="300px" width="400px"
        /></a>
        <div class="text">
          <h3>ZIGAPECHE <a href="https://www.facebook.com/zigapeche"><i class="bi bi-facebook"></i></a> <a href="https://www.zigapeche.fr//"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
            odit vitae eligendi, ad expedita fuga officiis blanditiis quas
            dignissimos voluptatum obcaecati exercitationem maxime quidem
            explicabo, consequatur excepturi quibusdam repudiandae architecto
            libero. Deserunt similique adipisci totam atque culpa animi ex
            itaque repellendus nihil mollitia suscipit laudantium voluptas, quia
            facilis veritatis ipsa eius. Recusandae, rerum nobis voluptas vel
            delectus perspiciatis nesciunt nisi nostrum corrupti tenetur quia.
            Illum, odit. Numquam aliquid illo nostrum maiores, itaque deleniti.
            Sunt asperiores temporibus pariatur, cum eius ad?
          </p>
        </div>
      </div>

      <div class="main-P">
        <a href="https://tackle-carp-shop.fr/fr/"
          ><img src="../media/TCS.jpg" alt="" height="300px" width="300px"
        /></a>
        <div class="text">
          <h3>TACKLE-CARP-SHOP <a href="https://www.facebook.com/profile.php?id=100047069715725"><i class="bi bi-facebook"></i></a> <a href="https://tackle-carp-shop.fr/fr/"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Date de création:01/06/2017 <br> Lieu: Grand Est entre Nancy et Epinal(54) <br> Responsable: Eddy Gallaire <br> TEAM: 20 membres <br>
            Vente de matériel (tackle) pour la pêche de la carpe. Un patenaire de longue date, connu au bord de l'eau au Fishabil ( de l'autre coté de Rennes). Un carpiste, un passionné, qui un jour, s'est décideé à sélectionner et à proposer au public des produits à pris abordable. Un site de produits à prix sympa pour toutes les bourses.... un coup d'oeil pour se faire plaisir. <br>
            Un grand MERCI à toi Eddy pour ta grande amitié, toujours un plaisir de se voir!
            
          </p>
        </div>
      </div>

      <div class="main-P">
        <a href="https://kitcarpe.com/"
          ><img src="../media/kitcarpe.jpg" alt="" height="300px" width="500px"
        /></a>
        <div class="text">
          <h3>KITCARPE <a href="https://www.facebook.com/kitcarpe/?locale=fr_FR"><i class="bi bi-facebook"></i></a><a href="https://kitcarpe.com/"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Date de création: 12/2016 <br> Lieu: Basse Normandie <br> Responsable: Jean-Sebastien Delaby <br> TEAM: 10 testeurs/ 17 consultants/ 7jeunes de moins de 18 ans <br>
            Fabriquant d'appats frais pour la pêche à la carpe (Bouillette/Pop-up/Equilibré/Arômes/etc). Un partenaire en recherche permanente d'amélioration de ses produits à travers ses pêcheurs.
            Un partenaire de longue date avec un  passionné, un carpiste (Jean-Sébastien Delaby) qui vous propose des produits personnalisables à prix abordable pour le bonheur des Addicts de Dame Carpe. <br>
            Un partenaire devenu un ami au fil du temps, donc un grand MERCI à toi Jean-Sébastien pour ton amitié et ta convivialité.           
          </p>
        </div>
      </div>

      <div class="main-P">
        <a href="https://www.fusion-baits.fr/"
          ><img src="../media/fusion b.jpg" alt="" height="300px" width="500px"
        /></a>
        <div class="text">
          <h3>FUSION BAITS <a href="https://www.facebook.com/FuisionBaits"><i class="bi bi-facebook"></i></a> <a href="https://www.fusion-baits.fr/"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Date de création:04/2022 <br> Lieu: Aingeray (54) <br> Responsable: Quentin Marquant <br> TEAM: 26 membres <br>
            Fabriquant d'appats frais pour la pêche à la carpe (Bouillette/Pop-up/Equilibré/Arômes/etc).  Un partenaire devenu un ami où je me fais un plaisir d'aller le voir directement à son atelier pour parler Carpe et produits... un passionné en vrai travail de reflexion pour faire progresser ses produits, satisfaire sa tram et sa clientéle. N'hésitez pas à contacter Quentin pour toute demande. <br>
            Un grand MERCI à toi Quentin pour ta transparence, ton acceuil et ton amitié.
          </p>
        </div>
      </div>

      <div class="main-P">
        <a href="https://www.cpbaitsbouilletteartisanale.fr/"
          ><img src="../media/cp baits.jpg" alt="" height="500px" width="300px"
        /></a>
        <div class="text">
          <h3>CP BAITS <a href="https://www.facebook.com/groups/673907826912300/"><i class="bi bi-facebook"></i></a> <a href="https://www.cpbaitsbouilletteartisanale.fr/"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit
            odit vitae eligendi, ad expedita fuga officiis blanditiis quas
            dignissimos voluptatum obcaecati exercitationem maxime quidem
            explicabo, consequatur excepturi quibusdam repudiandae architecto
            libero. Deserunt similique adipisci totam atque culpa animi ex
            itaque repellendus nihil mollitia suscipit laudantium voluptas, quia
            facilis veritatis ipsa eius. Recusandae, rerum nobis voluptas vel
            delectus perspiciatis nesciunt nisi nostrum corrupti tenetur quia.
            Illum, odit. Numquam aliquid illo nostrum maiores, itaque deleniti.
            Sunt asperiores temporibus pariatur, cum eius ad?
          </p>
        </div>
      </div>
      <div class="main-P">
        <a href="https://lead-fishing.com//"
          ><img src="../media/leadfishing.jpg" alt="" height="300px" width="400px"
        /></a>
        <div class="text">
          <h3>LEAD FISHING <a href="https://www.facebook.com/leadfishingcom/?locale=fr_FR"><i class="bi bi-facebook"></i></a> <a href="https://lead-fishing.com/"><div class="ion-ios-cart"></div></a></h3>
          <p>
            Date de création:01/04/2017 <br> Lieu: Vermelles (62) <br> Responsable: Jonathan Ségard <br> TEAM: 14 membres <br>
            Vente de matériel pour la pêche de la carpe à la batterie sous notre propre marque (tackle et plomb). <br>
            Distributeur de marques ( RidgeMonkey, NGT, ROK et Mivardi).
            Un partenaire de longue dateavec un passionné, un carpiste ( Jonathan Ségard) qui vous propose des produits à prix abordable pour le bonheur des addicts de la carpe.
            Un grand merci à toi Jonathan!

          </p>
        </div>
      </div>
    </div> -->

<?php 
require_once "../INCLUDES/footer.php";
?>
  </body>
</html>
