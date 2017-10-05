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
        <a href="../films/liste_films.php"><li class="active"><p>Films</p></li></a>
        <a href="../acteur/liste_acteurs.php"><li><p>Acteurs</p></li></a>
        <a href="../genres/liste_genres.php"><li><p>Genres</p></li></a>
        <a href="../Recherche/recherche.php"><li><p>Recherche</p></li></a>
    </ul>
</nav>
  <?php
  try{
    function suuprimer_un_film(){
      $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
      $recherche = $_GET['titreOS'];
      if($recherche == ""){
        echo "Le film n'a pas été supprimé !<br> Le nom ne doit pas etre dans notre liste.";
        echo "<form action='../HTML/accueil.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
      }
      else{
        $requete_code = $file_db->query("SELECT * FROM films WHERE titre_original = '$recherche'");
        $donnees = $requete_code->fetch();
        $delete = "DELETE FROM films WHERE titre_original = '$recherche'";
        $stmt = $file_db->prepare($delete);
        $stmt->execute();
      }
    }
    suuprimer_un_film();
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
</body>
</html>
