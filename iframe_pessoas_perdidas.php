<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Pessoas Procuradas</title>

    <style>

    </style>

     <!-- bootstrap css -->
     <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
     <link rel="stylesheet" href="css/pagina_principal.css" type="text/css">

</head>
<body onload="carregar_pagina1()">




 
<div class = "mostrar_pessoaperdidas" id="conteudoPerdido1" style="height:100%">
                
                <!-- --->
                <div  class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center position-relative" id="pessoas_procuradas" style="position:relative;">
                     
                  </div>

                 <?php 
                  require_once("conexao.php");

                  $buscar=mysqli_query($con,"select * from pessoa_perdida where achei='n' order by id_pessoa_perdida desc;");
                  $i=0;
                  while($dados=mysqli_fetch_array($buscar)) {
                     
                     if($i<=6){

                      ?>


                  <div class = "col-md-6 col-lg-4 col-xl-3 p-2 best text-center" id="pessoas_procuradas" >
                        <div class = "collection-img position-relative">
                            <img src = "<?php echo 'upload/pessoas/'.$dados['foto'] ?>" width="200px" height="300px">
                          
                        </div>
                        <div class = "text-center">
                          
                            <p class = "text-capitalize my-1"><?php echo $dados['nomePerdido'] ?></p>
                           <p  class = "text-capitalize my-1">Genero:<?php echo $dados['genero_perdido']?></p>
                           <p  class = "text-capitalize my-1">Contacto:<?php echo $dados['telefoneResponsavel']  ?></p>
                <!--    <a href="paginas/visualizar_procurados.php?id=<?php echo $dados['id_pessoa_perdida'] ?>" type = "button" class = "btn botaoRedondo1">
                            Visualizar
                     </a>-->
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
    
      let item=document.querySelector("#pessoas_procuradas")
    
      let i=0;
      let pexel=0
    
    setInterval(
    
    function() {
        pexel=i.toString()+"px"
        item.style.marginRight=pexel
    
    
        // Seleciona todas as divs com o id "pessoas_procuradas"
          let divs = document.querySelectorAll('div#pessoas_procuradas');
    
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