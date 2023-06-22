<?php

include 'Database.php';

class Artikel extends Database
{
    public function selectArtikel()
    {
        $lijst = self::$conn->query("SELECT * FROM artikelen")->fetchAll();
        return $lijst;
    }

    public function updateArtikel2($artId, $artOmschrijving, $artInkoop, $artVerkoop, $artVoorraad, $artMinVoorraad, $artMaxVoorraad, $artLocatie)
    {
        $sql = "UPDATE artikelen SET artOmschrijving = :artOmschrijving, artInkoop = :artInkoop, artVerkoop = :artVerkoop, artVoorraad = :artVoorraad, artMinVoorraad = :artMinVoorraad, artMaxVoorraad = :artMaxVoorraad, artLocatie = :artLocatie WHERE artId = :artId";
        
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $artId);
        $stmt->bindParam(':artOmschrijving', $artOmschrijving);
        $stmt->bindParam(':artInkoop', $artInkoop);
        $stmt->bindParam(':artVerkoop', $artVerkoop);
        $stmt->bindParam(':artVoorraad', $artVoorraad);
        $stmt->bindParam(':artMinVoorraad', $artMinVoorraad);
        $stmt->bindParam(':artMaxVoorraad', $artMaxVoorraad);
        $stmt->bindParam(':artLocatie', $artLocatie);

        $stmt->execute();
        return ($stmt->rowCount() == 1) ? true : false;
    }

    public function deleteArtikel($artId)
    {
        $sql = "DELETE FROM artikelen WHERE artId = :artId";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $artId);
        $stmt->execute();
        return ($stmt->rowCount() == 1) ? true : false;
    }

    public function showTable($lijst)
    {
        $txt = "<table border=1px>";
        $txt .= "<tr><th>ID</th><th>Omschrijving</th><th>Inkoop</th><th>Verkoop</th><th>Voorraad</th><th>MinVoorraad</th><th>MaxVoorraad</th><th>LeverancierId</th></tr>";

        foreach ($lijst as $row) {
            $txt .= "<tr>";
            $txt .= "<td>" . $row["artId"] . "</td>";
            $txt .= "<td>" . $row["artOmschrijving"] . "</td>";
            $txt .= "<td>" . $row["artInkoop"] . "</td>";
            $txt .= "<td>" . $row["artVerkoop"] . "</td>";
            $txt .= "<td>" . $row["artVoorraad"] . "</td>";
            $txt .= "<td>" . $row["artMinVoorraad"] . "</td>";
            $txt .= "<td>" . $row["artMaxVoorraad"] . "</td>";
            $txt .= "<td>" . $row["artLocatie"] . "</td>";

            // Update
            $txt .= "<td>";
            $txt .= "<form method='post' action='updateArtikel.php?artId=$row[artId]'>";
            $txt .= "<button name='update'>Wzg</button>";
            $txt .= "</form></td>";

            // Delete
            $txt .= "<td>";
            $txt .= "<form method='post' action='deleteArtikel.php?artId=$row[artId]'>";
            $txt .= "<button name='verwijderen'>Verwijderen</button>";
            $txt .= "</form></td>";

            $txt .= "</tr>";
        }

        $txt .= "</table>";
        echo $txt;
    }

    public function getArtikel($artId)
    {
        $sql = "SELECT * FROM artikelen WHERE artId = :artId";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $artId);
        $stmt->execute();
        return $stmt->fetch();
    }
}
?>
