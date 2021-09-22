<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <title>mes citation</title>
</head>
<body>
<h1>veuiller entre votre citation</h1>

<form action="input.php" method="POST">
    <label for="auteur">quel est le nom de l'auteur</label>
    <input type="text" name="auteur" require></br>
    <label for="citation">entrez  votre citation preferer</label>
    <textarea name="citation"></textarea>
    </br>
    <input type="submit" value="envoyer" name="insert" class="btn btn-danger">
</form>
    <!--


   -->
    <?php

  
  $host = "localhost" ;
  $dbname = "pdodb";
  $utilisateur = "root";
  $password = "";
  if(!empty($_POST['auteur']) && !empty($_POST['citation'])) {
     try{
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $utilisateur,$password);
     }
     catch(PDOException $exc){
         echo $exc->getMessage();
         exit();
     }
     $auteur = $_POST['auteur'];
    $citation =  $_POST['citation'];

    $sql = "INSERT INTO MES_CITATIONS(NOM_AUTEUR,CITATION)
    VALUES(:auteur,:citation)";
    $res = $pdo->prepare($sql);
    $exec = $res->execute(array(":auteur"=>$auteur,":citation"=>$citation));
    if($exec){
        echo 'donner inserer';
    }/*else{
        echo "echec de l'operation"; 
    }*/else{
        echo "echec de l'operation";
    }
  }
  ?>
    <a href="index.php">voir mes citation prefere</a>
 
    
</body>

</html>