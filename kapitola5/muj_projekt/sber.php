<?php
if (!empty($_POST['data'])) {
  echo 'Tento textový řetězec jste odeslal/a z formuláře #1: ' .
    $_POST['data'];
} elseif (!empty($_GET['data'])) {
  echo 'Tento textový řetězec jste odeslal/a z formuláře #2: ' .
    $_GET['data'];
}
