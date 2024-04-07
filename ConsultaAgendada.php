<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1") or die("erro a abrir a ligação.");

$query1 = "SELECT `Id_Paciente`, `Nome`, `Data_Agendada`, `Hora_Agendada` FROM consultaagendada";

$results1 = mysqli_query($connect, $query1) or die(mysqli_error($connect));
?>

<html>
<head>
    <header style="margin-top: 50px;">
        <h2 align="center">Lista de Consultas</h2>
    </header>
    <style>
        thead > tr > th {
            background-color: #A0A0A0;
            text-align: center;
            color: white;
            width: 100px;


        }
        tbody > tr > td {
            background-color: white;
            text-align: center;
            color: black;
            border: 1px solid dimgrey;
        }
    </style>
</head>

<body>
<table cellpadding="7" align="center" style="margin-bottom:50px; margin-top: 20px; font-size: small ">
    <thead>
    <tr>
        <th>Paciente Id</th>
        <th>Nome</th>
        <th>Data Agendada</th>
        <th>Hora Agendada</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($results1->num_rows > 0) {
        while ($row = mysqli_fetch_array($results1)) {
            echo "<tr align='center'>";
            echo "<td>". $row['Id_Paciente'] ."</td>";
            echo "<td>". $row['Nome'] ."</td>";
            echo "<td>". $row['Data_Agendada'] ."</td>";
            echo "<td>". $row['Hora_Agendada'] ."</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='10'>Nenhuma consulta Agendada.</td></tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
