<?php
require_once 'classes.php';
$dataNews = News::getNews();
$dataComments = Comments::getComments();
foreach ($dataNews as $keyNews => $valueNews) {
  $news[$keyNews] = new News($valueNews['title']);
  $news[$keyNews]->setBody($valueNews['body']);
  if (Comments::isPOST()){
    $inputData = Comments::getParam('comment_'. $keyNews);
    if (isset($inputData)){
      Comments::setComment($inputData, $keyNews);
    }
  }
  foreach ($dataComments as $valueComments) {
    if (isset($valueComments[$keyNews])){
      $comments[$keyNews][] = $valueComments[$keyNews];
    }
  }
}
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Новости</title>
</head>
<body>
  <?php foreach ($news as $key => $value): ?>
    <h1><?= $news[$key]->getTitle() ?></h1>
    <p><?= $news[$key]->getBody() ?></p>
    <b>Комментарии:</b>
    <ul>
    <?php if(isset($comments[$key])){foreach ($comments[$key] as $comment): ?>
      <li><?= $comment ?></li>
    <?php endforeach;} ?>
    </ul>
    <form method="POST">
      <label for="comment">Ваш комментарий: </label>
      <input name="comment_<?= $key ?>" id="comment">
      <button type="submit" >Отправить</button>
    </form>
  <?php endforeach; ?>
</body>
</html>
