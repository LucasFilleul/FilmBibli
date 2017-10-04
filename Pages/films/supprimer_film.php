<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="../CSS/films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  try{
    function suuprimer_un_film(){
      $file_db = new PDO("sqlite:../../../BD/films.sqlite");
      $recherche = $_GET['titreOS'];
      if($recherche == ""){
        echo "Le film n'a pas été supprimé !<br> Le nom ne doit pas etre dans notre liste.";
        echo "<form action='../accueil.php'><br>";
        echo "<input type='submit' value='Retour'></form>";
      }
      else{
        $requete_code = $file_db->query("SELECT * FROM films WHERE titre_original = '$recherche'");
        $donnees = $requete_code->fetch();
        $delete = "DELETE FROM films WHERE titre_original = '$recherche'";
        $stmt = $file_db->prepare($delete);
        $stmt->execute();
        echo "Le film à bien été supprimé !";
        echo "<form action='../accueil.php'><br>";
        echo "<input type='submit' value='Accueil'></form>";
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
