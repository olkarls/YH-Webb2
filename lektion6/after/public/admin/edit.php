<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');
  require_once(ROOT_PATH.'/classes/authorization.php');

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $db = new Db();
  $item = $db->getItem($id);

  if (!$item) {
    header('HTTP/1.0 404 not found');
    exit();
  }

  $page_title = "Redigera referens";
  $categories = $db->getCategories();

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<div class="row-fluid marketing">
  <div class="span12">
    <h1><?php echo $page_title ?></h1>
    <form method="post" action="update.php" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?php echo $item->id ?>">
      <?php echo form_input('text', 'title', 'Titel:', $item->title) ?>
      <?php echo select('category_id', 'Kategori: ', $categories, $item->category_id) ?>

      <?php if ($item->thumbnail_url) : ?>
        <div>
          <img src="/images/<?php echo $item->thumbnail_url ?>">
        </div>
      <?php endif ?>

      <?php echo form_input('file', 'thumbnail', 'Liten bild: ') ?>
      <?php echo text_area('text', 'Beskrivning: ', $item->text) ?>
      <?php echo submit_button('Uppdatera') ?> <a href="/admin/index.php">Avbryt</a>
    </form>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>