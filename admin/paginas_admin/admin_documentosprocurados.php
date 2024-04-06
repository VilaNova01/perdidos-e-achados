

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
    <link rel="stylesheet" href="../css/style.css" type="text/css" />
    <title>Perdidos e Achados</title>
  </head>
  <body>
   <!-- MENU DE NAVEGACAO - INICIO -->
   <?php  require_once("../requires/admin_menu_lateral.php"); ?>
    <!-- MENU DE NAVEGACAO - FIM -->
       

    <div class="col-lg-9 principal ">

<div class="col-lg-12 caixas">
<a href="#" class="col-lg-2" data-bs-toggle="modal" data-bs-target="#exampleModal">

 <img src="../../fotos/icones/Cadastrar.png" alt="" srcset="">
 <p>Relatar Novo</p> 
</a>

<a href="relatorios_paginas/geral.php" class="col-lg-2 btn_relatorio" id="btn_relatorio">

<img src="../../fotos/icones/Relatorio.png" alt="" srcset="">
 <p>Relatorio</p> 
</a>
</div>

<div class="table-responsive tabela">
         

         <form action="admin_documentosprocurados.php?pagina=documentos_procurados" method="get" class="row col-lg-12 div_pesquisar" >
              
              

     
                            <select name="txt_pesquisar_usuario" class="form-control col-lg-5 w-25" id="tipoDoc1">
                                <option>BILHETE DE IDENTIDADE</option>
                                <option>CEDULA OU ACENTO</option>
                                <option>CERTIFICADO OU DIPLOMA</option>
                                <option>OUTROS</option>
                            </select>
                <button name="btn_pesquisar_pessoa" type="submit" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></button>
                <input type="hidden" name="pagina" value="documentos_procurados">
           </form>
 
                
                   <table class="table" style="width: 100%" >
                   <thead class="tabela_cabecalho">
                      <tr>
                        <th>Nome</th>
                       
                        <th>Responsavel</th>
                        <th>Telefone do Responsavel</th>
                        <th>Endereço do Responsavel</th>
                        <th>Imagem Do Desaparecido</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

$buscar="";
if(isset($_GET['btn_pesquisar_pessoa'])) { 

  $pesquisa=$_GET['txt_pesquisar_usuario'];

  $buscar=mysqli_query($con,"select  * from documento_perdido where tipo_documento = '$pesquisa';");

}else{
$buscar=mysqli_query($con,"select * from documento_perdido where achei='n';");
}
while($dados=mysqli_fetch_array($buscar)) {
    ?>
                      <tr class="tabela_linha_informacoes">
                        <td><?php echo $dados['tipo_documento'] ?></td>                       
                        <td><?php echo $dados['nomeResponsavel'] ?></td>
                   
                        <td><?php echo $dados['telefoneResponsavel'] ?></td>
                        <td><?php echo $dados['enderecoResponsavel'] ?></td>

                        <td><img class="img-thumbnail" id="imgEncontrados" src = "<?php echo '../../upload/documentos/'.$dados['foto'] ?>" width="40px" height="50px"></td>
                      </tr>
                      <?php
                }
             ?>
                     
                    </tbody>
                   
                  </table>
              </div>
              




       
      


 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">


            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Perdi</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <div class="modal-body">                    
                    <form border="1" action="index.php" method="post" class="bg-white rounded-3" enctype="multipart/form-data">

                        <div class="card-header">
                           <h3>Relatar Desaparecimento</h3> </div>
                        <div class="form-check">
                            <input class="form-check-input" value="D" type="radio" name="tipoPerdido" id="escolheDoc" onchange="frmDocumentos()" checked>
                            <label class="form-check-label" for="escolheDoc">
                                Documentos
                            </label>
    </div>
                        <br>
                        <fieldset>
                            <legend>Dados do Responsavel</legend>

                        <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Nome do Responsavel</label>
                            <input type="text" name="NomeR" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>

                        
                        <div class="mb-6">
                            <label for="exampleFormControlInput3" class="form-label">Telefone do Responsavel</label>
                            <input type="text" name="TelefoneR" class="form-control form-control-sm" id="exampleFormControlInput3" placeholder="DIGITE">
                        </div>
                            <div class="mb-6">
                                <label for="exampleFormControlInput3" class="form-label">Email do Responsavel</label>
                                <input type="email" name="email_responsavel_achou" class="form-control form-control-sm" id="exampleFormControlInput3" placeholder="DIGITE">
                            </div>
                        <div class="mb-6">
                            <label for="exampleFormControlInput4" class="form-label">ENDEREÇO DO RESPONSAVEL</label>
                            <input type="text" name="EnderecoR" class="form-control form-control-sm" id="exampleFormControlInput4" placeholder="DIGITE">
                        </div>
                        </fieldset>

                        <fieldset>

                        <legend id="lgDadosDesaparecido">Dados do Documnento</legend>

                        <div class="mb-6"  id="tipoDoc">
                            <label for="tipoDoc1" class="form-label">TIPO DE DOCUMENTO</label>
                            <select class="form-control form-control-sm" name="DocPerdido" id="tipoDoc1">
                                <option>BILHETE DE IDENTIDADE</option>
                                <option>CEDULA OU ACENTO</option>
                                <option>CERTIFICADO OU DIPLOMA</option>
                                <option>OUTROS</option>
                            </select>
                        </div>
                        <div class="mb-3 ">
                            <label id="idade_lbl" for="idade" class="form-label">IDADE</label>
                            <input type="number" name="idadeP" class="form-control form-control-sm" id="idade" placeholder="DIGITE">
                        </div>
                            
                           
                         <div class="mb-6" id="localPerda">
                            <label for="exampleFormControlInput4" class="form-label">LOCAL DE PERDA</label>
                            <input type="text" name="localP_Doc" class="form-control form-control-sm" id="exampleFormControlInput4" placeholder="DIGITE">
                        </div>
                            <div class="mb-3 ">
                                <label for="exampleFormControlInput5" class="form-label">FOTOGRAFIA</label>
                                <input type="file" name="FotoP" class="form-control form-control-sm" id="exampleFormControlInput5">
                            </div>
                            <div class="mb-6">
                                <label for="exampleFormControlInput4" class="form-label">DESCRIÇÃO</label>
                                <textarea name="DescricaoP" class="form-control form-control-sm" id="exampleFormControlInput4" rows="3"></textarea>
                            </div>
                            <br><br>
                        <br>

                        </fieldset>
                        <div class="mb-3">
                            <input type="submit" class="form-control btn btn-success"  value="Enviar" name="btnCadastrar">
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- FIM MODAL 1-->






     
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>
