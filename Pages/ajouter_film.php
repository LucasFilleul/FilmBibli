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

    // $insert = "INSERT INTO films (code_film,titre_original,titre_francais,pays,date, duree,couleur, realisateur, image)
    // VALUES (:code_film,:titre_original,:titre_francais,:pays,:date, :duree,:couleur, :realisateur, :image)";
    // $stmt = $file_db->prepare($insert);
    // $stmt->bindParam(':code_film', $donnees[0] + 1);
    // $stmt->bindParam(':titre_original', $titre_original);
    // $stmt->bindParam(':titre_francais', $titre_francais);
    // $stmt->bindParam(':pays', $pays);
    // $stmt->bindParam(':date', $date);
    // $stmt->bindParam(':duree', $duree);
    // $stmt->bindParam(':couleur', $couleur);
    // $stmt->bindParam(':realisateur', $realisateur);
    // $stmt->bindParam(':image', $image);
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  // phpinfo(INFO_VARIABLES);
  ?>
</body>
</html>
