<?php
require 'pes.php';
require 'kocka.php';
require 'ryba.php';

$fido = new Pes('Fido');
echo 'Pes se jmenuje: ' . $fido->jmeno . '<br />';
echo 'Pes říká: ' . $fido->mluv() . '<br />';
echo 'Pes si hraje: ' . $fido->hraj() . '<br />';

$berta = new Kocka('Berta');
echo 'Kočka se jmenuje: ' . $berta->jmeno . '<br />';
echo 'Kočka říká: ' . $berta->mluv() . '<br />';
echo 'Kočka si hraje: ' . $berta->hraj() . '<br />';

$nemo = new Ryba('Nemo');
echo 'Ryba se jmenuje: ' . $nemo->jmeno . '<br />';
echo 'Ryba říká: ' . $nemo->mluv() . '<br />';
