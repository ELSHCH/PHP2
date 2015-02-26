<?php foreach ($items as $item): ?>
    <h1><?php echo $item->title; ?></h1>
    <div><?php echo $item->text; ?></div>
    <div><a href="<?php echo __DIR__ .'/views/formaddnews.php';?>">Добавить новость</a></div>
<?php endforeach; ?>
?>