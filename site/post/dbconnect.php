<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
</head>
<body>
<main>
<?php
try {
  $db = new PDO('mysql:dbname=mini_bbs;host=localhost:3306;charset=utf8', 'root', '');
} catch (PDOException $e) {
  echo 'DB接続エラー: ' . $e->getMessage();
}
 ?>
</main>
</body>
</html>