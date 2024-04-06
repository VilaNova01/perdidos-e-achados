<?php
session_start();
require_once("../../conexao.php");

   if(isset($_POST['btn_pesquisar_pessoa'])) { 

       $pesquisa=mysqli_escape_string($con,$_GET['txt_pesquisar_pessoa']);
    
    

      $buscar=mysqli_query($con,"select * from usuario where emailUsuario='$emailUsuario'
        and senhaUsuario='$senhaUsuario';");

        $id_usuario="";

        while($dados=mysqli_fetch_array($buscar)) {

         $id_usuario=$dados["id_usuario"];

        }

       if($buscar){

         $_SESSION["id_usuario"]= $id_usuario;
          header("location:../../admin/paginas_admin/index.php?pagina=inicio");
       }
     }
