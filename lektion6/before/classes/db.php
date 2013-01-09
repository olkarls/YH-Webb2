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
                         items.category_id, items.thumbnail_url,
                         categories.name as category_name
                         from items inner join
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

    public function deleteItem($id) {
      $sql = "delete from items where id = :id";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->execute();

      if ($sth->rowCount() > 0) {
        return true;
      } else {
        return false;
      }
    }

    public function updateItem($id, $title, $text, $category_id, $thumbnail_url) {
      $data = array($title, $text, $category_id, $thumbnail_url, $id);
      $sth = $this->dbh->prepare("update items set title = ?, text = ?, category_id = ?, thumbnail_url = ? where id = ?");
      if ($sth->execute($data)) {
        return true;
      } else {
        return false;
      }
    }

    public function createItem($title, $text, $category_id) {
      $data = array($title, $text, $category_id);
      $sth = $this->dbh->prepare("insert into items (title, text, category_id) values (?, ?, ?)");
      $sth->execute($data);

      if ($sth->rowCount() > 0) {
        return $this->dbh->lastInsertId();
      } else {
        return null;
      }
    }

    public function getCategories() {
      $sth = $this->dbh->query("select * from categories order by name");
      $sth->setFetchMode(PDO::FETCH_CLASS, 'Category');

      $objects = array();

      while($obj = $sth->fetch()) {
        $objects[] = $obj;
      }

      return $objects;
    }

    public function getCategory($id) {
      $sql = "select * from categories where id = :id";
      $sth = $this->dbh->prepare($sql);
      $sth->bindParam(':id', $id, PDO::PARAM_INT);
      $sth->setFetchMode(PDO::FETCH_CLASS, 'Category');
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

    public function updateCategory($id, $name) {
      $data = array($name, $id);
      $sth = $this->dbh->prepare("update categories set name = ? where id = ?");
      if ($sth->execute($data)) {
        return true;
      } else {
        return false;
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