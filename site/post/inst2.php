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

    <title>Hew_Install-2</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/inst.css">
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

    <div class="quizBasic__main">

      <div id="wrap" class="clearfix">

        <div class="right__nav">
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">目次</p>
            <ul>
              <li><a href="inst.php">Windows版Pythonのインストール</a></li>
              <li><a href="inst2.php">Pythonの実行方法</a></li>
              <li><a href="inst3.php">仮想環境</a></li>
            </ul>
          </div>
          <iframe style="width: 99%;" src="https://www.youtube.com/embed/lpIISrTFS4A" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
          <div class="right__nav__inner">
            <p class="right__nav__inner__title">おすすめ記事</p>
            <ul>
              <li><a href="frame.php">Pythonのフレームワーク</a></li>
              <li><a href="pythonBook.php">オススメ書籍</a></li>
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
          <h2 class="title__inst title__inst2" id="inst2"><span>Pythonの実行方法</span></h2>
          <div class="inst__main__inner">
            <p>
              Pythonを起動する方法にもいろいろありますが、ここではWindowsのコマンドプロンプトを使う方法を紹介します。<br><br>
              まず、スタートボタンをクリックし、Windows システム ツール の コマンド プロンプト を選択します。
            </p>
            <div class="inst__main__img"><img src="../images/commandprompt1.png"></div>
            <p>すると、次のようにコマンドプロンプトが表示されます。</p>
            <div class="inst__main__img"><img src="../images/commandprompt2.png"></div>
            <p>
              コマンドプロンプトで python と入力してエンターキーを押すと、Pythonを起動できます。<br><br>
              Pythonを終了するときは、quit() と入力するか、コントロールキーを押しながら Z キーを押します。
            </p>
          </div>

          <div class="inst__page__nav__prevnext">
            <div class="inst__page__nav">
              <div class="inst__page__nav__prev">
                <a href="inst.php">Prev</a>
              </div>
              <div class="inst__page__nav__text">
                <a href="inst.php">インストール</a>
              </div>
              <div class="inst__page__nav__next"></div>
            </div>
          </div>
          <div class="inst__page__nav__prevnext">
            <div class="inst__page__nav">
              <div class="inst__page__nav__prev"></div>
              <div class="inst__page__nav__text">
                <a href="inst3.php">仮想環境</a>
              </div>
              <div class="inst__page__nav__next">
                <a href="inst3.php">Next</a>
              </div>
            </div>
          </div>
        </div><!-- inst__main__end -->

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