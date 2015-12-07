<?php foreach ($model as $value): ?>
    <h2><?= $value['title']; ?></h2>
    <a href="/index.php?c=article&a=delete&id=<?= $value['id']; ?>">удалить</a>
    <p><?= $value['content']; ?></p>
    <p><a href="/index.php?c=article&a=views&id=<?= $value['id']; ?>">Подробнее >></a></p>
<?php endforeach; ?>