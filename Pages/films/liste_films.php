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
        <a href="../films/liste_films.php"  class="active"><li><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT * FROM films");
    echo "<ul id='liste'><br>";
    foreach ($request as $c){
      $heure = substr($c[4], -3, 1);
      $minute = substr($c[4], -2);
      echo "<a href='../Recherche/reponse_film.php?nom_recherche=$c[1]' ><li><br><br><h2>$c[1]</h2><br><img src = '../images/films/$c[7]' style = 'width:50%'><br><br>
      <p>Réalisateur : $c[6]</p><p>Pays : $c[2]</p><p>Date : $c[3]</p><p>Durée : $heure h $minute</p></li></a><br>";
    }
    echo "</ul><br>";
  ?>
  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
