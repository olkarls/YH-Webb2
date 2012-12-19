<?php
  require_once('../config.php');
  $page_title = "Portfolio";

  $db = new Db();
  $items = $db->getItems();

  $number_of_items_in_column = ceil(count($items) / 2);
  $column_one_items = array_slice($items, 0, $number_of_items_in_column);
  $column_two_items = array_slice($items, count($column_one_items), count($items));

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<h1>Portfolio</h1>
<p>Här kan ni se några utvalda projekt som jag jobbar med.</p>

<div class="row-fluid marketing">
  <div class="span6">
    <?php foreach ($column_one_items as $item) : ?>
      <?php echo portfolio_item($item); ?>
    <?php endforeach ?>
  </div>
  <div class="span6">
  <?php foreach ($column_two_items as $item) : ?>
    <?php echo portfolio_item($item); ?>
  <?php endforeach ?>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>