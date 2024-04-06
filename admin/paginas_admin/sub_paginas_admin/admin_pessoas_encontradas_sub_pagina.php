<?php
    
    require_once("../../../conexao.php");
    ?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  

  
    <link rel="stylesheet" href="../../css/bootstrap.min.css"/>
   
    <link rel="stylesheet" href="../../../css/admin_index2.css" />
    <title>Perdidos e Achados</title>
  </head>
  <body>
   <!-- MENU DE NAVEGACAO - INICIO -->
   <?php  require_once("../../requires/admin_menu_lateral.php"); ?>
    <!-- MENU DE NAVEGACAO - FIM -->

    <div class="col-lg-9 principal ">
    <h5 class="text-center confirmar_encontrado">CONFIRMAR PESSOA ENCONTRADA</h5>

    <div class="col-lg-12 row confirmar_encontrado_Pessoa_Achada">
    <h6 class="text-center confirmar_encontrado">PESSOA ENCONTRADA</h6>
    <?php

$idPA=$_GET['id'];
$buscar=mysqli_query($con,"select * from pessoa_achada
   where id_pessoa_achada = '$idPA';");

while($dados=mysqli_fetch_array($buscar)) {
    ?>
  <img class="col-lg-3" id="" src = "<?php echo '../../../upload/pessoas/'.$dados['FotoAchado'] ?>" width="200px" height="300px">
   
  <div class="col-lg-6">
   <h6 style="text-transform:uppercase"  class="text-light">NOME: <?php echo $dados['nome_pessoa_achada'] ?></h6>
   <h6 style="text-transform:uppercase"  class="text-light">GENERO: <?php echo $dados['genero_pessoa_achada'] ?></h6>
   <h6 style="text-transform:uppercase"  class="text-light">LOC.ENCONTRADO: <?php echo $dados['local_encontrado']?></h6>
   <h6 style="text-transform:uppercase"  class="text-light">RESPONSAVEL: <?php echo $dados['nome_responsavel']?></h6>
   <h6 style="text-transform:uppercase"  class="text-light">TEL.RESPONSAVEL: <?php echo $dados['telefone_responsavel'] ?></h6>
   <h6 style="text-transform:uppercase"  class="text-light">MORADA RESPONSAVEL: <?php echo $dados['morada_responsavel'] ?></h6>
  </div>
                 <?php
}
                 ?>

    </div>
        <div class="table-responsive tabela">
        <h6 class="text-center confirmar_encontrado">PESSOAS PROCURADAS</h6>
                       <table class="table" style="width: 100%" >
                       <thead class="tabela_cabecalho">
                      <tr>
                        <th>Imagem Do Desaparecido</th>
                        <th>Nome</th>
                        <th>Idade</th>
                        <th>Responsavel</th>
                        <th>Telefone do Responsavel</th>
                        <th>Endereço do Responsavel</th>
                      
                        <th>Acoes</th>
                      </tr>
                    </thead>

    <tbody>
 <?php

$buscar="";
if(isset($_GET['btn_pesquisar_pessoa'])) { 

  $pesquisa=$_GET['txt_pesquisar_usuario'];
  $buscar=mysqli_query($con,"select * from pessoa_perdida
  where nomePerdido like '%$nomePA%'
  and genero_perdido='$generoPA' and like '$pesquisa%';");

}else{

$nomePA=$_GET['nome'];
$generoPA=$_GET['genero'];
$buscar=mysqli_query($con,"select * from pessoa_perdida
   where nomePerdido like '%$nomePA%'
   and genero_perdido='$generoPA';");

}
while($dados=mysqli_fetch_array($buscar)) {
    ?>
                 
                 <tr  class="tabela_linha_informacoes">
                        <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../../upload/pessoas/'.$dados['foto'] ?>" width="40px" height="50px"></td>            
                        <td><?php echo $dados['nomePerdido'] ?></td>
                        <td><?php echo $dados['idade_perdido'] ?></td>
                        
                        <td><?php echo $dados['nomeResponsavel'] ?></td>
                        <td><?php echo $dados['telefoneResponsavel'] ?></td>
                        <td><?php echo $dados['enderecoResponsavel'] ?></td>

                       
                        
                          <td>
                          <button  class="btn btn_visualizar" onclick="enviar_sms()">
                          Notificar Familhar
                          </button></td>
                      </tr>
                      <?php
                }
             ?>
                    </tbody>
                   
                  </table>
                </div>
              

      </div>
  
    <script src="../../js/bootstrap.bundle.min.js"></script>
  
    <script src="../../js/jquery-3.5.1.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/dataTables.bootstrap5.min.js"></script>
    <script src="../../js/script.js"></script>
  </body>
</html>
