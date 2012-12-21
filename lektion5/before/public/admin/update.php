<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');

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

  if ($db->updateItem($item->id, $_POST['title'], $_POST['text'], $_POST['category_id'])) {
    set_feedback('success', 'Referensen uppdaterades');
  } else {
    set_feedback('error', 'Något blev galet, försök igen');
  }

  header("Location: /admin/edit.php?id=".$item->id);
