<?php

require_once("conexao.php");

// PERDIDOS INICIO *****************************************************

   if(isset($_POST['btnCadastrar'])) {

       if ($_POST['tipoPerdido'] == "P") {

       $nomeR = $_POST['NomeR'];
       $docR = $_POST['DocumentoR'];
       $enderecoR = $_POST['EnderecoR'];
       $teleR = $_POST['TelefoneR'];
       $emailR = $_POST['EmailR'];
       $localP = $_POST['localP'];
       $nomeP = $_POST['NomeP'];
       $generoP = $_POST['GeneroP'];
       $idadeP = $_POST['idadeP'];
       
       $dataDesapareceuP = $_POST['DataDesapareceuP'];
       $descriacaoP = $_POST['DescricaoP'];
       $fotoP = $_FILES['FotoP']['name'];

           //upload da imagen
           if(isset($fotoP)){
               $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
               $pasta="upload/pessoas/";
               $nomeImagen=uniqid().".$extensao";
               //codigo que faz o upload da imagen
               move_uploaded_file($_FILES['FotoP']['tmp_name'],$pasta.$nomeImagen);

           }
           //cadastrar dados da pessoa perdida
       $inserir = mysqli_query($con,
           "insert into pessoa_perdida
       (nomeResponsavel,documento_responsavel,nomePerdido,genero_perdido,telefoneResponsavel,idade_perdido,dataDesapareceu,descricao,enderecoResponsavel,emailResponsavel,foto,achei,localPerda,id_usuario)
         VALUES ('$nomeR','$docR','$nomeP','$generoP','$teleR','$idadeP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','$localP','1');
      ");

           if($inserir){

           }else{
               echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
           }



   }else if($_POST['tipoPerdido']=="D"){

           $nomeR = $_POST['NomeR'];
           $docR = $_POST['DocumentoR'];
           $enderecoR = $_POST['EnderecoR'];
           $teleR = $_POST['TelefoneR'];
           $emailR = $_POST['EmailR'];
           $generoP = $_POST['GeneroR'];
           

           $nomeP = $_POST['DocPerdido'];


           $descriacaoP = $_POST['DescricaoP'];
           $localP = $_POST['localP'];

           $fotoP = $_FILES['FotoP']['name'];

           //upload da imagen
           if(isset($fotoP)){
               $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
               $pasta="upload/documentos/";
               $nomeImagen=uniqid().".$extensao";
               //codigo que faz o upload da imagen
               move_uploaded_file($_FILES['FotoP']['tmp_name'],$pasta.$nomeImagen);
           }

           //cadastrar dados de documentos perdidos
           $inserir = mysqli_query($con,
               "insert into documento_perdido
       (nomeResponsavel,identificacao_documento,tipo_documento,telefoneResponsavel,descricao,enderecoResponsavel,emailResponsavel,foto,achei,localPerda,id_usuario)
         VALUES ('$nomeR','$docR','$nomeP','$teleR','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','$localP','1');
      ");


           if($inserir){

           }else{
               echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
           }
       }


       }

// PERDIDOS FIM .............................................


// ACHEI INICIO *****************************************************


 if(isset($_POST['btnCadastrar2'])) {



       // PESSOAS ACHADAS

       if ($_POST['tipoAchado'] == "P") {

       $nomeR = $_POST['Nome_responsaval_achou'];
       $nomeAchado = $_POST['NomeAchado'];

       $enderecoR = $_POST['Endereco_responsavel_achou'];
       $teleR = $_POST['Tel_responsavel_achou'];
      
       $localAchado = $_POST['LocalAchado'];
      
       $generoAchado = $_POST['GeneroAchado'];
       $idadeAchado = $_POST['IdadeAchado'];
    
       $descriacaoAchado = $_POST['DescricaoAchado'];
       $fotoP = $_FILES['FotoAchado']['name'];

           //UPLOAD DA IMAGEM DO ACHADO

           if(isset($fotoP)){
               $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
               $pasta="upload/pessoas/";
               $nomeImagen=uniqid().".$extensao";
               //codigo que faz o upload da imagen
               move_uploaded_file($_FILES['FotoAchado']['tmp_name'],$pasta.$nomeImagen);

           }

           //CADASTRAR PESSOA ACHADA

       $inserir = mysqli_query($con,
           "insert into pessoa_achada
       (nome_pessoa_achada,genero_pessoa_achada,telefone_responsavel,idadeAchado,descricao,morada_responsavel,FotoAchado,local_encontrado)
         VALUES ('$nomeAchado','$generoAchado','$teleR','$idadeAchado','$descriacaoAchado','$enderecoR','$nomeImagen','$localAchado');
      ");
           if($inserir){
               
           }else{
               echo "nao :'$nomeAchado','$generoAchado','$teleR','$idadeAchado','$descriacaoAchado','$enderecoR','$nomeImagen','$localAchado'".mysqli_error($con);
           }



  // DOCUMENTOS ACHADOS

   }else if($_POST['tipoAchado']=="D"){

           $nomeR = $_POST['NomeR'];
           
           $enderecoR = $_POST['Morada_responsavel_achou'];
           $teleR = $_POST['Tel_responsavel_achou'];
           $emailR = $_POST['email_responsavel_achou'];
           $generoP = $_POST['GeneroAchado'];

           $nomeDoc = $_POST['DocAchado'];

           $descriacaoP = $_POST['DescricaoAchado'];
           $localP = $_POST['LocalAchado'];
           $fotoP = $_FILES['FotoAchado']['name'];
           $proprietario = $_POST['Proprietario'];

           //upload da imagen
           if(isset($fotoP)){
               $extensao=pathinfo($fotoP,PATHINFO_EXTENSION);
               $pasta="upload/documentos/";
               $nomeImagen=uniqid().".$extensao";
               //codigo que faz o upload da imagen
               move_uploaded_file($_FILES['FotoAchado']['tmp_name'],$pasta.$nomeImagen);
           }

           //cadastrar dados de documentos Perdidos
           $inserir = mysqli_query($con,
               "insert into documento_achado
       (nome_responsavel,tipo_documento,telefone_responsavel,descricao,morada_responsavel,email_responsavel,foto,local_encontrado,proprietario)
         VALUES ('$nomeR','$nomeDoc','$teleR','$descriacaoP','$enderecoR','$emailR','$nomeImagen','$localP','$proprietario');
      ");


           if($inserir){

           }else{
               echo mysqli_error($con);
           }
       }


       }

// ACHEI FIM .............................................

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perdidos E achados</title>
 
   
    <!-- bootstrap css -->
    <link rel = "stylesheet" href = "bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- custom css -->
    <link rel = "stylesheet" href = "css/main.css">
    <style>
       
    </style>
</head>
<body onload="carregar_pagina1()">
    
    <!-- navbar -->
    <nav class = "navbar navbar-expand-lg py-4 fixed-top menu_nav1" id="menu_nav">
        <div class = "container ">
            <a  href = "index.php"> 
                <img src="fotos/logoBaterLata.png"  alt = "site icon" width="200px">
            </a>

            <div class = "order-lg-2 nav-btns">
                
                <button type = "button" class = "btn position-relative botaoRedondo1" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                    <i class = "fa fa-search"></i>Achei
                </button>
                <button type = "button" class = "btn position-relative botaoRedondo1" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                    Encontrados
                </button>
            </div>

            <button class = "navbar-toggler border-0" type = "button" data-bs-toggle = "collapse" data-bs-target = "#navMenu">
                <span class = "navbar-toggler-icon"></span>
                
            </button>

            <div class = "collapse navbar-collapse order-lg-1" id = "SubMenu1">
                <ul class = "navbar-nav mx-auto text-center">
                    <li class = "nav-item px-2 py-2">
                        <a class = " " id="actual" href = "#header">HOME</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "" href = "paginas/pessoaperdidas.php">PESSOAS PERDIDAS</a>
                    </li>
                    <li class = "nav-item px-2 py-2">
                        <a class = "" href = "paginas/documentoperdidos.php">DOCUMENTOS PERDIDOS</a>
                    </li>
                   
                    <li class = "nav-item px-2 py-2 border-0">
                        <a class = "" href = "#contactos">CONTACTE-NOS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end of navbar -->
  
    <!-- header -->
    <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                <h2 class = "text-capitalize text-white">um Familhar Perdido?</h2>                
                <h1 class = "text-uppercase py-2 fw-bold text-white">Encontre-o Já!</h1>
                <button class="btn botaoRedondo" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Relatar Agora</button>

            </div>
            <div class = "text-center carousel-item">
                <h2 class = "text-capitalize text-white">um Documento Perdido?</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">Aché-o Já!</h1>
                
                <button class="btn botaoRedondo" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Relatar Agora</button>

            </div>
        </div>

        <button class = "carousel-control-prev" type = "button" data-bs-target="#header" data-bs-slide = "prev">
            <span class = "carousel-control-prev-icon"></span>
        </button>
        <button class = "carousel-control-next" type = "button" data-bs-target="#header" data-bs-slide = "next">
            <span class = "carousel-control-next-icon"></span>
        </button>


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

                            <input class="form-check-input" value="P" type="radio" name="tipoPerdido" id="flexRadioDefault1"  onchange="frmPessoas()" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Pessoas
                            </label>
                            <br>
                            <input class="form-check-input" value="D" type="radio" name="tipoPerdido" id="escolheDoc" onchange="frmDocumentos()">
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
                            <label for="exampleFormControlInput2" class="form-label">Documento de Identificaçao (Responsavel)</label>
                            <input type="text" name="DocumentoR" class="form-control form-control-sm" id="exampleFormControlInput2" placeholder="DIGITE">
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

                        <legend id="lgDadosDesaparecido">Dados do Desaparecido</legend>

                        <div class="mb-6">
                            <label id="nome_lbl" for="nome" class="form-label">NOME</label>
                            <input type="text" name="NomeP" class="form-control form-control-sm" id="nome" placeholder="DIGITE">
                        </div>

                        <div class="mb-6" style="display:none;" id="tipoDoc">
                            <label for="tipoDoc1" class="form-label">TIPO DE DOCUMENTO</label>
                            <select class="form-control form-control-sm" name="DocPerdido" id="tipoDoc1">
                                <option value="BILHETE DE IDENTIDADE">BILHETE DE IDENTIDADE</option>
                                <option value="CEDULA OU ACENTO">CEDULA OU ACENTO</option>
                                <option value="CARTA DE CONDUÇÃO">CARTA DE CONDUÇÃO</option>
                                <option value="PASSAPORT">PASSAPORTE</option>
                                <option value="CERTIFICADO OU DIPLOMA">CERTIFICADO OU DIPLOMA</option>
                                <option value="OUTROS">OUTROS</option>
                            </select>
                        </div>
                        <div class="mb-3 ">
                            <label id="idade_lbl" for="idade" class="form-label">IDADE</label>
                            <input type="number" name="idadeP" class="form-control form-control-sm" id="idade" placeholder="DIGITE">
                        </div>
                            <div class="mb-3 " id="Genero">
                                Genero <br>
                                <input class="form-check-input" value="M" type="radio" name="GeneroP" id="flexRadioDefault3" checked>
                                <label class="form-check-label" for="flexRadioDefault3">
                                    Masculino
                                </label>
                                <br>
                                <input class="form-check-input"value="F" type="radio" name="GeneroP" id="flexRadioDefault4">
                                <label class="form-check-label" for="flexRadioDefault4">
                                 Feminino
                                </label>
                                </div>
                           
                         <div class="mb-6" style="display: none;" id="localPerda">
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
                    <a href="paginas/pessoas_achadas.php" class="btn botaoRedondo1">Pessoas</a>
                     <a href="paginas/documentos_achados.php" class="btn botaoRedondo1">Documentos</a>
                </div>
            </div>
        </div>
    </div> 
    <!-- FIM MODAL 3-->
</div>
    </header>

    <section class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h3 class = "position-relative d-inline-block textoLaranja">Categorias - Documentos</h3>
            </div>
               <div class = "row g-0">
                

                <iframe id="CategoriasDoc" src="iframe_categoria_documentos.php" frameborder="0" marginheight="0" scrolling="no" height="600px"></iframe>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- end of header -->
    <!-- collection -->
    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block textoLaranja">Pessoas Procuradas</h2>
            </div>
            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group" style="height:100%;">
                    <button type = "button" class = "btn botaoRedondo m-2 active-filter-btn" data-filter = "*">Recentes</button>
                    <a href="paginas/pessoaperdidas.php" type = "button" class = "btn m-2 btn-white" data-filter = ".best">Todas </a>
                  
                </div>

                <iframe src="iframe_pessoas_perdidas.php" frameborder="0" marginheight="0" scrolling="no" height="500px"></iframe>
                   
                </div>
            </div>
        </div>
    </section>
    <!-- end of collection -->

    <!-- special products -->
    <section id = "special" class = "py-5">
        <div class = "container">
            <div class = "title text-center py-5">
                <h2 class = "position-relative d-inline-block textoLaranja">Documentos Procurados</h2>
            </div>

            
           
            <div class = "row g-0">
                <div class = "d-flex flex-wrap justify-content-center mt-5 filter-button-group" style="height:100%;">
                    <button type = "button" class = "btn botaoRedondo m-2 active-filter-btn" data-filter = "*">Recentes</button>
                    <a href="paginas/pessoaperdidas.php" type = "button" class = "btn m-2 btn-white" data-filter = ".best">Todas </a>
                  
                </div>

                <iframe src="iframe_documentos_perdidos.php" frameborder="0" marginheight="0" scrolling="no" height="600px"></iframe>
                   
                </div>
            </div>
          
        </div>
    </section>
    <!-- end of special products -->

    <!-- blogs -->
    <section id = "offers" class = "py-5">
        <div class = "container">
            <div class = "row d-flex align-items-center justify-content-center text-center justify-content-lg-start text-lg-start">
                <div class = "offers-content">
                    <span class = "text-white">Nossa Maior Missão</span>
                    <h2 class = "mt-2 mb-4 text-white">Encontrar o que esta Perdido!</h2>
                    <a href = "#" class = "btn botaoRedondo">Achei</a>
                </div>
            </div>
        </div>
        
    </section>
    <!-- end of blogs -->

    <!-- blogs -->
    
    <!-- end of blogs -->

    <!-- about us -->
    <section id = "about" class = "py-5">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">Sobre Nós (Esquadra Policial do 14)</h2>
                    </div>
                    <p class = "lead text-muted">A Nossa Esquadra</p>
                    <p>É uma unidade territorial da policia Nacional de Angola vocacionada a prestar serviço de segurança
                        de qualidade assente na proactividade da actuação,numa relação de proximidade com a comunidade,
                        através de programas especiais de prevenção criminal, no bom atendimento e eficaz tratamnento das preocupações
                        dos cidadãos ,na legalidade,tranparência e eficiência dos processos de trabalho, visando reforçar a legitimidade
                         da corporação e contribuir para a qualidade de vida do meio onde estamos inseridos 
                    </p>
                </div>
                <div class = "col-lg-6 order-lg-0">
                    <img src = "fotos/pexels-photo-9487241.jfif" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!-- end of about us -->

    <!-- newsletter
    <section id = "newsletter" class = "py-5">
        <div class = "container">
            <div class = "d-flex flex-column align-items-center justify-content-center">
                <div class = "title text-center pt-3 pb-5">
                    <h2 class = "position-relative d-inline-block ms-4">Receba Notificações em Tempo Real</h2>
                </div>

                <p class = "text-center text-muted">Receba Notificações de Pessoas e Documentos Procurados, e ajude quem esta em Aflição.</p>
                <div class = "input-group mb-3 mt-3">
                    <input type = "text" class = "form-control" placeholder="Insira o Seu Email ...">
                    <button class = "btn btn-primary" type = "submit">Subscrever</button>
                </div>
            </div>
        </div>
    </section> -->
    <!-- end of newsletter -->

    <!-- footer -->
    <footer class = "rodape py-5">
        <div class = "container">
            <div class = "row text-white g-4">
                <div class = "col-md-6 col-lg-3">
                            <img src="fotos/logoBaterLata.png"  alt = "site icon" width="200px">
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light">Links</h5>
                    <ul class = "list-unstyled">
                        <li class = "my-3">
                            <a href = "#" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Home
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "paginas/pessoaperdidas.php" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i>Pesoas Procuradas
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "paginas/documentoperdidos.php" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i>Documentos Procurados
                            </a>
                        </li>
                        <li class = "my-3">
                            <a href = "#about" class = "text-white text-decoration-none text-muted">
                                <i class = "fas fa-chevron-right me-1"></i> Sobre Nós
                            </a>
                        </li>
                    </ul>
                </div>

                <div class = "col-md-6 col-lg-3" id="contactos">
                    <h5 class = "fw-light mb-3">Contacte Nos</h5>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-map-marked-alt"></i>
                        </span>
                        <span class = "fw-light">
                           Luanda Angola, Bairro Estalagem
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span class = "fw-light">
                            esquadra14@gmail.com
                        </span>
                    </div>
                    <div class = "d-flex justify-content-start align-items-start my-2 text-muted">
                        <span class = "me-3">
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span class = "fw-light">
                            +244 930 810 346
                        </span>
                    </div>
                </div>

                <div class = "col-md-6 col-lg-3">
                    <h5 class = "fw-light mb-3">Rede Sociais</h5>
                    <div>
                        <ul class = "list-unstyled d-flex">
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-facebook-f"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href = "#" class = "text-white text-decoration-none text-muted fs-4 me-4">
                                    <i class = "fab fa-pinterest"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end of footer -->

        <script src = "js/jquery-3.6.0.js"></script>
<script>

    function carregar_pagina1(){


    setInterval(function(){
        
      let menuNav=document.getElementById('menu_nav');
      let elemento=document.getElementById('CategoriasDoc');

      let scrollVertical = window.scrollY || window.pageYOffset;
      let posicaoDiv = elemento.getBoundingClientRect();

      if (scrollVertical>posicaoDiv.top) {
          
          menuNav.style.backgroundColor = 'rgb(1, 11, 26)';

         }else{

            menuNav.style.backgroundColor = 'rgb(1, 11, 26,0.50)';
         }

        }, 100)
}

    function frmDocumentos(){
        let genero=document.getElementById("Genero");
        let lgDadosDesaparecido=document.getElementById("lgDadosDesaparecido");
        let localPerda=document.getElementById("localPerda");
        let idade=document.getElementById("idade");
        let tipoDoc=document.getElementById("tipoDoc");
        let nome=document.getElementById("nome");
   let idade_lbl=document.getElementById("idade_lbl");


        localPerda.style.display='block';
        nome.style.display='none';
        
        idade.style.display='none';
        idade_lbl.style.display='none';

        tipoDoc.style.display='block';
        lgDadosDesaparecido.innerText="Dados do Documento";
     
        genero.style.display='none';

    }
     function frmDocumentosAchados(){
        
        // outros quientos
  
        let generoAchado=document.getElementById("GeneroAchado");
        let docAchado=document.getElementById("tipoDocAchado");
        let nomeAchado=document.getElementById("NomeAchado");
        let idadeAchado = document.getElementById("IdadeAchado");
        let proprietario = document.getElementById("Proprietario");

         proprietario.style.display='block';
         docAchado.style.display='block';
         generoAchado.style.display='none';   
         nomeAchado.style.display='none';
         idadeAchado.style.display='none';
    }
    function frmPessoasAchadas(){
        
        // outros quientos
  
        let generoAchado=document.getElementById("GeneroAchado");
        let docAchado=document.getElementById("tipoDocAchado");
        let nomeAchado=document.getElementById("NomeAchado");
         let proprietario = document.getElementById("Proprietario");

         proprietario.style.display='none';
         docAchado.style.display='none';
         generoAchado.style.display='block';   
         nomeAchado.style.display='block'


    }

    function frmPessoas(){
        let genero=document.getElementById("Genero");
        let lgDadosDesaparecido=document.getElementById("lgDadosDesaparecido");
        lgDadosDesaparecido.innerText="Dados do Desaparecido";
    }
</script>

    <!-- jquery -->

    <script src = "js/jquery-3.6.0.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.js"></script>
    <!-- bootstrap js -->
    <script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
    <!-- custom js -->
    <script src = "js/script.js"></script>


</body>
</html>