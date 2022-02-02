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

?>

<!DOCTYPE html>

<html lang="ja">

  <head>

    <meta charset="utf-8">

    <title>Hew_BookPage</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/pyBook.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

  </head>

  <body>

    <nav class="nav">
      <div class="navbar">
        <div class="logo"><a href="home.php"><img src="../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a href="logout.php" style="color: gray; text-decoration: none;">ログアウト</a>
            <a href="news__fin.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="#" style="color: gray; text-decoration: none;">ヘルプ</a>
        </div>
      </div>
    </nav>

    <div class="quizBasic__main">

      <div id="wrap" class="clearfix">


        <div class="right__nav">
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">おすすめ記事</p>
            <ul>
              <li><a href="#">ANACONDAとは</a></li>
              <li><a href="frame.php">Pythonのフレームワーク</a></li>
              <li><a href="#">AIを作るための環境</a></li>
              <li><a href="kaggle.php">Kaggleとは</a></li>
            </ul>
          </div>
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">質問等</p>
            <ul>
              <li><a href="qa__yet.php">Q&A</a></li>
            </ul>
          </div>
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">公式リンク</p>
            <ul>
              <li><a href="https://www.python.org/" target="_blank">Python</a></li>
              <li><a href="https://www.anaconda.com/" target="_blank">ANACONDA</a></li>
              <li><a href="https://www.djangoproject.com/" target="_blank">Django</a></li>
              <li><a href="https://flask.palletsprojects.com/en/2.0.x/" target="_blank">Flask</a></li>
              <li><a href="https://www.tensorflow.org/?hl=ja" target="_blank">TensorFlow</a></li>
              <li><a href="https://keras.io/ja/" target="_blank">Keras</a></li>
            </ul>
          </div>
        </div>


        <div class="left__main">
          <h2 class="title__book"><span>オススメ書籍</span></h2>

          <div class="pyBook">
            <img src="../images/pyBook1.jpg">
            <div class="pyBook__text">
              <h2>入門 Python3</h2>
              <p>
                <span>
                  Bill Lubanovic（監訳：斎藤康毅、訳：長尾高弘）、2015.12<br>
                  単行本:￥3,980
                </span><br><br>
                プログラミングをする上で考えられることを広範囲に網羅しています。
                多種多様なキーワードを載せてくれているため、詳しくはネットで調べることができるので、非常に重宝します。
                この本の特徴は知識量の多さです。複素数や有理数の計算まで記載している入門書は少ないです。
                一方で、クラウドでPythonがどのように使えるか、ということまで簡単に説明してくれています。
              </p>
            </div>
          </div>

          <div class="pyBook">
            <img src="../images/pyBook2.jpg">
            <div class="pyBook__text">
              <h2>Python 1年生</h2>
              <p>
                <span>
                  森 巧尚、2017.12<br>
                  単行本:￥2,178
                </span><br><br>
                iPhoneアプリの教科書で定評のある著者によるPython超入門書です。
                以前iPhoneアプリの書籍を読み、そのわかりやすさに感激していたので、Pythonの入門書が出版されたのを知るや即座に購入しました。
                期待以上のわかりやすさです。
              </p>
            </div>
          </div>
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