
<?php  
    require_once("../../conexao.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />

    <link rel="stylesheet" href="../../css/admin_index2.css" />

    <title>Perdidos e Achados</title>
  </head>


  <body>
    <!-- MENU DE NAVEGACAO - INICIO -->
    <?php  require_once("../requires/admin_menu_lateral.php"); ?>
    <!-- MENU DE NAVEGACAO - FIM -->

    <div class="col-lg-9 principal ">
       
              
        <div class="table-responsive tabela">
             

             <form action="admin_pessoasencontradas.php?pagina=pessoas_encontradas" method="get" class="row col-lg-12 div_pesquisar" >
                  
                    <input type="text" name="txt_pesquisar_usuario" class="form-control col-lg-5 w-25" placeholder="Pesquisar..." >
                    <button name="btn_pesquisar_pessoa" type="submit" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></button>
                    <input type="hidden" name="pagina" value="pessoas_encontradas">
               </form>
     
                    
                       <table class="table" style="width: 100%" >
                       <thead class="tabela_cabecalho">
                      <tr>
                      <th>Imagem</th>
                       <th>Nome Completo</th>
                        <th>Idade</th>
                        <th>Genero</th>
                        <th>Local Encontrado</th>
                        <th>Descrição</th>
                        <th>Responsavel</th>
                        <th>Tel Responsavel</th>
                        <th>Morada Responsavel</th>
                      
                        <th class="Cor_Fundo_Pricipal">Pessoas Perdidas Identificadas</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
$buscar="";
if(isset($_GET['btn_pesquisar_pessoa'])) { 

  $pesquisa=$_GET['txt_pesquisar_usuario'];
  $buscar=mysqli_query($con,"select * from pessoa_achada where nome_pessoa_achada like '$pesquisa%';");

}else{
$buscar=mysqli_query($con,"select * from pessoa_achada order by id_pessoa_achada desc;");
}
while($dados=mysqli_fetch_array($buscar)) {
    ?>
                    <tr  class="tabela_linha_informacoes">
                        <td><?php echo $dados['nome_pessoa_achada'] ?></td>
                        <td><?php echo $dados['idadeAchado'] ?></td>
                        <td><?php echo $dados['genero_pessoa_achada'] ?></td>
                           <td><?php echo $dados['local_encontrado'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                              <td><?php echo $dados['nome_responsavel'] ?></td>

                        <td><?php echo $dados['telefone_responsavel'] ?></td>
                        <td><?php echo $dados['morada_responsavel'] ?></td>

                        <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../upload/pessoas/'.$dados['FotoAchado'] ?>" width="40px" height="50px"></td>


                       <td class="Cor_Fundo_Pricipal" style="font-size: 1.5em;font-weight: bold;">
                <?php 
$nomePA=$dados['nome_pessoa_achada'];
$generoPA=$dados['genero_pessoa_achada'];
$idPA=$dados['id_pessoa_achada'];

$buscar2=mysqli_query($con,
  "select count(id_pessoa_perdida) 
   from pessoa_perdida
   where nomePerdido like '%$nomePA%'
   and genero_perdido='$generoPA';");

    $numero=0;

   while($dados2=mysqli_fetch_array($buscar2)) {
    $numero=$dados2['count(id_pessoa_perdida)'];

    echo $dados2['count(id_pessoa_perdida)'];
   }
    if ($numero!=0) {
    
                        ?>
    <a
     href="sub_paginas_admin/admin_pessoas_encontradas_sub_pagina.php?pagina=pessoas_encontradas&
     id=<?php echo $idPA ?>&nome=<?php echo $nomePA ?>&genero=<?php echo $generoPA ?>
     " class="btn btn_visualizar">
    Visualizar
  </a>

  <?php
                      }
                }
             ?>
                        </td>

                      </tr>
                 
                    </tbody>
                  
                  </table>
                </div>
            
      </div>

    <script src="../js/bootstrap.bundle.min.js"></script>

    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>
