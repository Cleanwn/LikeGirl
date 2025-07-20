-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2024-11-07 21:51:27
-- 服务器版本： 5.7.44-log
-- PHP 版本： 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `LikeGirl v5.2.0`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

CREATE TABLE `about` (
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

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `articletext` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `articletime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `articletitle` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `articlename` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `diySet`
--

CREATE TABLE `diySet` (
  `id` int(11) NOT NULL,
  `headCon` text NOT NULL,
  `footerCon` text NOT NULL,
  `cssCon` text NOT NULL,
  `Pjaxkg` varchar(1) NOT NULL COMMENT 'pjax开关',
  `Blurkg` varchar(1) NOT NULL COMMENT '高斯模糊开关'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `diySet`
--

INSERT INTO `diySet` (`id`, `headCon`, `footerCon`, `cssCon`, `Pjaxkg`, `Blurkg`) VALUES
(1, '<!-- 这里可以嵌入自定义字体CDN加速地址 -->', '&lt;!--&lt;script src=&quot;https://img-love.kikiw.cn/jsxg/yh/yinghua.js&quot;&gt;&lt;/script&gt;--&gt;', '/* 这里可以写入自定义CSS样式内容 无需带 style 标签 */', '1', '1');

-- --------------------------------------------------------

--
-- 表的结构 `IPerror`
--

CREATE TABLE `IPerror` (
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

CREATE TABLE `leaving` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户名字',
  `QQ` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'QQ号码',
  `text` text COLLATE utf8_unicode_ci NOT NULL COMMENT '留言内容',
  `time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ip记录',
  `city` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '省/城市'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `leavSet`
--

CREATE TABLE `leavSet` (
  `id` int(11) NOT NULL,
  `jiequ` varchar(10) NOT NULL COMMENT '截取长度',
  `lanjie` varchar(500) NOT NULL COMMENT '违禁符号',
  `lanjiezf` varchar(500) NOT NULL COMMENT '违禁词'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `leavSet`
--

INSERT INTO `leavSet` (`id`, `jiequ`, `lanjie`, `lanjiezf`) VALUES
(1, '100', '`~!@#$^&*()=|{}\':;\',\\\\[\\\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“\'。，、？', '操垃圾傻逼妈');

-- --------------------------------------------------------

--
-- 表的结构 `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL COMMENT '登录用户名',
  `pw` char(32) NOT NULL COMMENT '登录密码'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `login`
--

INSERT INTO `login` (`id`, `user`, `pw`) VALUES
(1, 'admin', '6f87ada9b67a092b27bcaf094c31aa41');

-- --------------------------------------------------------

--
-- 表的结构 `loveImg`
--

CREATE TABLE `loveImg` (
  `id` int(11) NOT NULL,
  `imgDatd` varchar(100) NOT NULL COMMENT '日期',
  `imgText` varchar(200) NOT NULL COMMENT '描述',
  `imgUrl` varchar(200) NOT NULL COMMENT '外链'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 表的结构 `lovelist`
--

CREATE TABLE `lovelist` (
  `id` int(11) NOT NULL,
  `icon` int(1) NOT NULL COMMENT '是否完成',
  `eventname` varchar(200) CHARACTER SET utf8mb4 NOT NULL COMMENT '事件内容',
  `imgurl` varchar(300) COLLATE utf8_unicode_ci NOT NULL COMMENT '图片地址'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `boy` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '男name',
  `girl` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '女name',
  `title` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站标题',
  `logo` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站logo',
  `writing` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '网站文案',
  `boyimg` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '男QQ',
  `girlimg` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '女QQ',
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `text`
--

INSERT INTO `text` (`id`, `boy`, `girl`, `title`, `logo`, `writing`, `boyimg`, `girlimg`, `startTime`, `icp`, `Copyright`, `card1`, `card2`, `card3`, `deci1`, `deci2`, `deci3`, `bgimg`, `userQQ`, `userName`, `Animation`) VALUES
(1, 'Ki', 'Li', 'Like_Girl v5.2.0', 'Like_Girl v5.2.0', '喜欢花 喜欢浪漫 喜欢你~', '647159607', '917640289', '2022-06-05T00:07', '粤ICP备2021037776号', 'Copyright © 2022 - 2024 Like_Girl All Rights Reserved.', '点点滴滴', '留言板', '关于我们', '有人愿意听你碎碎念念也很浪漫', '在这里写下我们的留言祝福', '我们之间认识的经历回忆', 'https://lovey.kikiw.cn/Style/img/Cover.webp', '3439780232', 'Ki', 1);

-- --------------------------------------------------------

--
-- 表的结构 `warning`
--

CREATE TABLE `warning` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL COMMENT 'ip地址',
  `gsd` varchar(50) NOT NULL COMMENT '归属地',
  `time` varchar(80) NOT NULL COMMENT '时间',
  `file` varchar(100) NOT NULL COMMENT '路径'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转储表的索引
--

--
-- 表的索引 `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `diySet`
--
ALTER TABLE `diySet`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `IPerror`
--
ALTER TABLE `IPerror`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `leaving`
--
ALTER TABLE `leaving`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `leavSet`
--
ALTER TABLE `leavSet`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `loveImg`
--
ALTER TABLE `loveImg`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `lovelist`
--
ALTER TABLE `lovelist`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `warning`
--
ALTER TABLE `warning`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `diySet`
--
ALTER TABLE `diySet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `IPerror`
--
ALTER TABLE `IPerror`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `leaving`
--
ALTER TABLE `leaving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `leavSet`
--
ALTER TABLE `leavSet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `loveImg`
--
ALTER TABLE `loveImg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `lovelist`
--
ALTER TABLE `lovelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `warning`
--
ALTER TABLE `warning`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
