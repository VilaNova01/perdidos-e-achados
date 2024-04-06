
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


    <link rel="stylesheet" href="../css/bootstrap.min.css"/>

    <title>Perdidos e Achados</title>
  </head>


  <body>
   <!-- MENU DE NAVEGACAO - INICIO -->
   <?php  require_once("../requires/admin_menu_lateral.php"); ?>
    <!-- MENU DE NAVEGACAO - FIM -->
    <div class="col-lg-9 principal ">
       
              
    <div class="table-responsive tabela">
             

             <form action="admin_documentosencontrados.php?pagina=documentos_encontrados" method="get" class="row col-lg-12 div_pesquisar" >
                  
             <select name="txt_pesquisar_usuario" class="form-control col-lg-5 w-25" id="tipoDoc1">
                                <option>BILHETE DE IDENTIDADE</option>
                                <option>CEDULA OU ACENTO</option>
                                <option>CERTIFICADO OU DIPLOMA</option>
                                <option>OUTROS</option>
                            </select>
                    <button name="btn_pesquisar_pessoa" type="submit" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></button>
                    <input type="hidden" name="pagina" value="documentos_encontrados">
               </form>
     
                    
                       <table class="table" style="width: 100%" >
                       <thead class="tabela_cabecalho">
                      <tr>
                       <th>Tipo de Docummentos</th>
                        <th>Local Achado</th>
                        <th>Responsavel que Achou</th>
                      
                        <th>Telefone do Responsavel</th>
                        <th>Email do Responsavel</th>
                        <th>Morada do Responsavel</th>
                        <th>Descrição</th>            
                        <th>Imagem do Documento Achado</th>
                       <th class="Cor_Fundo_Pricipal">Documentos.Identificados</th> 
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Obtenha a URI

$buscar="";
if(isset($_GET['btn_pesquisar_pessoa'])) { 

  $pesquisa=$_GET['txt_pesquisar_usuario'];
  $buscar=mysqli_query($con,"select * from documento_achado where tipo_documento = '$pesquisa';");

}else{                       
$buscar=mysqli_query($con,"select * from documento_achado;");
}
while($dados=mysqli_fetch_array($buscar)) {
    ?>
                    <tr  class="tabela_linha_informacoes">
                        <td><?php echo $dados['tipo_documento'] ?></td>
                        <td><?php echo $dados['local_encontrado'] ?></td>
                        <td><?php echo $dados['nome_responsavel'] ?></td>
                           <td><?php echo $dados['telefone_responsavel'] ?></td>
                             <td><?php echo $dados['email_responsavel'] ?></td>
                               <td><?php echo $dados['morada_responsavel'] ?></td>
                              <td><?php echo $dados['descricao'] ?></td>
                
                        <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../upload/documentos/'.$dados['foto'] ?>" width="40px" height="50px"></td>

                        <td class="Cor_Fundo_Pricipal" style="font-size: 1.5em;font-weight: bold;">
                <?php 
$tipoDA=$dados['tipo_documento'];
$nomePropietario=$dados['proprietario'];
$idDA=$dados['id_documento_achado'];
$nomePropietario=$dados['proprietario'];

$buscar2=mysqli_query($con,
  "select count(id_documento_perdido) 
   from documento_perdido
   where tipo_documento like '%$tipoDA%'
   and nomeResponsavel  like '%$nomePropietario%' ;");

    $numero=0;
   while($dados2=mysqli_fetch_array($buscar2)) {
    $numero=$dados2['count(id_documento_perdido)'];
    echo $dados2['count(id_documento_perdido)'];
   }

   if ($numero!=0) {
   ?>
    <a href="sub_paginas_admin/admin_documentos_encontrados_sub_pagina.php?
    id=<?php echo $idDA ?>&
    tipo=<?php echo $tipoDA ?>&
    nomeR=<?php echo $nomePropietario ?>"
     class="btn btn_visualizar">
    Visualizar
  </a>
                        </td>
                      </tr>
                      <?php
                }
            }
             ?>
                     
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
