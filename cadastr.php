<?php

/*A empresa MINE HORTA VALE VERDE te contratou para informatizar um formulário que atualmente é mantido em 
papel. Sua tarefa é desenvolver um formulário em PHP com os mesmos dados do formulário em papel e armazenar 
as informações em um arquivo CSV. O Modelo do formulário encontra-se disponível como um recurso adicionado ]
a esta tarefa. Antes de salvar o formulário, você deve fazer algumas validações: O campo Firma é 
obrigatório, pelo menos 1 contato (telefone, celular ou email) deve ser preenchido e o CNPJ deve ser um CNPJ
válido (utilize a função disponível em https://www.geradorcnpj.com/script-validar-cnpj-php.htm )*/


if(!isset($firma)){
	$firma= "";
	$num= "";
    $data= "";
    $end= "";
    $comp= "";
    $bairro= "";
    $city= "";
    $esta= "";
    $tel= "";
    $cel= "";
    $cep= "";
	$email= "";
	$insc= "";
	$cnpj = "";
    
}
?>

<h1>MINE HORTA VALE VERDE<h1>
<h2>Cadastre aqui<h2>
<h3>Insira os dados!<h3>
<form method ="post" action= "registrado.php">
    <p>Firma <input type="text" name="firma" size="100" value="<?=$firma?>">
    Número <input type="text" name="num" value="<?=$num?>"></p><p>
    Data <input type="date" name="data" value="<?=$data?>">
    Endereço <input type="text" name="end" size="90" value="<?=$end?>"> </p>
    <p>Complemento <input type="text" name="com" size = "30" value="<?=$comp?>">
    Bairro <input type="text" name="bairro" value="<?=$bairro?>" >
    Cidade <input type="text" name="city" size="40" value="<?=$city?>"><br>
    Estado <input type="text" name="estado" size= "40" value="<?=$esta?>"></p>
    <p>Telefone <input type="text" name="tel" value="<?=$tel?>">
    Celular<input type="type" name="cel" value = "<?=$cel?>"></p>
    Email<input type="text" name="email" size="40" value = "<?=$email?>"></p>
    <p>CEP<input type="text" name="cep" value="<?=$cep?>"></p>
    <p>Inscrição<input type="text" name="insc" value = "<?=$insc?>"></p>
    <p>CNPJ<input type="text" name="cnpj" value="<?=$cnpj?>"></p>
    <p><button type="submit">Clique aqui para enviar dados</button></p>
</form>

