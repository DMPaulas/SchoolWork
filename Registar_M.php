
<html lang="en">
<head>
    <title>Registo de Médico</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Registo de Médico</h2>
</header>
<main>
    <form action="index.php?action=CheckRegistoM" method="POST" style="margin-bottom: 50px;">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome">
            <label for="morada">Morada:</label>
            <input type="text" id="morada" name="morada">
            <label for="contacto">contacto:</label>
            <input type="number" id="contacto" name="contacto"><br><br>
            <label for="username">Username</label>
            <input type="text" id="username" name="username">
            <label for="password">Password:</label>
            <input type="text" id="password" name="password"><br><br>
            <label for="especialidade">Especialidade:</label>
            <select id="especialidade" name="especialidade">
                <option value="">Selecione...</option>
                <option value="Familia">Familia</option>
                <option value="Cardiologia">Cardiologia</option>
            </select><br><br>
        </fieldset>
        <fieldset>
            <legend>Foto</legend>
            <input type="file" id="foto" name="foto">
        </fieldset>
        <button type="submit">Registar Médico</button>
    </form>
</main>
</body>
</html>

