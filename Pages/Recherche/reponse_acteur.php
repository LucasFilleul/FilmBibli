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
        <a href="../films/liste_films.php"><li><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php" class="active"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
    // RESSORT L ID DU GENRE
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $nom_recherche = $_GET['nom_recherche'];
    $request = $file_db->query("SELECT * FROM acteurs WHERE nom='$nom_recherche'");
    $donnees = $request->fetch();
    $idacteur = $donnees[0];
    if($idacteur == ""){
      echo "L'acteur rentré n'est pas dans notre base de données.<br><br>";
    }
    else
    {
      // RESSORT LA LISTE DES ID DES FILMS DU GENRE.
      $request_liste_id_acteurs = $file_db->query("SELECT ref_code_film FROM ACTEURDANSFILM WHERE ref_code_acteur='$idacteur'");
      // RESSORT LE FILM
      foreach ($request_liste_id_acteurs as $idfilm)
      {
      $request_films = $file_db->query("SELECT * FROM films WHERE code_film ='$idfilm[0]'");
        foreach ($request_films as $film)
        {
          print $film[0] . ", " . $film[1] . ", " .$film[2] . ", " .$film[3] . ", " .$film[4] . ", " .$film[5] . ", " .$film[6] . ", " .$film[7] . ", " . $film[8] . "<br>";
        }
      }
    }
  ?>
  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
