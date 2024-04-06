<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Document</title>

    <style>
   
    </style>
     <!-- bootstrap css -->
     <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pagina_principal.css" type="text/css">

    <!-- custom css -->
  
</head>
<body onload="carregar_pagina1()">


<div class = "mostrar_documentos_perdidos" id="conteudoPerdido1">

<div class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center  position-relative" id="documentos_procurados" style="position:relative;">
             
    </div>
            <?php
  require_once("conexao.php");
$buscar=mysqli_query($con,"select * from documento_perdido where achei='n' order by id_documento_perdido desc;");
$i=0;

while($dados=mysqli_fetch_array($buscar)) {
     if($i<=6){
    ?>
                       
                  <div class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center" id="documentos_procurados" >
                        <div class = "collection-img position-relative">
                        <img   src = "<?php echo 'upload/documentos/'.$dados['foto']?>" width="300px" height="200px">
                          
                        </div>
                        <div class = "text-center">
                          
                        <p class = "text-capitalize mt-3 mb-1"><?php echo $dados['tipo_documento'] ?></p>
                        <span class = "d-block">Responsavel:<?php echo $dados['nomeResponsavel']?> <br> TEL:<?php echo $dados['telefoneResponsavel']  ?></span>    
                        </div>
                    </div>
                <?php
                }
                  $i++;

                }
             ?>
            
            </div>
<script>
    function carregar_pagina1() {
    
      let item=document.querySelector("#documentos_procurados")
    
      let i=0;
      let pexel=0
    
    setInterval(
    
    function() {

      
      /*let elemento=document.getElementById('conteudoPerdido1');

      let scrollVertical = window.scrollY || window.pageYOffset;
      let posicaoDiv = elemento.getBoundingClientRect();
    
      if (scrollVertical>posicaoDiv.top) {
       */
      //////////////////////
        pexel=i.toString()+"px"
        item.style.marginRight=pexel
    
    
        // Seleciona todas as divs com o id "pessoas_procuradas"
          let divs = document.querySelectorAll('div#documentos_procurados');
    
    // Pega a última div encontrada
          let ultimaDiv = divs[divs.length - 1];
    
    // Agora você pode fazer o que quiser com a última div
    
         // Obtém as dimensões e posição da última div
    var dimensoes = ultimaDiv.getBoundingClientRect();
    // Obtém a margem direita da última div
    var margemDireita =parseInt(dimensoes.right - dimensoes.width);
        
       
        
          if(margemDireita<0){
            location.reload();
    
           }
        
        i=i-5;

            //}
   
          }, 100
      )
      }
</script>


  <!-- bootstrap js -->
  <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>