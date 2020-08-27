<?php

class Databaze {

  public $dbserver = '';
  public $uzivatelskeJmeno = '';
  public $heslo = '';
  public $databaze = '';
  public $db = '';

  public function __construct() {
    $this->dbserver = 'localhost';
    $this->uzivatelskeJmeno = 'xxx';
    $this->heslo = 'xxx';
    $this->databaze = 'blog';
    $this->db = new PDO("mysql:host=" . $this->dbserver . ";dbname=" .
      $this->databaze, $this->uzivatelskeJmeno, $this->heslo);
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  public function vyber($tabulka, $sloupce, $podminka = NULL) {
  }

  public function vloz($tabulka, $data) {
  }

  public function aktualizuj($tabulka, $data, $podminka) {
  }

  public function odstran($tabulka, $podminka) {
  }
}