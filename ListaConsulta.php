<?php
$connect = mysqli_connect("localhost", "root", "", "SIM1") or die("erro a abrir a ligação.");

$query1 = "SELECT consulta.id_consulta AS `Id`, agendamento.Id_MCardiologista AS `Id_MCardiologista`, users.Nome AS `Nome_MCardiologista`, paciente.Nome AS `Nome`, agendamento.Data_Agendamento AS `Data`, agendamento.Hora_Agendamento AS `Hora` FROM consulta JOIN agendamento ON consulta.id_consulta = agendamento.id_consulta JOIN paciente ON consulta.Id_Paciente = paciente.Id JOIN users ON agendamento.Id_MCardiologista = users.id WHERE consulta.Id_Medico = ".$_SESSION['Id']."";

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
        <th>Id da Consulta</th>
        <th>Id do Médico</th>
        <th>Médico Cardiologista</th>
        <th>Paciente</th>
        <th>Data Prevista</th>
        <th>Hora Prevista</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($results1->num_rows > 0) {
        while ($row = mysqli_fetch_array($results1)) {
            echo "<tr align='center'>";
            echo "<td>". $row['Id'] ."</td>";
            echo "<td>". $row['Id_MCardiologista'] ."</td>";
            echo "<td>". $row['Nome_MCardiologista'] ."</td>";
            echo "<td>". $row['Nome'] ."</td>";
            echo "<td>". $row['Data'] ."</td>";
            echo "<td>". $row['Hora'] ."</td>";
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