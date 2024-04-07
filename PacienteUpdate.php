<html lang="en">
<head>
    <title>Alteração de dados</title>
</head>
<body>
<header style="margin-top: 50px;">
    <h2 align="center">Alteração de Dados</h2>
</header>
<main>
    <form action="index.php?action=CheckUpdate" method="POST" style="margin-bottom: 50px;" enctype="multipart/form-data">
        <fieldset>
            <legend>Dados Pessoais</legend>
            <label for="id">Identificação:</label>
            <input type="text" id="id" name="id" required>
            <label for="data_nascimento">Data de Nascimento:</label>
            <input type="date" id="data_nascimento" name="data_nascimento">
            <label for="email">E-mail:</label>
            <input type="email" id="email" name="email"><br><br>
            <label for="morada">Morada:</label>
            <input type="text" id="morada" name="morada">
            <label for="codigo_postal">Codigo-Postal:</label>
            <input type="number" id="codigo_postal" name="codigo_postal">
            <label for="distrito">Distrito:</label>
            <input type="text" id="distrito" name="distrito"><br><br>
            <label for="concelho">Concelho:</label>
            <input type="text" id="concelho" name="concelho"><br><br>
            <label for="lista">Lista:</label>
            <textarea id="lista" name="lista" rows="4" cols="50"></textarea>
        </fieldset>
        <button type="submit">Actualizar</button>
    </form>
</main>
</body>
</html>


