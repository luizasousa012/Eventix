<?php
session_start();
include("db.php");

$id = $_SESSION['user']['id'];

$res = $conn->query("
SELECT e.nome_disciplina, e.codigo, p.descricao, p.arquivo
FROM participacoes p
JOIN eventos e ON p.evento_id = e.id
WHERE p.usuario_id = '$id'
");
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

<?php while($r = $res->fetch_assoc()) { ?>

<div class="card">

<h3><?php echo $r['nome_disciplina']; ?></h3>

<p><b>Código:</b> <?php echo $r['codigo']; ?></p>

<p><?php echo $r['descricao']; ?></p>

<p><b>Arquivo:</b> <?php echo $r['arquivo']; ?></p>

<a href="uploads/<?php echo $r['arquivo']; ?>" target="_blank">
Ver arquivo
</a>

</div>

<?php } ?>

</div>

</body>
</html>