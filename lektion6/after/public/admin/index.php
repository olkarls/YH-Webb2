<?php

  require_once('../../config.php');
  require_once(ROOT_PATH.'/classes/item.php');
  require_once(ROOT_PATH.'/classes/authorization.php');

  $db = new Db();
  $items = $db->getItems();

  $page_title = "Referenser";

?>
<?php require_once(ROOT_PATH.'/header.php'); ?>

<div class="row-fluid marketing">
  <div class="span12">
    <h1>Referenser</h1>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Titel</th>
          <th>Kategori</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($items as $item) : ?>
          <tr>
            <td><a href="/show.php?id=<?php echo $item->id ?>"><?php echo $item->title ?></a></td>
            <td><?php echo $item->category_name ?></td>
            <td>
              <a href="/admin/edit.php?id=<?php echo $item->id ?>">Redigera</a> |
              <a href="/admin/delete.php?id=<?php echo $item->id ?>">Ta bort</a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
    <a class="btn" href="/admin/new.php">Ny referens</a>
  </div>
</div>

<?php require_once(ROOT_PATH.'/footer.php'); ?>