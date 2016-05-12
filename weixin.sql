-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-05-12 04:08:32
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `weixin`
--

-- --------------------------------------------------------

--
-- 表的结构 `fans`
--

CREATE TABLE IF NOT EXISTS `fans` (
  `fans_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '粉丝ID',
  `nickname` varchar(255) NOT NULL COMMENT '用户昵称',
  `city` varchar(255) NOT NULL COMMENT '用户城市',
  `open_id` varchar(1000) NOT NULL COMMENT 'OPENID',
  PRIMARY KEY (`fans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='粉丝信息表' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `fans`
--

INSERT INTO `fans` (`fans_id`, `nickname`, `city`, `open_id`) VALUES
(1, '轰轰轰轰轰', '杭州', 'oOruvwmw3jGOle2VHDC-VZBPHa4M'),
(3, 'A 采石头的小姑娘  ', '', 'oOruvwrFNYakx0JE7zbuwzye8ZCM');

-- --------------------------------------------------------

--
-- 表的结构 `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `member_id` int(255) NOT NULL AUTO_INCREMENT COMMENT '用户ID',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `name` varchar(255) NOT NULL COMMENT '姓名',
  `mobile` varchar(255) NOT NULL COMMENT '手机号',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `member`
--

INSERT INTO `member` (`member_id`, `username`, `password`, `name`, `mobile`) VALUES
(6, 'admin', '123456', '戴宇峰', '13345675467'),
(9, '思思', '123456', '熊熊', '13345678901'),
(10, '小飞龙', '123456', '大飞龙', '16658456666');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '消息ID',
  `fans_id` int(10) NOT NULL COMMENT '会员ID',
  `content` varchar(255) NOT NULL COMMENT '维修内容',
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='消息记录表' AUTO_INCREMENT=28 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`message_id`, `fans_id`, `content`, `create_time`) VALUES
(15, 1, '你好！', 1462956634),
(16, 1, '我也是醉了', 1462956645),
(17, 1, '你真的很不稳定啊', 1462956650),
(18, 1, '又没钱买收费版本', 1462956700),
(19, 1, '又没钱买收费版本', 1462956704),
(20, 1, '在吗', 1462980326),
(21, 1, '在吗', 1462980329),
(22, 1, '喂喂喂', 1462980333),
(23, 1, '你怎么才来', 1462980346),
(24, 1, '想死你了', 1462980352),
(25, 1, '滚滚滚→_→', 1462980360),
(26, 1, '可以的', 1463040016),
(27, 1, '听说你不想理我', 1463040047);

-- --------------------------------------------------------

--
-- 表的结构 `weixin_account`
--

CREATE TABLE IF NOT EXISTS `weixin_account` (
  `acid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `access_token` varchar(1000) NOT NULL DEFAULT '' COMMENT '存取凭证结构',
  `expires_out` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'access_token失效时间',
  PRIMARY KEY (`acid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='微信平台信息表' AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `weixin_account`
--

INSERT INTO `weixin_account` (`acid`, `access_token`, `expires_out`) VALUES
(1, 'IEfH05NpQStODqfjcpoXMJ9bAaUnbK6ZZWTNLokdIwa_mseBgWfOQI7K6HVU5bQz6kE6ktBGUAgGlTRiZ6DOgMGC6vXqqWMO9GcwCyzaC1L6WZv873Yw7pSDMazhvNdhUIAaAJAESK', 1463025616);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
