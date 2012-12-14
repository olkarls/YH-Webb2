<?php

  // http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/

  class Db {
    private $dbh = null;

    public function __construct() {
      try {
        $this->dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASS);
      } catch(PDOException $e) {
        echo $e->getMessage();
      }
    }

    private $item_sql = "select items.id, items.title, items.text,
                         items.category_id, categories.name as
                         category_name from items inner join
                         categories on items.category_id =
                         categories.id";

    public function getItems() {
      $sth = $this->dbh->query($this->item_sql);
      $sth->setFetchMode(PDO::FETCH_CLASS, 'item');

      $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      return $objects;
    }

    public function getItem($id) {
      $sql = $this->item_sql." where items.id = :id";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->setFetchMode(PDO::FETCH_CLASS, 'item');
      $sth->execute();

      $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      if (count($objects) > 0) {
        return $objects[0];
      } else {
        return null;
      }
    }

    public function query($sql, $class_name) {
      $sth = $this->dbh->query($sql);
      $sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

      $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      return $objects;
    }

    public function get($id, $table_name, $class_name, $sql = null) {
      if ($sql == null) {
        $sql = "SELECT * FROM $table_name WHERE id = $id LIMIT 1";
      }

      $sth = $this->dbh->query($sql);
      $sth->setFetchMode(PDO::FETCH_CLASS, $class_name);

      $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      if (count($objects) > 0) {
        return $objects[0];
      } else {
        return null;
      }
    }

    public function __destruct() {
      $this->dbh = null;
    }
  }