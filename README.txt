To install PHP Hotel Booking on your website, you just need
to unzip PHPHotelBooking.zip and copy the files to your preferred folder.

The administration panel will be available on - 

[your installation folder]/admin 

and the default username and password will be -

username: administrator
password: abc123

(after you log in, you can change them with different ones you may prefer)

So for example if you upload it on:

www.yourdomain.com/test

then the administration panel will be available on:

www.yourdomain.com/test/admin
username: administrator
password: abc123

For any questions or suggestions, please don't hesitate to contact us at:
www.netartmedia.net/en_Contact.html

You are welcome to check also our other php scripts and website tools at:
www.netartmedia.net/en_Products.html


##########################################################################3
codigo da salvação
##########################################################################

$CPF_user = $_POST['CPF']; // receber cpf do user
$lines = file('file.csv'); // array com as linhas do file.csv
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