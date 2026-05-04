<?php

require_once __DIR__ . '/daos/check-in_check-outDAO.php';


$id_chamado = $_POST['id_chamado'];
$data_html = $_POST['data_checkout'];
$data_formatada = date('Y-m-d H:i:s', strtotime($data_html));

checkout($data_formatada,$id_chamado);
header("Location: index.php");
exit;
?>