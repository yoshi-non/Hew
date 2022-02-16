-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-02-16 13:14:06
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `mini_bbs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `question_id` int(11) NOT NULL,
  `is_best_answer` tinyint(4) NOT NULL DEFAULT 0,
  `member_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `answers`
--

INSERT INTO `answers` (`id`, `body`, `created_at`, `question_id`, `is_best_answer`, `member_id`) VALUES
(1, 'インストールした時のコマンドを見直してみたら\r\n\r\nsudo curl -L https://github.com/docker/compose/releases/download/1.16.1/docker-compose-`uname -s-uname -m` -o /usr/local/bin/docker-compose\r\n\r\nになっており1.16.1のものがインストールされていました。\r\n\r\nsudo rm /usr/local/bin/docker-compose\r\nで一度アンインストールして', '2022-02-16 12:02:26', 1, 0, 1),
(2, '1.16.1の部分をを1.29.2に変えてインストールしたらうまくいきました。', '2022-02-16 12:03:00', 1, 0, 1),
(3, '発生している問題・エラーメッセージ\r\nListTestを実行すると「[ banana cherry durian null ]→[abcd]ならOK」となってしまう\r\n本当ならappleをbananaの左（先頭）に追加したいが、nullが表示されてしまう。', '2022-02-16 12:10:45', 3, 0, 3),
(4, '自己解決できました。\r\nリンクの付け替えの部分が間違っていたみたいです。\r\nありがとうございました。', '2022-02-16 12:12:23', 3, 1, 3);

-- --------------------------------------------------------

--
-- テーブルの構造 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `password`, `picture`, `created`) VALUES
(1, 'pekora', 'peko@gmail.com', 'ff2a2911401640452103eadad0db22454ebb89fc', '20220216125613imagespeko.jpg', '2022-02-16 11:56:19'),
(2, 'subaru', 'subaru@gmail.com', '71a5d2fefcd3415cde44ef697b61064150139958', '20220216125827imagessuba.jpg', '2022-02-16 11:58:34'),
(3, '俺がういままだ', 'uishigure@gmail.com', '1f1e09ae0d7289e480f7c5298d37727a6513cda6', '20220216130933D0k3R68U4AQMKLW.jpg', '2022-02-16 12:09:35');

-- --------------------------------------------------------

--
-- テーブルの構造 `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `questions`
--

INSERT INTO `questions` (`id`, `member_id`, `body`, `created_at`) VALUES
(1, 1, 'docker-compose upでエラー( \'./docker-compose.yml\' is invalid because)になる', '2022-02-16 11:57:33'),
(2, 2, 'df.corrで相関係数の表がでると思うんですが、表示されず　ー　のようなバーが表示されるのみです。\r\nエラーの出力はないです。\r\n.corrの計算は基本的に数値以外は計算されず列ごと無いものとして表示される認識でしたが、数値の列の計算もされていない？\r\n調べたのですが出てきませんでした。\r\n\r\nどういったことが考えられるでしょうか、宜しくお願い致します。\r\n環境はjupyterです。', '2022-02-16 11:59:33'),
(3, 3, '連結リストにおいて、先頭に指定要素追加していきたいのですが、先頭に追加する最後のメソッドになるとnullとして追加？されてしまいます。\r\n\r\nリンクの付け替えにおいて何か問題があるのだろうと考えているのですが、解決方法が分かりません。\r\nNewLinkedListのみを修正して正しく表示されるソースをご教授願いたいです。', '2022-02-16 12:10:26');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- テーブルの AUTO_INCREMENT `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
