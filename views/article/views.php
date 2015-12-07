<?php

?>
<h2><?= $model->title; ?></h2>
<p><?= $model->content; ?></p>

<br>

<p>Добавить комментарий
<form action="" method="post">
    <textarea name="comment" rows="3"></textarea><br>
    <input type="submit" value="Отправить">
</form>
</p>
