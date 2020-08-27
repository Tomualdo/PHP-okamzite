<?php
require 'pes.php';

$fido = new Pes('Fido');
echo 'Pes se jmenuje: ' . $fido->jmeno . '<br />';
echo 'Pes říká: ' . $fido->mluv() . '<br />';

$fifinka = new Pes('Fifinka');
echo 'Pes se jmenuje: ' . $fifinka->jmeno . '<br />';
echo 'Pes říká: ' . $fifinka->mluv() . '<br />';
