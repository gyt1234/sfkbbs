-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2020-02-27 13:57:34
-- 服务器版本： 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfkbbs`
--

-- --------------------------------------------------------

--
-- 表的结构 `sfk_content`
--

CREATE TABLE `sfk_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL,
  `times` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_content`
--

INSERT INTO `sfk_content` (`id`, `module_id`, `title`, `content`, `time`, `member_id`, `times`) VALUES
(19, 16, '大尺度的纯电动', '多次重复的疯疯癫癫', '2020-02-26 21:44:15', 5, 0),
(15, 14, '<p>哈哈哈哈哈哈</p>3444411111', 'hythygtgtgttgtg111', '2020-02-23 14:37:29', 5, 2),
(14, 19, '<p>哈哈哈哈哈哈</p>222', '<h2>哈哈哈哈哈哈</h2>222', '2020-02-23 14:20:57', 5, 2);

-- --------------------------------------------------------

--
-- 表的结构 `sfk_father_module`
--

CREATE TABLE `sfk_father_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `module_name` varchar(66) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='父板块信息表';

--
-- 转存表中的数据 `sfk_father_module`
--

INSERT INTO `sfk_father_module` (`id`, `module_name`, `sort`) VALUES
(43, '篮球', 1),
(46, 'CBA', 2),
(44, 'NBA', 3),
(47, '足球', 4),
(48, '排球', 0),
(49, '高尔夫', 0);

-- --------------------------------------------------------

--
-- 表的结构 `sfk_info`
--

CREATE TABLE `sfk_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_info`
--

INSERT INTO `sfk_info` (`id`, `title`, `keywords`, `description`) VALUES
(1, 'sfkbbs', '私房库', '杀伤性动我无所谓群无所所无无所无次打次动次打次带点吃的付付付付111111');

-- --------------------------------------------------------

--
-- 表的结构 `sfk_manage`
--

CREATE TABLE `sfk_manage` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `create_time` datetime NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_manage`
--

INSERT INTO `sfk_manage` (`id`, `name`, `pw`, `create_time`, `level`) VALUES
(4, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-26 20:50:35', 0),
(3, '葛雅婷', 'e10adc3949ba59abbe56e057f20f883e', '2020-02-26 11:47:19', 1);

-- --------------------------------------------------------

--
-- 表的结构 `sfk_member`
--

CREATE TABLE `sfk_member` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(32) NOT NULL,
  `pw` varchar(32) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `register_time` datetime NOT NULL,
  `last_time` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_member`
--

INSERT INTO `sfk_member` (`id`, `name`, `pw`, `photo`, `register_time`, `last_time`) VALUES
(1, 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-02-11 17:11:35', NULL),
(2, 'user', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-02-11 17:12:11', NULL),
(3, 'user\'"', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-02-11 17:17:23', NULL),
(5, '葛雅婷', 'e10adc3949ba59abbe56e057f20f883e', 'uploads/2020/02/25/1863785e552bdf23faa905925998.jpg', '2020-02-12 16:25:04', NULL),
(6, '葛宏盛', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-02-12 18:10:29', NULL),
(7, '小明', 'e10adc3949ba59abbe56e057f20f883e', NULL, '2020-02-12 18:13:11', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `sfk_reply`
--

CREATE TABLE `sfk_reply` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED NOT NULL,
  `quote_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_reply`
--

INSERT INTO `sfk_reply` (`id`, `content_id`, `quote_id`, `content`, `time`, `member_id`) VALUES
(1, 12, 0, 'dsdcdcdcdcdc', '2020-02-20 22:10:04', 5),
(2, 12, 0, 'dsdcddcdc', '2020-02-20 22:20:28', 5),
(3, 13, 0, '身份而给他扔给他如果突然', '2020-02-22 11:14:11', 5),
(4, 10, 0, '未发生的丰富的地方', '2020-02-22 11:28:15', 5),
(5, 10, 0, '问哦我的的的的', '2020-02-22 11:28:21', 5),
(6, 10, 0, '阿森松岛所多所多所', '2020-02-22 11:33:42', 5),
(7, 10, 0, '得得得所所多所', '2020-02-22 11:33:49', 5),
(8, 10, 0, '我的速度撒所群', '2020-02-22 11:33:54', 5),
(9, 10, 0, '单位的草地上问问', '2020-02-22 11:34:00', 5),
(10, 10, 0, '爽歪歪所多所多所多所', '2020-02-22 11:34:06', 5),
(11, 12, 0, '撒的得到', '2020-02-22 13:10:40', 5),
(12, 12, 0, '三十多岁多所菜单菜', '2020-02-22 13:10:47', 5),
(13, 12, 0, '失误失误所无', '2020-02-22 13:10:53', 5),
(14, 12, 0, '死亡诗社无群所', '2020-02-22 13:10:59', 5),
(15, 12, 2, '阿萨是是是西安市', '2020-02-22 13:16:43', 5),
(16, 12, 15, '外网的的的二所', '2020-02-22 13:18:08', 5),
(17, 13, 0, '我的我的多所', '2020-02-22 13:31:42', 5),
(18, 13, 0, '失误失误多所所多', '2020-02-22 13:31:49', 5),
(19, 13, 0, '维萨无所', '2020-02-22 13:31:57', 5),
(20, 13, 3, '阿迪王无多无多无', '2020-02-22 13:32:12', 5),
(21, 13, 17, '第五位多无无', '2020-02-22 13:32:20', 5),
(22, 3, 0, '打发打发辅导费', '2020-02-22 13:38:42', 5),
(23, 13, 3, 'sddedsde', '2020-02-22 13:40:12', 6),
(24, 4, 0, 'refrfrfre', '2020-02-22 14:12:54', 6);

-- --------------------------------------------------------

--
-- 表的结构 `sfk_son_module`
--

CREATE TABLE `sfk_son_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `father_module_id` int(11) NOT NULL,
  `module_name` varchar(66) NOT NULL,
  `info` varchar(255) NOT NULL,
  `member_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `sfk_son_module`
--

INSERT INTO `sfk_son_module` (`id`, `father_module_id`, `module_name`, `info`, `member_id`, `sort`) VALUES
(21, 46, 'assxsx', '多吃点是的是的', 0, 0),
(19, 46, '颠三倒四多所 ', '是是是', 0, 1),
(18, 46, '是是是畏首畏尾所', '我是说我所无', 0, 2),
(14, 43, '网桥', '打扫卫生无所', 0, 1),
(16, 44, '额的的二多', '额外的多无所无', 0, 3),
(17, 44, '我问问所', '为等待无无所', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sfk_content`
--
ALTER TABLE `sfk_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_father_module`
--
ALTER TABLE `sfk_father_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_info`
--
ALTER TABLE `sfk_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_manage`
--
ALTER TABLE `sfk_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_member`
--
ALTER TABLE `sfk_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_reply`
--
ALTER TABLE `sfk_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfk_son_module`
--
ALTER TABLE `sfk_son_module`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `sfk_content`
--
ALTER TABLE `sfk_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `sfk_father_module`
--
ALTER TABLE `sfk_father_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- 使用表AUTO_INCREMENT `sfk_info`
--
ALTER TABLE `sfk_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用表AUTO_INCREMENT `sfk_manage`
--
ALTER TABLE `sfk_manage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `sfk_member`
--
ALTER TABLE `sfk_member`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `sfk_reply`
--
ALTER TABLE `sfk_reply`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `sfk_son_module`
--
ALTER TABLE `sfk_son_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
