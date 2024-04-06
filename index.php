<?php

require_once("conexao.php");

require_once("controllers/controller_pagina_principal/controller_index.php");

if(isset($_POST['btnCadastrar'])) {

    header("location:index.php");
}

?>
<!doctype html>
<html lang="pt-p">
<head>
    <meta charset="utf-8">
    <title>Página Inicial</title>
    <style>
       
    </style>

<link rel="stylesheet" href="btp/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="css/pagina_principal.css" type="text/css">
</head>

<body onload="carregar_pagina1()">
     <!-- MENU DE NAVEGACAO INICIO-->
 <?php require_once("paginas/requires_pagina_principal/menu_pagina_principal.php") ?>
     <!--MENU DE NAVEGACAO FIM-->

     <header id = "header" class = "vh-100 carousel slide" data-bs-ride = "carousel" style = "padding-top: 104px;">
        <div class = "container h-100 d-flex align-items-center carousel-inner">
            <div class = "text-center carousel-item active">
                <h2 class = "text-capitalize text-white">um Familhar Perdido?</h2>                
                <h1 class = "text-uppercase py-2 fw-bold text-white">Encontre-o Já!</h1>
                <button class="btn botaoRedondo3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Relatar Agora</button>

            </div>
            <div class = "text-center carousel-item">
                <h2 class = "text-capitalize text-white">um Documento Perdido?</h2>
                <h1 class = "text-uppercase py-2 fw-bold text-white">Aché-o Já!</h1>
                
                <button class="btn botaoRedondo3" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Relatar Agora</button>

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
                           <h2 class="text-center">Relatar Desaparecimento</h2> </div>
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
                    <button type="button" class="btn botaoRedondo" data-bs-dismiss="modal">Cancelar</button>
                    
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
                        <label class="form-check-label text-dark" for="flexRadioDefault1">
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
                    <button type="button" class="btn botaoRedondo" data-bs-dismiss="modal">Cancelar</button>
                    <input type="submit" class="btn botaoRedondo" value="Avançar" name="btnCadastrar2">
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
                    <a href="paginas/pessoas_achadas.php" class="btn botaoRedondo">Pessoas</a>
                     <a href="paginas/documentos_achados.php" class="btn botaoRedondo">Documentos</a>
                </div>
            </div>
        </div>
    </div> 
    <!-- FIM MODAL 3-->
</div>
    </header>




<!-- CATEGORIA DE DOCUMENTOS INICIO-->
<section class="text-center row" style="margin-top:20px">
    <iframe id="CategoriasDoc" src="iframe_categoria_documentos.php" frameborder="0" marginheight="0" scrolling="no" height="700px"></iframe>
</section>
<!-- CATEGORIA DE DOCUMENTOS FIM-->






<!-- PESSOAS PROCURADAS INICIO -->
 
<section class="text-center row">

<div class = "titulos">
<div class = "row text-center"> 


<h3 class = "text-center">PESSOAS PROCURADAS</h3>

<div class = "text-center" style="height:100%;">
    <button type = "button" class = "btn botaoRedondo2 ">Recentes</button>
    <a href="paginas/pessoaperdidas.php" class = "btn botaoRedondo2 todas">Todas</a>             
</div>

<iframe class = "titulos" src="iframe_pessoas_perdidas.php" frameborder="0" marginheight="0" scrolling="no" height="500px"></iframe>

</div>
</div>
</section>
   
<!-- PESSOAS PROCURADAS FIM-->




<!-- DOCUMENTOS PROCURADOS INICIO-->
<section class="text-center row">

       
<div class = "titulos">
<div class = "row">

<h3 class = "text-center">DOCUMENTOS PROCURADOS</h3>
         


<div class = "text-center" style="height:100%;">
<button type = "button" class = "btn botaoRedondo2" data-filter = "*">Recentes</button>
 <a href="paginas/documentoperdidos.php" type = "button" class = "btn botaoRedondo2 todas" data-filter = ".best">Todas </a>
                  
 </div>

<iframe src="iframe_documentos_perdidos.php" frameborder="0" marginheight="0" scrolling="no" height="500px"></iframe>

</div>

                
</div>  
    </section>
<!-- DOCUMENTOS PROCURADOS FIM-->


    <section id = "Maior_Missao" class = "py-5">
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

    <!-- about us -->
    <section  class = "sobre_nos">
        <div class = "container">
            <div class = "row gy-lg-5 align-items-center">
                <div class = "col-lg-6 col-md-6 order-lg-1 text-center text-lg-start">
                    <div class = "title pt-3 pb-5">
                        <h2 class = "position-relative d-inline-block ms-4">Sobre Nós (Esquadra Policial do 14)</h2>
                    </div>
                    <p class = "lead text-light">A Nossa Esquadra</p>
                    <p>É uma unidade territorial da policia Nacional de Angola vocacionada a prestar serviço de segurança
                        de qualidade assente na proactividade da actuação,numa relação de proximidade com a comunidade,
                        através de programas especiais de prevenção criminal, no bom atendimento e eficaz tratamnento das preocupações
                        dos cidadãos ,na legalidade,tranparência e eficiência dos processos de trabalho, visando reforçar a legitimidade
                         da corporação e contribuir para a qualidade de vida do meio onde estamos inseridos 
                    </p>
                </div>
                <div class = "col-lg-6 col-md-6 order-lg-0">
                    <img src = "fotos/policia.png" alt = "" class = "img-fluid">
                </div>
            </div>
        </div>
    </section>
   

 <!-- RODAPE OU FOOTER INICIO-->
 <?php require_once("paginas/requires_pagina_principal/rodape_pagina_principal.php") ?>
 <!--RODAPE OU FOOTER FIM-->
 <script>

    
setInterval(function(){
   
// MUDAR A COR DE FUNDO DO MENU     
     let menuNav=document.getElementById('menuNav');
      let elemento=document.getElementById('CategoriasDoc');

      let scrollVertical = window.scrollY || window.pageYOffset;
      let posicaoDiv = elemento.getBoundingClientRect();
     
      if (scrollVertical>posicaoDiv.top) {
          menuNav.style.backgroundColor = 'rgb(2, 17, 39)';
      
         }else{
      
            menuNav.style.backgroundColor = 'rgb(1, 11, 26)';
         }

///////////////////////////////

}, 100)

 </script>
 <script src = "js/index.js"></script>
<script src = "js/jquery-3.6.0.js"></script>

<script src = "bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>
  


</body>
</html>