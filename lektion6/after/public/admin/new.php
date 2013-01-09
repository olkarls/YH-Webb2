<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');
  require_once(ROOT_PATH.'/classes/authorization.php');

  $db = new Db();
  $categories = $db->getCategories();
  $page_title = "Ny referens";
?>

<?php require_once(ROOT_PATH.'/header.php'); ?>

<div class="row-fluid marketing">
  <div class="span12">
    <h1><?php echo $page_title ?></h1>
    <form method="post" action="create.php">
      <?php echo form_input('text', 'title', 'Titel:') ?>
      <?php echo select('category_id', 'Kategori: ', $categories) ?>
      <?php echo text_area('text', 'Beskrivning: ') ?>
      <?php echo submit_button('Spara') ?> <a href="/admin/index.php">Avbryt</a>
    </form>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>