<?php

  require_once('../config.php');
  require_once(ROOT_PATH.'/classes/item.php');

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  $db = new Db();
  $item = $db->getItem($id);

  if (!$item) {
    header('HTTP/1.0 404 not found');
    exit();
  }

  $page_title = $item->title;

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>
<?php echo hero($page_title, $item->text); ?>

<div class="row-fluid marketing">
  <div class="span12 portfolio-item">
    <a href="/show.php?id=<?php echo $item->id ?>">
      <img src="http://placehold.it/250x250" class="img-polaroid">
    </a>
    <p><?php echo nl2br($item->text) ?></p>
    <p>Kategori: <strong><?php echo $item->category_name ?></strong></p>
  </div>
</div>

<p><a href="/portfolio.php">&laquo; Tillbaka</a></p>

<?php require_once(ROOT_PATH.'/footer.php'); ?>