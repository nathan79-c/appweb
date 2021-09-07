<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bases de donnees MYSQL</h1>
    <?php
    $serveur = "localhost" ;
    $dbname = "pdodb";
    $utilisateur = "root";
    $password = "";
try{
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$utilisateur,$password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $auteur = "mandela";
    $citation = "je n\'echoue jamais soit je gagne soit j\'apprend";
// $sth appartient a la classe PDOstatement
$sth = $dbco->prepare("
INSERT INTO mes_citations(NOM_AUTEUR,CITATION) VALUES (:nom_auteur, :citation)");
$sth->execute(array(
                    ':nom_auteur'=> $auteur,
                    ':citation'=> $citation
));
echo "entre  ajoute dans la table";
}

catch(PDOException $e){
    echo "Erreur : " .$e->getMessage();
}





    ?>
</body>
</html>