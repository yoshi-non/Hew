<?php

require('./dbconnect.php');

session_start();

if (isset($_COOKIE['email']) != '') {
  $_POST['email'] = $_COOKIE['email'];
  $_POST['password'] = $_COOKIE['password'];
  $_POST['save'] = "on";
}

if(!empty($_POST)){
  if($_POST['email'] != '' && $_POST['password'] != ''){
    $login = $db->prepare('SELECT * FROM members WHERE email=? AND password=?');
    $login->execute(array($_POST['email'],sha1($_POST['password'])));
    $member = $login->fetch();

    if($member){
      $_SESSION['id'] = $member['id'];
      $_SESSION['time'] = time();

      if ($_POST['save'] == "on") {
        setcookie('email', $_POST['email'], time()+60*60*24*14);
        setcookie('password', $_POST['password'], time()+60*60*24*14);
      }

      header('Location: ./home.php', true,307);
      exit();
    }else{
      $error['login'] = 'failed';
    }
  }else{
    $error['login'] = 'blank';
  }
}

?>



<!DOCTYPE html>

<html lang="ja">

  <head>

    <meta charset="UTF-8">

    <title>Hew_TopPage</title>
    <link rel="stylesheet" type="text/css" href="../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <link rel="stylesheet" type="text/css" href="../css/common.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

  </head>

  <body>

    <nav class="nav">
      <div class="navbar">
        <div class="logo"><a href="login.php"><img src="../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a class="modal__button" data-toggle="modal" data-target="#loginModal" style="color: gray; text-decoration: none;">ログイン</a>
            <a href="news.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="help.php" style="color: gray; text-decoration: none;">ヘルプ</a>
        </div>
      </div>
    </nav>

      <div class="home__login">


        <svg width="400px" height="400px" viewBox="0 0 256 255" version="1.1">
            <defs>
                <linearGradient x1="12.9593594%" y1="12.0393928%" x2="79.6388325%" y2="78.2008538%" id="linearGradient-1">
                    <stop stop-color="#387EB8" offset="0%"></stop>
                    <stop stop-color="#0068b7" offset="100%"></stop>
                </linearGradient>
                <linearGradient x1="19.127525%" y1="20.5791813%" x2="90.7415328%" y2="88.4290372%" id="linearGradient-2">
                    <stop stop-color="#FFE052" offset="0%"></stop>
                    <stop stop-color="#FFC331" offset="100%"></stop>
                </linearGradient>
            </defs>
            <g>
                <path id="blue-python" d="M126.915866,0.0722755491 C62.0835831,0.0722801733 66.1321288,28.1874648 66.1321288,28.1874648 L66.2044043,57.3145115 L128.072276,57.3145115 L128.072276,66.0598532 L41.6307171,66.0598532 C41.6307171,66.0598532 0.144551098,61.3549438 0.144551098,126.771315 C0.144546474,192.187673 36.3546019,189.867871 36.3546019,189.867871 L57.9649915,189.867871 L57.9649915,159.51214 C57.9649915,159.51214 56.8001363,123.302089 93.5968379,123.302089 L154.95878,123.302089 C154.95878,123.302089 189.434218,123.859386 189.434218,89.9830604 L189.434218,33.9695088 C189.434218,33.9695041 194.668541,0.0722755491 126.915866,0.0722755491 L126.915866,0.0722755491 L126.915866,0.0722755491 Z M92.8018069,19.6589497 C98.9572068,19.6589452 103.932242,24.6339846 103.932242,30.7893845 C103.932246,36.9447844 98.9572068,41.9198193 92.8018069,41.9198193 C86.646407,41.9198239 81.6713721,36.9447844 81.6713721,30.7893845 C81.6713674,24.6339846 86.646407,19.6589497 92.8018069,19.6589497 L92.8018069,19.6589497 L92.8018069,19.6589497 Z" fill="url('#linearGradient-1')"></path>

                <path id="yellow-python" d="M128.757101,254.126271 C193.589403,254.126271 189.540839,226.011081 189.540839,226.011081 L189.468564,196.884035 L127.600692,196.884035 L127.600692,188.138693 L214.042251,188.138693 C214.042251,188.138693 255.528417,192.843589 255.528417,127.427208 C255.52844,62.0108566 219.318366,64.3306589 219.318366,64.3306589 L197.707976,64.3306589 L197.707976,94.6863832 C197.707976,94.6863832 198.87285,130.896434 162.07613,130.896434 L100.714182,130.896434 C100.714182,130.896434 66.238745,130.339138 66.238745,164.215486 L66.238745,220.229038 C66.238745,220.229038 61.0044225,254.126271 128.757101,254.126271 L128.757101,254.126271 L128.757101,254.126271 Z M162.87116,234.539597 C156.715759,234.539597 151.740726,229.564564 151.740726,223.409162 C151.740726,217.253759 156.715759,212.278727 162.87116,212.278727 C169.026563,212.278727 174.001595,217.253759 174.001595,223.409162 C174.001618,229.564564 169.026563,234.539597 162.87116,234.539597 L162.87116,234.539597 L162.87116,234.539597 Z" fill="url('#linearGradient-2')"></path>
            </g>
        </svg>


        <div class="login__text">
          <h2>Give you a place to learn python......</h2>
          <p>
            ここはPythonについてのコミュニティに参加できてしまう場所。<br>
            あるいは、身近な友達と意見交換・投稿できる場所。<br>
            毎日話して、Pythonについてのことが学べる場所なのです。
          </p>
          <p>
            ログインすることでより多くのサービスを受けることが可能になります。
          </p>
          <div class="login__btn">
            <div class="container">
              <button class="modal__button" type="button" data-toggle="modal" data-target="#loginModal">
                Login
              </button>
              <button>
              <a href="./join/index.php" style="text-decoration: none;">
                Sign Up
              </a>
              </button>
            </div>
          </div>
        </div>
      </div>

    <div id="wrap">


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
              <a href="login.php">HOME</a>
              <a href="news.php">NEWS</a>
              <a href="help.php">HELP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>



            <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header border-bottom-0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-title text-center">
                      <h4>Login</h4>
                    </div>
                    <div class="d-flex flex-column text-center">



                      <form action="" method="POST">
                        <div class="form-group">
                          <input type="email" name="email" size="35" maxlength="255" value="<?php if(isset($_POST['email'])) { echo htmlspecialchars($_POST['email'], ENT_QUOTES);} ?>" class="form-control" id="email1"placeholder="Your email address...">
                          <?php if(isset($error['login']) == 'blank'): ?>
                          <p class="error">* メールアドレスとパスワードをご記入ください。</p>
                          <?php endif; ?>
                          <?php if(isset($error['login']) == 'failed'): ?>
                          <p class="error">* ログインに失敗しました。正しくご記入ください。</p>
                          <?php endif; ?>
                        </div>
                        <div class="form-group">
                          <input type="password" name="password" size="35" maxlength="255" class="form-control" id="password1" placeholder="Your password...">
                        </div>
                        <div>
                          <input id="save" type="checkbox" name="save" value="on">
                          <label for="save">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-info btn-block btn-round">Login</button>
                      </form>
                      <div class="modal-footer">
                        <div class="signup-section">Not a member yet?<br><a href="./join/index.php" class="text-info">Sign Up</a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../js/script.js"></script>

  </body>

</html>