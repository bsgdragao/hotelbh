
<title>Login</title>
<div>
    <img src="../images/barra.png">
</div>

<div>
    <h1>FAÇA O SEU LOGIN:</h1>
</div>

<div> 				
    <h2>&nbsp 1ª vez no BH? </h2>
    <h2>&nbsp &nbsp &nbsp Faça seu cadastro...</h2>
    <h2>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
    <a href="http://127.0.0.1:8000/cadastry/default/cliente" target="_blank">CLIQUE AQUI PARA CADASTRO. </a> </h2>
</div>

<form action="exemplo_leitura.php" method="get">
<h1> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
CLIENTE COM CADASTRADO: <br/></h1>
<h2> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
&nbsp &nbsp &nbsp &nbsp 
Pesquise pelo seu CPF:  <input type="text" name="cliente_cpf" /><br /> 
<br/>&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp
&nbsp &nbsp &nbsp &nbsp
 <input type="submit" value="Pesquisar cadastro" /> </h2>
</form>


<?php 
session_start();

# Como esse arquivo exemplo não tem formatação, 
# setamos a saida de texto como padrao UTF-8 
# para evitar erros de codificacao de caracteres.
header('Content-Type: text/html; charset=utf-8');

# 1. Incluindo a biblioteca CSV
require_once './csv.class.php' ; 

# 2. Instanciando o Objeto de Manipulação de dados
$csv = new \arquivos\Csv( 'rows.csv',',','"' );

# 2.5 Instanciando o Objeto de Manipulação de dados
error_reporting(0); //GAMBIARA BY: PAULO
 $CPF_user = $_GET['cliente_cpf']; // receber cpf do user
 $lines = file('./rows.csv'); // array com as linhas do file.csv
foreach($lines as $l) { // percorrer as linhas
    $params = explode(',', $l); // dividir linha pelo separador de colunas
    if($params[2] == $CPF_user) {
        $user = $params; // caso seja encontrado o $name_user fica definido
         break; // escusado continuar a percorrer as linhas
         
    }

    
}

if(isset($user)) {
    echo "<font size=12> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
     Cliente: $user[1] - CPF: $user[2] &nbsp <a href= 'http://localhost/hotelbh/index.php' >Clique para selecionar e reservar!</a> </font>";
}


$nomeC = $user[1];
$cpfC = $user[2];

$_SESSION['cpf'] = $cpfC;
$_SESSION['nome'] = $nomeC;

/* echo $cpf;
echo $nome; */

# 3. Obtendo os resultados
/* foreach( $csv->ler() as $linha )
    var_dump( $linha ); */


/**
 * Abaixo desse DIE, você encontra algumas 
 * dicas de uso da biblioteca.
 */
die();


/**
 * Metodos aceitos para instanciar a classe
 * ----------------------------------------
 */
# metodo 01
$csv = new \arquivos\Csv();
$csv->setArquivo( 'rows.csv' );
$csv->setDelimitador( ';' );
$dados = $csv->ler();

# metodo 02
$csv = new \arquivos\Csv( 'rows.csv', ';' );
$dados = $csv->ler();

#metodo 03
$csv = new \arquivos\Csv();
foreach( $csv->ler( 'rows.csv' ) as $linha )
    echo $linha['id_cliente'];


/**
 * Caminho e Nome do Arquivo
 * saida: string; algo como 'teste_importe__.csv';
 */
echo $csv->filepath() . "<br>"; 

/**
 * Número total de registros 
 * dentro do arquivo
 * saida: valor int;
 */
echo $csv->numRows() . "<br>";

/**
 * Obtendo o tamanho do arquivo
 * formatado em B,KB,MB,GB.
 * saida: Array('size','unit');
 */
$size = $csv->size();
echo $size['size'] . $size['unit'] . "<br>";

/**
 * Obtendo a data em que o arquivo foi 
 * Modificado.
 * Nota: Precisa configurar em seu sistema 
 * o timezone com date_default_timezone_set();
 * saida: string; algo como 10/04/2017 19:42:02
 */
echo $csv->dataModificacao() . "<br>";

/**
 * Existe a data em que o arquivo foi acessado 
 * por ultimo.
 * saida: string; algo como 10/04/2017 19:42:02
 */
echo $csv->dataAcesso() . "<br>";


/**
 * Você também pode transformar o resultado final 
 * em um objeto, se assim desejar e achar mais 
 * confortavel o uso de oop.
 * A conversão funciona pelo proprio PHP via typecast.
 */
foreach( $csv->ler() as $linha ){
    $linha = (object) $linha;
    var_dump( $linha );
}


?>
