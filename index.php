
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Tresl Originals</title>
</head>

<body>

    <h1>Tresl Originals</h1>

    <h2>Login</h2>

    <form method="POST">

        <label>E-mail:</label>
        <br>
        <input type="email" name="email" required>

        <br><br>

        <label>Telefone:</label>
        <br>
        <input type="tel" name="telefone" required>

        <br><br>

        <label>Senha:</label>
        <br>
        <input type="password" name="senha" required>

        <br><br>

        <input type="submit" value="Entrar">

    </form>
  <?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $senha = $_POST["senha"];

    echo "<h3>Dados recebidos:</h3>";
    echo "E-mail: " . $email . "<br>";
    echo "Telefone: " . $telefone . "<br>";
    echo "Senha: " . $senha . "<br>";
    // Obtém a conexão configurada no Render
$databaseUrl = getenv("DATABASE_URL");
// Conecta ao PostgreSQL
$conexao = pg_connect($databaseUrl);
// Salva o e-mail no banco
pg_query_params(
 $conexao,
 "INSERT INTO usuarios (email) VALUES ($1)",
 array($email)
);
// Mostra a confirmação
echo "Cadastro realizado com sucesso!"; 
}

?>

    <br>

    <a href="#">Esqueci minha senha</a>

    <br><br>

    <p>
        Não possui uma conta?
        <a href="#">Cadastre-se</a>
    </p>

</body>

</html>
