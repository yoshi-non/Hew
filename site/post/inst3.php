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

    <title>Hew_Install-3</title>

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
          <h2 class="title__inst title__inst3" id="inst3"><span>仮想環境</span></h2>
          <div class="inst__main__inner">
            <p>
              Python を使って開発や実験を行うときは、用途に応じて専用の実行環境を作成し、切り替えて使用するのが一般的です。
              こういった、一時的に作成する実行環境を、「仮想環境」 と言います。
            </p>
            <p>仮想環境は、次のような目的で使われます。</p>
            <p>
              システム全体で使うPython環境に影響を与えずにモジュールの追加・入れ替えをしたい。<br><br>
              異なるバージョンの Python を使いわけたり、同じモジュールの、複数のバージョンを使い分けたい。<br><br>
              例えば、開発中のWebアプリケーション開発では、Python 3.7 で Webアプリケーションフレームワークとして Django の 1.10 を使い、新しいプロジェクトでは Python 3.8 とDjango バージョン 1.11 を使用したい場合など、簡単に切り替えられるようにしたい。
            </p>
            <p>
              ここでは、ここでは、Python3 の標準ライブラリである venv で仮想環境を作成する方法を紹介します。
            </p>
          </div>
          <div class="inst__main__inner">
            <h4>プロジェクトディレクトリの作成</h4>
            <p>
              まず、開発対象のプロジェクトを格納するディレクトリを作成します。<br><br>
              コマンドプロンプトを開き、次のコマンドでディレクトリ sample1 を作成します。
            </p>
            <p class="inst__main__inner__cmd">C:\Users\user1>mkdir sample1</p>
            <p>
              次に、プロジェクトディレクトリに sample.py という名前のソースファイルを作成しましょう。
            </p>
            <p class="inst__main__inner__cmd">import requestsprint(requests.get("https://www.python.jp").text)</p>
            <p>
              sample.py で使っている requestsモジュール は、Python標準のモジュールではなく、別途インストールしないと使えません。実行するとつぎのようにエラーになります。
            </p>
            <p class="inst__main__inner__cmd">
              C:\Users\user1>cd sample1<br>
              C:\Users\user1\sample1>python sample.py<br>
              Traceback (most recent call last):<br>
              　File "sample.py", line 1, in &lt;module&gt;<br>
              　　import requests<br>
              ImportError: No module named requests<br>
            </p>
          </div>
          <div class="inst__main__inner">
            <h4>仮想環境の作成</h4>
            <p>では、最初の仮想環境を作成しましょう。sample1 ディレクトリで、次のコマンドを実行します。</p>
            <p class="inst__main__inner__cmd">C:\Users\user1\sample1>python -m venv .venv</p>
            <p>
              このコマンドは、指定したディレクトリ C:\Users\user1\sample1\.venv に仮想環境を作成します。仮想環境のディレクトリ名は、.venv 以外でも、好きな名前をつけても大丈夫です。
            </p>
          </div>
          <div class="inst__main__inner">
            <h4>仮想環境への切り替え(コマンドプロンプト ver)</h4>
            <p>作成した仮想環境 .venv ディレクトリにある Scripts\activate.bat を実行します</p>
            <p class="inst__main__inner__cmd">
              C:\Users\user1\sapmle1>.venv\Scripts\activate.bat<br>
              (.venv) C:\Users\user1\sample1>
            </p>
            <p>
              コマンド プロンプトの先頭に (.venv) と表示され、仮想環境で実行中であることを示します。
            </p>
          </div>
          <div class="inst__main__inner">
            <h4>仮想環境への切り替え(PowerShell ver)</h4>
            <p>
              仮想環境を利用する前に、PowerShellでスクリプトの実行を許可しておきます。PowerShellを起動し、次のコマンドを実行します。
            </p>
            <p class="inst__main__inner__cmd">
              PS C:\> Set-ExecutionPolicy RemoteSigned -Scope CurrentUser -Force
            </p>
            <p>
              このコマンドは、一番最初に一回だけ実行してください。2回目以降は不要です。<br><br>
              次に、作成した仮想環境 .venv ディレクトリにある Scripts\activate.ps1 を実行します
            </p>
            <p class="inst__main__inner__cmd">
              PS C:\Users\user1\sapmle1> .venv\Scripts\activate.ps1<br>
              (.venv) C:\Users\user1\sample1>
            </p>
            <p>コマンド プロンプトの先頭に (.venv) と表示され、仮想環境で実行中であることを示します。</p>
          </div>
          <div class="inst__main__inner">
            <h4>パッケージのインストール</h4>
            <p>
              仮想環境を使用中に pip モジュールでPyPIからパッケージをインストールすると、仮想環境にインストールされます。sample.py で使っている、requests モジュールをインストールしましょう。
            </p>
            <p class="inst__main__inner__cmd">(.venv) C:\Users\user1\sample1>python -m pip install requests</p>
            <p>ここで、さきほど作成した sample.py を実行してみましょう。</p>
            <p class="inst__main__inner__cmd">(.venv) C:\Users\user1\sample1>python sample.py</p>
            <p>インストールしたモジュールは、仮想環境内にのみ書き込まれ、元の Pythonや、他の仮想環境からは利用できません。</p>
          </div>
          <div class="inst__main__inner">
            <h4>仮想環境の終了</h4>
            <p>
              仮想環境の使用を終え、通常の状態に復帰するときは、deactivate コマンドを実行します。
            </p>
            <p class="inst__main__inner__cmd">
              (.venv) C:\Users\user1\sample1> deactivate<br>
              C:\Users\user1\sample1>
            </p>
            <p>仮想環境を終了すると、もう requests モジュールは使えなくなってしまいます。</p>
            <p class="inst__main__inner__cmd">
              C:\Users\testuser1>python sample.py<br>
              Traceback (most recent call last):<br>
              　File "sample.py", line 1, in &lt;module&gt;<br>
              　　import requests<br>
              ModuleNotFoundError: No module named 'requests'
            </p>
          </div>


            <div class="inst__page__nav">
              <div class="inst__page__nav__prev">
                <a href="inst2.php">Prev</a>
              </div>
              <div class="inst__page__nav__text">
                <a href="inst2.php">Pythonの実行方法</a>
              </div>
              <div class="inst__page__nav__next"></div>
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