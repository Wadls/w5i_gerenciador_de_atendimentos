<?php 
    require_once "connectDAO.php";

    
    function cancelar_chamado($id_chamado){
        global $conn;

        if (isset($id_chamado)) {
            $id_chamado = $_GET['id']; //Aqui eu coleto o id
            
            $sql = "UPDATE Chamados SET status_chamado = 'Cancelado' WHERE id_chamado = $id_chamado"; //E utilizo ele para modificar o valor
            
            mysqli_query($conn, $sql);
        }
    }