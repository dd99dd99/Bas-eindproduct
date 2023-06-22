<!DOCTYPE html>
<html>
<head>
    <style>
        /* CSS-stijl voor het menu */
        ul.menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #f9f9f9;
        }
        ul.menu li {
            float: left;
        }

        ul.menu li a {
            display: block;
            color: #333;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        ul.menu li a:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <?php
    echo "<h1>Project Bas Can Baran</h1>";
    echo "<ul class='menu'>";
    echo "<li><a href='klanten.php'>Klanten</a></li>";
    echo "<li><a href='verkooporders.php'>Verkoop</a></li>";
    echo "<li><a href='inkopen.php'>Inkoop</a></li>";
    echo "<li><a href='artikelen.php'>Artikelen</a></li>";
    echo "<li><a href='deleteLeverancier.php'>Leverancier verwijderen</a></li>";
    echo "</ul>";
    ?>
</body>
</html>
