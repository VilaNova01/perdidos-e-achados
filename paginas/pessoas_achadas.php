<?php

require_once("../conexao.php");

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
       $dataNasciP = $_POST['DataNascP'];
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
           "insert into pessoasperdidas
       (nomeResponsavel,documentoIdentificacao,nomePerdido,genero,telefoneResponsavel,dataNascemento,dataDesapareceu,descricao,enderecoResponsavel,emailResponsavel,foto,achei,categoria,localPerda)
         VALUES ('$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','Pessoa','$localP');
      ");

           if($inserir){

           }else{
               echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
           }



   }else if($_POST['tipoPerdido']=="D"){

           $nomeR = $_POST['NomeR'];
           $docR = $_POST['DocumentoR'];
           $enderecoR = $_POST['EnderecoR'];
           $teleR = $_POST['TelefoneR'];
           $emailR = $_POST['EmailR'];
           $generoP = $_POST['GeneroR'];
           $dataNasciP = $_POST['DataNascR'];

           $nomeP = $_POST['Nome'];

           $dataDesapareceuP = $_POST['DataDesapareceu'];

           $descriacaoP = $_POST['Descricao'];
           $localP = $_POST['localP'];

           $fotoP = $_FILES['Foto']['name'];

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
               "insert into pessoasperdidas
       (nomeResponsavel,documentoIdentificacao,nomePerdido,genero,telefoneResponsavel,dataNascemento,dataDesapareceu,descricao,enderecoResponsavel,emailResponsavel,foto,achei,categoria,localPerda)
         VALUES ('$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$nomeImagen','n','Documento','$localP');
      ");


           if($inserir){

           }else{
               echo "nao :'$nomeR','$docR','$nomeP','$generoP','$teleR','$dataNasciP','$dataDesapareceuP','$descriacaoP','$enderecoR','$emailR','$fotoP','n'".mysqli_error($con);
           }
       }


       }
      
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

    <section id = "collection" class = "py-5">
        <div class = "container">
            <div class = "title text-center">
                <h2 class = "position-relative d-inline-block">Pessoas Achadas</h2>
        </div>

  <div style="margin-top:4%;" class="col-lg-12">
   
 <h3>Pessoas Encontradas</h3>

 <div class = "row g-0">

    <form class="col-lg-12" method="get">
<div class="input-group mb-3">

  <input type="text" class="form-control" name="NomePesquisa" placeholder="Pesquise Pelo Nome de Quem Procuras" aria-label="Pesquise Pelo Nome de Quem Procuras">
  
  <button class="btn botaoRedondo" name="BtnPesquisa" type="submit">Pesquisar</button>
</div>
    </form>
  
   </div>
                <div class = "collection-list mt-4 row gx-0 gy-3">
                   
                    <?php
$buscar="";
if(isset($_GET['BtnPesquisa'])) {
            
    $buscar=mysqli_query($con,"select * from pessoa_achada where nome_pessoa_achada like '%".$_GET['NomePesquisa']."%' order by id_pessoa_achada desc;");

  
}else {
    $buscar=mysqli_query($con,"select * from pessoa_achada order by id_pessoa_achada desc;");
}
                    while($dados=mysqli_fetch_array($buscar)) {
                        ?>
                    <div class = "col-md-6 col-lg-4 col-xl-3 p-2 best">

                        <div class = "collection-img position-relative">
                            <img src = "<?php echo '../upload/pessoas/'.$dados['FotoAchado'] ?>" width="200px" height="300px">
                          
                        </div>

                        <div class = "text-center">
                           
                            <p class = "text-capitalize my-1"><?php echo $dados['nome_pessoa_achada'] ?></p>
                            <p  class = "text-capitalize my-1">Genero:<?php echo $dados['genero_pessoa_achada']?></p>
                           <p  class = "text-capitalize my-1">Contacto:<?php echo $dados['telefone_responsavel'] ?></p>
                            
                        </div>
                    </div>


                   

                    <?php
                }
             ?>

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

                        <form method="post" action="pessoas_achadas.php" enctype="multipart/form-data">
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
                                <option>BILHETE DE IDENTIDADE</option>
                                <option>CEDULA OU ACENTO</option>
                                <option>CERTIFICADO OU DIPLOMA</option>
                                <option>OUTROS</option>
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
                </div>
            </div>
        </div>
    </section>

 <!-- RODAPE OU FOOTER INICIO-->
 <?php require_once("requires_pagina_principal/rodape_pagina_principal.php") ?>
 <!--RODAPE OU FOOTER FIM-->


    <!-- jquery -->
    <script src = "../js/jquery-3.6.0.js"></script>

    <script src = "../bootstrap-5.0.2-dist/js/bootstrap.min.js"></script>

</body>
</html>