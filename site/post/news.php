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
        <div class="logo"><a href="login.php"><img src="../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a class="modal__button" data-toggle="modal" data-target="#loginModal" style="color: gray; text-decoration: none;">ログイン</a>
            <a href="news.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="help.php" style="color: gray; text-decoration: none;">ヘルプ</a>
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



                      <div class="text-center text-muted delimiter">or use a social network</div>
                      <div class="d-flex justify-content-center social-buttons">
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Twitter">
                          <i class="fab fa-twitter"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Facebook">
                          <i class="fab fa-facebook"></i>
                        </button>
                        <button type="button" class="btn btn-secondary btn-round" data-toggle="tooltip" data-placement="top" title="Linkedin">
                          <i class="fab fa-linkedin"></i>
                        </button>
                      </di>
                    </div>
                  </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                  <div class="signup-section">Not a member yet? <a href="./join/index.php" class="text-info"> Sign Up</a>.</div>
                </div>
              </div>
            </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/script.js"></script>

</body>
</html>