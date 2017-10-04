<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/films.css" />
  <title> Films </title>
</head>
<body>
  <?php
    // RESSORT L ID DU GENRE
    $file_db = new PDO("sqlite:../../BD/genres.sqlite");
    $nom_recherche = $_GET['nom_recherche'];
    $request = $file_db->query("SELECT * FROM genres WHERE nom_genre='$nom_recherche'");
    $donnees = $request->fetch();
    $idgenre = $donnees[0];

    // RESSORT LA LISTE DES FILMS DU GENRE
    $file_db2 = new PDO("sqlite:../../BD/R_Film_Genre.sqlite");
    $request_liste_films = $file_db2->query("SELECT ref_code_film FROM FILMESTDEGENRE WHERE ref_code_genre='$idgenre'");
    $liste_films = $request_liste_films->fetch();
    foreach ($liste_films as $film) {
      echo $film;
    }

    //echo "Voulez vous retourner à l'accueil ?";
    // echo "<form action='accueil.php'><br>";
    // echo "<input type='submit' value='Accueil'></form>";

  ?>
</body>
</html>
