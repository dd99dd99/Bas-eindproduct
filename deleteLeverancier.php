<!DOCTYPE html>
<html>
<head>
    <title>Deleten op Leverancier ID</title>
</head>
<body>

<h2>Deleten op Leverancier ID</h2>
    <form method="POST" action="deleteLeverancier.php">
     <input type="text" name="levId" placeholder="Voer Leverancier ID in">
     <input type="submit" name="submit" value="Verwijderen">
    </form>

<?php 
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    include 'classes/Leverancier.php';
    $leverancier = new Leverancier();
    $levId = $_POST["levId"];
    $leverancier->deleteLeverancier($levId);
    echo '<script>alert("Leverancier verwijderd")</script>';
    echo "<script>location.replace('index.php');</script>";
}
?>
    <a href="index.php">Terug</a>

</body>
</html>
