<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');
  require_once(ROOT_PATH.'/classes/authorization.php');

  $id = null;
  if (isset($_POST['id'])) {
    $id = $_POST['id'];
  }

  $db = new Db();
  $item = $db->getItem($id);

  if (!$item) {
    header('HTTP/1.0 404 not found');
    exit();
  }

  if ($db->deleteItem($item->id)) {
    set_feedback('success', 'Referensen togs bort');
  } else {
    set_feedback('error', 'Något blev galet, försök igen');
  }

  header("Location: /admin/index.php");


