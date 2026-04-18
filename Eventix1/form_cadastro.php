<?php
include("db.php");

$msg = "";
$tipo = $_GET['tipo'] ?? '';

if ($_POST) {

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    // 🔍 VERIFICA SE JÁ EXISTE
    $check = $conn->query("SELECT * FROM usuarios WHERE email='$email'");

    if ($check->num_rows > 0) {
        $msg = "⚠️ Este e-mail já está cadastrado!";
    } else {

        $conn->query("INSERT INTO usuarios (nome,email,senha,tipo)
        VALUES ('$nome','$email','$senha','$tipo')");

        $msg = "✅ Cadastro realizado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cadastro</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container center">

<div class="card card-pequeno">

<h3>Cadastro</h3>

<form method="POST">
<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">

<input name="nome" placeholder="Nome" required>
<input name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>

<button>Cadastrar</button>
</form>

<p><?php echo $msg; ?></p>

</div>

</div>

</body>
</html>