<?php
include_once("conexao.php");
?>
<html>

<head>
	<title>Pesquisar</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>


<form class="formulario" action="" method="POST">
  <div class="row">
    <input class='campo' name="cliente" placeholder='Cliente' type='text'>
  </div>
  <div class="row">
    <input class='campo' name="vendedor" placeholder='Vendedor' type='text'>
  </div>
  <div class="row">
    <input class='campo' name="datas" type='date'>
  </div>
  <input class='botao' type='submit' value='Pesquisar' name="pesquisar">
</form>

<?php

$result = mysqli_query($conn, "SELECT * FROM cadastro");

while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $data = $row['data'];
    
}

if(isset($_POST['pesquisar'])){
    $busca = filter_input(INPUT_POST, 'cliente', FILTER_SANITIZE_STRING);
    $busca2 = filter_input(INPUT_POST, 'vendedor', FILTER_SANITIZE_STRING);
    $busca3 = filter_input(INPUT_POST, 'datas', FILTER_SANITIZE_STRING);
    $busca3 = str_replace("-","/", $busca3);

    $result = mysqli_query($conn, "SELECT * FROM cadastro WHERE cliente = '$busca' OR vendedor = '$busca2' OR data = '$busca3'");
    echo $busca3;
?>
<table>
  <tr>
    <td>ID - </td>
    <td>Nome - </td>
    <td>Vendedor - </td>
    <td>Descrição - </td>
    <td>Valor - </td>
    <td>Data - </td>
    <td>Ações</td>
  </tr>

<?php
    while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $data = $row['data'];

    echo "<tr>
    <td>".$id."</td>
    <td>".$cliente."</td>
    <td>".$vendedor."</td>
    <td>".$descricao."</td>
    <td>".$valor."</td>
    <td>".$data."</td>
    <td><a href='editar.php?id=".$id."'>Editar</a></td>
  </tr>";
    
    
}


}



 
?>

</table>

</body>





</html>



