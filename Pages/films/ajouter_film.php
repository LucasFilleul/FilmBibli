<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/accueil.css" />
  <title> Filleul and Co </title>
</head>
<body>
  <header>
    <h1 id='centerdroite'>Filleul</h1>
    <img id ='header' src = '../images/bobine.jpg' style = 'width:50%'>
    <h1 id='centergauche'>Fauvin</h1>
  </header>
  <nav>
    <ul id="menu-bar">
        <a href="../HTML/accueil.php"><li><p>Accueil</p></li></a>
        <a href="../films/liste_films.php" class="active"><li><p>Films</p></li></a>
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
      $insert = "INSERT INTO films (code_film,titre,pays,date, duree,couleur, realisateur, image)
      VALUES (:code_film,:titre,:pays,:date, :duree,:couleur, :realisateur, :image)";
      if($_POST["titre"] == "" || $_POST["pays"] == ""
      || $_POST["date"] == "" || $_POST["duree"] == "" || $_POST["couleur"] == ""
      || $_POST["realisateur"] == ""){
        echo "<fieldset id='blanc'>";
        echo "<h4 id='blanc'>Le film n'a pas été ajouté !<br> Les informations doivent etre éronées.";
        echo "<form action='../films/ajouter_film.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
        echo "</fieldset>";
      }
      else{
        $stmt = $file_db->prepare($insert);
        $stmt->bindValue(':code_film', $donnees[0] + 1);
        $stmt->bindParam(':titre', $_POST["titre"]);
        $stmt->bindParam(':pays', $_POST["pays"]);
        $stmt->bindParam(':date', $_POST["date"]);
        $stmt->bindParam(':duree', $_POST["duree"]);
        $stmt->bindParam(':couleur', $_POST["couleur"]);
        $stmt->bindParam(':realisateur', $_POST["realisateur"]);
        $stmt->bindValue(':image', "NB.jpg");
        $stmt->execute();
        echo "<fieldset id='blanc'>";
        echo "<h4 id='blanc'>Le film a bien été ajouté !<br>";
        echo "<form action='liste_films.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
        echo "</fieldset>";
      }
    }
    if($_SERVER['REQUEST_METHOD'] == "GET"){
      echo "<fieldset id='blanc'>";
      echo "<form method='POST' action='ajouter_film.php'><br>";
      echo "<br><h2 id='blanc'>Quel est le film que vous voulez ajouter ?</h2><br><br>";
      echo "Titre du film  : <input type='text' name='titre' required placeholder='Titanic'><br><br>";
      echo "Pays d'origine : <input type='text' name='pays' required placeholder='USA / FR'><br><br>";
      echo "Date de sortie : <input type='text' name='date' required placeholder='2001'><br><br>";
      echo "Durée du film  : <input type='text' name='duree' required placeholder='155 (1h55min)'><br><br>";
      echo "Couleur        : <input type='text' name='couleur' required placeholder='NB (Noir et Blanc) / Couleur'><br><br>";
      echo "Réalisateur    : <input type='text' name='realisateur' required placeholder='Stanley Kubrick'><br><br>";
      echo "<input type='submit' value='Valider'></form>";
      echo "</fieldset>";
    }
    else{
      ajouter_un_film();
    }
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  // phpinfo(INFO_VARIABLES);
  ?>
  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
