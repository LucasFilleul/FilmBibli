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
        <a href="../acteur/liste_acteurs.php"  class="active"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
    echo "<fieldset id='blanc'>";
    echo "<h2 id='blanc'>Recherche :</h2>";
    echo "<form action='../Recherche/reponse_acteur.php'><br>";
    echo "Nom Acteur : <input type='text' name='nom_recherche'> Exemple( 'Affleck' )<br>";
    echo "<input type='submit' value='Rechercher'></form>";
    echo "</fieldset>";
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT * FROM acteurs ORDER BY nom");
    echo "<ul id='liste'><br>";
    foreach ($request as $c){
      echo "<a href='../Recherche/reponse_acteur.php?nom_recherche=$c[0]' ><li><br><br><h2>$c[2] $c[1]</h2><br><img src = '../images/acteurs/$c[6]' style = 'width:50%'><br><br></li></a><br>";
    }
      echo "</ul><br>";
  ?>
  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
