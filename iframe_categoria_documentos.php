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
</head>
<body onload="carregar_pagina1()">

<h3 class = "text-center">CATEGORIAS - DOCUMENTOS</h3> 
         
         <div class = "row">

<div class = "categoriaDocumento col-lg-12">
<?php

require_once("conexao.php");
$biCount=0;
$buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='BILHETE DE IDENTIDADE' and achei='n';");


while($dados=mysqli_fetch_array($buscar)) {
    
    $biCount=$dados["count(tipo_documento)"];

    }

    //

$cedulaCount=0;

$buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='CEDULA OU ACENTO' and achei='n';");


while($dados=mysqli_fetch_array($buscar)) {
    
    $cedulaCount=$dados["count(tipo_documento)"];

      }

       //

    $certificadoCount=0;
    $buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='CERTIFICADO OU DIPLOMA' and achei='n';");
    
    
    while($dados=mysqli_fetch_array($buscar)) {
        
      $certificadoCount=$dados["count(tipo_documento)"];
    
          }

///
          $cartaCount=0;
          $buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='CARTA DE CONDUÇÃO' and achei='n';");
          
          
          while($dados=mysqli_fetch_array($buscar)) {
              
            $cartaCount=$dados["count(tipo_documento)"];
          
                }

  //
  $passaporteCount=0;
          $buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='PASSAPORTE' and achei='n';");
          
          
          while($dados=mysqli_fetch_array($buscar)) {
              
            $passaporteCount=$dados["count(tipo_documento)"];
          
                }
  //
  $outrosCount=0;
          $buscar=mysqli_query($con,"select count(tipo_documento) from documento_perdido where tipo_documento='OUTROS' and achei='n';");
          
          
          while($dados=mysqli_fetch_array($buscar)) {
              
            $outrosCount=$dados["count(tipo_documento)"];
          
                }
?>
<div class="col-lg-4 ItemCate" >
  
  <img src="fotos/bi.png" alt="" srcset=""  width="350px" height="167px" class="card-img-top" alt="...">
  <div class="card-body">

    <p class="card-text"> Bilhete de Identidade <br>
 ( <?php echo $biCount ?> )</p>

  </div>
              
</div>


<div class="col-lg-4 ItemCate" >
  
  <img src="fotos/passaporte.png" alt="" srcset=""  width="350px" height="167px" class="card-img-top" alt="...">
  <div class="card-body">

    <p class="card-text"> Passaporte 
 <br> ( <?php echo $passaporteCount ?> )</p>
 
  </div>
              
</div>


<div class="col-lg-4 ItemCate">
  
  <img src="fotos/certificado.jpg" alt="" srcset=""  width="350px" class="card-img-top" alt="...">
  <div class="card-body">

    <p class="card-text"> Certificado ou Diploma
 <br> ( <?php echo $certificadoCount ?> )</p>

  </div>
              
</div>

<div class="col-lg-4 ItemCate" >
  
  <img src="fotos/ced.jpg" alt="" srcset=""  width="350px" height="160px"  class="card-img-top" alt="...">
  <div class="card-body">
  
    <p class="card-text"> Cedula ou Acento
 <br> ( <?php echo $cedulaCount ?> )</p>

  </div>
              
</div>

<div class="col-lg-4 ItemCate" >
  
  <img src="fotos/Carta_de_Conducao.png" alt="" srcset=""  width="350px" height="210px"  class="card-img-top" alt="...">
  <div class="card-body">
 
    <p class="card-text">  Carta de Condução
 <br> ( <?php echo $cedulaCount ?> )</p>
 
  </div>
              
</div>

<div class="col-lg-4 ItemCate" >
  
  <img src="fotos/outros1.jpg" alt="" srcset=""  width="350px" class="card-img-top" alt="...">
  <div class="card-body ">
  
    <p class="card-text">Outros
<br> ( <?php echo $outrosCount?> )</p>

  </div>
           
  
</div>

 </div>

 </div>


  <!-- bootstrap js -->
  <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>
</body>
</html>