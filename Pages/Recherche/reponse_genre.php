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
    function selectGenre($nomgenre){
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      $request = $file_db->query("SELECT * FROM genres WHERE nom_genre='$nomgenre'");
      $donnees = $request->fetch();
      $idgenre = $donnees[0];
      $file_db = null;
      return $idgenre;
    }
    function selectfilmdugenre($id){
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      if($id == ""){
        echo "Le genre rentré n'est pas dans notre base de données.<br><br>";
      }
      else
      {
        // RESSORT LA LISTE DES ID DES FILMS DU GENRE.
        $request_liste_films = $file_db->query("SELECT ref_code_film FROM FILMESTDEGENRE WHERE ref_code_genre='$id'");
        // RESSORT LE FILM
        echo "<ul id='liste'><br>";
        foreach ($request_liste_films as $idfilm)
        {
        $request_films = $file_db->query("SELECT * FROM films WHERE code_film ='$idfilm[0]'");
        foreach ($request_films as $c){
          $heure = substr($c[4], -3, 1);
          $minute = substr($c[4], -2);
          echo "<li><br><br><h2>$c[1]</h2><br><img src = '../images/films/$c[7]' style = 'width:50%'><br><br>
          <p>Réalisateur : $c[6]</p><p>Pays : $c[2]</p><p>Date : $c[3]</p><p>Durée : $heure h $minute</p></li><br>";
        }
        }
        echo "</ul><br>";
      }
      $file_db = null;
    }
    $nom_recherche = $_GET['nom_recherche'];
    $idGenre = selectGenre($nom_recherche);
    selectfilmdugenre($idGenre);
  ?>
  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
