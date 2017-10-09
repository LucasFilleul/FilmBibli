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
      date_mort INTEGER,
      image TEXT)");

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
      array(28,'Chiba','Sonny','Japonais', 1939 ,0, 'Sonny_Chiba.jpg'),

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

      // Omar m'a tuer

      array(38,'Bouajila','Sami','Français', 1966, 0, 'Sami_Bouajila.jpg'),
      array(39,'Podalydès','Denis','Français', 1963, 0, 'Denis_Podalydès.jpg'),

      // Un havre de paix

      array(40,'Hough','Julianne','Americaine', 1988, 0, 'Julianne_Hough.jpg'),
      array(41,'Duhamel','Josh','Americain', 1972, 0, 'Josh_Duhamel.jpg'),

      // Indigènes

      array(42,'Debbouze','Jamel','Français/Marocain', 1975, 0, 'Jamel_Debbouze.jpg'),
      array(43,'Naceri','Sami','Français', 1961, 0, 'Sami_Naceri.jpg'),

      // Percy Jackson : Le Voleur de foudre

      array(44,'Lerman','Logan','Americain', 1992, 0, 'Lerman_Logan.jpg'),
      array(45,'T.Jackson','Brandon','Americain', 1984, 0, 'Brandon_T.Jackson.jpg'),
      array(46,'Brosnan','Pierce','Irlandais', 1953, 0, 'Pierce_Brosnan.jpg'),

      // Les Aventuriers de l'arche perdue

      array(47,'Ford','Harrison','Americain', 1942, 0, 'Harrison_Ford.jpg'),
      array(48,'Allen','Karen','Americaine', 1951, 0, 'Karen_Allen.jpg'),

      // Gone Girl

      array(49,'Affleck','Ben','Americain', 1972, 0, 'Ben_Affleck.jpg'),
      array(50,'Pike','Rosamund','Britannique', 1979, 0, 'Rosamunde_Pike.jpg'),

      // Avatar

      array(51,'Worthington','Sam','Australien', 1976, 0, 'Sam_Worthington.jpg'),
      array(52,'Saldana','Zoe','Americaine', 1978, 0, 'Zoe_Saldana.jpg'),

      // Star Wars, épisode IV : Un nouvel espoir

      array(53,'Hamill','Mark','Americain', 1951, 0, 'Mark_Hamill.jpg'),
      array(54,'Fisher','Carrie','Americaine', 1956, 2016, 'Carrie_Fisher.jpg'),

      // La Mouche

      array(55,'Goldblum','Jeff','Americain', 1952, 0, 'Jeff_Goldblum.jpg'),
      array(56,'Devis','Geena','Americaine', 1956, 0, 'Geena_Devis.jpg'),

      // Baise moi

      array(57,'Anderson','Raffaela','Française', 1976, 0, 'Raffaela_Anderson.jpg'),
      array(58,'Bach','Karen','Française', 1973, 2005, 'Karen_Bach.jpg'),

      // Sucker Punch

      array(59,'Browning','Emily','Australienne', 1988, 0, 'Emily_Browning.jpg'),
      array(60,'Cornish','Abbie','Australienne', 1982, 0, 'Abbie_Cornish.jpg'),

      // Rox et Rouky

      array(61,'Emanuele','Paule','Française ', 1927, 0, 'Paule_Emanuele.jpg'),


      );

    $insert = "INSERT INTO acteurs (code_indiv, nom, prenom, nationalite, date_naiss, date_mort,image)
    VALUES (:code_indiv,:nom,:prenom,:nationalite,:date_naiss, :date_mort, :image)";
    $stmt = $file_db->prepare($insert);
    $stmt->bindParam(':code_indiv', $code_indiv);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':nationalite', $nationalite);
    $stmt->bindParam(':date_naiss', $date_naiss);
    $stmt->bindParam(':date_mort', $date_mort);
    $stmt->bindParam(':image', $image);

    foreach($acteurs as $f){
      $code_indiv = $f[0];
      $nom = $f[1];
      $prenom = $f[2];
      $nationalite = $f[3];
      $date_naiss = $f[4];
      $date_mort = $f[5];
      $image = $f[6];
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
