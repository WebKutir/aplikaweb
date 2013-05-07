-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 07, 2012 at 10:49 PM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `foo`
--

-- --------------------------------------------------------

--
-- Table structure for table `adv`
--

CREATE TABLE IF NOT EXISTS `adv` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL COMMENT '0 no , 1 yes ',
  `meta` varchar(200) NOT NULL,
  `script` varchar(300) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adv`
--

INSERT INTO `adv` (`id`, `status`, `meta`, `script`, `message`) VALUES
(1, 0, '<meta http-equiv="refresh" content="300">', 'window.setInterval(function() {     // this will execute every 5 minutes => show the alert here }, 300000);', '<div id="dialog-message" title="Download complete">\r\n	<p>\r\n		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>\r\n		Your files have downloaded successfully into the My Downloads folder.\r\n	</p>\r\n	<p>\r\n		Currently using <b>36% of your storage space</b>.\r\n	</p>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `name`, `image`) VALUES
(10, 'Portfolio', '8642.png');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'News'),
(2, 'event'),
(3, 'download'),
(12, 'Design'),
(11, 'Coding'),
(14, 'slideshow'),
(15, 'services');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('682124579b1bbd18c530fad17d32ab53', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.11 (K', 1354893663, ''),
('9a910e07ebc8c8f1399c2c2cf7a46da6', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:10.0) Gecko/201001', 1351271657, ''),
('fec8205ab9ae5c5e047630fae5a4d352', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; rv:10.0) Gecko/201001', 1352730877, '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_articles` tinyint(5) unsigned NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0 tidak aktif , 1 aktif',
  PRIMARY KEY (`id_comment`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_articles`, `name`, `email`, `message`, `date`, `status`) VALUES
(1, 0, '0', '0', 'Pertama kali comments', '0000-00-00', 1),
(2, 0, '0', '0', 'kedua', '0000-00-00', 1),
(3, 0, '0', '0', 'ketiga', '0000-00-00', 1),
(4, 0, 'Hendar', 'hendar.online@gmail.com', 'ketiga gggg', '0000-00-00', 1),
(5, 41, 'gaga', 'gaga@gmail.com', 'hendar', '0000-00-00', 1),
(6, 41, 'gara', 'naruto@gmail.cpm', 'keren', '0000-00-00', 1),
(7, 41, 'mangata', 'ker@gmamil.com', 'kasihan deh loe', '0000-00-00', 0),
(8, 41, 'kurang', 'fdlafklfk@gmail.com', 'itik beranak kodok', '0000-00-00', 1),
(9, 41, 'kodong', 'kodok@gmail.com', 'gila luh', '0000-00-00', 1),
(10, 41, 'ingin ', 'aah.zaah@yahoo.com', 'keren dah bisa komen dimarih', '0000-00-00', 1),
(11, 41, 'bisa aja', 'ker@gmamil.com', 'kerereeerer', '2012-09-09', 1),
(12, 41, 'sjaah', 'ker@gmamil.com', 'karania huk mant', '2012-09-09', 1),
(13, 41, 'afik', 'afik@gmail.com', 'bowler ', '2012-09-09', 1),
(14, 42, 'syamsul', 'ust@jamal.com', 'keren gan ', '2012-09-09', 1),
(15, 42, 'thegan', 'hendar.online@gmail.com', 's** enak bro', '2012-09-09', 1),
(16, 43, 'sya', 'hendar.online@gmail.com', 'dasar ngen*** nih yang punya it**', '2012-09-09', 1),
(17, 43, 'tai', 'tai@gmail.com', 't** lo semua kon***', '2012-09-09', 1),
(18, 43, 'skala', 'hendar.online@gmail.com', 'ngentot 1 jam saja', '2012-09-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `company` text NOT NULL,
  `subject` varchar(30) NOT NULL,
  `message` text NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `company`, `subject`, `message`, `email`) VALUES
(1, 'hendar', 'hendar', 'ketika cinta bertasbih', 'ketika cinta bertasbih', 'hendar.online@gmail.com'),
(2, 'syajaah ', 'DQ', 'APLIKASI INI', 'Abi cepet sembuh ya', 'jay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `category_id` int(5) NOT NULL,
  `keyword` varchar(256) NOT NULL,
  `publish` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '1 yes 0 no',
  `commentable` bit(1) NOT NULL DEFAULT b'0' COMMENT '0=No , 1=Yes',
  `privileges` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=Public , 1=Premium',
  `count_view` int(6) unsigned NOT NULL DEFAULT '0',
  `author` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `title`, `content`, `date`, `image`, `category_id`, `keyword`, `publish`, `commentable`, `privileges`, `count_view`, `author`) VALUES
(23, 'Angelina Sondaks', '<p>\n	Bersih lagi lagi bersih syafiq hariy nasywan Bersih lagi lagi bersih syafiq hariy nasywan Bersih lagi lagi bersih syafiq hariy nasywan Bersih lagi lagi bersih syafiq hariy nasywan</p>\n', '2012-02-22', '8555.jpg', 1, 'kasus korupsi terkait wisma atlet', 1, '\0', 0, 6, 1),
(24, 'Harry Pother de Final Chapter', '<p>\n	Lorem ipsum dolor sit amet, horum patre ad te. Virginis piratae suppetit sibi adsedit in lucem, indulgentia perrexit daret intellectu detinerentur nonummy nigro perfusam ut casus. Quicquid eam sed esse more fuerit quis mihi esse more defuncta ait. Hesterna studiis ascende ad te finis puellam in deinde vero cum. Impietatem flumina in lucem in fuerat construeret cena reges undis effugere quod ait in lucem concitaverunt in.</p>\n', '2012-02-22', '6092.jpg', 1, 'final harry pother', 1, '\0', 0, 0, 1),
(25, 'Har pit Nas', '<p>\n	Lorem ipsum dolor sit amet, horum patre ad te. Virginis piratae suppetit sibi adsedit in lucem, indulgentia perrexit daret intellectu detinerentur nonummy nigro perfusam ut casus. Quicquid eam sed esse more fuerit quis mihi esse more defuncta ait. Hesterna studiis ascende ad te finis puellam in deinde vero cum. Impietatem flumina in lucem in fuerat construeret cena reges undis effugere quod ait in lucem concitaverunt in.</p>\n', '2012-02-22', '7545.jpg', 2, 'libur sekolah anak anak ', 1, '\0', 1, 0, 1),
(26, 'Berita Baru Tentang Filem', '<p>\n	Berita terbaru tentang filem yang sangat ramai Berita terbaru tentang filem yang sangat ramai Berita terbaru tentang filem yang sangat ramai Berita terbaru tentang filem yang sangat ramai</p>\n', '2012-02-25', '8300.jpg', 1, 'gairah sportifisme semua ada disini kabar arena di tv one ', 0, '\0', 0, 0, 1),
(32, 'Introduction PHP ', '<p>\n	disuatu malam aku rada nnyeleneh , kudengan suara kuda yang akhirnya aku tereneh abra-abra abrakadabra</p>\n', '2012-05-05', '6590.jpg', 11, 'pengenalan php', 0, '\0', 1, 2, 1),
(33, 'Introduction HTML CSS', '<p>\n	abra-abra abrakadabra nizam minta tolong tapi dikasih lontong tolong jangna dikasih lontong karena itu sangat beracun tolong dong tolong dong minta tolong&nbsp;</p>\n', '2012-05-04', '3492.jpg', 12, 'orang hebat', 1, '\0', 0, 0, 1),
(34, 'gambar slide 1', '<p>\n	ini gambar slide 1</p>\n', '2012-04-08', '608.jpg', 14, 'kamu asik ', 0, '\0', 0, 0, 1),
(35, 'test kacang mantab', '<p>\n	karena kamu chatique beautique mantabs karena kamu chatique beautique mantabskarena kamu chatique beautique mantabskarena kamu chatique beautique mantabskarena kamu chatique beautique mantabs</p>\n', '2012-04-15', '7943.jpg', 1, 'mantabs', 0, '\0', 0, 0, 1),
(37, 'Website Company Profile', '<p>\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque molestie, felis in sodales scelerisque, magna metus laoreet massa, facilisis interdum antequam auctor arcu. Pellentesque a neque. In aerat.<br />\n	<span>Maecenas ullamcorper lectus vel risus<br />\n	Mauris lobortis dui id urna bibendum</span></p>\n', '2012-05-13', '7570.jpg', 15, 'design and maketing', 1, '\0', 0, 0, 1),
(38, 'Search Engine Optimization', '<p>\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque molestie, felis in sodales scelerisque, magna metus laoreet massa, facilisis interdum antequam auctor arcu. Pellentesque a neque. In aerat.<br />\n	<span>Maecenas ullamcorper lectus vel risus<br />\n	Mauris lobortis dui id urna bibendum</span></p>\n', '2012-05-13', '3925.jpg', 15, 'seo', 1, '\0', 0, 0, 1),
(39, 'Custom Web Applications', '<p>\n	Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Quisque molestie, felis in sodales scelerisque, magna metus laoreet massa, facilisis interdum antequam auctor arcu. Pellentesque a neque. In aerat.<br />\n	<span>Maecenas ullamcorper lectus vel risus<br />\n	Mauris lobortis dui id urna bibendum</span></p>\n', '2012-06-02', '6469.jpg', 15, 'custom web applications', 1, '\0', 0, 0, 1),
(40, 'Know How ', '<p>\n	Mr. Dani Akhmad Is Suck.. Ass My ass An Amateer song Artist</p>\n', '2012-06-30', '827.jpg', 1, 'know-how-slug-yg-belum-tahu', 1, '\0', 0, 0, 3),
(41, 'Jimmy Kembaren ', '<p>\n	as a professional web developer anthusias , we are a lover film hindi</p>\n', '2012-07-01', '8059.jpg', 12, 'fatahilla ciledug', 1, '\0', 0, 116, 3),
(42, 'new coding oleh freehdr', '<p>\n	jimmy jimmy pak kades pak kades online je mantab lah klao begitu</p>\n', '2012-07-01', '1654.jpg', 11, 'wanted jimmy kembaren oye pancen oke ', 1, '\0', 0, 38, 3),
(43, 'new coding oleh administrator', '<p>\n	mantap semua bisa coding dengan tenang</p>\n', '2012-07-01', '1477.jpg', 11, 'mantab lah klo begitu', 1, '\0', 0, 19, 1),
(44, 'jogja', '<p>\n	semangat berbagi</p>\n', '2012-07-01', '3074.jpg', 2, 'beta', 1, '\0', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `size` varchar(20) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `publish` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1=yes , 0=no',
  `privileges` tinyint(2) NOT NULL DEFAULT '0' COMMENT '0=Public , 1=Premium',
  `count_view` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `title`, `description`, `size`, `date`, `image`, `file`, `publish`, `privileges`, `count_view`) VALUES
(2, 'sesuatu', '<p>\n	untuk di download</p>\n', '3899', '2012-07-01', 'Film%20Poster%20Of%20The%20Year.jpg', 'temp.txt', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` tinyint(7) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` tinyint(4) unsigned NOT NULL,
  `image` text NOT NULL,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `album_id`, `image`, `title`) VALUES
(53, 10, '15b27476721ff7e681747551a962bc84.png', 'Fujita Elevator;A peripatetic privat enterprise in the field of electrical mechanical specially elevator'),
(54, 10, '95319bb2ce858e2143dffced70397638.png', 'Jendela Bidik;Photographfer Comunnity Website , Free Download Magazine Monnthly'),
(55, 10, 'cd78d9132376f15b22603a9ad13de3cc.png', 'Komunitas;Sistem Informasi Dokumentasi dan Pemetaan Sumber Daya IPTEKS');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `level_id` tinyint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_nama`) VALUES
(1, 'Root'),
(2, 'Administrator'),
(3, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` int(1) NOT NULL,
  `user_id` int(1) NOT NULL,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `parent_id` tinyint(5) DEFAULT '0',
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `menu_order` tinyint(5) DEFAULT NULL,
  `publish` enum('Y','N') DEFAULT 'N',
  `status` smallint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`parent_id`, `title`, `url`, `menu_order`, `publish`, `status`) VALUES
(1, 'Categories', 'cat', 1, 'Y', 1),
(1, 'News', 'news', 2, 'Y', 0),
(1, 'Download', 'download', 3, 'Y', 1),
(1, 'Event', 'event', 4, 'Y', 0),
(6, 'Album', 'album', 1, 'Y', 1),
(6, 'Gallery', 'gallery', 2, 'Y', 0),
(9, 'Profile', 'profile', 1, 'Y', 1),
(9, 'SEO', 'seo', 2, 'Y', 1),
(9, 'User', 'user', 3, 'Y', 1),
(0, 'Dynamic Page', '#', 1, 'Y', 1),
(0, 'Manage Images', '#', 2, 'Y', 1),
(0, 'Setting', '#', 3, 'Y', 1);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `image` varchar(30) NOT NULL,
  `about` text NOT NULL,
  `address` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `fax` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `facebook` varchar(30) NOT NULL,
  `twitter` varchar(30) NOT NULL,
  `yahoo` varchar(30) NOT NULL,
  `site_title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `first_name`, `last_name`, `image`, `about`, `address`, `telephone`, `handphone`, `fax`, `email`, `facebook`, `twitter`, `yahoo`, `site_title`) VALUES
(1, 'comprogear.com', 'Gear', '5082.jpg', '<p style="text-align: left; ">\n	We are a close team of interactive developers who share a passion for creating website and online experiences with a difference. We specialize in creating Company Profile&nbsp;&amp; Web Apps, however provide many services from high quality illustration &amp; graphics to web application development &amp; design. We hate playing by the rules, and actively pursue innovation in all of our work.</p>\n<p style="text-align: left;">\n	&nbsp;</p>\n<p style="text-align: left;">\n	<strong>Our Vision</strong><br />\n	- Membantu anda yang belum mempunyai website untuk usaha anda<br />\n	- Berbagi ilmu pengetahuan untuk dunia pendidikan yang lebih baik<br />\n	<br />\n	<br />\n	<strong>Our Mission</strong><br />\n	- Menjadi bagian dari</p>\n<p style="text-align: left;">\n	&nbsp;</p>\n<p style="text-align: left;">\n	&nbsp;</p>\n', 'Jl. Lembang Baru 1 RT.03 RW.10', '1234567890', '0838-9227-5953', '1234567890', 'hendar.online@gmail.com', 'http://www.facebook.com/hendar', 'http://twitter/okochunk/', 'okochunk@yahoo.com partai abu ', 'Company Profile CMS - Web Dinamis, PHP Training');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE IF NOT EXISTS `seo` (
  `id` tinyint(2) NOT NULL AUTO_INCREMENT,
  `description` varchar(200) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `goolge_analytic` varchar(200) NOT NULL,
  `effective_measure` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `description`, `keyword`, `goolge_analytic`, `effective_measure`) VALUES
(1, 'startup yang berfokus dibidang web development , siap bekerja sama untuk memperluas jangkauan bisnis anda kedalam bentuk tampilan website yang menarik, dengan menggunakan  web company profile cms ', 'ini keyword aaaaaaaaaa', 'ini google anal aaaaaaaaaaa', 'ini effective measure aaaaaaa');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL DEFAULT '0',
  `site_offline` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 true , 1 offline',
  `offline_reason` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_offline`, `offline_reason`) VALUES
(1, 0, 'Site under maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birtdate` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `group` int(2) NOT NULL COMMENT '1=admin 0=user',
  `activate` int(2) NOT NULL COMMENT '1=aktive 0=nonactive',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `birtdate`, `username`, `password`, `email`, `address`, `image`, `group`, `activate`) VALUES
(1, 'Hendar', 'Rismanto', '2012-02-12', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'hendar.online@gmail.com', 'jl.Lembang Baru 1 RT.03 Rw.10', '6379.png', 1, 1),
(3, 'Anang', 'Ashanty', '2012-02-26', 'freehdr', 'f05fb4e729921b6ff769517a1d196ee3', 'hendar.online@gmail.com', 'kira-kira sepuluh menit lagi sampe nggak nieh', '8590.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `word_filter`
--

CREATE TABLE IF NOT EXISTS `word_filter` (
  `id` int(4) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(255) NOT NULL,
  `replace` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `word_filter`
--

INSERT INTO `word_filter` (`id`, `word`, `replace`) VALUES
(1, 'sex', 's**'),
(2, 'bangsat', 'bang***'),
(3, 'tai', 't**'),
(4, 'kontol', 'kon***'),
(5, 'fuck', 'fu**'),
(6, 'ngentot', 'ngen***'),
(7, 'anjing', 'anj****'),
(8, 'babi', 'ba**'),
(9, 'bego', 'be**'),
(10, 'belagu', 'bel***'),
(11, 'tolol', 'to***'),
(12, 'toket', 'tok**'),
(13, 'memek', 'mem**'),
(14, 'itil', 'it**'),
(15, 'upil', 'up**'),
(16, 'titit', 'tit**'),
(17, 'nonok', 'non**'),
(18, 'bajingan', 'baji****'),
(19, 'sialan', 'sia***'),
(20, 'bodoh', 'bod**'),
(21, 'meki', 'me**'),
(22, 'tunge', 'tun**'),
(23, 'sange', 'san**');
