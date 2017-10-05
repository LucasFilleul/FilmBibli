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
        <a href="../films/liste_films.php"><li><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li class="active"><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
  if($_SERVER['REQUEST_METHOD'] == "GET"){
    echo "<form method='POST' action='recherche.php'><br>";
    echo "<br><h4>Quel est le type de votre recherche ?</h4>";
    echo "<input type='radio' name='P_recherche' value='acteur'>Par Acteur";
    echo "<input type='radio' name='P_recherche' value='genre'>Par Genre";
    echo "<input type='radio' name='P_recherche' value='film'>Par Film";
    echo "<br><br><input type='submit' value='Valider'></form>";
  }
  else{
    if($_POST['P_recherche'] == "acteur"){
      echo "<form action='reponse_acteur.php'><br>";
      echo "Nom Acteur : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
    elseif($_POST['P_recherche'] == "genre"){
      echo "<form action='reponse_genre.php'><br>";
      echo "Nom Genre : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
    elseif($_POST['P_recherche'] == "film"){
      echo "<form action='reponse_film.php'><br>";
      echo "Nom Film : <input type='text' name='nom_recherche'><br>";
      echo "<input type='submit' value='Rechercher'></form>";
    }
  }
  ?>
</body>
</html>
