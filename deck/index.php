<!DOCTYPE html>
<html lang="en">
<? 
require ('../header.php');
?>
<head>
    <title>Deck Editor</title>
</head>
<body>
    <h2>Build your Deck</h2>
    <form action="export_pdf.php" method="post">
        <label for="field1">Field 1:</label>
        <input type="text" id="field1" name="field1"><br><br>

        <label for="field2">Field 2:</label>
        <input type="text" id="field2" name="field2"><br><br>

        <label for="field3">Field 3:</label>
        <input type="text" id="field3" name="field3"><br><br>

        <label for="field4">Field 4:</label>
        <input type="text" id="field4" name="field4"><br><br>

        <label for="field5">Field 5:</label>
        <input type="text" id="field5" name="field5"><br><br>

        <button type="submit">Export</button>
    </form>
</body>
</html>
<?php
require('../footer.php');
?>