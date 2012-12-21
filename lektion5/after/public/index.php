<?php
  require_once('../config.php');

  $page_title = "Ola Karlsson – Utvecklare från Växjö";

  $db = new Db();
  $items = $db->query('SELECT * FROM items LIMIT 2', 'item');

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<?php echo hero('Ola Karlsson', 'Utvecklare, företagare och utbildningsledare från Växjö.<br>Hjälper dig med Ruby, iOS, C#, JavaScript &amp; HTML5.'
, '/portfolio.php', 'Se alla referenser'); ?>


<div class="row-fluid marketing">
    <?php foreach ($items as $item) : ?>
      <div class="span6">
        <?php echo portfolio_item($item) ?>
      </div>
    <?php endforeach ?>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>