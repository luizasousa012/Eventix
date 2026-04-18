<?php
session_start();
include("db.php");

$msg="";
$tipo=$_GET['tipo'] ?? '';

if($_POST){
$email=$_POST['email'];
$senha=$_POST['senha'];
$tipo=$_POST['tipo'];

$res=$conn->query("SELECT * FROM usuarios WHERE email='$email' AND tipo='$tipo'");

if($res->num_rows>0){
$user=$res->fetch_assoc();
if(password_verify($senha,$user['senha'])){
$_SESSION['user']=$user;
header("Location: dashboard.php");
}else{$msg="Senha errada";}
}else{$msg="Usuário não encontrado";}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>


<div class="container center">

<div class="card card-pequeno">

<h3>Login <?php echo ucfirst($tipo); ?></h3>

<form method="POST">
<input type="hidden" name="tipo" value="<?php echo $tipo; ?>">

<input type="email" name="email" placeholder="Email" required>
<input type="password" name="senha" placeholder="Senha" required>

<button>Entrar</button>
</form>

<p><?php echo $msg; ?></p>

<a href="esqueci_senha.php">Esqueci senha</a>

</div>

</div>

</body>
</html>