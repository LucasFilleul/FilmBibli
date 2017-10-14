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
        <a href="../genres/liste_genres.php" class="active"><li><p>Genres</p></li></a>
        <a href="../real/liste_real.php"><li><p>Réalisateur</p></li></a>
    </ul>
</nav>
  <?php
  /* fonction qui retourne l'id du genre en fonction du nom rentrée */
    function selectGenre($nomgenre){
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      if(in_array($nomgenre[0], array("1","2","3","4","5","6","7","8","9","0"))){
        $request = $file_db->query("SELECT code_genre FROM genres WHERE code_genre='$nomgenre'");
      }
      /* Si l'utilisateur clique sur un réalisateur */
      else{
        $request = $file_db->query("SELECT code_genre FROM genres WHERE nom_genre='$nomgenre'");
      }
      $donnees = $request->fetch();
      $idfilm = $donnees[0];
      $file_db = null;
      return $idfilm;
    }
    /* fonction qui affiche la liste des films du genre en fonction du genre cliqué*/
    function getfilm($id){
      // RESSORT L ID DU GENRE
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      if($id == ""){
        echo "Le Genre rentré n'est pas dans notre base de données.<br><br>";
      }
      else{
        $request_liste_id_acteurs = $file_db->query("SELECT ref_code_film FROM FILMESTDEGENRE WHERE ref_code_genre=$id");
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
    $idGenre = selectGenre($nom_recherche);
    // echo $idGenre . " num <br>";
    // echo in_array($nom_recherche[0], array("1","2","3","4","5","6","7","8","9","0"));
    if($idGenre == ""){
      /* Le nom rentré n'existe pas dans la base ou est mal écrit */
      echo "<fieldset id='blanc'>";
      echo "<h2 id='blanc'>Le genre : " . $nom_recherche . ", n'est pas dans notre base de données.</h2>";
      echo "<form action='../genres/liste_genres.php'><br>";
      echo "<h4 id='blanc'>Retourner à la liste des genres :<br>";
      echo "<input type='submit' value='Retour'></form>";
      echo "</fieldset>";
      echo "<footer id='fixefooter'><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
    }
    else{
        getfilm($idGenre);
        echo "<footer><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>";
      }
  ?>
</body>
</html>
