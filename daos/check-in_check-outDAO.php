<?php
    require_once "connectDAO.php";
    
    function checkin($data_formatada,$id_chamado){
        global $conn;
        $sql = "UPDATE Chamados 
        SET status_chamado = 'Inicializado', 
        data_checkin = '$data_formatada' 
        WHERE id_chamado = $id_chamado";


        mysqli_query($conn, $sql);

    }
    function checkout($data_formatada,$id_chamado){
        global $conn;
        $sql = "UPDATE Chamados 
        SET status_chamado = 'Finalizado', 
            data_checkout = '$data_formatada' 
        WHERE id_chamado = $id_chamado";


        mysqli_query($conn, $sql);

    }



    


