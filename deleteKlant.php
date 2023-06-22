<!DOCTYPE html>
<html>
<head>
    <title>deleten op klant ID</title>
</head>
<body>

<h2>deleten op klant ID</h2>
    <form method="POST" action="deleteKlant.php">
     <input type="text" name="klantId" placeholder="Voer klant ID in">
     <input type="submit" name="submit" value="Verwijderen">
    </form>
<a href="selectKlant.php">Terug</a></br>
<a href="index.php">Hoofdpagina</a>

<?php 

if(isset($_POST["submit"])){
    include 'classes/Klant.php';
    $klant = new Klant();
    $klantId = $_POST["klantId"];
    // verwijderen
    $klant->deleteKlant($klantId);
    echo '<script>alert("Klant verwijderd")</script>';
    //  tonen
    echo '<h3>Verwijderd klantID:</h3>';
    echo $klantId;
}
?>

</body>
</html>
