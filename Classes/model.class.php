<?php

/* DBZ MODELE KAMEHAMEHA */

class Model {

  private $PDO = NULL;

  public function __construct ($pdo) {
    $this->PDO = $pdo;
  }

  // db name
  public function Name_DB () {
    return $this->PDO->Query('select database()')->fetchColumn();
  }

  // list table
  public function List_Table () {
    $SQL = "show tables";
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }

  // list table
  public function List_Table_Attributes ($table) {
    $SQL = "describe ";
    $SQL.= $table;
    $RES = $this->PDO->prepare($SQL);
    $RES->execute();
    return $RES->fetchAll();
  }

  // list datas
  public function List_Table_Datas ($table) {
      $SQL = "SELECT * FROM ";
      $SQL.= $table;
      $RES = $this->PDO->prepare($SQL);
      $RES->execute();
      return $RES->fetchAll();
  }

  // delete all table datas
  public function Delete_Table_Datas ($table) {
      $SQL = "DELETE FROM ";
      $SQL.= $table;
      $RES = $this->PDO->prepare($SQL);
      $RES->execute();
      return $RES->fetchAll();
  }

  // insert data
  public function Insert_Table_Data ($table) {
      $SQL = "DELETE FROM ";
      $SQL.= $table;
      $RES = $this->PDO->prepare($SQL);
      $RES->execute();
      return $RES->fetchAll();
  }
}

?>