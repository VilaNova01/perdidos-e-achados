<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Pessoas Procuradas</title>

    <style>

    </style>

     <!-- bootstrap css -->
     <link rel = "stylesheet" href = "../bootstrap-5.0.2-dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/pagina_principal.css" type="text/css">

</head>
<body>
  <!-- MENU DE NAVEGACAO INICIO-->
  <?php require_once("requires_pagina_principal/menu_pagina_principal.php") ?>
     <!--MENU DE NAVEGACAO FIM-->

<div class = "titulos">
<div class = "row text-center"> 


<h3 class = "text-center">Pessoas Procuradas</h3>

<div class = "mostrar_pessoaperdidas" id="conteudoPerdido1" style="height:100%">
                
                <!-- --->
                <div  class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center position-relative" id="pessoas_procuradas" style="position:relative;">
                     
                  </div>

                 <?php 
                  require_once("../conexao.php");

                  $id_procurado=$_GET["id"];
              
                               
                  $buscar=mysqli_query($con,"select * from pessoa_perdida where achei='n' and id_pessoa_perdida=$id_procurado order by id_pessoa_perdida desc;");
                  $i=0;
                  while($dados=mysqli_fetch_array($buscar)) {
                     
                     if($i<=6){

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
                             <i class = "fa fa-search"></i>Visualizar
                           </button>
                        </div>
                    </div>

                  
                  <?php
              }
              $i++;
              }
           ?>

      </div>
      </div>
      </div>
      


      



  <!-- bootstrap js -->
  <script src = "../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "../js/script.js"></script>
</body>
</html>