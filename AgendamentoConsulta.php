<html lang="en">
<head>
    <title>Lista de Pacientes</title>
</head>
<body>
<h3 style="margin-top: 50px;" >Procurar Consultas</h3>
<form action="index.php?action=SearchConsulta" method="POST">
    <input type="text" name="pesquisa" placeholder="Nome e Apelido">
    <input type="submit" value="search">
</form>

</body>

<head>
    <title>Agendamento de Consulta</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Agendamento de Consulta</h2>
</header>
<main>
    <form action="index.php?action=CheckAgendamento" method="POST" style="margin-bottom: 50px;">
        <fieldset>
            <legend>Identificação</legend>
            <label for="Id_MCardiologista">Medico Cardiologista Id:</label>
            <select id="Id_MCardiologista" name="Id_MCardiologista">
                <option value="">Selecione...</option>
                <option value="34">Dra. Yolanda Power</option>
                <option value="33">Dr. Daniel Paulas</option>
                <option value="36">Dr. Helder Dores</option>
            </select><br><br>
            <label for="Id_Consulta">Id Consulta:</label>
            <input type="text" id="Id_Consulta" name="Id_Consulta"><br><br>
        </fieldset><br><br>
        <fieldset>
            <legend>Marcação da data de Consulta</legend>
            <label for="Data_Agendamento">Data de Agendamento:</label>
            <input type="date" id="Data_Agendamento" name="Data_Agendamento"><br><br>
            <label for="Hora_Agendamento">Hora de Agendamento:</label>
            <input type="time" id="Hora_Agendamento" name="Hora_Agendamento">
        </fieldset><br><br>
        </fieldset><br><br>
        <fieldset>
            <legend>Observações a ter em conta</legend>
            <label for="Observações">Observações:</label>
            <textarea id="Observações" name="Observações" rows="4" cols="50"></textarea>
        </fieldset><br><br>
        <button type="submit">Submeter</button>
    </form>
</main>
</body>
</html>


