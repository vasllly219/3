<?php
class News
{
  const FILE_NEWS = __DIR__ . '/news.json';

  public static $countNews = 0;

  private $title;
  private $body;

  public function __construct($title = 'Новость')
  {
    self::$countNews++;
    $this->title = $title;
  }

  public function setBody($body)
  {
    $this->body = $body;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getBody()
  {
    return $this->body;
  }

  public static function getNews($fileName = self::FILE_NEWS)
  {
    $data = [];
    if (file_exists($fileName)) {
      $data = json_decode(file_get_contents($fileName), true);
      if (!$data) {
        return [];
      }
    }
    return $data;
  }
}

class Comments
{
  const FILE_COMMENTS = __DIR__ . '/comments.json';

  private $commentBody;

  public function __construct($commentBody)
  {
    self::$countComments++;
    $this->commentBody = $commentBody;
  }

  public static function isPOST()
  {

    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }
  public static function getParam($name, $defaultValue = null)
  {
    return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $defaultValue;
  }

  public static function setComment($inputData, $key)
  {
    $data = self::getComments();
    $data[][$key] = $inputData;
    file_put_contents(self::FILE_COMMENTS, json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
  }

  public static function getComments($fileName = self::FILE_COMMENTS)
  {
    $data = [];
    if (file_exists($fileName)) {
      $data = json_decode(file_get_contents($fileName), true);
      if (!$data) {
        return [];
      }
    }
    return $data;
  }
}
