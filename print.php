<?php

require_once "functions.php";

$mpdf = new \Mpdf\Mpdf(['setAutoTopMargin' =>'pad',
                      'margin-top' =>30,
                      'margin-left' =>100,
                      'margin-right' =>30
                      ]);

?>