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

    <title>Hew_LibraryPage</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/library.css">
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
          <h2 class="title__library"><span>ライブラリ</span></h2>
          <p>
            ライブラリとは、分かりやすく説明すると、ある目的のために機能をまとめたパッケージの総称を指す言葉です。<br><br>
            ここでは、Python固有のライブラリ(AIやデータ分析に優れたもの)を紹介します。
          </p>
          <p>有名なオープンソースライブラリで、Windows以外のOSにも対応しています。Googleが主体で開発を進めていて、多くの企業でこのライブラリが採用されています。</p>
          <div class="library__main__inner">
            <h4>TensorFlow</h4>
            <p>
              有名なオープンソースライブラリで、Windows以外のOSにも対応しています。Googleが主体で開発を進めていて、多くの企業でこのライブラリが採用されています。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Keras</h4>
            <p>
              専門的な知識等がなくてもコードを書くことが可能です。再利用しやすく短いソースコードで簡単な記述ができるので、他の開発者がコードを見ても同じように使いやすいライブラリです。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Numpy</h4>
            <p>
              大規模なデータ処理に優れているため、実際の現場でも多く使われているライブラリです。機械学習においては絶対に外せないライブラリとなります。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Chainer</h4>
            <p>
              日本の企業が開発したディープランニング用のフレームワークで、自然言語処理や音声処理などによく使われるライブラリです。インストールが簡単でGPUによる演算に対応していて、高速処理が可能となります。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Pandas</h4>
            <p>
              Pythonでデータ分析を行う際に、効率的に行うための人工知能のライブラリです。データ分析の他に、データの読み込みや統計量の表示やグラフ化を簡単に行うことができます。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Anaconda</h4>
            <p>
              人工知能や機械学習初心者には、最初からPython環境を構築した状態になるので、まずはAnacondaインストールするのがおすすめです。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Jupyter Notebook</h4>
            <p>
              ノートブックファイルにプログラムや説明、実行結果などといった情報をまとめて管理ができる、データ分析用のライブラリです。ブラウザで作動するので、プログラムの共有などもできるのが特徴です。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>Open CV</h4>
            <p>
              顔検出や輪郭を検出したりできる機能があったり、様々な検出をするための機能がとても多いので、今後、機械学習などで使うことが多くなるといわれています。
            </p>
          </div>
          <div class="library__main__inner">
            <h4>matplotlib</h4>
            <p>
              Pythonでは、科学計算をこのライブラリを使用して簡単にできます。matplotlibは、計算結果をグラフなどの図表で分かりやすく表示できるようにするライブラリとなります。
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