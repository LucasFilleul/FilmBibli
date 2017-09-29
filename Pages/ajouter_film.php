<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="films.css" />
  <title> Films </title>
</head>
<body>
  <?php
  try{
    $file_db = new PDO("sqlite:films.sqlite");
    $requete_code = $file_db->query("SELECT max(code_film) FROM films");
    $donnees = $requete_code->fetch();
    $insert = "INSERT INTO films (code_film,titre_original,titre_francais,pays,date, duree,couleur, realisateur, image)
    VALUES (:code_film,:titre_original,:titre_francais,:pays,:date, :duree,:couleur, :realisateur, :image)";
    // if(is_null($_GET["titreO"]) || $_GET["titreFR"] || )
    $stmt = $file_db->prepare($insert);
    $stmt->bindValue(':code_film', $donnees[0] + 1);
    $stmt->bindParam(':titre_original', $_GET["titreO"]);
    $stmt->bindParam(':titre_francais', $_GET["titreFR"]);
    $stmt->bindParam(':pays', $_GET["pays"]);
    $stmt->bindParam(':date', $_GET["date"]);
    $stmt->bindParam(':duree', $_GET["duree"]);
    $stmt->bindParam(':couleur', $_GET["couleur"]);
    $stmt->bindParam(':realisateur', $_GET["realisateur"]);
    $stmt->bindValue(':image', "NB");
    $stmt->execute();
    echo "Le film à bien été ajouté !";
    echo "<form action='accueil.php'><br>";
    echo "<input type='submit' value='Retourner à l'accueil'></form>";

  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  // phpinfo(INFO_VARIABLES);
  ?>
</body>
</html>
