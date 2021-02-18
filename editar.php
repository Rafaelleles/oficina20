<?php
include_once("conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);

$result = mysqli_query($conn, "SELECT * FROM cadastro WHERE id = '$id'");

while($row = mysqli_fetch_assoc($result)){

    $id = $row['id'];
    $cliente = $row['cliente'];
    $vendedor = $row['vendedor'];
    $descricao = $row['descricao'];
    $valor = $row['valor'];
    $datas = $row['data'];
    echo  "<form class='formulario' action='' method='POST'>
    <div class='row'>
    <input type='hidden' name='id' class='campo' value=".$id.">
    </div>
    <div class='row'>
    <input type='text' name='cliente' class='campo' value=".$cliente.">
    </div>
    <div class='row'>
    <input type='text' name='vendedor'  class='campo' value=".$vendedor.">
    </div>
    <div class='row'>
    <input type='text' name='descricao' class='campo' value=".$descricao.">
    </div>
    <div class='row'>
     <input type='text' name='valor'  class='campo' value=".$valor.">
     </div>
     <div class='row'>
      <input type='date' name='datas'  class='campo' value=".$datas.">
      </div>
      <input type='submit' name='editar' class='botao' value='Editar'>
</form>";
}
if(isset($_POST['editar'])){
   $id  = $_POST['id'];
$cliente  = $_POST['cliente'];
$vendedor  = $_POST['vendedor'];
$descricao  = $_POST['descricao'];
$valor  = $_POST['valor'];
$datas  = $_POST['datas'];
    $result = mysqli_query($conn, "UPDATE cadastro SET cliente = '$cliente', vendedor = '$vendedor', descricao = '$descricao', valor = '$valor', data = '$datas' where id ='$id'");
    echo "Orçamento atualizado com sucesso!";
}


?>
<!DOCTYPE html>
<html>
<head>
  <title>Editar</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

</body>
</html>