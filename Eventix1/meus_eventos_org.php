
<?php
session_start();
include("db.php");

$user_id = $_SESSION['user']['id'];

$res = $conn->query("SELECT * FROM eventos WHERE organizador_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Meus Eventos</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>
<div class="container">

<?php while($e = $res->fetch_assoc()) { ?>

<div class="card">

<h3><?php echo $e['nome_disciplina']; ?></h3>
<p><b>Código:</b> <?php echo $e['codigo']; ?></p>

<p><b>Envios:</b></p>

<?php
$id = $e['id'];
$p = $conn->query("SELECT * FROM participacoes WHERE evento_id='$id'");
?>

<?php if($p->num_rows == 0){ ?>
<p>Nenhum envio ainda.</p>
<?php } ?>

<?php while($env = $p->fetch_assoc()) { ?>

<div style="background:#f3e8ff; padding:10px; margin-top:10px; border-radius:8px;">

<p><?php echo $env['descricao']; ?></p>

<a href="uploads/<?php echo $env['arquivo']; ?>" target="_blank">
Ver arquivo
</a>

</div>

<?php } ?>

</div>

<?php } ?>

</div>

</body>
</html>