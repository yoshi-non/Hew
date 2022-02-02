<?php

session_start();
require('./dbconnect.php');

if (isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
  //ログインしている
  $_SESSION['time'] = time();

  $members = $db->prepare('SELECT * FROM members WHERE id=?');
  $members->execute(array($_SESSION['id']));
  $member = $members->fetch();

}else{
  //ログインしていない
  header('Location: login.php');
  exit();
}


if(!empty($_POST)){
  if($_POST['body'] != ''){
    $question = $db->prepare('INSERT INTO questions SET member_id=?, body=?, created_at=NOW()');
    $question->execute(array($member['id'], $_POST['body']));

    header('Location: qa__yet.php');
    exit();
  }
}


?>

<!DOCTYPE html>

<html lang="ja">

  <head>

    <meta charset="utf-8">

    <title>Hew_QuizPage</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/qa_style.css">

  </head>

  <body>

    <nav class="nav">
      <div class="navbar">
        <div class="logo"><a href="home.php"><img src="../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a href="logout.php" style="color: gray; text-decoration: none;">ログアウト</a>
            <a href="news__fin.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="help__fin.php" style="color: gray; text-decoration: none;">ヘルプ</a>
        </div>
      </div>
    </nav>

    <div class="quizBasic__main">

      <div id="wrap">


        <div class="qa__title__box">
          <h2 class="title__qa"><span>Q&Aコーナー</span></h2>
          <div class="q__link"><a href="qa__yet.php">
            一覧に戻る
          </a></div>
        </div>

        <div class="qa__box">
          <form action="" method="POST">
            <h2 class="qa__subTitle">質問投稿</h2>
            <div class="textarea__box">
              <textarea name="body" placeholder="質問文を入力" required><?php if(isset($question)) {echo htmlspecialchars($question, ENT_QUOTES);} ?></textarea>
            </div>
            <script type="text/javascript" src="../js/textarea.js"></script>
            <div>
            <div class="send__btn__box"><input class="send__btn" type="submit" value="送信" /></div>
          </form>
        </div>


      </div><!-- wrap__end -->

    </div>

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
              <a href="home.php">HOME</a>
              <a href="news__fin.php">NEWS</a>
              <a href="help__fin.php">HELP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

  </body>

</html>