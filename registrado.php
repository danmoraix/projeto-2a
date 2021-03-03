<html><head><meta charset="UTF-8"></head></html>
<?php
    function validaCNPJ($cnpj = null) {
        // Verifica se um número foi informado
        if(empty($cnpj)) {
            return false;
        }
        // Elimina possivel mascara
        $cnpj = preg_replace("/[^0-9]/", "", $cnpj);
        $cnpj = str_pad($cnpj, 14, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cnpj) != 14) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cnpj == '00000000000000' || 
            $cnpj == '11111111111111' || 
            $cnpj == '22222222222222' || 
            $cnpj == '33333333333333' || 
            $cnpj == '44444444444444' || 
            $cnpj == '55555555555555' || 
            $cnpj == '66666666666666' || 
            $cnpj == '77777777777777' || 
            $cnpj == '88888888888888' || 
            $cnpj == '99999999999999') {
            return false;
        // Calcula os digitos verificadores para verificar se o
        // CNPJ é válido
        } else {  
            $j = 5;
            $k = 6;
            $soma1 = 0;
            $soma2 = 0;
            for ($i = 0; $i < 13; $i++) {
                $j = $j == 1 ? 9 : $j;
                $k = $k == 1 ? 9 : $k;
    
                $soma2 += ($cnpj[$i] * $k);
    
                if ($i < 12) {
                    $soma1 += ($cnpj[$i] * $j);
                }
                $k--;
                $j--;
            }
            $digito1 = $soma1 % 11 < 2 ? 0 : 11 - $soma1 % 11;
            $digito2 = $soma2 % 11 < 2 ? 0 : 11 - $soma2 % 11;
            return (($cnpj[12] == $digito1) and ($cnpj[13] == $digito2));
        }
    }


    $firma = $_POST["firma"];
    $num = $_POST["num"];
    $data = $_POST["data"];
    $end = $_POST["end"];
    $comp = $_POST["com"];
    $bairro = $_POST["bairro"];
    $city = $_POST["city"];
    $esta = $_POST["estado"];
    $tel = $_POST["tel"];
    $cel = $_POST["cel"];
    $email = $_POST["email"];
    $insc = $_POST["insc"];
    $cep = $_POST["cep"];
    $cnpj = $_POST["cnpj"];
    if(empty($firma)){
        echo "Necessário nome da Firma";
        die;
    }
    if(empty($email || $tel || $cel)){
        echo "Precisamos de algum dos 3 tipos de contato!";die;
    }
    if(isset($email)){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "Email não válido";
        include "cadastr.php";
        die;
        }
    }
    if(!validaCNPJ($cnpj)){
        echo "não se pode cnpj";
        include "cadastr.php";
        die;
    }
    $f = fopen("dadossalvos.csv","a");
    fputcsv($f, array($firma, $num, $data, $end, $comp, $bairro, $city, $esta,
     $tel, $cel, $cep, $email, $insc, $cnpj));
    fclose($f);
    echo "<h1>Dados Enviados Com Sucesso, Em Breve receberá respostas.<h1>
    <br><p>Muito obrigado &#128157 <p>";

?>
