<?php 
require_once("../../conexao.php");
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
               $pasta="../../upload/documentos/";
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

