<?php
require_once('spolecne/databaze.php');

class Blog {
  public $db;
  public $zaklad;

  public function __construct() {
    $this->db = new Databaze();
    $this->zaklad = new stdClass();
    $this->zaklad->url = 'http://'.$_SERVER['SERVER_NAME'].'/blog/';
  }
}