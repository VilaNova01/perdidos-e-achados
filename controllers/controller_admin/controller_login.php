<?php
session_start();
require_once("../../conexao.php");

   if(isset($_POST['btnLogin'])) { 

       $senhaUsuario =md5(mysqli_escape_string($con,$_POST['senhaUsuario']));
       $emailUsuario =mysqli_escape_string($_POST['emailUsuario']);
    

      $buscar=mysqli_query($con,"select * from usuario where emailUsuario='$emailUsuario'
        and senhaUsuario='$senhaUsuario';");

        $id_usuario="";

        while($dados=mysqli_fetch_array($buscar)) {

         $id_usuario=$dados["id_usuario"];

        }

       if($buscar){

         $_SESSION["id_usuario"]= $id_usuario;
          header("location:../../admin/paginas_admin/index.php");
       }
     }
