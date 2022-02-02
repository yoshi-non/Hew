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

    <title>Hew_HomePage</title>

    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <link rel="stylesheet" type="text/css" href="../css/index.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

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

    <div class="index__main">

      <div id="wrap">

        <div>
          <h2 class="title__index"><span>目次</span></h2>
          <div class="box__index"><a href="inst.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__inst.jpg" alt="img"></div>
            <p>インストール</p>
          </a></div>
          <div class="box__index box__index__center"><a href="qa__yet.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__qa.jpg" alt="img"></div>
            <p>Q&A</p>
          </a></div>
          <div class="box__index"><a href="pythonBook.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__book.jpg" alt="img"></div>
            <p>オススメ書籍</p>
          </a></div>

          <div class="box__index"><a href="library.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__library.png" alt="img"></div>
            <p>ライブラリ</p>
          </a></div>
          <div class="box__index box__index__center"><a href="frame.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__frame.png" alt="img"></div>
            <p>フレームワーク</p>
          </a></div>
          <div class="box__index"><a href="kaggle.php" style="color: black; text-decoration: none;">
            <div><img src="../images/index__kaggle.png" alt="img"></div>
            <p>Kaggle</p>
          </a></div>
        </div>

        <div class="home_explain">
          <h2 class="title__explain"><span>Pythonとは</span></h2>
          <p>
            Python（パイソン）はインタープリタ型の高水準汎用プログラミング言語である。<br>
            グイド・ヴァン・ロッサムにより創り出され、1991年に最初にリリースされたPythonの設計哲学は、
            有意なホワイトスペース(オフサイドルール)の顕著な使用によってコードの可読性を重視している。<br>
            その言語構成とオブジェクト指向のアプローチは、プログラマが小規模なプロジェクトから大規模なプロジェクトまで、
            明確で論理的なコードを書くのを支援することを目的としている。<br>
          </p>
        </div>

        <div class="home_history">

          <h2 class="title__history"><span>Pythonの歴史</span></h2>

          <input id="acd-check1" class="acd-check" type="checkbox">
          <label class="acd-label" for="acd-check1">1990年代前半</label>
          <div class="acd-content">
              <p>
                オランダにあるStichting Mathematisch Centrum (CWI)で、グイド・ヴァンロッサムによってPythonの初期バージョンが作成される。
              </p>
          </div>
          <input id="acd-check2" class="acd-check" type="checkbox">
          <label class="acd-label" for="acd-check2">1995年</label>
          <div class="acd-content">
              <p>
                ヴァンロッサムは米国ヴァージニア州レストンにあるCorporation for National Research Initiatives (CNRI) に移動。ここでPythonの開発に携わり、いくつかのバージョンを公開する。
              </p>
          </div>
          <input id="acd-check3" class="acd-check" type="checkbox">
          <label class="acd-label" for="acd-check3">2000年</label>
          <div class="acd-content">
              <p>
                ヴァンロッサムとPythonのコア開発チームは BeOpen.com に移り、BeOpen PythonLabs チームを結成する。同年10月、PythonLabsチームはDigital Creations (現在のZope Corporation) に移る。
              </p>
          </div>
          <input id="acd-check4" class="acd-check" type="checkbox">
          <label class="acd-label" for="acd-check4">2001年</label>
          <div class="acd-content">
              <p>
                Pythonに関する知的財産を保有するための非営利組織Pythonソフトウェア財団 (PSF) が立ち上がる。このときZope CorporationはPSFの賛助会員となる。
              </p>
          </div>
        </div>

        <div class="home_can">
          <h2 class="title__can"><span>Pythonにできること</span></h2>
          <div class="home_can_in">
            <div class="home_can_in_x" id="js-show-popup">
              <img src="../images/home_can1.png">
              <p>AI(機械学習・深層学習)</p>
            </div>
            <div class="home_can_in_x" id="js-show-popup2">
              <img src="../images/home_can2.jpg">
              <p>データ処理・分析・解析</p>
            </div>
          </div>
        </div>
        <div class="popup" id="js-popup">
          <div class="popup-inner">
            <div class="close-btn" id="js-close-btn"><i class="fas fa-times"></i></div>
            <div class="home_can_popup">
              人工知能（AI）とは、人間の知的ふるまいの一部をソフトウェアを用いて人工的に再現したものです。<br>
              経験から学び、新たな入力に順応することで、人間が行うように柔軟にタスクを実行します。<br>
              チェスをプレイするコンピューターから自動運転車まで、最近耳にするAIの事例のほとんどは、ディープ・ラーニングと自然言語処理に大きく依存しています。<br>
              これらのテクノロジーを応用すると、大量のデータからパターンを認識させることで、ビジネスや生活における様々な難しいタスクをこなせるようにコンピューターをトレーニングすることができます。<br><br>
              機械学習とは、データを分析する方法の１つで、データから、「機械」（コンピューター）が自動で「学習」し、データの背景にあるルールやパターンを発見する方法。<br>
              「人工知能」を実現するためのデータ分析技術の１つが「機械学習」で、「機械学習」における代表的な分析手法が「ディープラーニング(深層学習)」と言われています。
            </div>
          </div>
          <div class="black-background" id="js-black-bg"></div>
        </div>
        <div class="popup" id="js-popup2">
          <div class="popup-inner">
            <div class="close-btn" id="js-close-btn2"><i class="fas fa-times"></i></div>
            <div class="home_can_popup">
              データ分析とは何らかの目的を持って表現された文字や符号、数値などを収集し、分類、整理、成型、取捨選択したうえで解釈して、価値のある意味を見出すことです。
            </div>
          </div>
          <div class="black-background" id="js-black-bg2"></div>
        </div>

        <div class="home_demand">
          <h2 class="title__demand"><span>これからの需要</span></h2>
          <div class="home_demand_in">
            <p>
              Pythonは世界市場で高い人気を博しており、近年では日本市場においても脚光を浴びつつあります。<br>
              近年のプログラミング言語に関する各ランキングデータを見ても、国内外ともに市場需要が高く、将来性のある言語といえます。<br><br>
              前出のStack Overflowの調査結果（※1）によると、2019年の世界市場におけるPythonエンジニアの平均収入は6.3万ドル（2020年5月27日現在の為替レートで日本円に換算すると約677万円）で、給与ランキングでは12位にとどまっています。<br><br>

              ただし、同じく利用者数の多いJava、JavaScript、C#より上位に位置しており、比較的高い収入を獲得しやすい言語といえます。<br>
              さらに、2017年～2019年の同調査では、Pythonエンジニアの平均年収は3年連続で増加しており（2017年5.3万ドル→2018年5.6万ドル）、順位も上昇しているため（2017年16位→2019年12位）、今後更なる年収アップが期待できるでしょう。<br><br>

              参考<br>
              ※1　Stack Overflow「<a href="https://insights.stackoverflow.com/survey/2019">Developer Survey Results2019</a>」（2021年10月28日アクセス）<br>
            </p>
          </div>
          <canvas id="myChart"></canvas>
          <script src="../js/chart__script.js"></script>
        </div>

      </div>
    <!-- wrap__end -->
    </div>

      <div class="six_box">
        <div class="hexagon six1">
          <div class="hexagon_cont">
          </div>
        </div>
        <div class="hexagon six2">
          <div class="hexagon_cont">
          </div>
        </div>
        <div class="hexagon six3">
          <div class="hexagon_cont">
          </div>
        </div>
        <div class="hexagon six4">
          <div class="hexagon_cont">
          </div>
        </div>
        <div class="hexagon six5">
          <div class="hexagon_cont">
          </div>
        </div>
      </div>

    <div class="bg__buttom is-side"></div>
    <div class="bg__buttom is-side1"></div>
    <div class="bg__buttom is-side2"></div>
    <div class="bg__buttom is-side3"></div>
    <div class="bg__buttom is-side4"></div>
    <div class="bg__buttom is-side5"></div>
    <div class="bg__buttom is-side6"></div>
    <div class="bg__buttom is-side7"></div>
    <div class="bg__buttom is-side8"></div>
    <div class="bg__buttom is-side9"></div>

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
    <script src="../js/script.js"></script>

  </body>

</html>