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

    <title>Hew_FramePage</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/frame.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

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

    <div>

      <div id="wrap" class="clearfix">


        <div class="right__nav">
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">おすすめ記事</p>
            <ul>
              <li><a href="frame.php">Pythonのフレームワーク</a></li>
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
          <h2 class="title__frame"><span>フレームワーク</span></h2>
          <div class="frame__main__inner">
            <h4>Django</h4>
            <p>
              Djangoは、Pythonフレームワークの中でも知名度・普及度が最も高く、ひととおりのWeb開発に必要な機能全てが詰まった多機能万能フレームワークです。<br>
              Djangoは汎用性が高いため、小規模から大規模なシステムに至るまで対応可能です。<br>
              利用ユーザーが多く、疑問点・不明点が出てきても、検索して調べれば解決方法も見つけやすいことも人気の理由のひとつでしょう。
            </p>
          </div>
          <div class="frame__main__inner">
            <h4>Flask</h4>
            <p>
              Flaskは、標準で提供する機能が最小限に絞られており、他のWebフレームワークに比べても動きが軽く軽量なWebフレームワークです。<br>
              小規模なサイトや、多くの機能を必要としないWebアプリケーション開発に向いています。<br>
              シンプルな機能ゆえ学習コストは低めであり、導入しやすいでしょう。<br>
              自分自身で実装する機能も多いため、カスタマイズ性が高いことも特徴です。
            </p>
          </div>
          <div class="frame__main__inner">
            <h4>Tornado</h4>
            <p>
              Tornadoは非同期通信が行えるPythonのWebフレームワークです。<br>
              非同期通信とは、データの送信者と受信者のタイミングをとらずに通信を行うことで、リクエスト送信中にレスポンスをまたずに他の処理を進めることが可能です。<br>
              処理パフォーマンスが高く、接続が集中しやすいWebアプリケーション開発にもおすすめです。
            </p>
          </div>
          <div class="frame__main__inner">
            <h4>web2Py</h4>
            <p>
              web2pyは、シンプルなクロスプラットフォーム対応のWebフレームワークであり、WindowsやMac、Linuxなど異なるプラットフォーム上での実行が可能です。<br>
              様々なデータベースとの効率的な連携や、悪質なセキュリティ違反を防ぐセキュリティに強い機能なども備わっています。
            </p>
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