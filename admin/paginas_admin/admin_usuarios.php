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
   

         
    <div class="col-lg-12 caixas">
   <a href="admin_documentosencontrados.php" class="col-lg-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
  
     <img src="../../fotos/icones/Cadastrar.png" alt="" srcset="">
     <p>Novo Usuario</p> 
   </a>
 

    <a href="relatorios_paginas/geral.php" class="col-lg-2 btn_relatorio" id="btn_relatorio">
   
    <img src="../../fotos/icones/Relatorio.png" alt="" srcset="">
     <p>Relatorio</p> 
   </a>
</div>
          <div class="table-responsive tabela">
             

        <form action="admin_usuarios.php?pagina=usuario" method="get" class="row col-lg-12 div_pesquisar" >
             
               <input type="text" name="txt_pesquisar_usuario" class="form-control col-lg-5 w-25" placeholder="Pesquisar..." >
               <button name="btn_pesquisar_pessoa" type="submit" class="btn btn_pesquisar col-lg-1">  <img src="../../fotos/icones/Pesquisa2.png" alt="" srcset=""></button>
               <input type="hidden" name="pagina" value="usuario">
          </form>

               
                  <table class="table" style="width: 100%" >
                  <thead class="tabela_cabecalho">
                      <tr>
                      <th>Nome</th>
                        <th>Tipo de Usuario</th>
                        <th>Email</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                        <?php
$buscar="";
if(isset($_GET['btn_pesquisar_pessoa'])) { 

  $pesquisa=$_GET['txt_pesquisar_usuario'];

  $buscar=mysqli_query($con,"select * from usuario where nomeUsuario like '$pesquisa%';");

}else{
$buscar=mysqli_query($con,"select * from usuario;");
}

if($buscar){

while($dados=mysqli_fetch_array($buscar)) {
  
    ?>
                      <tr  class="tabela_linha_informacoes">
                        <td><?php echo $dados['nomeUsuario'] ?></td>
                        <td><?php echo $dados['categoriaUsuario'] ?></td>                        
                        <td><?php echo $dados['emailUsuario'] ?></td>
                       
                      </tr>

                      <?php
                      
                }
              }
               
             ?>
                     
                    </tbody>
                   
                  </table>
                </div>
          

    <!-- MODAL CADASTRAR - INICIO -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">CADASTRAR USUARIO</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">                    

                        
                        <div class="form-check">

                      <form border="1" action="../../controllers/controller_admin/controller_usuario.php" enctype="multipart/form-data" method="post" class="bg-white rounded-3">

                        <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Nome do Usuario</label>
                            <input type="text" name="nomeUsuario" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>
                        
                            <div class="mb-6">
                                <label for="exampleFormControlInput3" class="form-label">Email</label>
                                <input type="email" name="emailUsuario" class="form-control form-control-sm" id="exampleFormControlInput3" placeholder="DIGITE">
                            </div>
                         <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Senha</label>
                            <input type="password" name="senhaUsuario" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="****">
                        </div>
                        

                        
                        <div class="mb-6">
                            <label for="exampleFormControlInput4" class="form-label">Categoria</label>
                            <select class="form-control" name="tipoUsuario">
                                <option value="Administrador Geral">Administrador Geral</option>
                                <option value="Administrador Básico">Administrador Básico</option>
                            </select>
                        </div>
                        <br><br>
                        <div class="mb-3">
                            <input type="submit" class="form-control btn btn-success"  value="Salvar" name="btnCadastrar">
                        </div>
                    </form>



          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
          </div>
            
          <!-- MODAL CADASTRAR - FIM -->


          
   
    <script src="../js/bootstrap.bundle.min.js"></script>
  
    <script src="../js/jquery-3.5.1.js"></script>
    <script src="../js/jquery.dataTables.min.js"></script>
    <script src="../js/dataTables.bootstrap5.min.js"></script>
    <script src="../js/script.js"></script>
  </body>
</html>
