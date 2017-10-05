<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/accueil.css" />
  <title> Filleul and Co </title>
</head>
<body>
<header>
  <img id ='header' src = '../images/bobine.jpg' style = 'width:50%'>
</header>
  <nav>
    <ul id="menu-bar">
        <a href="../HTML/accueil.php"><li><p>Accueil</p></li></a>
        <a href="../films/liste_films.php"><li class="active"><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
  try{
    function ajouter_un_film(){
      $file_db = new PDO('sqlite:../../../BD/base_de_donnes_FILM.sqlite');
      $requete_code = $file_db->query("SELECT max(code_film) FROM films");
      $donnees = $requete_code->fetch();
      $insert = "INSERT INTO films (code_film,titre_original,titre_francais,pays,date, duree,couleur, realisateur, image)
      VALUES (:code_film,:titre_original,:titre_francais,:pays,:date, :duree,:couleur, :realisateur, :image)";
      if($_GET["titreO"] == "" || $_GET["titreFR"] == "" || $_GET["pays"] == ""
      || $_GET["date"] == "" || $_GET["duree"] == "" || $_GET["couleur"] == ""
      || $_GET["realisateur"] == ""){
        echo "Le film n'a pas été ajouté !<br> Les informations doivent etre éronées.";
        echo "<form action='../HTML/accueil.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
      }
      else{
        $stmt = $file_db->prepare($insert);
        $stmt->bindValue(':code_film', $donnees[0] + 1);
        $stmt->bindParam(':titre_original', $_GET["titreO"]);
        $stmt->bindParam(':titre_francais', $_GET["titreFR"]);
        $stmt->bindParam(':pays', $_GET["pays"]);
        $stmt->bindParam(':date', $_GET["date"]);
        $stmt->bindParam(':duree', $_GET["duree"]);
        $stmt->bindParam(':couleur', $_GET["couleur"]);
        $stmt->bindParam(':realisateur', $_GET["realisateur"]);
        $stmt->bindValue(':image', "NB");
        $stmt->execute();
      }
    }
    ajouter_un_film();
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  // phpinfo(INFO_VARIABLES);
  ?>
</body>
</html>
