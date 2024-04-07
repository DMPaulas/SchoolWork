<html lang="en">
<head>
    <title>Actualização de Dados</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Actualização de dados</h2>
</header>
<main>
    <form action="index.php?action=CheckUpdateM" method="POST" style="margin-bottom: 50px;" enctype="multipart/form-data">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label for="id">Identificação:</label>
            <input type="text" id="id" name="id" required><br><br>
            <label for="morada">Morada:</label>
            <input type="text" id="morada" name="morada">
            <label for="contacto">Contacto:</label>
            <input type="number" id="contacto" name="contacto"><br><br>
            <label for="password">Password:</label>
            <input type="text" id="password" name="password"><br><br>
            <label for="especialidade">Especialidade:</label>
            <input id="especialidade" name="especialidade"><br><br>
            <label for="foto">Foto:</label>
            <input type="file" id="foto" name="foto">
        </fieldset>
        <button type="submit">Actualizar</button>
    </form>
</main>
</body>
</html>
