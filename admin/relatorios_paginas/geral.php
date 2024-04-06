<?php	

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");
	require_once("../../conexao.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();

//consultar dados das pessoa perdidas

   $buscar = mysqli_query($con,"select count(id_pessoa_perdida) from pessoa_perdida where achei='n';");
   $dadosPerdios=[];
   while($dados=mysqli_fetch_array($buscar)) {
     
    $dadosPerdios["total"]=$dados["count(id_pessoa_perdida)"];

   }
 //

 //consultar dados das pessoa perdidas do genero M
 $buscar = mysqli_query($con,"select count(id_pessoa_perdida) from pessoa_perdida where genero_perdido='M' and achei='n';");

 while($dados=mysqli_fetch_array($buscar)) {
   
  $dadosPerdios["total_generoM"]=$dados["count(id_pessoa_perdida)"];

 }

 //

 //consultar dados das pessoa perdidas do genero M
 $buscar = mysqli_query($con,"select count(id_pessoa_perdida) from pessoa_perdida where genero_perdido='F' and achei='n';");

 while($dados=mysqli_fetch_array($buscar)) {
   
  $dadosPerdios["total_generoF"]=$dados["count(id_pessoa_perdida)"];

 }


 ////////////////////////////////////////////////////////////////////////////

 //consultar dados das pessoas achadas

 $buscar = mysqli_query($con,"select count(id_pessoa_achada) from pessoa_achada;");
 $dadosAchados=[];
 while($dados=mysqli_fetch_array($buscar)) {
   
   $dadosAchados["total"]=$dados["count(id_pessoa_achada)"];

 }
//

//consultar dados das pessoa perdidas do genero M
$buscar = mysqli_query($con,"select count(id_pessoa_achada) from pessoa_achada where genero_pessoa_achada='M';");

while($dados=mysqli_fetch_array($buscar)) {
 
	$dadosAchados["total_generoM"]=$dados["count(id_pessoa_achada)"];

}

//

//consultar dados das pessoa perdidas do genero M
$buscar = mysqli_query($con,"select count(id_pessoa_achada) from pessoa_achada where genero_pessoa_achada='F';");

while($dados=mysqli_fetch_array($buscar)) {
 
	$dadosAchados["total_generoF"]=$dados["count(id_pessoa_achada)"];

}
/*

///////////////////////////////////////////////////////////////////
/////////////////   DOCUMENTOS ///////////////////////////////////


////////////////////////////////////////////////////////////////////////////

 //consultar dados dos documentos peedidos

 $buscar = mysqli_query($con,"select count(id_documento_perdido) from documento_perdido;");
 $dadosDocPerdidos=[];
 while($dados=mysqli_fetch_array($buscar)) {
   
   $dadosAchados["total"]=$dados["count(id_documento_perdido)"];

 }
//

//consultar dados das pessoa perdidas do genero M
$buscar = mysqli_query($con,"select count(id_documento_perdido) from documento_perdido where genero_pessoa_achada='M' and achei='n';");

while($dados=mysqli_fetch_array($buscar)) {
 
	$dadosDocPerdidos["total_generoM"]=$dados["count(id_documento_perdido)"];

}

//

//consultar dados dos documentos perdidos
$buscar = mysqli_query($con,"select count(id_documento_perdido) from documento_perdido where genero_pessoa_achada='F' and achei='n';");

while($dados=mysqli_fetch_array($buscar)) {
 
	$dadosDocPerdidos["total_generoF"]=$dados["count(id_documento_perdido)"];
}*/
	// Carrega seu HTML

	$dompdf->loadHtml(' 
	
	<h1 style="text-align:center;color:rgb(1, 7, 17)">Relatorio Geral dos Dados Perdidos e Achados</h1>
	<h2 style="text-align:center;color:rgb(1, 7, 17)">PESSOAS</h2>
	<h3 style="background-color: rgb(1, 7, 17);color:#ffffff;text-align:center;"> PESSOAS PERDIDAS</h3>
	 <table border=1 style="text-align:center;font-family: impact;color:rgb(1, 7, 17)" width="100%">
	
      <tr style="background-color: rgb(1, 7, 17);color:#ffffff"><td style="border:none;">Total de Pessoas Perdidas</td><td style="border:none;">Total de sexo Masculino</td><td style="border:none;">Total de sexo Feminino</td></tr>
       <tr><td style="border:none;">'.$dadosPerdios["total"].'</td><td style="border:none;">'.$dadosPerdios["total_generoM"].'</td><td style="border:none;">'.$dadosPerdios["total_generoF"].'</td></tr>
	 </table>

	
	<h3 style="background-color:rgb(12, 64, 143);color:#ffffff;text-align:center;"> PESSOAS ACHADAS</h3>
	 <table border=1 style="text-align:center;font-family: impact;color:rgb(1, 7, 17);" width="100%">
	
      <tr style="background-color: rgb(12, 64, 143);color:#ffffff"><td style="border:none;">Total de Pessoas Achadas</td><td style="border:none;">Total de sexo Masculino</td><td style="border:none;">Total de sexo Feminino</td></tr>
       <tr><td style="border:none;">'. $dadosAchados["total"].'</td><td style="border:none;">'. $dadosAchados["total_generoM"].'</td><td style="border:none;">'. $dadosAchados["total_generoF"].'</td></tr>
	 </table>




	 <h2 style="text-align:center;color:rgb(1, 7, 17)">DOCUMENTOS</h2>
	<h3 style="background-color: rgb(1, 7, 17);color:#ffffff;text-align:center;"> DOCUMENTOS PERDIDOS</h3>
	 <table border=1 style="text-align:center;font-family: impact;color:rgb(1, 7, 17);" width="100%">
	
      <tr style="background-color: rgb(1, 7, 17);color:#ffffff">
	  <td style="border:none;">Total de Documentos Perdidos</td>
	  <td style="border:none;">B.I</td>
	  <td style="border:none;">Certificados</td>
	  <td style="border:none;">Carta de Conducao</td>
	  <td style="border:none;">Cedula</td>
	  <td style="border:none;">Passaporte</td>
	  </tr>

	  <tr>
	  <td style="border:none;">2</td>
	  <td style="border:none;">1</td>
	  <td style="border:none;">1</td>
	  <td style="border:none;">0</td>
	  <td style="border:none;">0</td>
	  <td style="border:none;">0</td>
	  </tr>
</table>

	  <h3 style="background-color: rgba(2, 21, 49, 0.5);color:#ffffff;text-align:center;"> DOCUMENTOS ACHADOS</h3>
	 <table border=1 style="text-align:center;font-family: impact;color:rgba(2, 21, 49, 0.5);" width="100%">
	
      <tr style="background-color: rgba(2, 21, 49, 0.5);color:#ffffff">
	  <td style="border:none;">Total de Documentos Achados</td>
	  <td style="border:none;">B.I</td>
	  <td style="border:none;">Certificados</td>
	  <td style="border:none;">Carta de Conducao</td>
	  <td style="border:none;">Cedula</td>
	  <td style="border:none;">Passaporte</td>
	  </tr>

	  <tr>
	  <td style="border:none;">0</td>
	  <td style="border:none;">0</td>
	  <td style="border:none;">0</td>
	  <td style="border:none;">1</td>
	  <td style="border:none;">0</td>
	  <td style="border:none;">0</td>
	  </tr>

	 </table>

	');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio_perdidos_achados.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);


?>


