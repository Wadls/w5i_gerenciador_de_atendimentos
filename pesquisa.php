<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <title>Pesquisa</title>
  </head>
  <body>
    <?php 
        require_once __DIR__ . '/daos/setorDAO.php'; 
        require_once __DIR__ . '/daos/prioridadeDAO.php'; 
        require_once __DIR__ . '/daos/chamadoDAO.php'; 
        require_once __DIR__ . '/daos/connectDAO.php'; 
       
    ?>
    

    <div class= "container">
        <div class= "row">
            <div class= "column">
                <h1 class="display-4 fw-bold">Pesquisar</h1>
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <form class="d-flex" action="pesquisa.php" method="POST">
                        <input class="form-control me-2" type="search" placeholder="Nome" aria-label="Search" name="busca" autofocus>
                        <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                        </form>
                    </div>
                </nav>

               
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">setor</th>
                    <th scope="col">Prioridade</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tempo total</th>
                    <th scope="col">Check-out</th>
                    <th scope="col">Funções</th>
                    
                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        listar();
                        

                    ?>
                    
                    
                </tbody>

                </table>


                <a href="index.php" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
<!--Formatação de um modal em bootstrap, com o objetivo de que o seu design seja total interativo com a função(Checkin, Checkout, Cancelar) -->
    <div class="modal fade" id="modal_confirmar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_titulo">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_modal" action="" method="GET">
                        <p id="modal_texto">Deseja realmente fazer isso?</p>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Sair</button>
                        <input type="hidden" name="id" id="id_chamado_modal" value="">
                        
                        <input type="submit" id="btn_confirmar_modal" class="btn btn-primary" value="Confirmar">
                    </form> 
                </div>
            </div>
        </div>
    </div>
<!--Esse vai ser o único script, que pretendo colocar no código, pois, foi solicitado um código exclusivamente em Php ou C#, essa função que torna o Modal interativo, mas pode ser apagada a qualquer momento, e substituída por uma aba genérica de confirmação -->
    <script>
    function prepararModal(id, acao_php, titulo, texto, cor_botao) {
        // 1. Muda para qual arquivo PHP o formulário vai enviar os dados
        document.getElementById('form_modal').action = acao_php;
        
        // 2. Coloca o ID do chamado no input escondido
        document.getElementById('id_chamado_modal').value = id;
        
        // 3. Muda o texto do título e do corpo do modal
        document.getElementById('modal_titulo').innerText = titulo;
        document.getElementById('modal_texto').innerHTML = texto;
        
        // 4. Muda a cor do botão de confirmar para combinar com a ação (success, danger, warning)
        document.getElementById('btn_confirmar_modal').className = 'btn ' + cor_botao;
    }
    </script>
 
 <!---
    <script>
        function get_dados(id, nome) {
            document.getElementById('nome_exclusao').innerHTML = nome;
            document.getElementById('nome_para_msg_exclusao').value = nome    ;
            document.getElementById('cod_pessoa').value = id    ;
            
        }
    </script>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
