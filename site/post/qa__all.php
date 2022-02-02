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

//qa__questionからの質問情報を取得する
$questions = $db->query('SELECT m.name, m.picture, p.* FROM members m,questions p WHERE m.id=p.member_id ORDER BY p.created_at DESC')

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
          <div class="q__link"><a href="qa__question.php">
            <svg fill="#fff" width="20" height="20" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg" class="util-icon">
              <path d="M24.171 3C13.142 2.909 4.03 11.917 4.001 22.946a19.908 19.908 0 0 0 3.623 11.539l-1.873 6.088a.846.846 0 0 0 1.082 1.049l5.974-2.044a19.91 19.91 0 0 0 11.45 3.421c10.741-.135 19.54-8.878 19.74-19.618C44.203 12.218 35.263 3.094 24.17 3m.088 25.61c1.237 0 2.236.988 2.236 2.195 0 1.216-1 2.195-2.236 2.195-1.229 0-2.226-.979-2.226-2.195 0-1.207.997-2.195 2.226-2.195zM24.14 13c3.144 0 5.699 2.362 5.699 5.268 0 1.394-.585 2.711-1.647 3.704l-.185.123c-1.015.761-2.187 1.865-2.187 2.548v.384c0 .955-.787 1.73-1.758 1.73-.969 0-1.758-.775-1.758-1.73v-.384c0-2.625 2.726-4.65 3.485-5.23.317-.326.513-.728.513-1.145 0-1.003-.968-1.813-2.171-1.813-1.148 0-2.089.738-2.172 1.678l-.006.135c0 .953-.783 1.73-1.754 1.73-.97 0-1.754-.777-1.754-1.73C18.444 15.362 21 13 24.14 13z" fill-rule="evenodd"></path>
            </svg>
            質問・相談
          </a></div>
        </div>

        <div class="qa__box">
          <div class="qa__nav">
            <ul>
              <li class="qa__close"><a href="qa__yet.php">回答受付中</a></li>
              <li class="qa__close"><a href="qa__fin.php">解決済</a></li>
              <li class="qa__open"><a href="qa__all.php">すべて</a></li>
            </ul>
          </div>
          <?php foreach($questions as $question): ?>
          <div class="qa__text__box">
            <a class="qa__text" href="qa__solve.php?id=<?php echo htmlspecialchars($question['id'], ENT_QUOTES); ?>" style="text-decoration: none;">
              <div class="qa__img"><img src="member_picture/<?php echo htmlspecialchars($question['picture'], ENT_QUOTES); ?>" width="50" height="50"></div>
              <div class="qa__text__min">
                <p class="qa__text__name"><?php echo htmlspecialchars($question['name'], ENT_QUOTES); ?></p>
                <p class="qa__text__date"><?php echo htmlspecialchars($question['created_at'], ENT_QUOTES); ?></p>
              </div>
              <p class="qa__text__main"><?php echo htmlspecialchars($question['body'], ENT_QUOTES); ?></p>
            </a>
          </div>
          <?php endforeach; ?>
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