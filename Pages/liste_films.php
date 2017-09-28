<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="films.css" />
  <title> Films </title>
</head>
<body>
  <?php
    $file_db = new PDO("sqlite:films.sqlite");
    $request = $file_db->query("SELECT * FROM films");
    foreach ($request as $c){
      echo "($c[0], $c[1], $c[2], $c[3], $c[4], $c[5], $c[6], $c[7], $c[8])<br>";
    }
  ?>
</body>
</html>
