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
        <a href="../genres/liste_genres.php"><li class="active"><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT * FROM genres");
    echo "<ul id='liste'><br>";
    foreach ($request as $c){
      echo "<a href='' ><li><br><br><h2>$c[1]</h2><br><img src = '../images/$c[2].jpg' style = 'width:50%'><br><br></li></a><br>";
    }
  ?>
</body>
</html>
