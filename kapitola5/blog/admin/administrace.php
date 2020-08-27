<?php
session_start();
require_once('../spolecne/databaze.php');

class Administrace {
  public $db;
  public $zaklad;

  public function __construct() {
    $this->zaklad = new stdClass();
    $this->zaklad->url = "http://".$_SERVER['SERVER_NAME'].'/blog/admin/';
    $casovyLimit = 600;
    if (isset($_SESSION["blog_prihlasen"])) {
      $uplynulyCas = time() - $_SESSION["casova_znamka"];
      if ($uplynulyCas > $casovyLimit) {
        session_unset();
        session_destroy();
        header('Location: ' . $this->zaklad->url .
          'prihlaseni.php?stav=neaktivni');
        exit();
      }
    }
    $_SESSION["casova_znamka"] = time();
    $prihlasen = $_SESSION['blog_prihlasen'];
    if (empty($prihlasen)) {
      session_unset();
      session_destroy();
      header('Location: ' . $this->zaklad->url .
        'prihlaseni.php?stav=odhlasen');
      exit();
    } else {
      $this->db = new Databaze();
    }
  }
}