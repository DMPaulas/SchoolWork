<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1" ) or die ( "erro a abrir a
ligação.");

$query1 = "SELECT `ID`, `NOME`, `FOTO`, `ESPECIALIDADE` FROM `users` WHERE `USERNAME` != 'Admin'";


$results1 = mysqli_query($connect, $query1) or die(mysqli_error($connect))

?>
<html>
<head>
    <style>
        table {
            width: 50%; /* Set the desired width for the table */
        }

        thead > tr > th {
            background-color: #A0A0A0;
            text-align: center;
            color: white;
            width: 200px;


        }
        tbody > tr > td {
            background-color: white;
            text-align: center;
            color: black;
            border: 1px solid dimgrey;
        }
    </style>
</head>

<table cellpadding="7" align="center" style="margin-bottom: 50px; margin-top: 50px; font-size: small;">
    <thead>
    <tr>
        <TH>Foto</TH>
        <TH>Id</TH>
        <TH>Nome</TH>
        <TH>Especialidade</TH>
    </tr>
    </thead>
    <tbody>
    <?php

    while ($row = mysqli_fetch_array($results1)) {
        echo "<tr align='center'>";
        echo "<td><img src='" . $row["FOTO"] . "' alt='Indisponivel' style='width: 70px; height: 100px;'></td>";
        echo "<td>". $row['ID'] ."</td>";
        echo "<td>". $row['NOME'] ."</td>";
        echo "<td>". $row['ESPECIALIDADE'] ."</td>";
        echo "</tr>";

    }

?>
</tbody>
</table>