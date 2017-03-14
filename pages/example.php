<?php
/* 
this example is used to convert any doc format to text
author: Gourav Mehta
author's email: gouravmehta@gmail.com
author's phone: +91-9888316141
*/ 

require("doc2txt.class.php");

$filename = 'C:/Users/Ruben/Desktop/REF/PART DE DEFUNCION/ROSALES.doc'; 

    if ( file_exists($filename) ) {        

    if ( ($fh = fopen($filename, 'r')) !== false ) {

    $headers = fread($fh, 0xA00);

    $n1 = ( ord($headers[0x21C]) - 1 );

    $n2 = ( ( ord($headers[0x21D]) - 8 ) * 256 );

    $n3 = ( ( ord($headers[0x21E]) * 256 ) * 256 );

    $n4 = ( ( ( ord($headers[0x21F]) * 256 ) * 256 ) * 256 );


    $textLength = ($n1 + $n2 + $n3 + $n4);

    $extracted_plaintext = fread($fh, $textLength);

    echo utf8_encode(nl2br($extracted_plaintext));

    print_r(extract_emails_from($extracted_plaintext));    

         }

        }

    function extract_emails_from($string) {
             preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", utf8_encode($string), $matches);
             echo utf8_encode($matches[0]);
    }
?>