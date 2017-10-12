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
        <a href="../real/liste_real.php" class="active"><li><p>Réalisateur</p></li></a>
    </ul>
</nav>
  <?php
  /* fonction qui retourne l'id du realisateur en fonction du nom rentrée */
  function selectReal($nomreal){
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    if(in_array($nomreal[0], array("1","2","3","4","5","6","7","8","9","0"))){
      $request = $file_db->query("SELECT code_real FROM realisateur WHERE code_real='$nomreal'");
    }
    /* Si l'utilisateur clique sur un réalisateur */
    else{
      $request = $file_db->query("SELECT code_real FROM realisateur WHERE nom='$nomreal'");
    }
    $file_db = null;
    return $request;
  }
/* fonction qui affiche la liste des realisateur en fonction du nom rentré*/
function getReal($nom){
  $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
  $request = $file_db->query("SELECT * FROM realisateur WHERE nom = '$nom'");
  // DONNE TOUTE LES INFOS DU REALISATEUR EN FONCTION DU NOM RENTREE
  echo "<ul id='liste'><br>";
  foreach ($request as $c){
    echo "<a href='../Recherche/reponse_real.php?nom_recherche=$c[0]' ><li><br><br><h2>$c[2] $c[1]</h2><br><img src = '../images/real/$c[6]' style = 'width:50%'><br><br></li></a><br>";
  }
    echo "</ul><br>";
    $file_db = null;
}

/* fonction qui affiche la liste des films du realisateur en fonction du réalisateur cliqué*/
  function getfilm($id){
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    if($id == ""){
      echo "Le réalisateur rentré n'est pas dans notre base de données.<br><br>";
    }
    else{
      $request_liste_id_acteurs = $file_db->query("SELECT ref_code_film FROM FILMESTDE WHERE ref_code_real='$id'");
      // DONNE TOUS LES FILMS DU REALISATEUR EN FONCTION DU CODE DU REALISATEUR
      echo "<ul id='liste'><br>";
      foreach ($request_liste_id_acteurs as $idfilm){
        $request_films = $file_db->query("SELECT * FROM films WHERE code_film ='$idfilm[0]'");
        // DONNE TOUTES LES INFOS DU FILM
        foreach ($request_films as $c){
          $heure = substr($c[4], -3, 1);
          $minute = substr($c[4], -2);
          echo "<a href='../Recherche/reponse_film.php?nom_recherche=$c[1]' ><li><br><br><h2>$c[1]</h2><br><img src = '../images/films/$c[6]' style = 'width:50%'><br><br>
          <p>Pays : $c[2]</p><p>Date : $c[3]</p><p>Durée : $heure h $minute</p></li></a><br>";
        }
      }
      echo "</ul><br>";
    }
    $file_db = null;
  }

  $nom_recherche = $_GET['nom_recherche'];
  $idreal = selectReal($nom_recherche);
  if($idreal == ""){
    /* Le nom rentré n'existe pas dans la base ou est mal écrit */
    echo "<fieldset id='blanc'>";
    echo "<h2 id='blanc'>Le réalisateur : " . $nom_recherche . ", n'est pas dans notre base de données.</h2>";
    echo "<h4 id='blanc'>Retourner à la liste des réalisateur :<br>";
    echo "<form action='../real/liste_real.php'><br>";
    echo "<input type='submit' value='Retour'></form>";
    echo "</fieldset>";
    echo "<footer id='fixefooter'><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  else{
    /* Si l'utilisateur rentre un nom dans la recherche */
    if(is_string($nom_recherche)){
      getReal($nom_recherche);
    }
    /* Si l'utilisateur clique sur un réalisateur */
    if(in_array($nom_recherche[0], array("1","2","3","4","5","6","7","8","9","0"))){
      getfilm($nom_recherche);
    }
    echo "<footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  ?>
</body>
</html>
