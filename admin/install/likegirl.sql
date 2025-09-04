-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2025-09-04 00:00:00
-- 服务器版本： 5.6.51-log
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `likegirl`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL COMMENT '标题',
  `aboutimg` varchar(100) NOT NULL COMMENT '背景图片',
  `info1` varchar(50) NOT NULL COMMENT '对话1',
  `info2` varchar(50) NOT NULL COMMENT '对话2',
  `info3` varchar(50) NOT NULL COMMENT '对话3',
  `btn1` varchar(30) NOT NULL COMMENT '按钮确定',
  `btn2` varchar(30) NOT NULL COMMENT '按钮取消',
  `infox1` varchar(30) NOT NULL COMMENT 'x2',
  `infox2` varchar(30) NOT NULL COMMENT 'x2',
  `infox3` varchar(30) NOT NULL COMMENT 'x2',
  `infox4` varchar(30) NOT NULL COMMENT 'x2',
  `infox5` varchar(30) NOT NULL COMMENT 'x2',
  `infox6` varchar(30) NOT NULL COMMENT 'x2',
  `btnx2` varchar(30) NOT NULL COMMENT 'btnx2',
  `infof1` varchar(30) NOT NULL COMMENT 'f3',
  `infof2` varchar(30) NOT NULL COMMENT 'f3',
  `infof3` varchar(30) NOT NULL COMMENT 'f3',
  `infof4` varchar(30) NOT NULL COMMENT 'f3',
  `btnf3` varchar(30) NOT NULL COMMENT 'btnf3',
  `infod1` varchar(30) NOT NULL COMMENT 'd4',
  `infod2` varchar(30) NOT NULL COMMENT 'd4',
  `infod3` varchar(30) NOT NULL COMMENT 'd4',
  `infod4` varchar(30) NOT NULL COMMENT 'd4',
  `infod5` varchar(30) NOT NULL COMMENT 'd4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`id`, `title`, `aboutimg`, `info1`, `info2`, `info3`, `btn1`, `btn2`, `infox1`, `infox2`, `infox3`, `infox4`, `infox5`, `infox6`, `btnx2`, `infof1`, `infof2`, `infof3`, `infof4`, `btnf3`, `infod1`, `infod2`, `infod3`, `infod4`, `infod5`) VALUES
(1, 'Ki_About', 'https://ice.frostsky.com/2024/11/06/570374efdc2bb75a8b722c969118afb5.webp', 'Hi, 欢迎你的来访', '愿得一人心 白首不相离', '记录日常生活 留住感动', '听我介绍', '结束介绍', '情侣小站Like Girl是 Ki 的原创项目', '在2022年暑假的假期最后几天里发布了1.0版本', '最新版本为 v5.2.0 亦是最终版本 目前已开源到码云', 'PHP确实是 “世界上最好的语言”  我非常喜欢（痛苦', '在开发过程中遇到了许多奇葩问题 也是只能自己探索解决...', '喜欢探索编程领域 热爱学习新知识 热爱开源文化', '为什么叫 Ki？', '不知道你有没有看过《比悲伤更悲伤的故事》', '嗨，我是k，如果有下辈子的话，', '“我想当戒指，眼镜，床和笔记本，这样的话，我就可以...”', '当然跟这个没有关系哈哈', '本站前端所有页面', '首页 index', '点点滴滴 little', '留言板 leaving', '关于 about', '欢迎您的来访 IP已记录 请尽情浏览本站～');

-- --------------------------------------------------------

--
-- 表的结构 `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL,
  `articletext` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `articletime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `articletitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `articlename` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `article`
--

INSERT INTO `article` (`id`, `articletext`, `articletime`, `articletitle`, `articlename`) VALUES
(1, '<quote>引用内容样式</quote>\r\n\r\n<hr>\r\n\r\n\r\n<h1>H1文字大小演示</h1>\r\n\r\n<hr>\r\n\r\n\r\n<h2>H2文字大小演示</h2>\r\n\r\n<hr>\r\n\r\n\r\n<h3>H3文字大小演示</h3>\r\n\r\n<hr>\r\n\r\n\r\n<h4>H4文字大小演示</h4>\r\n\r\n<hr>\r\n\r\n\r\n<h5>H5文字大小演示</h5>\r\n\r\n<hr>\r\n\r\n\r\n<h6>H6文字大小演示</h6>\r\n\r\n<hr>\r\n\r\n\r\n<b>加粗字体</b>\r\n<s>删除线字体</s>\r\n<i>斜体</i>\r\n<code>强调内容</code>\r\n\r\n<center>文本居中</center>\r\n\r\n\r\n<!--分割线-->\r\n<hr>\r\n<quote>插入图片</quote>\r\n<img alt="" src="Style/img/bgCover.png">\r\n<!--分割线-->\r\n<hr>\r\n<quote>插入视频</quote>\r\n\r\n<video src="https://blog.kikiw.cn/mp4/likegirltest.mp4" controls></video>\r\n\r\n<!--分割线-->\r\n<hr>', '2022-11-20', 'Like_Girl 默认文章语法', 'Ki.');

-- --------------------------------------------------------

--
-- 表的结构 `diyset`
--

CREATE TABLE IF NOT EXISTS `diyset` (
  `id` int(11) NOT NULL,
  `Blurkg` varchar(1) NOT NULL COMMENT '高斯模糊开关',
  `Pjaxkg` varchar(1) NOT NULL COMMENT 'pjax开关',
  `musickg` varchar(1) NOT NULL COMMENT '音乐播放器开关',
  `live2dkg` varchar(1) NOT NULL,
  `headCon` text NOT NULL,
  `cssCon` text NOT NULL,
  `footerCon` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `diyset`
--

INSERT INTO `diyset` (`id`, `Blurkg`, `Pjaxkg`, `musickg`, `live2dkg`, `headCon`, `cssCon`, `footerCon`) VALUES
(1, '1', '2', '2', '2', '', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `gifts`
--

CREATE TABLE IF NOT EXISTS `gifts` (
  `id` int(11) NOT NULL,
  `gift_name` varchar(255) NOT NULL COMMENT '礼物名称',
  `gift_description` text NOT NULL COMMENT '礼物描述',
  `gift_from` varchar(255) NOT NULL COMMENT '赠送人',
  `gift_price` decimal(10,2) NOT NULL COMMENT '礼物价格',
  `imgUrl` varchar(255) NOT NULL COMMENT '礼物图片URL',
  `gift_time` datetime DEFAULT NULL COMMENT '赠送时间'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COMMENT='礼物墙';

--
-- 转存表中的数据 `gifts`
--

INSERT INTO `gifts` (`id`, `gift_name`, `gift_description`, `gift_from`, `gift_price`, `imgUrl`, `gift_time`) VALUES
(1, 'Like_Girl 默认礼物', '礼物', 'Ki', '1.00', 'Style/img/bgCover.png', '2025-09-04 19:25:00');

-- --------------------------------------------------------

--
-- 表的结构 `iperror`
--

CREATE TABLE IF NOT EXISTS `iperror` (
  `id` int(11) NOT NULL,
  `ipAdd` varchar(100) NOT NULL COMMENT 'ip归属地',
  `Time` varchar(200) NOT NULL COMMENT '时间',
  `State` text NOT NULL COMMENT '拉黑ip',
  `text` varchar(100) NOT NULL COMMENT '备注'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `leaving`
--

CREATE TABLE IF NOT EXISTS `leaving` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名字',
  `QQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'QQ号码',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT '留言内容',
  `time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ip记录',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '省/城市'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `leaving`
--

INSERT INTO `leaving` (`id`, `name`, `QQ`, `text`, `time`, `ip`, `city`) VALUES
(1, 'Ki.', '3439780232', 'Like Girl 5.2.1-Stable 默认留言', '1756830249', '223.104.79.236', '广东');

-- --------------------------------------------------------

--
-- 表的结构 `leavset`
--

CREATE TABLE IF NOT EXISTS `leavset` (
  `id` int(11) NOT NULL,
  `jiequ` varchar(10) NOT NULL COMMENT '截取长度',
  `lanjie` varchar(500) NOT NULL COMMENT '违禁符号',
  `lanjiezf` varchar(500) NOT NULL COMMENT '违禁词'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `leavset`
--

INSERT INTO `leavset` (`id`, `jiequ`, `lanjie`, `lanjiezf`) VALUES
(1, '25', '`~!@#$^&*()=|{}'':;'',\\\\[\\\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“''。，、？', '草泥马');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL COMMENT '登录用户名',
  `username` varchar(100) NOT NULL,
  `userQQ` char(32) NOT NULL,
  `pw` char(32) NOT NULL COMMENT '登录密码'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id`, `user`, `username`, `userQQ`, `pw`) VALUES
(1, 'admin1', 'boy', '123456', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'admin2', 'girl', '654321', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- 表的结构 `loveimg`
--

CREATE TABLE IF NOT EXISTS `loveimg` (
  `id` int(11) NOT NULL,
  `imgDatd` varchar(100) NOT NULL COMMENT '日期',
  `imgText` varchar(200) NOT NULL COMMENT '描述',
  `imgUrl` varchar(200) NOT NULL COMMENT '外链'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `loveimg`
--

INSERT INTO `loveimg` (`id`, `imgDatd`, `imgText`, `imgUrl`) VALUES
(1, '2025-09-04', 'Like_Girl 默认相册', 'Style/img/bgCover.png');

-- --------------------------------------------------------

--
-- 表的结构 `lovelist`
--

CREATE TABLE IF NOT EXISTS `lovelist` (
  `id` int(11) NOT NULL,
  `icon` int(1) NOT NULL COMMENT '是否完成',
  `eventname` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT '事件内容',
  `imgurl` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `lovelist`
--

INSERT INTO `lovelist` (`id`, `icon`, `eventname`, `imgurl`) VALUES
(1, 0, '一起去电影院看一场电影🎬', '0');

-- --------------------------------------------------------

--
-- 表的结构 `picset`
--

CREATE TABLE IF NOT EXISTS `picset` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `api` varchar(100) NOT NULL,
  `accessKey` varchar(150) NOT NULL,
  `secretKey` varchar(150) NOT NULL,
  `album_id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `localpath` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `picset`
--

INSERT INTO `picset` (`id`, `name`, `api`, `accessKey`, `secretKey`, `album_id`, `type`, `localpath`) VALUES
(1, '', '', '', '', 0, '0', 'files');

-- --------------------------------------------------------

--
-- 表的结构 `picture`
--

CREATE TABLE IF NOT EXISTS `picture` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT '日期',
  `url` varchar(200) NOT NULL COMMENT '描述',
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `text`
--

CREATE TABLE IF NOT EXISTS `text` (
  `id` int(11) NOT NULL,
  `boy` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '男name',
  `girl` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '女name',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站标题',
  `logo` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站logo',
  `writing` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站文案',
  `boyQQ` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '男生QQ',
  `girlQQ` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '女生QQ',
  `customavatar` int(1) NOT NULL,
  `boyimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '男生QQ头像',
  `girlimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '女生QQ头像',
  `startTime` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '开始时间',
  `icp` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站备案号',
  `Copyright` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站版权',
  `card1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `card2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `card3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deci1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deci2` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `deci3` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bgimg` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '首页背景图片地址',
  `userQQ` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '站长QQ',
  `userName` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'userName',
  `Animation` int(1) NOT NULL COMMENT '动画开关'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `text`
--

INSERT INTO `text` (`id`, `boy`, `girl`, `title`, `logo`, `writing`, `boyQQ`, `girlQQ`, `customavatar`, `boyimg`, `girlimg`, `startTime`, `icp`, `Copyright`, `card1`, `card2`, `card3`, `deci1`, `deci2`, `deci3`, `bgimg`, `userQQ`, `userName`, `Animation`) VALUES
(1, 'boy', 'girl', 'Like_Girl', 'LikeGirl', '喜欢花 喜欢浪漫', '123456', '654321', 0, '', '', '2020-01-01T00:00', '', 'Copyright © 2022 - 2025 Like_Girl All Rights Reserved.', '点点滴滴', '留言板', '关于我们', '有人愿意听你碎碎念念也很浪漫', '在这里写下我们的留言祝福', '我们之间认识的经历回忆', 'Style/img/bgCover.png', '123456', 'boy', 1);

-- --------------------------------------------------------

--
-- 表的结构 `warning`
--

CREATE TABLE IF NOT EXISTS `warning` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL COMMENT 'ip地址',
  `gsd` varchar(50) NOT NULL COMMENT '归属地',
  `time` varchar(80) NOT NULL COMMENT '时间',
  `file` varchar(100) NOT NULL COMMENT '路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diyset`
--
ALTER TABLE `diyset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gifts`
--
ALTER TABLE `gifts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iperror`
--
ALTER TABLE `iperror`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaving`
--
ALTER TABLE `leaving`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leavset`
--
ALTER TABLE `leavset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loveimg`
--
ALTER TABLE `loveimg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lovelist`
--
ALTER TABLE `lovelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picset`
--
ALTER TABLE `picset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `warning`
--
ALTER TABLE `warning`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `diyset`
--
ALTER TABLE `diyset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gifts`
--
ALTER TABLE `gifts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `iperror`
--
ALTER TABLE `iperror`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leaving`
--
ALTER TABLE `leaving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `leavset`
--
ALTER TABLE `leavset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `loveimg`
--
ALTER TABLE `loveimg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `lovelist`
--
ALTER TABLE `lovelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `picset`
--
ALTER TABLE `picset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `warning`
--
ALTER TABLE `warning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
