<?php
$conn = new mysqli("localhost", "root", "", "eventix");

if ($conn->connect_error) {
    die("Erro de conexão");
}
?>