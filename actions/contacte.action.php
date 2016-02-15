<?php
//TODO: Recollir correus de la BBDDs i fer viable el branding.
header('Content-type: application/json');

$nom = $_POST['nom'];
$telf = $_POST['telf'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$referit = $_POST['con'];
$comentari = $_POST['comentari'];

	$headers = "From: EnglishGirona.net website <info@englishgirona.net>\r\n";
	$headers .= "Reply-To: ".$email."\r\n";
	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $missatge = "<b>Missatge de ".$nom.":</b> <br />".$comentari."<br /><br /><b>Dades de la persona que contacta:</b><br />Telefon: ".$telf."<br />email: ".$email."<br />empresa: ".$empresa."<br />Referencia de: ".$referit."<br /><br /><i>Respon a aquest correu per contestar.</i>";


    $result = @mail("anne@englishgirona.net","Nou comentari a EnglishGirona.net!", $missatge,$headers);
    //$result = @mail("algasa+proves@gmail.com","Nou comentari a EnglishGirona.net!", $missatge,$headers);
   if($result){
       $result = @mail("secretaria@englishgirona.net","Nou comentari a EnglishGirona.net!",$missatge,$headers);
       if($result){
//if(true){
        echo "OK";
       }//      echo $missatge;
        //echo "{\"content\":\"<span class='error'>Tenim problemes amb el servidor i no podem assegurar que els missatges funcionin correctament. Contacti amb anne@englishgirona.net. Perdoni les molesties.<\/span>\"}";
    }
    else {
        echo "KO";
    }

?>
