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
    $sloupceSQL = implode(', ', $sloupce);
    $podminkaSQL = '';
    $parametry = array();
    if (is_array($podminka)) {
      $i = 0;
      foreach ($podminka as $sloupec => $hodnota) {
        if ($i == 0) {
          $podminkaSQL .= " WHERE `$sloupec` = ?";
        } else {
          $podminkaSQL .= " AND `$sloupec` = ?";
        }
        $parametry[$i] = $hodnota;
        $i++;
      }
    }

    $dotaz = $this->db->prepare("SELECT $sloupceSQL
                                   FROM `$tabulka`".
                                   $podminkaSQL);
    try {
      $dotaz->execute($parametry);
      $zaznamy = $dotaz->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      echo $e->getMessage();
      $zaznamy = false;
    }

    $dotaz->closeCursor();
    return $zaznamy;
  }

  public function vloz($tabulka, $data) {
    $sloupce = array();
    $hodnoty = array();
    $parametry = array();
    if (is_array($data)) {
      foreach ($data as $sloupec => $hodnota) {
        array_push($sloupce, "`$sloupec`");
        array_push($hodnoty, '?');
        array_push($parametry, $hodnota);
      }
    }
    $sloupceSQL = implode(', ', $sloupce);
    $hodnotySQL = implode(', ', $hodnoty);

    $dotaz = $this->db->prepare("INSERT INTO `$tabulka`($sloupceSQL)
                                   VALUES ($hodnotySQL)");
    try {
      $dotaz->execute($parametry);
      $pocetVlozenych = $dotaz->rowCount();
    } catch (PDOException $e) {
			echo $e->getMessage();
      $pocetVlozenych = false;
		}

    return $pocetVlozenych;
  }

  public function aktualizuj($tabulka, $data, $podminka) {
    $sloupceHodnoty = array();
    $parametry = array();
    if (is_array($data) && !empty($data)) {
      foreach ($data as $sloupec => $hodnota) {
        array_push($sloupceHodnoty, "`$sloupec` = ?");
        array_push($parametry, $hodnota);
      }
    } else {
      return 0;
    }
    $sloupceHodnotySQL = implode(', ', $sloupceHodnoty);

    $podminkaSQL = '';
    if (is_array($podminka)) {
      $i = 0;
      foreach ($podminka as $sloupec => $hodnota) {
        if ($i == 0) {
          $podminkaSQL .= " WHERE `$sloupec` = ?";
        } else {
          $podminkaSQL .= " AND `$sloupec` = ?";
        }
        array_push($parametry, $hodnota);
        $i++;
      }
    }

    $dotaz = $this->db->prepare("UPDATE `$tabulka`
                                   SET $sloupceHodnotySQL".
                                   $podminkaSQL);
    try {
      $dotaz->execute($parametry);
      $pocetAktualizovanych = $dotaz->rowCount();
    } catch (PDOException $e) {
      echo $e->getMessage();
      $pocetAktualizovanych = false;
    }

    return $pocetAktualizovanych;
  }

  public function odstran($tabulka, $podminka) {
    $podminkaSQL = '';
    $parametry = array();
    if (is_array($podminka)) {
      $i = 0;
      foreach ($podminka as $sloupec => $hodnota) {
        if ($i == 0) {
          $podminkaSQL .= " WHERE `$sloupec` = ?";
        } else {
          $podminkaSQL .= " AND `$sloupec` = ?";
        }
        array_push($parametry, $hodnota);
        $i++;
      }
    }

    $dotaz = $this->db->prepare("DELETE FROM `$tabulka`".$podminkaSQL);
    try {
      $dotaz->execute($parametry);
      $pocetOdstranenych = $dotaz->rowCount();
    } catch (PDOException $e) {
      echo $e->getMessage();
      $pocetOdstranenych = false;
    }

    return $pocetOdstranenych;
  }
}