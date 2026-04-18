<?php
session_start();
if(!isset($_SESSION['user'])){header("Location: login.php");}
$user=$_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<?php include("estilo.php"); ?>
</head>

<body>

<div class="topo">
<img src="Eventix/logo.png" class="logo">
</div>

<div class="container">

<div class="card">

<?php if($user['tipo']=="organizador"){ ?>

<a href="criar_evento.php"><button>Criar Evento</button></a>
<a href="meus_eventos_org.php"><button>Meus Eventos</button></a>

<?php } else { ?>

<a href="entrar_evento.php"><button>Entrar Evento</button></a>
<a href="meus_eventos_part.php"><button>Meus Eventos</button></a>

<?php } ?>

</div>

</div>

</body>
</html>