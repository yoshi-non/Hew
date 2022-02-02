<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Hew Sign-UpPage</title>
    <link rel="stylesheet" type="text/css" href="../../css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/3.5.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link rel="stylesheet" type="text/css" href="../../css/common.css">
    <link rel="stylesheet" type="text/css" href="../../css/login.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>
  <main>

    <nav class="nav">
      <div class="navbar">
        <div class="logo"><a href="../login.php"><img src="../../images/python-logo-generic.svg"></a></div>
        <div class="nav__main">
            <a href="news.php" style="color: gray; text-decoration: none;">ニュース</a>
            <a href="help.php" style="color: gray; text-decoration: none;">ヘルプ</a>
        </div>
      </div>
    </nav>

    <?php

    require('../dbconnect.php');

    session_start();

    if(!empty($_POST)) {
      //エラー項目の確認
      if($_POST['name'] == '') {
        $error['name'] = 'blank';
      }
      if($_POST['email'] == '') {
        $error['email'] = 'blank';
      }
      if(strlen($_POST['password']) < 4) {
        $error['password'] = 'length';
      }
      if($_POST['password'] == '') {
        $error['password'] = 'blank';
      }
      $fileName = $_FILES['image'] ['name'];
      if(!empty($fileName)) {
        $ext = substr($fileName, -3);
        if($ext != 'jpg' && $ext != 'gif' && $ext != 'png') {
          $error['image'] = 'type';
        }
      }

      //重複アカウントのチェック
      if(empty($error)) {
        $member = $db->prepare('SELECT COUNT(*) AS cnt FROM members WHERE email=?');
        $member->execute(array($_POST['email']));
        $record = $member->fetch();
        if($record['cnt'] > 0) {
          $error['email'] = 'duplicate';
        }
      }

      if(empty($error)) {
        //画像をアップロードする
        $image = date('YmdHis') . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], '../member_picture/' . $image);

        $_SESSION['join'] = $_POST;
        $_SESSION['join']['image'] = $image;
        header('Location: check.php');
        exit();
      }
    }

    //書き直し
    if((isset($_REQUEST['action'])) == 'rewrite') {
      $_POST = $_SESSION['join'];
      $error['rewrite'] = true;
    }
     ?>

    <div id="wrap__signUp">

      <h2>Sign Up</h2>
      <form action="" method="post" enctype="multipart/form-data">
        <dl>
          <dt><span class="required">*</span></dt>
          <dd><input type="text" class="p__left" name="name" size="35" maxlength="255" placeholder="Your name…" value="<?php if(isset($_POST['name'])) {echo htmlspecialchars($_POST['name'], ENT_QUOTES);} ?>" />
          <?php if(isset($error['name']) == 'blank'): ?>
            <p class="error">* Enter a name</p>
          <?php endif; ?>
          </dd>
          <dt><span class="required">*</span></dt>
          <dd><input type="text" class="p__left" name="email" size="35" maxlength="255" placeholder="Your email address…" value="<?php if(isset($_POST['email'])) {echo htmlspecialchars($_POST['email'], ENT_QUOTES);} ?>" />
            <?php if(isset($error['email']) == 'blank'): ?>
              <p class="error">* Enter a email address</p>
            <?php endif; ?>
            <?php if(isset($error['email']) == 'duplicate'): ?>
              <p class="error">* This address is already in use</p>
            <?php endif; ?>
          </dd>
          <dt><span class="required">*</span></dt>
          <dd class="pass__box">
            <input type="password" class="p__left" name="password" size="30" maxlength="20" placeholder="Your password…" value="<?php if(isset($_POST['password'])) {echo htmlspecialchars($_POST['password'], ENT_QUOTES);} ?>" >
            <span class="field-icon">
              <i toggle="password-field"class="mdi mdi-eye toggle-password"></i>
            </span>
            <?php if(isset($error['password']) == 'blank'): ?>
              <p class="error">* Enter a password</p>
            <?php endif; ?>
            <?php if(isset($error['password']) == 'length'): ?>
              <p class="error">* 4 or more characters</p>
            <?php endif; ?>
          </dd>
          <dt>User Icon</dt>
          <dd><label for="file_upload"><input type="file" id="file_upload" class="input__img" name="image" size="35" />Upload file</label>
            <?php if(isset($error['image']) == 'type'): ?>
              <p class="error">* Please specify the image of ".gif", ".jpg", ".png"</p>
            <?php endif; ?>
            <?php if(!empty($error)): ?>
              <p class="error">* Please specify the image again</p>
            <?php endif; ?>

          </dd>
        </dl>
        <div class="signUp__back"><a href="../login.php">&laquo;Back</a></div>
        <div class="signUp__go"><input type="submit" value="Next" /></div>
      </form>
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
              <a href="../login.php">HOME</a>
              <a href="news.php">NEWS</a>
              <a href="help.php">HELP</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script type="text/javascript" src="../../js/script.js"></script>

</body>
</html>