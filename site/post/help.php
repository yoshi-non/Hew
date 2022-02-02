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
    <title>Hew HelpPage</title>
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
        <h2 class="title__help"><span>ヘルプ</span></h2>
        <div class="help__main">
          <div class="help__main__inner">
            <h4>当サイトについての概要</h4>
            <p>当サイトはPythonの学習及び学ぶ上でのコミュニティの作成を目的としたサイトです。</p>
            <p>ログインすることによってより多くのコンテンツを楽しめます。</p>
            <h4>プライバシーポリシ―</h4>
            <p>当サイトでは、ログインの際に、名前（ハンドルネーム）、メールアドレス等の個人情報をご登録いただく場合がございます。</p>
            <p>これらの個人情報は質問に対する回答や必要な情報を電子メールなどをでご連絡する場合に利用させていただくものであり、個人情報をご提供いただく際の目的以外では利用いたしません。</p>
            <p>当サイトで掲載している画像の著作権・肖像権等は各権利所有者に帰属致します。権利を侵害する目的ではございません。</p>
            <p>当サイトのコンテンツ・情報につきまして、可能な限り正確な情報を掲載するよう努めておりますが、誤情報が入り込んだり、情報が古くなっていることもございます。</p>
          </div>
        </div>
      </div>
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
    <script type="text/javascript" src="../../js/script.js"></script>

</body>
</html>