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
    $recherche = $_GET['titreOS'];

    $requete_code = $file_db->query("SELECT * FROM films WHERE titre_original = '$recherche'");
    $donnees = $requete_code->fetch();

    $delete = "DELETE FROM films WHERE titre_original = '$recherche'";

    $stmt = $file_db->prepare($delete);
    $stmt->execute();

  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  // phpinfo(INFO_VARIABLES);
  ?>
</body>
</html>
