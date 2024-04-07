<html lang="en">

<head>
    <title>Registo de Consulta</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Registo de Consulta</h2>
</header>
<main>
    <form action="index.php?action=CheckConsulta" method="POST" style="margin-bottom: 50px;">
        <fieldset>
            <legend>Identificação</legend>
            <label for="id_Paciente">Utente Id:</label>
            <input type="text" id="id_Paciente" name="id_Paciente"><br><br>
        </fieldset>
        <br><br>
        <fieldset>
            <legend>Sintomas</legend>
            <label for="DORPEITO1">Desconforto no tórax/pescoço/mandíbula/ombro/braço:</label>
            <select id="DORPEITO1" name="DORPEITO1">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="DORPEITO2">Dor no peito desencadeada pelo exercício:</label>
            <select id="DORPEITO2" name="DORPEITO2">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="DORPEITO3">Dor no peito aliviada pelo repouso ou nitratos em 5min.:</label>
            <select id="DORPEITO3" name="DORPEITO3">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="DISPNEIA">Sensação de falta de ar:</label>
            <select id="DISPNEIA" name="DISPNEIA">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="HIPERTENSO">Hipertensão alta:</label>
            <select id="HIPERTENSO" name="HIPERTENSO">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="FUMADOR">Fumador:</label>
            <select id="FUMADOR" name="FUMADOR">
                <option value="">Selecione...</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select><br><br>
            <label for="PRESSAO_ARTERIAL">Pressão arterial:</label>
            <input type="number" id="PRESSAO_ARTERIAL" name="PRESSAO_ARTERIAL" min="0" max="22"><br><br>
            <label for="COLESTEROL">Valor de Colesterol:</label>
            <input type="number" id="COLESTEROL" name="COLESTEROL" min="0" max="270"><br><br>
            <button type="submit" name="btndados">Submeter</button>
        </fieldset><br><br>
    </form>
</main>
</body>
</html>

