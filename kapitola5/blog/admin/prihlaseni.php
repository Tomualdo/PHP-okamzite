<?php
session_start();
require_once('../spolecne/databaze.php');

class Prihlaseni {
  public $db;
  public $zaklad;

  public function __construct() {
    $this->db = new Databaze();
    $this->zaklad = new stdClass();
    $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/blog/admin/';
    $this->inicializuj();
  }

  public function inicializuj() {
    if (!empty($_GET['stav']) && $_GET['stav'] == 'odhlasit') {
      session_unset();
      session_destroy();
      $oznameni = 'Odhlášení proběhlo úspěšně.';
      require_once('sablony/prihlasovaci-formular.php');
    } else if (!empty($_SESSION['blog_prihlasen'])) {
      $this->prihlaseniUspesne();
      exit();
    } else {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $chyba = $this->overUdaje();
      } else if (!empty($_GET['stav']) && $_GET['stav'] == 'neaktivni') {
        session_unset();
        session_destroy();
        $oznameni = 'Byl/a jste odhlášen/a z důvodu neaktivity. ' +
          'Přihlaste se prosím znovu.';
      }
      require_once('sablony/prihlasovaci-formular.php');
    }
  }

  public function prihlaseniUspesne() {
    $_SESSION['blog_prihlasen'] = true;
    $_SESSION["casova_znamka"] = time();
    header('Location: ' . $this->zaklad->url . 'prispevky.php');
    exit();
  }

  public function prihlaseniSelhalo() {
    return 'Špatné uživatelské jméno nebo heslo.';
  }

  private function overUdaje() {
    if (!empty($_POST['jmeno']) && !empty($_POST['heslo'])) {
      $heslo = md5($_POST['heslo']);
      $uzivatele = $this->db->vyber('uzivatele', array('id'),
        array('jmeno' => $_POST['jmeno'], 'heslo' => $heslo));
      if (count($uzivatele) > 0) {
        $this->prihlaseniUspesne();
      } else {
        return $this->prihlaseniSelhalo();
      }
    }
  }
}

$prihlaseni = new Prihlaseni();