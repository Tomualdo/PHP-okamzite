<?php
require_once 'mazlicek.php';

class Kocka extends Mazlicek {
  public function mluv() {
    return 'Mňau!';
  }

  public function hraj() {
    return 'chyť myš';
  }
}
