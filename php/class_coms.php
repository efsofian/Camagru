<?php
include("database.php");

class Com {
  public function __construct($DSN, $USR, $PSSWD) {
    try {
      $this->conn = new PDO($DSN, $USR, $PSSWD);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      var_dump($e->getMessage());
    }
  }
}
 ?>
