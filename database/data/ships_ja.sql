-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: mysql014.phy.heteml.lan
-- Generation Time: 2020 年 12 月 11 日 18:06
-- サーバのバージョン： 5.6.23-log
-- PHP Version: 5.5.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `_marinosaka`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `船舶検査データ`
--

CREATE TABLE IF NOT EXISTS `船舶検査データ` (
  `ID` int(255) DEFAULT NULL,
  `船舶検査番号` text,
  `証書番号` text,
  `船種` text,
  `船名` text,
  `定係港` text,
  `総トン数` int(255) DEFAULT NULL,
  `船舶の長さ` int(255) DEFAULT NULL,
  `用途` text,
  `船舶所有者` text,
  `所有者〒` text,
  `所有者住所1` text,
  `所有者住所2` text,
  `所有者ＴＥＬ` text,
  `借入人` text,
  `借入人〒` text,
  `借入人住所1` text,
  `借入人住所2` text,
  `借入人ＴＥＬ` text,
  `航行区域` text,
  `限定沿海航行区域` text,
  `旅客` int(255) DEFAULT NULL,
  `船員` int(255) DEFAULT NULL,
  `その他の乗船者` int(255) DEFAULT NULL,
  `計(定員)` text,
  `制限気圧` text,
  `その他の航行条件` text,
  `航行期間開始` text,
  `検査履歴1` text,
  `検査日1` date DEFAULT NULL,
  `検査履歴2` text,
  `検査日2` date DEFAULT NULL,
  `検査履歴3` text,
  `検査日3` date DEFAULT NULL,
  `検査履歴4` text,
  `検査日4` date DEFAULT NULL,
  `検査履歴5` text,
  `検査日5` date DEFAULT NULL,
  `船籍番号` int(255) DEFAULT NULL,
  `船籍府県` text,
  `船籍発行日` date DEFAULT NULL,
  `次回検認期日` date DEFAULT NULL,
  `前回検認日` date DEFAULT NULL,
  `製造者型式(船体)` text,
  `予備検No(船体)` int(255) DEFAULT NULL,
  `製造者型式(主機関)` text,
  `予備検No(主機関右)` int(255) DEFAULT NULL,
  `予備検No(主機関左)` int(255) DEFAULT NULL,
  `製造者型式(補機)` text,
  `予備検No(補機)` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `船舶検査データ`
--

INSERT INTO `船舶検査データ` (`ID`, `船舶検査番号`, `証書番号`, `船種`, `船名`, `定係港`, `総トン数`, `船舶の長さ`, `用途`, `船舶所有者`, `所有者〒`, `所有者住所1`, `所有者住所2`, `所有者ＴＥＬ`, `借入人`, `借入人〒`, `借入人住所1`, `借入人住所2`, `借入人ＴＥＬ`, `航行区域`, `限定沿海航行区域`, `旅客`, `船員`, `その他の乗船者`, `計(定員)`, `制限気圧`, `その他の航行条件`, `航行期間開始`, `検査履歴1`, `検査日1`, `検査履歴2`, `検査日2`, `検査履歴3`, `検査日3`, `検査履歴4`, `検査日4`, `検査履歴5`, `検査日5`, `船籍番号`, `船籍府県`, `船籍発行日`, `次回検認期日`, `前回検認日`, `製造者型式(船体)`, `予備検No(船体)`, `製造者型式(主機関)`, `予備検No(主機関右)`, `予備検No(主機関左)`, `製造者型式(補機)`, `予備検No(補機)`) VALUES
(3, '252-21920', '1-331', '汽船', 'MARINOS-ANDO-', '福井県小浜市', NULL, 7, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '安堂　誠孝', '550-0025', '大阪市西区九条南４－５－４', NULL, '06-6583-7009', NULL, NULL, NULL, NULL, NULL, '限定沿海', 'ただし、兵庫県竹野港北防波堤灯台から350度に引いた線と、福井県小浜市を経て、同県安島岬から310度に引いた線の間における本州の海岸から20海里以内の水域及び船舶安全法施行規則第１条第６項の水域に限る。', 9, 1, NULL, NULL, NULL, '条件無し', '1997/07/10', '中間検査', '2000-06-28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, '250-34629', NULL, NULL, 'ＯＮＥ　ＰＩＡＣＥ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '岡本　和永', '570-0012', '守口市大久保町４－２－３３', NULL, '06-6902-2855', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1996/04/02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, '250-42851', '1-496', '汽船', 'BillionaireDream', '和歌山県和歌山市', NULL, 7, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '山田　慶三', '573-0021', '枚方市中宮西之町３－５－１４', NULL, '072-848-0847', NULL, NULL, NULL, NULL, NULL, '限定沿海', '　ただし､和歌山県市江崎から徳島県網代埼まで引いた線、愛媛県見舞埼から大分県武蔵川口左岸突端まで引いた線、福岡県部埼から山口県木屋川口右岸突端まで引いた線及び陸岸により囲まれた水域、和歌山県市江埼から徳島県網代埼まで引いた線、和歌山県和深埼から210度に引い', 9, 1, NULL, NULL, NULL, '条件無し', '1999/04/14', '書換', '2000-05-31', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '250-18409', NULL, NULL, 'T.S.K', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '里崎　敏行', '634-0845', '橿原市中曽司町185-1', NULL, '07442-5-7261', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1996/02/14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '250-45078', NULL, '汽船', 'Ｄｏｒａｇｏｎ　ｆｌｙ　Ⅱ', '和歌山県和歌山市', NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '辻田　文雄', '567-0851', '茨木市真砂１－２－２３', NULL, '0726-54-3450', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2000/03/29', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '250-27505', NULL, '汽船', '藤', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '伊藤食品株式会社', '552-0016', '大阪市港区三先２－２０－４６', NULL, '06-6573-5881', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1993/03/24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '250-38698', '1-1673', '汽船', 'Blue Runner', '和歌山県下津町', NULL, 6, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, '上田　和之', '572-0078', '寝屋川市太間町９－８', NULL, '072-826-2492', '限定沿海', '　ただし､和歌山県市江崎から徳島県網代埼まで引いた線、愛媛県赤埼鼻から大分県オモト鼻まで引いた線、大分県亀埼から山口県丸尾埼から２００度１６海里の地点まで引いた線、同地点から同県厚狭川口左岸突端まで引いた線及び陸岸により囲まれた水域並びに船舶安全法施行規則', 9, 1, NULL, NULL, NULL, '条件無し', '1997/07/09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '250-38697', '1-1672', '汽船', 'PHENIX', '和歌山県下津町', NULL, 6, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '小川　寛治', '573-0021', '枚方市中宮西之町５－１８', NULL, '072-849-1624', NULL, NULL, NULL, NULL, NULL, '限定沿海', '　ただし､和歌山県市江崎から徳島県網代埼まで引いた線、愛媛県赤埼鼻から大分県オモト鼻まで引いた線、大分県亀埼から山口県丸尾埼から２００度１６海里の地点まで引いた線、同地点から同県厚狭川口左岸突端まで引いた線及び陸岸により囲まれた水域並びに船舶安全法施行規則', 9, 1, NULL, NULL, NULL, '条件無し', '1997/07/09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '250-35287', NULL, NULL, 'DORAGON', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '250-42850', NULL, NULL, '爆釣ガンガン丸', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '大町　一志', '569-0826', '高槻市寿町３－５－２３', NULL, '0726-94-9874', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1999/04/14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '250-29637', NULL, NULL, 'KOHRYO MARU', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '幸田　諒', '614-8363', '八幡市男山吉井１２－６', NULL, '075-971-2107', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1994/03/17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '250-40770', NULL, NULL, 'SUPEREXPLORERⅡ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, '清水　豊', '520-2277', '大津市関津６－２０－１３', NULL, '0775-46-7869', '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '250-38114', NULL, NULL, 'ベガ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '高橋　伸佳', '578-0951', '東大阪市新庄東４９新潟運輸寮内', NULL, '06-6744-2426', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1997/05/28', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, '250-14176', NULL, NULL, '太公望', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '中前　博', '576-0052', '交野市私部２－１１－', '３０－４０７', NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1998/01/13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '250-42578', NULL, NULL, '洋平丸５', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, '新岡　興洋', '665-0044', '宝塚市末成町２９－１４', NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, '250-42853', NULL, NULL, '男姫瑠5世', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, '広橋　永一', '638-0812', '吉野郡大淀町桧垣本７０８', NULL, '07475-2-5997', '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1999/04/14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(23, '250-39564', NULL, NULL, 'AntrePrenerShio', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '文野　直樹', '573-0075', '枚方市東香里３－３１－９', NULL, '072-892-1447', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, '250-30274', NULL, NULL, 'マリオⅤ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '藤原　富世', '576-0015', '交野市星田西４－１０－１３', NULL, '072-892-1447', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1994/05/25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(25, '295-39332', NULL, NULL, 'TOCHIHARA', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '松谷　康則', '638-0041', '吉野郡下市町下市８５２－９３', NULL, '0747-52-6825', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(26, '253-8968 ', NULL, NULL, 'Criss Cross Ⅱ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, '丸山　義昭', '531-0075', '大阪市北区大淀南３－９－９', NULL, '06-6451-8890', '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(27, '253-11442', NULL, NULL, NULL, NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(28, '250-39388', NULL, NULL, 'SANKI', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '三渕　章浩', '570-0011', '守口市金田町１－５１－２', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '251-14617', NULL, NULL, 'リキ号', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, '250-27731', NULL, NULL, 'MAYUMI2', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '水貝　敏治', '573-0115', '枚方市氷室台１－４０－１４', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(31, '250-37317', NULL, NULL, 'June Bride', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '山崎　照久', '666-0034', '川西市寺畑２－３－５', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(32, '250-32536', NULL, NULL, 'ビールちゃん丸２８号', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '松田　良一', '665-0883', '宝塚市山本中３－６－２１', NULL, '0797-88-4804', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(33, '250-15454', NULL, NULL, 'SWAN', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '大森　睦子', '572-0046', '寝屋川市成美町１７－１', NULL, '072-826-7035', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(34, '250-27368', NULL, NULL, 'B2R-Ⅰ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '鳥川　夕記夫', '599-8241', '堺市福田６０３－１４－３０９', NULL, '0722-39-3947', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1993/02/26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(35, '250-30405', NULL, NULL, 'WHITE', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '松岡　幸徳', '570-0015', '守口市梶町４－７８－９', NULL, '06-6903-1889', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1994/06/07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, '250-28388', NULL, NULL, 'HOPE', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '永田　栄一', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '1993/03/21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, '253-3678 ', NULL, NULL, '海遊Ⅴ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '株式会社アイオイ', '572-0088', '寝屋川市木屋元町４－４０', NULL, '072-827-7780', NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, '250-25781', NULL, NULL, 'TAKARA', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', NULL, '566-0062', '摂津市鳥飼上２－１－２７', NULL, NULL, '㈱宏和鈑金製作所', NULL, NULL, NULL, NULL, '限定沿海', NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, '250-45236', '1-522', '汽船', '西秀丸', '三重県鳥羽市', NULL, 8, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '西本　秀春', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', '　ただし、静岡県菊川口左岸突端から180度に引いた線と、愛知県伊良湖岬を経て、三重県三木埼灯台から135度に引いた線の間における本州の海岸から20海里以内の水域及び船舶安全法施行規則第1条第6項の水域に限る。', 7, 1, NULL, NULL, NULL, '条件無し', '2000/04/19', '定期検査', '2000-04-19', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, '250-43521', NULL, NULL, 'White Arrow', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, '250-48623', NULL, '汽船', 'Ｂｅｒｇｅｎ　ⅴ', '大阪府　泉佐野市', 5, 10, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', '井村　佳嗣', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限定沿海', NULL, 11, 1, NULL, NULL, NULL, '条件無し', '2002/04/12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(51, '250-49724', '1-279', '汽船', '元橋丸　Ⅱ', '滋賀県志賀町', 2, 6, 'ﾌﾟﾚｼﾞｬｰﾓｰﾀｰﾎﾞｰﾄ', 'マリン大阪㈱', NULL, NULL, NULL, NULL, '元橋　昭平', NULL, NULL, NULL, NULL, '限定沿海', '　ただし､和歌山県市江崎から徳島県網代埼まで引いた線、愛媛県　埼から山口県竜宮埼から１８０度１５海里の地点まで引いた線、同地点から同竜宮鼻まで引いた線及び陸岸により囲まれた水域のうち海岸から１２海里以内の水域並びに船舶安全法施行規則第１条第項の水域に限る。', 7, 1, NULL, NULL, NULL, '条件無し', '2003/04/23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, '250-43302', NULL, '汽船', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 3, 1, NULL, NULL, NULL, '条件無し', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, '250-52094', NULL, NULL, 'Ladybird 1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2006/05/17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, '140-092  ', NULL, NULL, 'ESPOIR DE H', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2004/09/17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '250-53302', NULL, NULL, '大信玄', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2008/02/08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, '250-53421', NULL, NULL, 'SUMMER BOYⅥ', NULL, NULL, NULL, 'ﾌﾟﾚｼﾞｬｰボート', '木下　宗寛', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '限沿', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2008/04/16', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, '250-52914', NULL, NULL, 'FAIRLADY', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2007/06/05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, '250-51538', NULL, NULL, 'SIGHT-MASTER', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2005/07/05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, '250-56702', NULL, NULL, '愛笑む', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, '条件無し', '2014/04/01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
