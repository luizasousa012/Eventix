<?php
include("db.php");

$msg="";

if($_POST){
$email=$_POST['email'];
$token=strtoupper(substr(md5(rand()),0,6));

$conn->query("UPDATE usuarios SET token='$token' WHERE email='$email'");

$msg="Código: $token <br><a href='redefinir_senha.php?email=$email'>Redefinir senha</a>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Recuperar</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container center">
<div class="card">

<form method="POST">
<input name="email" placeholder="Email" required>
<button>Gerar código</button>
</form>

<p><?php echo $msg; ?></p>

</div>
</div>

</body>
</html>