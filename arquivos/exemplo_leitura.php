
<form action="exemplo_leitura.php" method="get">
    CPF:  <input type="text" name="cliente.cpf" /><br />
    <input type="submit" name="submit" value="Me aperte!" />
</form>

<?php 


# Como esse arquivo exemplo não tem formatação, 
# setamos a saida de texto como padrao UTF-8 
# para evitar erros de codificacao de caracteres.
header('Content-Type: text/html; charset=utf-8');

# 1. Incluindo a biblioteca CSV
require_once './csv.class.php' ; 

# 2. Instanciando o Objeto de Manipulação de dados
$csv = new \arquivos\Csv( 'rows.csv',',','"' );

# 2.5 Instanciando o Objeto de Manipulação de dados

 $CPF_user = $_POST['cliente.cpf']; // receber cpf do user
 $lines = file('./rows.csv'); // array com as linhas do file.csv
foreach($lines as $l) { // percorrer as linhas
    $params = explode(',', $l); // dividir linha pelo separador de colunas
    if($params[2] == $CPF_user) {
        $name_user = $params[0]; // caso seja encontrado o $name_user fica definido
         break; // escusado continuar a percorrer as linhas
         
    }

    
}

if(isset($name_user)) {
    // encontrado
}
 
# 3. Obtendo os resultados
foreach( $csv->ler() as $linha )
    var_dump( $linha );


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
