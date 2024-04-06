<?php

require_once("../conexao.php");
require_once("../controllers/controller_pagina_principal/controller_index.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdidos E achados</title>
  
    <link rel = "stylesheet" href = "../bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/pagina_principal.css" type="text/css">
</head>
<body>
    
     <!-- MENU DE NAVEGACAO INICIO-->
 <?php require_once("requires_pagina_principal/menu_pagina_principal.php") ?>
     <!--MENU DE NAVEGACAO FIM-->

  <!-- MODAL 2 -->

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Achou</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>O que Voce Achou Perdido?</h2>
                    <div class="form-check">

                        <form method="post" action="index.php" enctype="multipart/form-data">
                            <input class="form-check-input" value="P" type="radio" name="tipoAchado" id="flexRadioDefault1" checked onclick="frmPessoasAchadas()">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Pessoas
                        </label>
                        <br>
                        <input class="form-check-input" value="D" type="radio" name="tipoAchado" id="flexRadioDefault2" onclick="frmDocumentosAchados()">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Documentos
                        </label>

                            <div class="mb-6" id="NomeAchado">
                                <label for="NomeAchados"  class="form-label">Nome da Pessoa Achada</label>
                                <input type="text" name="NomeAchado" class="form-control form-control-sm" id="NomeAchados" placeholder="DIGITE">
                            </div>

                     <div class="mb-6" style="display:none;" id="tipoDocAchado">
                            <label for="tipoDoc2" class="form-label">TIPO DE DOCUMENTO</label>
                            <select class="form-control form-control-sm" name="DocAchado" id="tipoDoc1">
                                <option value="BILHETE DE IDENTIDADE">BILHETE DE IDENTIDADE</option>
                                <option value="CEDULA OU ACENTO">CEDULA OU ACENTO</option>
                                <option value="CARTA DE CONDUÇÃO">CARTA DE CONDUÇÃO</option>
                                <option value="PASSAPORT">PASSAPORT</option>
                                <option value="CERTIFICADO OU DIPLOMA">CERTIFICADO OU DIPLOMA</option>
                                <option value="OUTROS">OUTROS</option>
                            </select>
                        </div>
                          <div class="mb-6" id="Proprietario" style="display:none;">
                                <label for="NomeAchados"  class="form-label">Proprietario</label>
                                <input type="text" name="Proprietario" class="form-control form-control-sm" id="Proprietario" placeholder="DIGITE">
                            </div>
                             <div class="mb-6 " id="GeneroAchado">
                                Genero <br>
                                <input class="form-check-input" value="M" type="radio" name="GeneroAchado" id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Masculino
                                </label>
                                <br>
                                <input class="form-check-input"value="F" type="radio" name="GeneroAchado" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                 Feminino
                                </label>

                                </div>
                             <div class="mb-6" id="IdadeAchado">
                                <label for="exampleFormControlInput1"  class="form-label">idade (Aproximada)</label>
                                <input type="text" name="IdadeAchado" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                            </div>
                             <div class="mb-6">
                                <label for="exampleFormControlInput5" class="form-label">FOTOGRAFIA</label>
                                <input type="file" name="FotoAchado" class="form-control form-control-sm" id="exampleFormControlInput5">
                            </div>
                        <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Local Encontrado</label>
                            <input type="text" name="LocalAchado" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>
                            <div class="mb-6">

                            <label for="exampleFormControlInput1"  class="form-label">Nome do Responsavel</label>
                            <input type="text" name="Nome_responsavel_achou" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>

                        <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Telefone do Responsavel</label>
                            <input type="text" name="Tel_responsavel_achou" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>
                         <div class="mb-6">
                            <label for="exampleFormControlInputE"  class="form-label">Email do Responsavel</label>
                            <input type="text" name="Email_responsavel_achou" class="form-control form-control-sm" id="exampleFormControlInputE" placeholder="DIGITE">
                        </div>
                         <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Morada do Responsavel</label>
                            <input type="text" name="Morada_responsavel_achou" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>
                         
                         <div class="mb-6">
                            <label for="exampleFormControlInput1"  class="form-label">Descrição</label>
                            <input type="text" name="DescricaoAchado" class="form-control form-control-sm" id="exampleFormControlInput1" placeholder="DIGITE">
                        </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn btn-danger" value="Avançar" name="btnCadastrar2">
                </div>
                        </form>
    </div>
                </div>
                
            </div>
        </div>
    </div> 
    <!-- FIM MODAL 2 -->

    <!-- Modal 3 -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
       
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <h2>O que Voce deseja Encontrar?</h2>
                    <a href="pessoas_achadas.php" class="btn btn-primary">Pessoas</a>
                     <a href="documentos_achados.php" class="btn btn-primary">Documentos</a>
                </div>
            </div>
        </div>
    </div> 
    <!-- FIM MODAL 3-->
    <!-- collection -->
    <section class = "py-5">
        <div>
      

            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group">
                <button type = "button" class = "btn botaoRedondo m-2 active-filter-btn" data-filter = "*">Todas</button>
                   
                  
                </div>
                <div class = "collection-list mt-4 row gx-0 gy-3">
                   
                    <?php
                    $buscar=mysqli_query($con,"select * from pessoa_perdida where achei='n';");
     
                    while($dados=mysqli_fetch_array($buscar)) {
                        ?>
                 <div class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center" id="pessoas_procuradas" >
                        <div class = "collection-img position-relative">
                            <img src = "<?php echo '../upload/pessoas/'.$dados['foto'] ?>" width="200px" height="300px">
                          
                        </div>
                        <div class = "text-center">
                          
                            <p class = "text-capitalize my-1"><?php echo $dados['nomePerdido'] ?></p>
                          <p  class = "text-capitalize my-1">Genero:<?php echo $dados['genero_perdido']?></p>
                           <p  class = "text-capitalize my-1">Contacto:<?php echo $dados['telefoneResponsavel']  ?></p>
                           <button type = "button" class = "btn botaoRedondo1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                             <i class = "fa fa-search"></i>Achei
                           </button>
                        </div>
                    </div>

                    <?php
                }
             ?>
 
                </div>
            </div>
        </div>
    </section>
    <!-- end of collection -->

   

 <!-- RODAPE OU FOOTER INICIO-->
 <?php require_once("requires_pagina_principal/rodape_pagina_principal.php") ?>
 <!--RODAPE OU FOOTER FIM-->
   

    <script src = "../js/jquery-3.6.0.js"></script>
 
    <script src = "../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</body>
</html>