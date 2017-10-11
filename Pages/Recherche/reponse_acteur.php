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
        <a href="../acteur/liste_acteurs.php" class="active"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../real/liste_real.php"><li><p>Réalisateur</p></li></a>
    </ul>
</nav>
  <?php

  function selectActeur($nomact){
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT code_indiv FROM acteurs WHERE nom='$nomact'");
    $donnees = $request->fetch();
    $idact = $donnees[0];
    $file_db = null;
    return $idact;
  }

function getActeur($nom){
  $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
  $request = $file_db->query("SELECT * FROM acteurs WHERE nom = '$nom'");
  echo "<ul id='liste'><br>";
  foreach ($request as $c){
    echo "<a href='../Recherche/reponse_acteur.php?nom_recherche=$c[0]' ><li><br><br><h2>$c[2] $c[1]</h2><br><img src = '../images/acteurs/$c[6]' style = 'width:50%'><br><br></li></a><br>";
  }
    echo "</ul><br>";
    $file_db = null;
}


  function getfilm($id){
    // RESSORT L ID DU GENRE
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    if($id == ""){
      echo "L'acteur rentré n'est pas dans notre base de données.<br><br>";
    }
    else{
      $request_liste_id_acteurs = $file_db->query("SELECT ref_code_film FROM ACTEURDANSFILM WHERE ref_code_acteur='$id'");
      echo "<ul id='liste'><br>";
      foreach ($request_liste_id_acteurs as $idfilm){
        $request_films = $file_db->query("SELECT * FROM films WHERE code_film ='$idfilm[0]'");
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
  $idact = selectActeur($nom_recherche);
  if($idact == ""){
    echo "<fieldset id='blanc'>";
    echo "<h2 id='blanc'>L'acteur : " . $nom_recherche . ", n'est pas dans notre base de données.</h2>";
    echo "<h4 id='blanc'>Retourner à la liste des réalisateur :<br>";
    echo "<form action='../acteur/liste_acteurs.php'><br>";
    echo "<input type='submit' value='Retour'></form>";
    echo "</fieldset>";
    echo "<footer id='fixefooter'><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  else{
    if(is_string($nom_recherche)){
      getActeur($nom_recherche);
    }
    if(in_array($nom_recherche[0], array("1","2","3","4","5","6","7","8","9","0"))){
      getfilm($nom_recherche);
    }
    echo "  <footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  ?>
</body>
</html>
