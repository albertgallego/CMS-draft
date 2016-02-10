<?php
header('Content-Type: text/html; charset=utf-8');
$empreses = array(
    ["name"=>"Codi Girona", "mail"=>"algasa@gmail.com"],
    ["name"=>"Articraf", "mail"=>"articraf@articraf.com"],
    ["name"=>"Dyneff España", "mail"=>"dyneff@dyneff.es"],
    ["name"=>"Finques Colomé", "mail"=>"info@finquescolome.com"],

);

foreach($empreses as $a){
    $content = <<<EOT
Benvolgut responsable de {$a['name']},

Primer de tot, volem desitjar-te un bon nadal i una feliç entrada al 2016. Esperem que aquest any nou sigui per tu igual de bó o millor que el que deixem enrere. I una manera per assegurar-se l'èxit en pràcticament qualsevol activitat es la formació dels treballadors.

No crec que sigui estrany que et diguem que treballadors formats en idiomes -i en qualsevol altra matéria- son treballadors més capaços i amb més recursos. La idea de regalar als treballadors un curs d'idiomes es un regal molt interessant per les dues parts -treballador i empresa-, ja que el treballador es sent respectat i integrat alhora que l'empresa guanya en competitivitat.

Per altra banda, des d'English Girona podem gestionar la Fundació Tripartita, així podem fer-nos càrrec de que els cursos d'idiomes que oferim a les empreses siguin bonificats al acabar l'exercici anual, resultant així en cursos virtualment subvencionats.

Oferim cursos d'Anglès, Francès, Català i Castellà per estrangers. Ens especialitzem en classes privades i en grups reduïts de tots els àmbits empresarials. Actualment estem donant cursos d'anglés, francés i castellà de temàtiques diverses com son la legal, administrativa, restauració, indústria químico-mecànica i màrqueting.

Estarem encantats de rebre'ls a les nostres oficines per parlar de possibles cursos, així com d'enviar-los un pressupost sense cap mena de compromís.

Atentament,

Aina Costa Pamies
anne@englishgirona.net * secretaria@englishgirona.net
Directora d'English Girona
Força 31, Baixos -- Girona
EOT;

    echo "Sending to... " . $a['name'] . "<br />";
    if(mail($a['mail'],"English Girona us desitja Bones Festes", $content, "From: secretaria@englishgirona.net")){
        echo "SUCCESS!!! <br /><br />";
    }
    else {
        echo "ERROR!!! <br /> <br />";
    }
}
