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
    echo "Voulez vous retourner à l'accueil ?";
    echo "<form action='../HTML/accueil.php'><br>";
    echo "<input type='submit' value='Accueil'></form>";

  ?>
</body>
</html>
