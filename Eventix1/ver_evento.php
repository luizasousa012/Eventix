<?php
session_start();
include("db.php");

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] != 'organizador') {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user']['id'];

$sql = $conn->query("SELECT * FROM eventos WHERE organizador_id='$user_id'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Meus Eventos</title>

<style>
body { font-family: Arial; background:#f5f7fa; }
.container {
    width:80%; margin:40px auto;
}
.card {
    background:white; padding:20px; margin-top:20px; border-radius:12px;
}
</style>

</head>
<body>

<div class="container">
<h2>Meus Eventos</h2>

<?php while($evento = $sql->fetch_assoc()) { ?>

<div class="card">
<h3><?php echo $evento['nome_disciplina']; ?></h3>
<p>Código: <b><?php echo $evento['codigo']; ?></b></p>

<h4>Envios:</h4>

<?php
$id_evento = $evento['id'];
$res = $conn->query("SELECT * FROM participacoes WHERE evento_id='$id_evento'");

while($p = $res->fetch_assoc()) {
    echo "<p>";
    echo "Arquivo: <a href='uploads/".$p['arquivo']."' target='_blank'>Ver</a><br>";
    echo "Descrição: ".$p['descricao'];
    echo "</p>";
}
?>

</div>

<?php } ?>

</div>

</body>
</html>