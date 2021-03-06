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
        <a href="../films/liste_films.php" class="active"><li><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../real/liste_real.php"><li><p>Réalisateur</p></li></a>
    </ul>
</nav>
  <?php
  function selectFilm($nomgenre){
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db->query("SELECT code_film FROM films WHERE titre='$nomgenre'");
    $donnees = $request->fetch();
    $idfilm = $donnees[0];
    $file_db = null;
    return $idfilm;
  }

function detailFilm($nom){
    // METTRE LES CARACTERISTIQUES DES FILMS

    $file_db_films = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $request = $file_db_films->query("SELECT * FROM films WHERE titre='$nom'");
    $c = $request->fetch();
    $heure = substr($c[4], -3, 1);
    $minute = substr($c[4], -2);
    echo "<ul id='liste'><br>";
    echo "<li><h2>$c[1]</h2><br><img src = '../images/films/$c[6]' style = 'width:50%'><br><br>
    <p>Pays : $c[2]</p><p>Date : $c[3]</p><p>Durée : $heure h $minute</p></li><br>";
    echo "</ul><br>";
    $file_db = null;
  }

function detailActeur($nom)
  {
    // LES ACTEURS DU FILM.

    $file_db_acteurs_du_film = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");

    $id_film = $file_db_acteurs_du_film->query("SELECT code_film FROM films WHERE titre='$nom'"); //---> sortie The mask : [2]

    $donnee = $id_film->fetch();

    //echo $donnee[0];

    $films = $file_db_acteurs_du_film->query("SELECT * FROM films WHERE code_film ='$donnee[0]'"); // sortie toute les infos sur le film.

    $id_acteur = $file_db_acteurs_du_film ->query("SELECT * FROM ACTEURDANSFILM NATURAL JOIN acteurs WHERE ref_code_film ='$donnee[0]' and ref_code_acteur=code_indiv"); // sort les id des acteurs en fonction de l'id du film au dessus.

    echo "<fieldset id = 'blanc'> ";
    echo "<h3 id='centrer'> -------------------------- ACTEUR(S) --------------------------</h3>";
    echo "<ul id='liste'><br>";
    while($donnee2 = $id_acteur->fetch()){
      echo "<a href='../Recherche/reponse_acteur.php?nom_recherche=" . $donnee2['code_indiv'] . "' ><li><br><br><h2> " . $donnee2['prenom'] ." ".$donnee2['nom']."</h2><br><img src = '../images/acteurs/" . $donnee2['image'] ." ' style = 'width:50%'><br><br></li></a><br>";
  }
    $id_acteur->closeCursor();
    echo "</ul><br>";
    echo "</fieldset> ";
    $file_db_acteurs_du_film = null;
}

function detailReal($nom)
  {
    $file_db_real_du_film = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");

    $id_film = $file_db_real_du_film->query("SELECT code_film FROM films WHERE titre='$nom'"); //---> sortie The mask : [2]

    $donnee = $id_film->fetch();
    echo "<fieldset id = 'blanc'> ";
    echo "<h3 id='centrer'> -------------------------- REALISATEUR(S) --------------------------</h3>";
    $id_real = $file_db_real_du_film->query("SELECT * FROM FILMESTDE NATURAL JOIN realisateur WHERE ref_code_film ='$donnee[0]' and ref_code_real=code_real");
    echo "<ul id='liste'><br>";
    while($donnee2 = $id_real->fetch()){
      echo "<a href='../Recherche/reponse_real.php?nom_recherche=" . $donnee2['code_real'] . "' ><li><br><br><h2> " . $donnee2['prenom'] ." ".$donnee2['nom']."</h2><br><img src = '../images/real/" . $donnee2['image'] ." ' style = 'width:50%'><br><br></li></a><br>";
  }
  $id_real->closeCursor();
  echo "</ul><br>";
  echo "</fieldset> ";
  $file_db_real_du_film = null;
}

  $nom_recherche = $_GET['nom_recherche'];
  $id_du_film =selectFilm($nom_recherche);
  if($id_du_film == ""){
    echo "<fieldset id='blanc'>";
    echo "<h2 id='blanc'>Le film : " . $nom_recherche . ", n'est pas dans notre base de données.</h2>";
    echo "<h4 id='blanc'>Retourner à la liste des films :<br>";
    echo "<form action='../films/liste_films.php'><br>";
    echo "<input type='submit' value='Retour'></form>";
    echo "</fieldset>";
    echo "<footer id='fixefooter'><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  else{
    detailFilm($nom_recherche);
    detailReal($nom_recherche);
    detailActeur($nom_recherche);
    echo "<footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
  }
  ?>

</body>
</html>
