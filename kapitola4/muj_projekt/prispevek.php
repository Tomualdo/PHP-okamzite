<?php
class Prispevky {
  public $db = '';
  public function __construct() {
    $this->db = new PDO("mysql:host=localhost;dbname=test_prispevku",
      "uživateldb", "heslodb");
    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->inicializuj();
  }
  public function inicializuj() {
    $id = 0;
    $prispevky = array();
    $sablona = '';
    if (!empty($_GET['id'])) {
      $id = $_GET['id'];
    }
    try {
      if (!empty($id)) {
        $dotaz = $this->db->prepare(
          "SELECT * FROM prispevky WHERE id = ?");
        $parametry = array($id);
        $sablona = 'jediny_prispevek.php';
      } else {
        $dotaz = $this->db->prepare("SELECT * FROM prispevky");
        $parametry = array();
        $sablona = 'seznam_prispevku.php';
      }
      $dotaz->execute($parametry);
      for ($i = 0; $radek = $dotaz->fetch(); $i++) {
        $prispevky[] = array(
          'id' => $radek['id'],
          'obsah' => $radek['obsah']
        );
      }
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    $dotaz->closeCursor();
    $db = null;
    require_once($sablona);
  }
}

$prispevky = new Prispevky();
