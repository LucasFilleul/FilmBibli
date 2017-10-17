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
  try{
    function suuprimer_un_film(){
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      // $recherche = $_POST['titre'];
      // $requete_code = $file_db->query("SELECT * FROM films WHERE titre = '$recherche'");
      // $donnees = $requete_code->fetch();
      // if($donnees == ""){
      //   echo "<fieldset id='blanc'>";
      //   echo "<h4 id='blanc'>Le film n'a pas été supprimé !</h4><p id='blanc'>Le nom ne doit pas etre dans notre liste.</p>";
      //   echo "<form action='../HTML/accueil.php'><br>";
      //   echo "<input type='submit' value='Retour'></form>";
      //   echo "</fieldset>";
      // }
      // else{
        $delete = "DELETE FROM films WHERE code_film = '$_POST[filmasuppr]'";
        $stmt = $file_db->prepare($delete);
        $stmt->execute();
        echo "<fieldset id='blanc'>";
        echo "<h4 id='blanc'>Le film a bien été supprimé !<br>";
        echo "<form action='liste_films.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
        echo "</fieldset>";
      // }
      $file_db = null;
    }
    if($_SERVER['REQUEST_METHOD'] == "GET"){
      echo "<fieldset id='blanc'>";
      echo "<form method='POST' action='supprimer_film.php'><br>";
      echo "<br><h2 id='blanc'>Quel est le film que vous voulez ajouter ?</h2><br><br>";
      echo "<select name='filmasuppr'><option value = ''>Choisis ton film</option><br><br>";
      $file_db = new PDO('sqlite:../../../BD/base_de_donnes_FILM.sqlite');
      $films = $file_db->query("SELECT code_film,titre FROM films ORDER by titre");
      foreach ($films as $f) {
        echo "<option value = '$f[0]'>$f[1]</option>";
      }
      echo "</select><br><br>";
      $file_db= null;
      echo "<br><br><input type='submit' value='Valider'></form>";
      echo "</fieldset>";
    }
    else{
      suuprimer_un_film();
    }
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
  <footer id='fixefooter'><fieldset> © Copyright Fauvin - Filleul IUT - Informatique Orléans</fieldset></footer>
</body>
</html>
