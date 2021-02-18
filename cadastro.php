<?php
include_once("conexao.php");
?>
<!DOCTYPE html>
<html>

<head>
	<title>Cadastro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
$time = date('Y/m/d');
?>
	<form class="formulario" action="" method="POST">
  		<div class="row">
    		<input class='campo' name="cliente" placeholder='Cliente' type='text'>
 		</div>
  		<div class="row">
    		<input class='campo' name="vendedor" placeholder='Vendedor' type='text'>
  		</div>
  		<div class="row">
    		<textarea class="campo" name="descricao" rows="5" cols="33" placeholder="Descrição"></textarea>
  		</div>
  		<div class="row">
    		<input class='campo' name="valor" placeholder='Valor' type='text'>
  		</div>
  		<input type="hidden" name="datas" value="<?php echo $time ?>">
  		<input class='botao' type='submit' value='Cadastrar' name="cadastrar">
	</form>



</body>


<?php


if (isset($_POST['cadastrar'])) {

	$cliente = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
	$data = filter_input(INPUT_POST, 'datas', FILTER_SANITIZE_STRING);
	$vendedor = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_STRING);
	$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
	$valor = filter_input(INPUT_POST, 'valor', FILTER_SANITIZE_STRING);


$result_cadastro = "INSERT INTO cadastro (cliente, data, vendedor, descricao, valor) VALUES ('$cliente', '$data', '$vendedor','$descricao','$valor')";
$resultado_cadastro = mysqli_query($conn, $result_cadastro);

if(mysqli_insert_id($conn)){
	echo "<p style='color:green;'>Orçamento cadastrado com sucesso!</p>";
	
}else{
	echo "<p style='color:red;'>Orçamento não foi cadastrado!</p>";
	
}
}




?>


</html>

