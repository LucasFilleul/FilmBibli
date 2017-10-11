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


function detailFilm($nom){
    // METTRE LES CARACTERISTIQUES DES FILMS

    $file_db_films = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db_films->query("SELECT * FROM films WHERE titre='$nom'");
    $c = $request->fetch();
    $heure = substr($c[4], -3, 1);
    $minute = substr($c[4], -2);
    echo "<ul id='liste'><br>";
    echo "<li><h2>$c[1]</h2><br><img src = '../images/films/$c[7]' style = 'width:50%'><br><br>
    <p>Réalisateur : $c[6]</p><p>Pays : $c[2]</p><p>Date : $c[3]</p><p>Durée : $heure h $minute</p></li><br>";
    echo "</ul><br>";
    $file_db = null;
  }

function detailActeur($nom)
  {
    // LES ACTEURS DU FILM.

    $file_db_acteurs_du_film = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");

    $id_film = $file_db_acteurs_du_film->query("SELECT code_film FROM films WHERE titre='$nom'");

    $id_acteur = $file_db_acteurs_du_film ->query("SELECT ref_code_acteur FROM ACTEURDANSFILM WHERE ref_code_film ='$id_film'");


    echo "<ul id='liste'><br>";

    foreach ($id_acteur as $act){
      $acteur = $file_db_acteurs_du_film-> query("SELECT * FROM acteurs WHERE code_indiv ='$act'");
      echo "<a href='../Recherche/reponse_acteur.php?nom_recherche=$act[1]' ><li><br><br><h2>$act[2] $act[1]</h2><br><img src = '../images/acteurs/$act[6]' style = 'width:50%'><br><br></li></a><br>";
    }
      echo "</ul><br>";
}

  $nom_recherche = $_GET['nom_recherche'];
  detailFilm($nom_recherche);
  detailActeur($nom_recherche);
  ?>

  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
