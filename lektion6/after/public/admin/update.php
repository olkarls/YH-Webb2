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

  $thumbnail_url = $item->thumbnail_url;

  if (isset($_FILES['thumbnail'])) {
    $thumbnail_url = set_thumbnail_image($item, $_FILES['thumbnail']);

    if (!$thumbnail_url) {
      set_feedback('error', 'Du kan bara ladda upp bilder.');
      header("Location: /admin/edit.php?id=".$item->id);
    }
  }

  if ($db->updateItem($item->id, $_POST['title'], $_POST['text'], $_POST['category_id'], $thumbnail_url)) {
    set_feedback('success', 'Referensen uppdaterades');
  } else {
    set_feedback('error', 'Något blev galet, försök igen');
  }

  header("Location: /admin/edit.php?id=".$item->id);