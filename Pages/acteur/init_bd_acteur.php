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
    $file_db = new PDO("sqlite:../../../BD/base_de_donnes_FILM.sqlite");
    $file_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $file_db->exec("CREATE TABLE IF NOT EXISTS acteurs(
      code_indiv INTEGER,
      nom TEXT,
      prenom TEXT,
      nationalite TEXT,
      date_naiss INTEGER,
      date_mort INTEGER)");

      // $lines = file('act.txt');
      // foreach ($lines as $lineContent)
      // {
      // 	echo "array" . $lineContent . "<br>";
      // }

    $acteurs = array(

      // QUES QUON A FAIT AU BON DIEU

      array(1,'Clavier','Christian','Français', 1952, 0, 'Christian_Clavier.jpg'),
      array(2,'Lauby','Chantal','Française', 1948, 0, 'Chantal_Lauby.jpg'),
      array(3,'Abittan','Ary','Français', 1974, 0, 'Ary_Abittan.jpg'),
      array(4,'Sadoun','Medi','Français', 1973, 0, 'Medi_Sadoun.jpg'),

      // THE MASK

      array(5,'Carrey','Jim','Canadien/American', 1962, 0, 'Jim_Carrey.jpg'),
      array(6,'Diaz','Cameron','Americaine', 1972, 0, 'Cameron_Diaz.jpg'),

      // Cops - Les Forces du désordre

      array(7,'Johnson','Jake','American', 1979, 0, 'Jake_Johnson.jpg'),
      array(8,'WayansJr','Damon','American', 1982, 0, 'Damon_WayansJr.jpg'),
      array(9,'Riggle','Rob','American', 1970, 0, 'Rob_Riggle.jpg'),
      array(10,'Dobrev','Nina','Canadienne/Bulgare', 1989, 0, 'Nina_Dobrev.jpg'),

      // Mais qui a tué Pamela Rose ?

      array(11,'Merad','Kad','Français/Algerien', 1964, 0, 'Kad_Merad.jpg'),
      array(12,'Baroux','Olivier','Français', 1964, 0, 'Olivier_Baroux.jpg'),
      array(13,'Darmon','Gérard','Français', 1948, 0, 'Gérard_Darmon.jpg'),
      array(14,'Rouve','Jean-Paul','Français', 1967, 0, 'Jean-Paul_Rouve.jpg'),

      // Intouchable

      array(15,'Cluzet','François','Français', 1955, 0, 'François_Cluzet.jpg'),
      array(16,'Sy','Omar','Français', 1978, 0, 'Omar_Sy.jpg'),

      // Django Unchained

      array(17,'Foxx','Jamie','Americain', 1967, 0, 'Jamie_Foxx.jpg'),
      array(18,'Waltz','Christoph','Autrichien', 1956, 0, 'Christoph_Waltz.jpg'),
      array(19,'DiCaprio','Leonardo','Americain', 1974, 0, 'Leonardo_DiCaprio.jpg'),

      // Pulp Fiction

      array(20,'Travolta','John','Americain', 1954, 0, 'John_Travolta.jpg'),
      array(21,'Jackson','Samuel.L','Americain', 1948, 0, 'Samuel.L_Jackson.jpg'),
      array(22,'Willis','Bruce','Americain', 1955, 0, 'Bruce_Willis.jpg'),

      // Inglourious Basterds

      array(23,'Pitt','Brad','Americain', 1963, 0, 'Brad_Pitt.jpg'),
      array(24,'Laurent','Mélanie','Française', 1983, 0, 'Mélanie_Laurent.jpg'),

      // Les huit salopards

      array(25,'Russell','Kurt','Americain', 1951, 0, 'Kurt_Russell.jpg'),
      array(26,'Leigh','Jennifer Jason ','Americaine', 1962, 0, 'Jennifer-Jason_Leigh.jpg'),

      // Kill Bill

      array(27,'Thurman','Uma','Americaine', 1970, 0, 'Uma_Thurman.jpg'),
      array(28,'Chiba','Sonny','Japonais', 1939 0, 'Sonny_Chiba.jpg'),

      // 2012

      array(29,'Cusack','John','Americain', 1966, 0, 'John_Cusack.jpg'),
      array(30,'Ejiofor','Chiwetel','Britannique', 1977, 0, 'Chiwetel_Ejiofor.jpg'),
      array(31,'Peet','Amanda','Americaine', 1972, 0, 'Amanda_Peet.jpg'),

      // Il était une fois dans l'ouest

      array(32,'Fonda','Henry','Americain', 1905, 1982, 'Henry_Fonda.jpg'),
      array(33,'Bronson','Charles','Americain', 1921, 2003, 'Charles_Bronson.jpg'),
      array(34,'Wolff','Frank','Americain', 1928, 1971, 'Frank_Wolff.jpg'),

      // Le masque de zoro

      array(35,'Hopkins','Anthony','Britannique', 1937, 0, 'Anthony_Hopkins.jpg'),
      array(36,'Banderas','Antonio','Espagnol', 1960, 0, 'Antonio_Banderas.jpg'),
      array(37,'Zeta-Jones','Catherine','Britannique', 1969, 0, 'Catherine_Zeta-Jones.jpg'),



      );

    $insert = "INSERT INTO acteurs (code_indiv, nom, prenom, nationalite, date_naiss, date_mort)
    VALUES (:code_indiv,:nom,:prenom,:nationalite,:date_naiss, :date_mort)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_indiv', $code_indiv);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nationalite', $nationalite);
    $stmt->bindParam(':date_naiss', $date_naiss);
    $stmt->bindParam(':date_mort', $date_mort);

    foreach($acteurs as $f){
      $code_indiv = $f[0];
      $nom = $f[1];
      $prenom = $f[2];
      $nationalite = $f[3];
      $date_naiss = $f[4];
      $date_mort = $f[5];
      $stmt->execute();
    }
    $file_db = null;
    echo "BD initialisée";
  }
  catch(PDOException $e){
    echo $e->getMessage();
  }
  ?>
</body>
</html>
