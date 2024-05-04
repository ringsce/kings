<!DOCTYPE html>
<html lang="en">
<?php 
include_once('../header.php');
?>
<head>
    <title>Deck Editor</title>
    <meta name="description" content="(C) 2016 - 2024 Kreatyve Designs">
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css?h=97380e22c8933e9aa79cbc2390b9f15a">
    <link rel="stylesheet" href="../resources/css/Nunito.css?h=21350fcbe9816cacce9abd8b6de7d50b">
    <link rel="stylesheet" href="../resources/fonts/fontawesome-all.min.css?h=fbfa80fe81882dd47f8abd5cbb011b19">
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
<?php
include_once('../footer.php');
?>