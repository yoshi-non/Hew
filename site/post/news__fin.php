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
    <meta charset="UTF-8">
    <title>Hew NewsPage</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <main>

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

    <div id="wrap">
      <div>
        <h2 class="title__news"><span>最新情報</span></h2>
        <div class="news__main">
          <div class="news__main__inner" id="js-show-popup-news3"><!-- ニュース3つ目 -->
            <div class="news__img"><img src="../images/news3.png"></div>
            <div class="news__box">
              <p class="news_date">2021.11.17</p>
              <p class="news__text">AIで古典のくずし字を現代の文字に1枚あたり数秒で変換する無料アプリ</p>
            </div>
          </div>
          <div class="news__main__inner" id="js-show-popup-news2"><!-- ニュース2つ目 -->
            <div class="news__img"><img src="../images/news2.png"></div>
            <div class="news__box">
              <p class="news_date">2021.11.17</p>
              <p class="news__text">東京大学、Pythonプログラミング無料入門 pandasやJupyterなど幅広い</p>
            </div>
          </div>
          <div class="news__main__inner" id="js-show-popup-news"><!-- ニュース1つ目 -->
            <div class="news__img"><img src="../images/news1.png"></div>
            <div class="news__box">
              <p class="news_date">2021.11.16</p>
              <p class="news__text">Kaggle 最新コンペ G-Research Crypto Forecasting</p>
            </div>
          </div>
        </div><!-- news__main-end -->

        <div class="popup" id="js-popup-news3"><!-- ニュース3つ目 -->
          <div class="popup-news-inner">
            <div class="news-close-btn" id="js-close-btn3"><i class="fas fa-times"></i></div>
            <div class="news_popup">
              <p>
                <br>ROIS-DS人文学オープンデータ共同利用センター（Center for Open Data in the Humanities / CODH）は8月30日、AIが古典文学のくずし字を現代の文字に変換するアプリ「みを（miwo）」を正式にリリースした。対応OSはiOSとAndroid。料金は無料。<br>
                iOS<br>
                <a href="https://t.co/00c6b4xJsZ?amp=1">https://t.co/00c6b4xJsZ?amp=1</a><br>
                Android<br>
                <a href="https://t.co/APjDE1t4Bd?amp=1">https://t.co/APjDE1t4Bd?amp=1</a>
              </p>
            </div>
          </div>
          <div class="black-background" id="js-black-bg3"></div>
        </div>

        <div class="popup" id="js-popup-news2"><!-- ニュース2つ目 -->
          <div class="popup-news-inner">
            <div class="news-close-btn" id="js-close-btn2"><i class="fas fa-times"></i></div>
            <div class="news_popup">
              <div class="popup-news-img"><img src="../images/news-inner2.png"></div>
              <p>
                <br>今回は東京大学（東大）が無料公開している、Pythonの初心者にもオススメの教材「Pythonプログラミング入門」を紹介する。<br>
                詳細は<a href="https://utokyo-ipp.github.io/">こちら</a>
              </p>
            </div>
          </div>
          <div class="black-background" id="js-black-bg2"></div>
        </div>

        <div class="popup" id="js-popup-news"><!-- ニュース1つ目 -->
          <div class="popup-news-inner">
            <div class="news-close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
            <div class="news_popup">
              <div class="popup-news-img"><img src="../images/news-inner1.png"></div>
              <p>
                <br>正式名称 : G-Research Crypto Forecasting<br>
                概要 : 実際の暗号市場データを予測する (最終評価は、提出締め切り後 1ヶ月間の実際のデータを使用)<br>
                データ形式 : 表形式、時系列データ<br>
                メダル対応 : あり<br>
                期間 : 3ヶ月 (2021/11/2 ~ 2022/2/1 (最終評価日は 2021/5/3))<br>
              </p>
            </div>
          </div>
          <div class="black-background" id="js-black-bg"></div>
        </div>

      </div>
    </div><!-- wrap-end -->


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
              <a href="login.php">HOME</a>
              <a href="news.php">NEWS</a>
              <a href="help.php">HELP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/script.js"></script>

</body>
</html>