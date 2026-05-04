<?php

require_once __DIR__ . '/../daos/check-in_check-outDAO.php';


$id_chamado = $_POST['id_chamado'];
$data_formatada = date('Y-m-d H:i:s', strtotime($_POST['data_checkout']));
$solucao = $_POST['solucao'];

checkout($id_chamado,$data_formatada,$solucao);
header("Location: ../../index.php");
exit;
?>