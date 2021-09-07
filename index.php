<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mes citation</title>
</head>
<body>

    <h1>veuiller entre votre citation</h1>

    <form action="index.php" method="POST">
        <label for="auteur">quel est le nom de l'auteur</label>
        <input type="text" name="auteur" require></br>
        <label for="citation">entrez  votre citation preferer</label>
        <input type="text" name="citation" require></br>
        <input type="submit" value="envoyer">
    </form>
    <?php
        
$auteur = "$_POST[auteur]";
$citation = " $_POST[citation]";
    $serveur = "localhost" ;
    $dbname = "pdodb";
    $utilisateur = "root";
    $password = "";

try{
    $dbco = new PDO("mysql:host=$serveur;dbname=$dbname", $utilisateur,$password);
    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO mes_citations(NOM_AUTEUR,CITATION)
    VALUES('$auteur','$citation')";
    $dbco->exec($sql);
    echo "ENTRE AJOUTEE DANS LA TABLE";
}
    catch(PDOException $e){
        echo "Erreur : " .$e->getMessage();
    }
    ?>
    <a href="citation.php">voir mes citation prefere</a>
</body>

</html>