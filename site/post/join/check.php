<?php
session_start();
require('../dbconnect.php');

if(!isset($_SESSION['join'])) {
  header('Location: index.php');
  exit();
}

if(!empty($_POST)) {
  //登録処理をする
  $statement = $db->prepare('INSERT INTO members SET name=?, email=?, password=?, picture=?, created=NOW()');
  $ret = $statement->execute(array(
    $_SESSION['join']['name'],
    $_SESSION['join']['email'],
    sha1($_SESSION['join']['password']),
    $_SESSION['join']['image']
  ));
  unset($_SESSION['join']);

  header('Location: thanks.php');
  exit();
}
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Hew Sign-Up_CheckPage</title>
    <link rel="stylesheet" type="text/css" href="../../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/common.css">
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
</head>
<body>
  <main>

    <nav class="nav">
      <div class="navbar">
        <div class="logo"><a href="../login.php"><img src="../../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a href="news.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="help.php" style="color: gray; text-decoration: none;">ヘルプ</a>
        </div>
      </div>
    </nav>

    <div id="wrap__signUp">

      <form action="" method="post">
        <input type="hidden" name="action" value="submit" />
        <dl>
          <dt>ニックネーム</dt>
          <dd>
            <?php echo htmlspecialchars($_SESSION['join']['name'], ENT_QUOTES); ?>
          </dd>
          <dt>メールアドレス</dt>
          <dd>
            <?php echo htmlspecialchars($_SESSION['join']['email'], ENT_QUOTES); ?>
          </dd>
          <dt>パスワード</dt>
          <dd>
          【表示されません】
        </dd>
          <dt>アイコン</dt>
          <dd class="icon__img">
            <img src="../member_picture/<?php echo htmlspecialchars($_SESSION['join']['image'], ENT_QUOTES); ?>" width="100" height="100" alt="" />
          </dd>
        </dl>
        <div class="signUp__back"><a href="index.php?action=rewrite">&laquo;Back</a></div>
        <div class="signUp__go"><input type="submit" value="OK" /></div>
      </form>

    </div>

  </main>

    <footer>
      <div class="footer__box">
        <div class="footer__textBox">
          <p class="footer__textMain__big">
            Python 攻略サイト<br>
            Python Strategy Site
          </p>
          <p class="footer__textMain">
            当サイトに関するお問い合わせ
          </p>
          <p class="footer__textSub">
            ・Pythonについての非公式サイトです。<br>
            ・当サイトで使⽤している画像の著作権・肖像権等は各権利者に帰属いたします。<br>
            ・&copy; 2021 HAL/Hew.All Rights Reserved.
          </p>
        </div>
        <div class="footer__textBox">
          <p class="footer__textMain">公式リンク</p>
          <div class="footer__link">
            <div><a href="https://www.python.org/downloads/" target="_blank">Python ダウンロード</a></div>
            <div><a href="https://www.anaconda.com/" target="_blank">ANACONDA</a></div>
            <div><a href="https://www.kaggle.com/" target="_blank">Kaggle</a></div>
          </div>
          <div>
            <p class="footer__textMain">CONTENTS</p>
            <div class="footer__contents">
              <a href="../login.php">HOME</a>
              <a href="news.php">NEWS</a>
              <a href="help.php">HELP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

</body>
</html>