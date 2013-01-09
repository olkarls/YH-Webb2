<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');
  require_once(ROOT_PATH.'/classes/authorization.php');

  $db = new Db();
  $item_id = $db->createItem($_POST['title'], $_POST['text'], $_POST['category_id']);

  if ($item_id) {
    set_feedback('success', 'Referensen skapades');
  } else {
    set_feedback('error', 'Något blev galet, försök igen');
  }

  header("Location: /admin/edit.php?id=".$item_id);
