<?php
require_once('administrace.php');
require_once('../spolecne/MarkdownInterface.php');
require_once('../spolecne/Markdown.php');

class Prispevky extends Administrace {
  public function __construct() {
    parent::__construct();
    if (!empty($_GET['akce'])) {
      switch ($_GET['akce']) {
        case 'pridej':
          $this->pridejPrispevek();
          break;
        case 'uprav':
          $this->upravPrispevek();
          break;
        case 'uloz':
          $this->ulozPrispevek();
          break;
        case 'odstran':
          $this->odstranPrispevek();
          break;
        default:
          $this->vypisPrispevky();
          break;
      }
    } else {
      $this->vypisPrispevky();
    }
  }

  public function vypisPrispevky() {
    $prispevky = $this->db->vyber('prispevky', array('*'));
    foreach($prispevky as $klic => $prispevek) {
      $prispevky[$klic]['obsah'] =
        \Michelf\Markdown::defaultTransform($prispevek['obsah']);
    }
    require_once 'sablony/sprava-prispevku.php';
  }

  public function pridejPrispevek() {
    $prispevek = array(
      'id' => 0,
      'nadpis' => '',
      'obsah' => ''
    );
    require_once 'sablony/editace-prispevku.php';
  }

  public function upravPrispevek() {
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
      $prispevky = $this->db->vyber('prispevky', array('*'),
        array('id' => $_GET['id']));
      $prispevek = $prispevky[0];
      require_once 'sablony/editace-prispevku.php';
    }
  }

  public function ulozPrispevek() {
    $data = array();
    $podminka = array();

    if (!empty($_POST['prispevek'])) {
      $prispevek = $_POST['prispevek'];
    }

    if (!empty($prispevek['id'])) {
      $podminka['id'] = $prispevek['id'];
    }
    if (!empty($prispevek['nadpis'])) {
      $data['nadpis'] = $prispevek['nadpis'];
    }
    if (!empty($prispevek['obsah'])) {
      $data['obsah'] = $prispevek['obsah'];
    }

    if (empty($podminka)) {
      $ulozeno = $this->db->vloz('prispevky', $data);
    } else {
      $ulozeno = $this->db->aktualizuj('prispevky', $data, $podminka);
    }

    if ($ulozeno !== false) {
      $oznameni = 'Příspěvek byl úspěšně uložen.';
      header('Location: ' . $this->zaklad->db . 'prispevky.php?oznameni=' .
        urlencode($oznameni));
      exit();
    } else {
      $chyba = 'Nepodařilo se odstranit příspěvek. ' +
        'Zkuste to prosím později.';
      require_once 'sablony/editace-prispevku.php';
    }
  }

  public function odstranPrispevek() {
    if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
      $odstraneno = $this->db->odstran('prispevky',
        array('id' => $_GET['id']));
      if ($odstraneno > 0) {
        $oznameni = 'Příspěvek byl odstraněn.';
        header('Location: ' . $this->zaklad->db . 'prispevky.php?oznameni=' .
          urlencode($oznameni));
        exit();
      } else {
        $chyba = 'Nepodařilo se odstranit příspěvek. ' +
          'Zkuste to prosím později.';
        header('Location: ' . $this->zaklad->db . 'prispevky.php?chyba=' .
          urlencode($chyba));
        exit();
      }
    }
  }
}

$adminPrispevky = new Prispevky();