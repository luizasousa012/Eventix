<?php
include("db.php");

$msg="";

if($_POST){
$email=$_POST['email'];
$token=$_POST['token'];
$nova=password_hash($_POST['senha'],PASSWORD_DEFAULT);

$res=$conn->query("SELECT * FROM usuarios WHERE email='$email' AND token='$token'");

if($res->num_rows>0){
$conn->query("UPDATE usuarios SET senha='$nova', token=NULL WHERE email='$email'");
$msg="Senha alterada!";
}else{
$msg="Código inválido!";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Redefinir</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container center">

<div class="card card-pequeno">

<h3>Redefinir Senha</h3>

<form method="POST">
<input name="email" value="<?php echo $_GET['email'] ?? ''; ?>">
<input name="token" placeholder="Código" required>
<input type="password" name="senha" placeholder="Nova senha" required>
<button>Alterar</button>
</form>

<p><?php echo $msg; ?></p>

</div>

</div>

</body>
</html>