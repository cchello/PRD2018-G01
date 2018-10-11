-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2010 年 02 月 25 日 09:24
-- 服务器版本: 5.1.41
-- PHP 版本: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `pbcls`
--

-- --------------------------------------------------------

--
-- 表的结构 `applications`
--

DROP TABLE IF EXISTS `applications`;
CREATE TABLE IF NOT EXISTS `applications` (
  `userid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `isindicator` tinyint(1) NOT NULL,
  `isobserver` tinyint(1) NOT NULL,
  `applytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ischecked` tinyint(1) NOT NULL,
  `isaccepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `applications`
--


-- --------------------------------------------------------

--
-- 表的结构 `ban_emaillist`
--

DROP TABLE IF EXISTS `ban_emaillist`;
CREATE TABLE IF NOT EXISTS `ban_emaillist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- 转存表中的数据 `ban_emaillist`
--

INSERT INTO `ban_emaillist` (`id`, `email`, `time`, `mark`) VALUES
(1, 'wngmngchng@hotmail.com', '2009-11-26 18:43:31', '违规发言次数较多'),
(4, 'wsm@163.com', '2009-11-30 18:46:13', '没有完成任何案例'),
(23, 'wsn@163.com', '2009-12-30 00:00:00', '乱发广告！'),
(24, 'lys@163.com', '2009-12-30 00:00:00', '测试');

-- --------------------------------------------------------

--
-- 表的结构 `ban_iplist`
--

DROP TABLE IF EXISTS `ban_iplist`;
CREATE TABLE IF NOT EXISTS `ban_iplist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ban_iplist`
--

INSERT INTO `ban_iplist` (`id`, `ip`, `time`, `mark`) VALUES
(1, '10.214.29.244', '2009-11-30 23:44:52', '有危险嫌疑！'),
(2, '10.10.0.22', '2009-11-30 17:44:42', '危险IP地址！'),
(4, '222.205.12.222', '2009-12-30 00:00:00', '测试');

-- --------------------------------------------------------

--
-- 表的结构 `ban_regnamelist`
--

DROP TABLE IF EXISTS `ban_regnamelist`;
CREATE TABLE IF NOT EXISTS `ban_regnamelist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `ban_regnamelist`
--

INSERT INTO `ban_regnamelist` (`id`, `name`, `mark`) VALUES
(4, '老师', '老师是特定的指导者！'),
(5, 'admin', '这个名称只能管理员使用！');

-- --------------------------------------------------------

--
-- 表的结构 `bbs_replys`
--

DROP TABLE IF EXISTS `bbs_replys`;
CREATE TABLE IF NOT EXISTS `bbs_replys` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectid` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `authorid` int(11) NOT NULL,
  `submittime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `bbs_replys`
--


-- --------------------------------------------------------

--
-- 表的结构 `bbs_subjects`
--

DROP TABLE IF EXISTS `bbs_subjects`;
CREATE TABLE IF NOT EXISTS `bbs_subjects` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `authorid` int(11) NOT NULL,
  `submittime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `caseid` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `replys` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `bbs_subjects`
--


-- --------------------------------------------------------

--
-- 表的结构 `cases`
--

DROP TABLE IF EXISTS `cases`;
CREATE TABLE IF NOT EXISTS `cases` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `casename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `creationtime` date DEFAULT NULL,
  `uploader` int(10) NOT NULL DEFAULT '1',
  `uploadtime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'OPEN or CLOSED',
  `instances` int(10) NOT NULL COMMENT 'The numbers of instance about the case',
  `maxinstances` int(10) NOT NULL,
  `activity` int(10) unsigned NOT NULL,
  `startedinstances` int(11) NOT NULL,
  `finishedinstances` int(10) unsigned NOT NULL COMMENT 'the number of finished instances',
  `casetype` tinyint(1) NOT NULL COMMENT '0==self_study;1==teach',
  `maxplayer` int(11) NOT NULL,
  `foldername` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `cases`
--

INSERT INTO `cases` (`uid`, `casename`, `description`, `author`, `email`, `version`, `creationtime`, `uploader`, `uploadtime`, `status`, `instances`, `maxinstances`, `activity`, `startedinstances`, `finishedinstances`, `casetype`, `maxplayer`, `foldername`) VALUES
(1, '软件工程教学、学习、交流系统', '项目管理与软件需求，作为软件工程当中最为重要的组成几个部分，已经引起业内人士的高度重视，项目管理和需求工程概念的提出，就是为了把软件工程化，以更有效地开发需求，开发软件并实现有效的管理。也作为一门新兴的课程在大学里开设。为了使教师能够把最新，最前沿的关于项目管理和需求工程的信息传播给学生；为了学生能够利用网络得到老师帮助；为了师生之间，同学之间能够充分交流，沟通心得。这个软件工程教学、学习、交流系统将提供这么一个平台。为教师和同学服务，也为项目管理，需求工程，统一建模等软件工程化课程的教学方法提供试验基地。', 'PBCLS', 'PBCLS@zju.edu.name', '1.0', '2010-01-15', 1, '2010-02-11 08:43:34', 0, 2, 0, 0, 0, 0, 0, 6, 'study'),
(2, 'cendyTestCase', 'just for test', 'cendy', 'cendymail@163.com', '0.1', '2010-02-23', 3, '2010-02-23 18:05:45', 0, 3, 10, 0, 0, 5, 0, 3, 'test');

-- --------------------------------------------------------

--
-- 表的结构 `chat_room`
--

DROP TABLE IF EXISTS `chat_room`;
CREATE TABLE IF NOT EXISTS `chat_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insId` int(10) NOT NULL,
  `time` int(32) unsigned NOT NULL,
  `senderId` int(10) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=151 ;

--
-- 转存表中的数据 `chat_room`
--

INSERT INTO `chat_room` (`id`, `insId`, `time`, `senderId`, `message`) VALUES
(141, 1, 1266744291, 3, '也没啥关系'),
(142, 1, 1266744306, 3, '总算弄好了'),
(143, 1, 1266744308, 3, 'ohyeah'),
(144, 1, 1266766583, 3, '哇咔咔'),
(145, 1, 1266766735, 3, 'kan ka '),
(146, 1, 1266766738, 3, 'heihei'),
(147, 1, 1266766775, 3, 'wakaka'),
(148, 5, 1266925172, 3, 'hello'),
(149, 5, 1266925179, 3, '??'),
(150, 5, 1266925387, 3, 'halo');

-- --------------------------------------------------------

--
-- 表的结构 `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cotent` text COLLATE utf8_unicode_ci NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `caseid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `comments`
--


-- --------------------------------------------------------

--
-- 表的结构 `dependencies`
--

DROP TABLE IF EXISTS `dependencies`;
CREATE TABLE IF NOT EXISTS `dependencies` (
  `caseid` int(11) NOT NULL,
  `predecessorid` int(11) NOT NULL,
  `successorid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`predecessorid`,`successorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `dependencies`
--

INSERT INTO `dependencies` (`caseid`, `predecessorid`, `successorid`) VALUES
(1, 0, 1),
(1, 1, 7),
(1, 2, 3),
(1, 2, 4),
(1, 3, 5),
(1, 4, 5),
(1, 5, 6),
(1, 7, 8),
(1, 8, 23),
(1, 9, 13),
(1, 10, 11),
(1, 11, 12),
(1, 14, 15),
(1, 15, 16),
(1, 16, 17),
(1, 17, 18),
(1, 20, 21),
(1, 21, 22),
(1, 23, 24),
(1, 24, 31),
(1, 25, 26),
(1, 26, 27),
(1, 27, 28),
(1, 28, 29),
(1, 29, 30),
(1, 31, 32),
(1, 32, 40),
(1, 33, 34),
(1, 33, 35),
(1, 34, 36),
(1, 35, 36),
(1, 36, 37),
(1, 37, 38),
(1, 38, 39),
(1, 40, 41),
(1, 41, 47),
(1, 42, 43),
(1, 43, 44),
(1, 44, 45),
(1, 45, 46),
(1, 47, 48),
(1, 48, 59),
(1, 49, 54),
(1, 50, 51),
(1, 51, 52),
(1, 52, 53),
(1, 55, 56),
(1, 56, 57),
(1, 57, 58),
(1, 59, 60),
(1, 60, 65),
(1, 61, 62),
(1, 62, 63),
(1, 63, 64),
(1, 65, 66),
(1, 66, 70),
(1, 67, 68),
(1, 68, 69),
(2, 0, 1),
(2, 1, 2),
(2, 2, 3),
(2, 2, 4),
(2, 3, 5),
(2, 4, 6),
(2, 5, 6),
(2, 6, 7);

-- --------------------------------------------------------

--
-- 表的结构 `evaluation_member`
--

DROP TABLE IF EXISTS `evaluation_member`;
CREATE TABLE IF NOT EXISTS `evaluation_member` (
  `instanceid` tinyint(10) DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL COMMENT '这里的taskid应该为milestone的ID',
  `roleid` tinyint(10) DEFAULT NULL,
  `userid` tinyint(10) DEFAULT NULL,
  `taskstartedtime` datetime DEFAULT NULL COMMENT '任务开始做的时间',
  `taskfinishedtime` datetime DEFAULT NULL COMMENT '任务结束的时间',
  `duetime` tinyint(10) DEFAULT NULL COMMENT '案例定义的要求完成的工期',
  `overduetime` int(10) DEFAULT '0' COMMENT '在每一个milestone阶段，每个人文档超时的时间的累积',
  `workday` int(10) DEFAULT '0' COMMENT '有效工作天数，每天累积超过30分钟为一个有效天数',
  `taskacceptedno` int(10) DEFAULT '0' COMMENT '任务通过审核时的审核次数',
  `updownno` int(10) DEFAULT '0' COMMENT '上传下载文件数量',
  `downno` int(10) DEFAULT '0' COMMENT '上传文件被下载次数',
  `bbsno` int(10) DEFAULT '0' COMMENT '提问或回复不同主题次数，即参与主题次数',
  `self_attitude` tinyint(10) DEFAULT NULL COMMENT '学习态度',
  `self_technique` tinyint(10) DEFAULT NULL COMMENT '专业能力',
  `self_communication` tinyint(10) DEFAULT NULL COMMENT '沟通能力',
  `self_cooperation` tinyint(10) NOT NULL COMMENT '协作能力',
  `self_achievement` tinyint(10) DEFAULT NULL COMMENT '取得成绩',
  `self_organization` tinyint(10) DEFAULT NULL COMMENT '如果角色是经理，则有组织能力这一项',
  `self_decision` tinyint(10) DEFAULT NULL COMMENT '如果角色是经理，则有决策能力这一项',
  `self_score` float(10,0) DEFAULT NULL COMMENT '自评得分',
  `self_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '自我综合评价',
  `self_expectation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学习展望',
  `manager_attitude` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——学习态度',
  `manager_technique` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——专业能力',
  `manager_communication` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——沟通能力',
  `manager_cooperation` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——协作能力',
  `manager_docpasstime` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——文档通过时间',
  `manager_docpassrate` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——文档通过率',
  `manager_doccorrectness` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——文档正确度',
  `manager_docinnovation` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——文档创新情况',
  `manager_docstyle` tinyint(10) DEFAULT '0' COMMENT '经理对组员评价中的——文档风格',
  `manager_score` float(10,0) DEFAULT '0' COMMENT '经理对组员评价中的——总得分',
  `manager_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '经理对组员评价中的——总体评价',
  `instructor_attitude` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的学习态度',
  `instructor_updownquantity` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的上传下载数量',
  `instructor_updownquality` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的上传下载质量',
  `instructor_bbsquantity` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的bbs讨论次数',
  `instructor_bbsquality` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的bbs讨论质量',
  `instructor_score` float(10,0) DEFAULT NULL COMMENT '指导老师对个人评价中的总体得分',
  `instructor_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '指导老师对个人评价中的总体评价'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='这个表用于存贮个人自评、经理对个人的评价和老师对个人的评价';

--
-- 转存表中的数据 `evaluation_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `evaluation_mutual`
--

DROP TABLE IF EXISTS `evaluation_mutual`;
CREATE TABLE IF NOT EXISTS `evaluation_mutual` (
  `instanceid` tinyint(10) DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `userid` tinyint(10) DEFAULT NULL,
  `touserid` tinyint(10) DEFAULT NULL,
  `roleid` tinyint(10) DEFAULT NULL,
  `attitude` tinyint(10) DEFAULT NULL,
  `technique` tinyint(10) DEFAULT NULL,
  `communication` tinyint(10) DEFAULT NULL,
  `cooperation` tinyint(10) DEFAULT NULL,
  `organization` tinyint(10) DEFAULT NULL,
  `decision` tinyint(10) DEFAULT NULL,
  `helpme` tinyint(10) DEFAULT NULL,
  `score` float(10,0) DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='此表存贮普通组员之间互评、组员对经理的评价信息。';

--
-- 转存表中的数据 `evaluation_mutual`
--


-- --------------------------------------------------------

--
-- 表的结构 `evaluation_team`
--

DROP TABLE IF EXISTS `evaluation_team`;
CREATE TABLE IF NOT EXISTS `evaluation_team` (
  `instanceid` tinyint(10) DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `updownno` int(10) DEFAULT '0' COMMENT '学员上传下载次数',
  `downno` int(10) DEFAULT '0' COMMENT '上传的文档被下载次数',
  `bbsno` int(10) DEFAULT '0' COMMENT 'BBS回帖大于10的主体数量',
  `startedtime` datetime DEFAULT NULL COMMENT '项目开始时间',
  `finishedtime` datetime DEFAULT NULL COMMENT '项目结束时间',
  `duetime` tinyint(10) DEFAULT '0' COMMENT '完成一个里程碑事件需要的时间',
  `overduetime` int(10) DEFAULT '0',
  `updownquantity` tinyint(10) DEFAULT NULL COMMENT '传上下载数量的得分',
  `updownquality` tinyint(10) DEFAULT NULL COMMENT '上传下载质量的得分',
  `bbsquantity` tinyint(10) DEFAULT NULL COMMENT 'bbs讨论次数的得分',
  `bbsquality` tinyint(10) DEFAULT NULL COMMENT 'bbs讨论质量的得分',
  `docpasstime` tinyint(10) DEFAULT NULL COMMENT '所有文档提交时间得分',
  `docinnovation` tinyint(10) DEFAULT NULL COMMENT '创新情况得分',
  `doccorrectness` tinyint(10) DEFAULT NULL COMMENT '正确情况得分',
  `docstyle` tinyint(10) DEFAULT NULL COMMENT '文档风格得分',
  `score` float(10,0) DEFAULT NULL COMMENT '总分',
  `mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述性评价'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='此表存贮指导老师对项目小组的整体评价';

--
-- 转存表中的数据 `evaluation_team`
--


-- --------------------------------------------------------

--
-- 表的结构 `inputs`
--

DROP TABLE IF EXISTS `inputs`;
CREATE TABLE IF NOT EXISTS `inputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `input` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `inputs`
--

INSERT INTO `inputs` (`caseid`, `taskid`, `fileid`, `input`) VALUES
(1, 2, 0, 'docs/项目描述.doc');

-- --------------------------------------------------------

--
-- 表的结构 `instances`
--

DROP TABLE IF EXISTS `instances`;
CREATE TABLE IF NOT EXISTS `instances` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caseid` int(10) unsigned NOT NULL,
  `instancename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creatorid` int(10) unsigned NOT NULL,
  `status` int(10) NOT NULL,
  `creationtime` datetime NOT NULL,
  `starttime` datetime NOT NULL,
  `finishtime` datetime NOT NULL,
  `progress` tinyint(4) DEFAULT '0',
  `acceptedinstructor` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `instances`
--

INSERT INTO `instances` (`uid`, `caseid`, `instancename`, `creatorid`, `status`, `creationtime`, `starttime`, `finishtime`, `progress`, `acceptedinstructor`) VALUES
(1, 1, 'hellcoming', 3, 3, '2010-02-11 08:45:21', '2010-02-11 13:29:28', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'newTest', 3, 3, '2010-02-23 06:57:56', '2010-02-23 07:09:29', '0000-00-00 00:00:00', 0, 0),
(3, 2, 'cendy_test_one', 3, 3, '2010-02-23 10:27:31', '2010-02-23 10:41:32', '0000-00-00 00:00:00', 0, 0),
(4, 2, 'cendy_test_two', 3, 3, '2010-02-23 10:42:06', '2010-02-23 10:42:16', '0000-00-00 00:00:00', 0, 0),
(5, 2, 'cendy_test_three', 3, 6, '2010-02-23 10:44:04', '2010-02-23 10:44:16', '2010-02-23 11:35:32', 100, 0);

-- --------------------------------------------------------

--
-- 表的结构 `instance_role`
--

DROP TABLE IF EXISTS `instance_role`;
CREATE TABLE IF NOT EXISTS `instance_role` (
  `instanceid` int(10) unsigned NOT NULL,
  `roleid` int(10) unsigned NOT NULL,
  `actorid` int(10) NOT NULL DEFAULT '-1' COMMENT 'the uid of the actor,99  means AI, 0 means instructor, 1 means PM',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT ' open | closed',
  PRIMARY KEY (`instanceid`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `instance_role`
--

INSERT INTO `instance_role` (`instanceid`, `roleid`, `actorid`, `status`) VALUES
(1, 0, -1, 1),
(1, 1, -1, 1),
(1, 2, 3, 1),
(1, 3, -1, 1),
(1, 4, 5, 1),
(1, 5, -1, 1),
(1, 6, -1, 1),
(2, 0, -1, 1),
(2, 1, 3, 1),
(2, 2, -1, 1),
(2, 3, -1, 1),
(2, 4, -1, 1),
(2, 5, -1, 1),
(2, 6, -1, 1),
(3, 0, -1, 1),
(3, 1, 3, 1),
(3, 2, -1, 1),
(3, 3, -1, 1),
(4, 0, -1, 1),
(4, 1, 3, 1),
(4, 2, -1, 1),
(4, 3, -1, 1),
(5, 0, -1, 1),
(5, 1, 3, 1),
(5, 2, -1, 1),
(5, 3, -1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `instance_task`
--

DROP TABLE IF EXISTS `instance_task`;
CREATE TABLE IF NOT EXISTS `instance_task` (
  `instanceid` int(10) unsigned NOT NULL,
  `taskid` int(10) unsigned NOT NULL,
  `status` int(10) NOT NULL,
  `starttime` datetime NOT NULL,
  `finishtime` datetime NOT NULL,
  `denies` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suggestions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`instanceid`,`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

--
-- 转存表中的数据 `instance_task`
--

INSERT INTO `instance_task` (`instanceid`, `taskid`, `status`, `starttime`, `finishtime`, `denies`, `reference`, `suggestions`) VALUES
(1, 1, 8, '0000-00-00 00:00:00', '2010-02-14 06:44:06', 1, NULL, NULL),
(1, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 6, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 7, 6, '2010-02-14 07:04:11', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 8, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 9, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 10, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 11, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 12, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 13, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 14, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 15, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 16, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 17, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 18, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 19, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 20, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 21, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 22, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 23, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 24, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 25, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 26, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 27, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 28, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 29, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 31, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 32, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 33, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 34, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 35, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 36, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 37, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 38, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 39, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 40, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 41, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 42, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 43, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 44, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 45, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 46, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 47, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 48, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 49, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 50, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 51, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 52, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 53, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 54, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 55, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 56, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 57, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 58, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 59, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 60, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 61, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 62, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 63, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 64, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 65, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 66, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 67, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 68, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 69, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(1, 70, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 1, 8, '2010-02-23 07:13:05', '2010-02-23 08:31:03', 0, NULL, NULL),
(2, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 6, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 7, 6, '2010-02-23 09:53:22', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 8, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 9, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 10, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 11, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 12, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 13, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 14, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 15, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 16, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 17, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 18, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 19, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 20, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 21, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 22, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 23, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 24, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 25, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 26, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 27, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 28, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 29, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 30, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 31, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 32, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 33, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 34, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 35, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 36, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 37, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 38, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 39, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 40, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 41, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 42, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 43, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 44, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 45, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 46, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 47, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 48, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 49, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 50, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 51, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 52, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 53, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 54, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 55, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 56, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 57, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 58, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 59, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 60, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 61, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 62, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 63, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 64, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 65, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 66, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 67, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 68, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 69, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(2, 70, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 6, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(3, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 1, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 2, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 3, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 4, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 5, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 6, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(4, 7, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, NULL, NULL),
(5, 1, 8, '2010-02-23 10:53:48', '2010-02-23 10:55:20', 0, NULL, NULL),
(5, 2, 8, '2010-02-23 10:57:08', '2010-02-23 10:57:35', 0, NULL, NULL),
(5, 3, 8, '2010-02-23 10:57:43', '2010-02-23 10:59:52', 0, NULL, NULL),
(5, 4, 8, '2010-02-23 10:57:49', '2010-02-23 11:02:47', 0, NULL, NULL),
(5, 5, 8, '2010-02-23 11:02:57', '2010-02-23 11:04:16', 0, NULL, NULL),
(5, 6, 8, '2010-02-23 11:04:28', '2010-02-23 11:05:43', 0, NULL, NULL),
(5, 7, 8, '2010-02-23 11:05:49', '2010-02-23 11:35:32', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `ins_task_confirm`
--

DROP TABLE IF EXISTS `ins_task_confirm`;
CREATE TABLE IF NOT EXISTS `ins_task_confirm` (
  `insId` int(10) NOT NULL,
  `taskId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `ins_task_confirm`
--

INSERT INTO `ins_task_confirm` (`insId`, `taskId`, `roleId`, `isConfirmed`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 1),
(5, 1, 1, 1),
(5, 2, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isreaded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `messages`
--


-- --------------------------------------------------------

--
-- 表的结构 `newsubmits`
--

DROP TABLE IF EXISTS `newsubmits`;
CREATE TABLE IF NOT EXISTS `newsubmits` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `instanceid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `standardfileid` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submittime` datetime NOT NULL,
  `accepttime` datetime NOT NULL,
  `uploader` int(11) NOT NULL,
  `uploaderCurRole` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `newsubmits`
--

INSERT INTO `newsubmits` (`uid`, `instanceid`, `taskid`, `standardfileid`, `status`, `path`, `file`, `submittime`, `accepttime`, `uploader`, `uploaderCurRole`) VALUES
(1, 1, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_1\\task_1CR-Ci6aNqlXUAUUEMLh7pAC.PDF', 'Support mathematical instruction in Web-based Learning using Object-Oriented Approach.PDF', '2010-02-13 07:13:08', '2010-02-14 06:31:45', 3, 0),
(2, 1, 1, 22, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_1\\task_1CR-pwko6AsuENOWult4XJa0.pdf', 'JSON教程.pdf', '2010-02-14 06:13:26', '2010-02-14 06:44:05', 3, 0),
(3, 2, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-2hOUv7kCm9DCKoahM6dy.pdf', 'Google code operation manual.pdf', '2010-02-23 07:17:54', '2010-02-23 07:24:55', 3, 1),
(16, 2, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-IMHq6d5kPdKCc6CKq84w.PDF', 'Support mathematical instruction in Web-based Learning using Object-Oriented Approach.PDF', '2010-02-23 07:53:42', '2010-02-23 07:53:46', 3, 1),
(17, 2, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-v6xppEsCleMBIlgzdQPO.pdf', 'Research on Case Learning System for Engineering Subject.pdf', '2010-02-23 07:56:16', '2010-02-23 07:56:20', 3, 1),
(18, 2, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-tGlnMdSgWf0QWsWCdFYi.pdf', 'Google code operation manual.pdf', '2010-02-23 08:02:09', '2010-02-23 08:02:14', 3, 1),
(19, 2, 1, 21, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-hDgghE1o6NXFxt5CbqSH.pdf', 'JSON教程.pdf', '2010-02-23 08:07:00', '2010-02-23 08:07:04', 3, 1),
(20, 2, 1, 22, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-RMyoL3INBzOdbTL0U6Kn.pdf', 'JSON教程.pdf', '2010-02-23 08:08:47', '2010-02-23 08:08:50', 3, 1),
(21, 2, 1, 22, 3, '.\\system\\application\\uploadedfile\\case_1\\ins_2\\task_1CR-eh0nSXmozfO0HMhr7JXp.pdf', 'JSON教程.pdf', '2010-02-23 08:09:50', '2010-02-23 08:09:54', 3, 1),
(22, 5, 1, 201, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_1CR-5OFolisY2HoddTXzokcC.pdf', 'JSON教程.pdf', '2010-02-23 10:54:38', '2010-02-23 10:54:42', 3, 1),
(23, 5, 2, 202, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_2CR-tehdbQdnkrQhxr57KwdW.pdf', 'Google code operation manual.pdf', '2010-02-23 10:57:27', '2010-02-23 10:57:29', 3, 1),
(24, 5, 3, 203, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_3CR-AWJSlu97dyiWYceSrUsF.pdf', 'Research on Case Learning System for Engineering Subject.pdf', '2010-02-23 10:58:43', '2010-02-23 10:59:34', 3, 2),
(25, 5, 4, 204, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_4CR-6AMvusFl8AzHuduOB7hf.pdf', 'JSON教程.pdf', '2010-02-23 11:00:48', '2010-02-23 11:01:22', 3, 3),
(26, 5, 4, 208, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_4CR-hbcWaYNIiTwsY1iNbjcS.pdf', 'Research on Case Learning System for Engineering Subject.pdf', '2010-02-23 11:01:50', '2010-02-23 11:02:06', 3, 3),
(27, 5, 5, 205, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_5CR-7LDKqEB9yzNLcSPPlDpR.pdf', 'JSON教程.pdf', '2010-02-23 11:03:23', '2010-02-23 11:04:07', 3, 2),
(28, 5, 6, 206, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_6CR-ncijwNKgmpCiYfjqCcyf.pdf', 'Google code operation manual.pdf', '2010-02-23 11:05:08', '2010-02-23 11:05:35', 3, 3),
(29, 5, 7, 207, 3, '.\\system\\application\\uploadedfile\\case_2\\ins_5\\task_7CR-V0UxZ31EbB3SddGgX6vj.pdf', 'Google code operation manual.pdf', '2010-02-23 11:06:07', '2010-02-23 11:06:23', 3, 3);

-- --------------------------------------------------------

--
-- 表的结构 `news_table`
--

DROP TABLE IF EXISTS `news_table`;
CREATE TABLE IF NOT EXISTS `news_table` (
  `insId` int(10) NOT NULL,
  `taskId` int(10) NOT NULL,
  `time` int(32) unsigned NOT NULL,
  `recRoleId` int(10) NOT NULL,
  `newsContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docId` int(10) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `news_table`
--

INSERT INTO `news_table` (`insId`, `taskId`, `time`, `recRoleId`, `newsContent`, `docId`) VALUES
(2, -1, 1266908993, -1, '项目创建者开始了工程！', -1),
(2, 1, 1266908993, -1, '项目已经开始，等待项目经理开始任务！', -1),
(2, 1, 1266908993, 1, '项目已经开始，等待您开始任务！', -1),
(2, 1, 1266909071, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(2, 1, 1266909071, 1, '项目经理已经确认开始任务，等待您的确认！', -1),
(2, 1, 1266909071, 2, '项目经理已经确认开始任务，等待您的确认！', -1),
(2, 1, 1266909071, 3, '项目经理已经确认开始任务，等待您的确认！', -1),
(2, 1, 1266909071, 4, '项目经理已经确认开始任务，等待您的确认！', -1),
(2, 1, 1266909208, 3, '您已经确认开始任务，等待其他负责人的确认！', -1),
(2, 1, 1266909209, -1, '任务负责人确认完毕，任务正式开始！', -1),
(2, 1, 1266911801, 1, '您已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待项目经理的确认', 17),
(2, 1, 1266911801, 1, 'Player1已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待您的确认', 17),
(2, 1, 1266911804, 1, '您已经通过了Player1上传的文档Research on Case Learning System for Engineering Subject.pdf', 17),
(2, 1, 1266911804, 1, '项目经理已经通过了您提交的文档Research on Case Learning System for Engineering Subject.pdf', 17),
(2, 1, 1266912153, 1, '您已经上传了文档Google code operation manual.pdf,等待项目经理的确认', 18),
(2, 1, 1266912153, 1, 'Player1已经上传了文档Google code operation manual.pdf,等待您的确认', 18),
(2, 1, 1266912158, 1, '您已经通过了Player1上传的文档Google code operation manual.pdf', 18),
(2, 1, 1266912158, 1, '项目经理已经通过了您提交的文档Google code operation manual.pdf', 18),
(2, 1, 1266912444, 1, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 19),
(2, 1, 1266912444, 1, 'Player1已经上传了文档JSON教程.pdf,等待您的确认', 19),
(2, 1, 1266912448, 1, '您已经通过了Player1上传的文档JSON教程.pdf', 19),
(2, 1, 1266912448, 1, '项目经理已经通过了您提交的文档JSON教程.pdf', 19),
(2, 1, 1266912551, 1, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 20),
(2, 1, 1266912551, 1, 'Player1已经上传了文档JSON教程.pdf,等待您的确认', 20),
(2, 1, 1266912554, 1, '您已经通过了Player1上传的文档JSON教程.pdf', 20),
(2, 1, 1266912554, 1, '项目经理已经通过了您提交的文档JSON教程.pdf', 20),
(2, 1, 1266912614, 1, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 21),
(2, 1, 1266912614, 1, 'Player1已经上传了文档JSON教程.pdf,等待您的确认', 21),
(2, 1, 1266912618, 1, '您已经通过了Player1上传的文档JSON教程.pdf', 21),
(2, 1, 1266912618, 1, '项目经理已经通过了您提交的文档JSON教程.pdf', 21),
(2, 1, 1266913887, -1, '项目经理已经结束了任务！', -1),
(2, 7, 1266913887, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(2, 7, 1266913887, 1, '任务准备就绪，等待您开始任务！', -1),
(2, 7, 1266918686, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(2, 7, 1266918770, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(2, 7, 1266918826, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(3, -1, 1266921716, -1, '项目创建者开始了工程！', -1),
(3, 1, 1266921716, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(3, 1, 1266921716, 1, '任务准备就绪，等待您开始任务！', -1),
(4, -1, 1266921760, -1, '项目创建者开始了工程！', -1),
(4, 1, 1266921760, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(4, 1, 1266921760, 1, '任务准备就绪，等待您开始任务！', -1),
(5, -1, 1266921880, -1, '项目创建者开始了工程！', -1),
(5, 1, 1266921880, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 1, 1266921880, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 1, 1266921960, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 1, 1266921960, 1, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 1, 1266922451, 3, '您已经确认开始任务，等待其他负责人的确认！', -1),
(5, 1, 1266922452, -1, '任务负责人确认完毕，任务正式开始！', -1),
(5, 1, 1266922503, 1, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 22),
(5, 1, 1266922503, 1, '项目经理已经上传了文档JSON教程.pdf,等待您的确认', 22),
(5, 1, 1266922506, 1, '您已经通过了项目经理上传的文档JSON教程.pdf', 22),
(5, 1, 1266922506, 1, '项目经理已经通过了您提交的文档JSON教程.pdf', 22),
(5, 1, 1266922507, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 1, 1266922507, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 1, 1266922544, -1, '项目经理已经结束了任务！', -1),
(5, 2, 1266922544, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 2, 1266922544, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 2, 1266922544, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 2, 1266922544, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 2, 1266922643, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 2, 1266922643, 1, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 2, 1266922651, 3, '您已经确认开始任务，等待其他负责人的确认！', -1),
(5, 2, 1266922652, -1, '任务负责人确认完毕，任务正式开始！', -1),
(5, 2, 1266922671, 1, '您已经上传了文档Google code operation manual.pdf,等待项目经理的确认', 23),
(5, 2, 1266922671, 1, '项目经理已经上传了文档Google code operation manual.pdf,等待您的确认', 23),
(5, 2, 1266922673, 1, '您已经通过了项目经理上传的文档Google code operation manual.pdf', 23),
(5, 2, 1266922673, 1, '项目经理已经通过了您提交的文档Google code operation manual.pdf', 23),
(5, 2, 1266922674, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 2, 1266922674, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 2, 1266922679, -1, '项目经理已经结束了任务！', -1),
(5, 3, 1266922679, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 3, 1266922679, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 4, 1266922679, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 4, 1266922680, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 3, 1266922680, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 3, 1266922680, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 4, 1266922680, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 4, 1266922680, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 3, 1266922687, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 3, 1266922687, 2, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 4, 1266922693, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 4, 1266922693, 3, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 3, 1266922747, 2, '您已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待项目经理的确认', 24),
(5, 3, 1266922747, 1, '软件工程师已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待您的确认', 24),
(5, 3, 1266922798, 1, '您已经通过了软件工程师上传的文档Research on Case Learning System for Engineering Subject.pdf', 24),
(5, 3, 1266922798, 2, '项目经理已经通过了您提交的文档Research on Case Learning System for Engineering Subject.pdf', 24),
(5, 3, 1266922799, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 3, 1266922799, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 3, 1266922816, -1, '项目经理已经结束了任务！', -1),
(5, 5, 1266922816, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 5, 1266922816, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 5, 1266922816, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 5, 1266922816, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 4, 1266922872, 3, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 25),
(5, 4, 1266922872, 1, '质量保证工程师已经上传了文档JSON教程.pdf,等待您的确认', 25),
(5, 4, 1266922906, 1, '您已经通过了质量保证工程师上传的文档JSON教程.pdf', 25),
(5, 4, 1266922906, 3, '项目经理已经通过了您提交的文档JSON教程.pdf', 25),
(5, 4, 1266922934, 3, '您已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待项目经理的确认', 26),
(5, 4, 1266922934, 1, '质量保证工程师已经上传了文档Research on Case Learning System for Engineering Subject.pdf,等待您的确认', 26),
(5, 4, 1266922950, 1, '您已经通过了质量保证工程师上传的文档Research on Case Learning System for Engineering Subject.pdf', 26),
(5, 4, 1266922950, 3, '项目经理已经通过了您提交的文档Research on Case Learning System for Engineering Subject.pdf', 26),
(5, 4, 1266922951, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 4, 1266922951, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 4, 1266922991, -1, '项目经理已经结束了任务！', -1),
(5, 6, 1266922991, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 6, 1266922991, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 6, 1266922991, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 6, 1266922991, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 5, 1266923001, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 5, 1266923001, 2, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 5, 1266923027, 2, '您已经上传了文档JSON教程.pdf,等待项目经理的确认', 27),
(5, 5, 1266923027, 1, '软件工程师已经上传了文档JSON教程.pdf,等待您的确认', 27),
(5, 5, 1266923071, 1, '您已经通过了软件工程师上传的文档JSON教程.pdf', 27),
(5, 5, 1266923071, 2, '项目经理已经通过了您提交的文档JSON教程.pdf', 27),
(5, 5, 1266923072, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 5, 1266923072, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 5, 1266923080, -1, '项目经理已经结束了任务！', -1),
(5, 6, 1266923080, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 6, 1266923080, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 6, 1266923081, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 6, 1266923081, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 6, 1266923092, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 6, 1266923092, 3, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 6, 1266923132, 3, '您已经上传了文档Google code operation manual.pdf,等待项目经理的确认', 28),
(5, 6, 1266923132, 1, '质量保证工程师已经上传了文档Google code operation manual.pdf,等待您的确认', 28),
(5, 6, 1266923159, 1, '您已经通过了质量保证工程师上传的文档Google code operation manual.pdf', 28),
(5, 6, 1266923159, 3, '项目经理已经通过了您提交的文档Google code operation manual.pdf', 28),
(5, 6, 1266923160, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 6, 1266923160, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 6, 1266923167, -1, '项目经理已经结束了任务！', -1),
(5, 7, 1266923167, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 7, 1266923167, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 7, 1266923167, -1, '任务准备就绪，等待项目经理开始任务！', -1),
(5, 7, 1266923167, 1, '任务准备就绪，等待您开始任务！', -1),
(5, 7, 1266923173, 1, '您已经开始任务，等待项目负责人的确认！', -1),
(5, 7, 1266923173, 3, '项目经理已经确认开始任务，等待您的确认！', -1),
(5, 7, 1266923191, 3, '您已经上传了文档Google code operation manual.pdf,等待项目经理的确认', 29),
(5, 7, 1266923191, 1, '质量保证工程师已经上传了文档Google code operation manual.pdf,等待您的确认', 29),
(5, 7, 1266923207, 1, '您已经通过了质量保证工程师上传的文档Google code operation manual.pdf', 29),
(5, 7, 1266923207, 3, '项目经理已经通过了您提交的文档Google code operation manual.pdf', 29),
(5, 7, 1266923208, 1, '所有文档准备就绪，等待您结束任务！', -1),
(5, 7, 1266923208, -1, '所有文档准备就绪，等待项目经理结束任务！', -1),
(5, 7, 1266923215, -1, '项目经理已经结束了任务！', -1),
(5, 7, 1266924320, -1, '项目经理已经结束了任务！', -1),
(5, 7, 1266924351, -1, '项目经理已经结束了任务！', -1),
(5, 7, 1266924425, -1, '项目经理已经结束了任务！', -1),
(5, 7, 1266924546, -1, '项目经理已经结束了任务！', -1),
(5, -1, 1266924546, -1, '工程结束！', -1),
(5, 7, 1266924674, -1, '项目经理已经结束了任务！', -1),
(5, -1, 1266924674, -1, '工程结束！', -1),
(5, 7, 1266924739, -1, '项目经理已经结束了任务！', -1),
(5, -1, 1266924739, -1, '工程结束！', -1),
(5, 7, 1266924807, -1, '项目经理已经结束了任务！', -1),
(5, -1, 1266924807, -1, '工程结束！', -1),
(5, 7, 1266924956, -1, '项目经理已经结束了任务！', -1),
(5, -1, 1266924956, -1, '工程结束！', -1);

-- --------------------------------------------------------

--
-- 表的结构 `outputs`
--

DROP TABLE IF EXISTS `outputs`;
CREATE TABLE IF NOT EXISTS `outputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `output` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `outputs`
--

INSERT INTO `outputs` (`caseid`, `taskid`, `fileid`, `output`) VALUES
(1, 2, 1, 'docs/范围与前景说明书.pdf'),
(1, 6, 2, 'docs/可行性研究报告.pdf'),
(1, 7, 2, 'docs/kexingxing.pdf'),
(1, 12, 3, 'docs/项目章程.pdf'),
(1, 16, 4, 'docs/WBS.mpp'),
(1, 18, 5, 'docs/项目总体计划.pdf'),
(1, 22, 6, 'docs/QA计划.pdf'),
(1, 23, 3, 'docs/项目章程.pdf'),
(1, 23, 5, 'docs/项目总体计划.pdf'),
(1, 23, 6, 'docs/QA计划.pdf'),
(1, 29, 7, 'docs/需求工程计划.pdf'),
(1, 31, 7, 'docs/需求工程计划.pdf'),
(1, 38, 8, 'docs/需求规格说明书.pdf'),
(1, 40, 8, 'docs/需求规格说明书.pdf'),
(1, 45, 9, 'docs/需求变更控制报告.pdf'),
(1, 47, 9, 'docs/需求变更控制报告.pdf'),
(1, 52, 10, 'docs/系统设计与实现计划.pdf'),
(1, 53, 11, 'docs/概要设计文档.pdf'),
(1, 59, 10, 'docs/系统设计与实现计划.pdf'),
(1, 59, 11, 'docs/概要设计文档.pdf'),
(1, 61, 12, 'docs/测试计划.pdf'),
(1, 62, 13, 'docs/安装部署计划.pdf'),
(1, 63, 14, 'docs/系统维护计划.pdf'),
(1, 64, 15, 'docs/培训计划.pdf'),
(1, 65, 12, 'docs/测试计划.pdf'),
(1, 65, 13, 'docs/安装部署计划.pdf'),
(1, 65, 14, 'docs/系统维护计划.pdf'),
(1, 65, 15, 'docs/培训计划.pdf'),
(1, 69, 16, 'docs/项目总结报告.pdf'),
(1, 70, 16, 'docs/项目总结报告.pdf'),
(1, 1, 21, 'docs/test1.pdf'),
(1, 1, 22, 'docs/test2.pdf'),
(2, 1, 201, 'feasibility_analysis_report.pdf'),
(2, 2, 202, 'requirement_analysis_report.pdf'),
(2, 3, 203, 'development_requirement_report'),
(2, 4, 204, 'test_plan.pdf'),
(2, 5, 205, 'code_resource.pdf'),
(2, 6, 206, 'bug_report_one.pdf'),
(2, 7, 207, 'bug_report_two.pdf'),
(2, 4, 208, 'unit_test_plan.pdf');

-- --------------------------------------------------------

--
-- 表的结构 `relations`
--

DROP TABLE IF EXISTS `relations`;
CREATE TABLE IF NOT EXISTS `relations` (
  `caseid` int(11) NOT NULL,
  `childid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`childid`,`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `relations`
--

INSERT INTO `relations` (`caseid`, `childid`, `parentid`) VALUES
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(1, 6, 1),
(1, 9, 8),
(1, 10, 9),
(1, 11, 9),
(1, 12, 9),
(1, 13, 8),
(1, 14, 13),
(1, 15, 13),
(1, 16, 13),
(1, 17, 13),
(1, 18, 13),
(1, 19, 8),
(1, 20, 19),
(1, 21, 19),
(1, 22, 19),
(1, 25, 24),
(1, 26, 24),
(1, 27, 24),
(1, 28, 24),
(1, 29, 24),
(1, 30, 24),
(1, 33, 32),
(1, 34, 32),
(1, 35, 32),
(1, 36, 32),
(1, 37, 32),
(1, 38, 32),
(1, 39, 32),
(1, 42, 41),
(1, 43, 41),
(1, 44, 41),
(1, 45, 41),
(1, 46, 41),
(1, 49, 48),
(1, 50, 49),
(1, 51, 49),
(1, 52, 49),
(1, 53, 49),
(1, 54, 48),
(1, 55, 54),
(1, 56, 54),
(1, 57, 54),
(1, 58, 54),
(1, 61, 60),
(1, 62, 60),
(1, 63, 60),
(1, 64, 60),
(1, 67, 66),
(1, 68, 66),
(1, 69, 66);

-- --------------------------------------------------------

--
-- 表的结构 `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `resourceid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`taskid`,`resourceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `resources`
--

INSERT INTO `resources` (`caseid`, `taskid`, `resourceid`) VALUES
(1, 1, 1),
(1, 1, 2),
(1, 1, 3),
(1, 1, 4),
(1, 2, 1),
(1, 3, 2),
(1, 4, 3),
(1, 5, 4),
(1, 6, 1),
(1, 8, 1),
(1, 8, 2),
(1, 8, 3),
(1, 8, 4),
(1, 8, 5),
(1, 8, 6),
(1, 9, 1),
(1, 9, 2),
(1, 9, 3),
(1, 9, 4),
(1, 9, 5),
(1, 9, 6),
(1, 10, 1),
(1, 11, 1),
(1, 11, 2),
(1, 11, 3),
(1, 11, 4),
(1, 11, 5),
(1, 11, 6),
(1, 12, 2),
(1, 13, 1),
(1, 13, 2),
(1, 13, 3),
(1, 13, 4),
(1, 14, 3),
(1, 15, 4),
(1, 16, 2),
(1, 17, 3),
(1, 18, 1),
(1, 19, 5),
(1, 19, 6),
(1, 20, 5),
(1, 21, 6),
(1, 22, 5),
(1, 24, 1),
(1, 24, 2),
(1, 24, 3),
(1, 24, 4),
(1, 24, 5),
(1, 24, 6),
(1, 25, 2),
(1, 26, 3),
(1, 27, 4),
(1, 28, 2),
(1, 29, 3),
(1, 30, 1),
(1, 30, 2),
(1, 30, 3),
(1, 30, 4),
(1, 30, 5),
(1, 30, 6),
(1, 32, 1),
(1, 32, 2),
(1, 32, 3),
(1, 32, 4),
(1, 32, 5),
(1, 32, 6),
(1, 33, 1),
(1, 33, 2),
(1, 33, 3),
(1, 33, 4),
(1, 33, 5),
(1, 33, 6),
(1, 34, 4),
(1, 35, 2),
(1, 36, 3),
(1, 37, 4),
(1, 38, 1),
(1, 38, 2),
(1, 38, 3),
(1, 38, 4),
(1, 38, 5),
(1, 38, 6),
(1, 39, 1),
(1, 39, 2),
(1, 39, 3),
(1, 39, 4),
(1, 39, 5),
(1, 39, 6),
(1, 41, 1),
(1, 41, 2),
(1, 41, 3),
(1, 41, 4),
(1, 41, 5),
(1, 41, 6),
(1, 42, 1),
(1, 42, 2),
(1, 42, 3),
(1, 42, 4),
(1, 42, 5),
(1, 42, 6),
(1, 43, 4),
(1, 44, 2),
(1, 45, 3),
(1, 46, 1),
(1, 46, 2),
(1, 46, 3),
(1, 46, 4),
(1, 46, 5),
(1, 46, 6),
(1, 48, 1),
(1, 48, 2),
(1, 48, 3),
(1, 48, 4),
(1, 48, 5),
(1, 48, 6),
(1, 49, 2),
(1, 49, 3),
(1, 49, 4),
(1, 50, 3),
(1, 51, 4),
(1, 52, 4),
(1, 53, 2),
(1, 54, 1),
(1, 54, 2),
(1, 54, 3),
(1, 54, 4),
(1, 54, 5),
(1, 54, 6),
(1, 55, 1),
(1, 55, 2),
(1, 55, 3),
(1, 55, 4),
(1, 55, 5),
(1, 55, 6),
(1, 56, 1),
(1, 56, 2),
(1, 56, 3),
(1, 56, 4),
(1, 56, 5),
(1, 56, 6),
(1, 57, 5),
(1, 57, 6),
(1, 58, 5),
(1, 58, 6),
(1, 60, 2),
(1, 60, 3),
(1, 60, 5),
(1, 60, 6),
(1, 61, 5),
(1, 62, 6),
(1, 63, 2),
(1, 64, 3),
(1, 66, 1),
(1, 66, 2),
(1, 66, 3),
(1, 66, 4),
(1, 66, 5),
(1, 66, 6),
(1, 67, 1),
(1, 67, 2),
(1, 67, 3),
(1, 67, 4),
(1, 67, 5),
(1, 67, 6),
(1, 68, 1),
(1, 68, 2),
(1, 68, 3),
(1, 68, 4),
(1, 68, 5),
(1, 68, 6),
(1, 69, 1),
(1, 69, 2),
(1, 69, 3),
(1, 69, 4),
(1, 69, 5),
(1, 69, 6),
(2, 1, 1),
(2, 2, 1),
(2, 3, 2),
(2, 4, 3),
(2, 5, 2),
(2, 6, 3),
(2, 7, 3);

-- --------------------------------------------------------

--
-- 表的结构 `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `caseid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `roles`
--

INSERT INTO `roles` (`caseid`, `roleid`, `role`, `rolename`) VALUES
(1, 0, 'instructor', '指导者'),
(1, 1, 'PM', 'Player1'),
(1, 2, 'DEVELOPER', 'Player2'),
(1, 3, 'DEVELOPER', 'Player3'),
(1, 4, 'DEVELOPER', 'Player4'),
(1, 5, 'TESTER', 'Player5'),
(1, 6, 'TESTER', 'Player6'),
(2, 0, 'instructor', '指导者'),
(2, 1, 'PM', '项目经理'),
(2, 2, 'software_developer', '软件工程师'),
(2, 3, 'QA', '质量保证工程师');

-- --------------------------------------------------------

--
-- 表的结构 `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(32) CHARACTER SET latin1 NOT NULL,
  `session_last_access` int(10) unsigned DEFAULT NULL,
  `session_data` text CHARACTER SET latin1,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_last_access`, `session_data`) VALUES
('719g3ur0mbsv7c768572jkj2c0', 1266932642, 'sess_last_access|i:1266932642;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266932642;'),
('b9thqpelbb6b16usscjbl9q7m6', 1266932341, 'sess_last_access|i:1266932341;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266932341;'),
('flgec4behpdlg3apjrgatu7vv7', 1266933545, 'sess_last_access|i:1266933545;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266933545;user_name|s:4:"user";user_gid|s:1:"2";user_id|s:1:"3";score|s:3:"666";onlinetime|s:16:"5å°æ—¶58åˆ†5ç§’";grade|i:3;logintime|i:1266920864;ins_id|i:5;'),
('hi5gseafroaclgtfhieahmj3s4', 1266933633, 'sess_last_access|i:1266933633;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266933545;user_name|s:4:"user";user_gid|s:1:"2";user_id|s:1:"3";score|s:3:"666";onlinetime|s:16:"5å°æ—¶58åˆ†5ç§’";grade|i:3;logintime|i:1266920864;ins_id|i:5;'),
('sp35d879lmjn121ucekf0flfv3', 1266932943, 'sess_last_access|i:1266932943;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266932943;'),
('t2o2kdvf35hrdukjcia9kjd5g0', 1266933244, 'sess_last_access|i:1266933244;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;";sess_last_regenerated|i:1266933244;');

-- --------------------------------------------------------

--
-- 表的结构 `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `caseid` int(10) unsigned NOT NULL,
  `taskid` int(10) NOT NULL,
  `taskname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `isparent` tinyint(1) NOT NULL,
  `ismilestone` tinyint(1) NOT NULL,
  `iscritical` tinyint(1) NOT NULL,
  `duration` int(10) unsigned NOT NULL,
  `earlystart` int(10) NOT NULL,
  `earlyfinish` int(10) NOT NULL,
  `latestart` int(10) NOT NULL,
  `latefinish` int(10) NOT NULL,
  `WBS` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`caseid`,`taskid`),
  KEY `caseid` (`caseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `tasks`
--

INSERT INTO `tasks` (`caseid`, `taskid`, `taskname`, `description`, `isparent`, `ismilestone`, `iscritical`, `duration`, `earlystart`, `earlyfinish`, `latestart`, `latefinish`, `WBS`) VALUES
(1, 1, '可行性分析', '', 1, 0, 1, 8, 0, 8, 0, 8, '1'),
(1, 2, '明确项目目标', '', 0, 0, 1, 2, 0, 2, 0, 2, '1.1'),
(1, 3, '分析现有系统', '', 0, 0, 1, 2, 2, 4, 2, 4, '1.2'),
(1, 4, '分析建议技术', '', 0, 0, 1, 2, 2, 4, 2, 4, '1.3'),
(1, 5, '分析经济可行性', '', 0, 0, 1, 2, 4, 6, 4, 6, '1.4'),
(1, 6, '编写《项目可行性报告》', '', 0, 0, 1, 2, 6, 8, 6, 8, '1.5'),
(1, 7, '可行性分析完成', '', 0, 1, 1, 0, 8, 8, 8, 8, '2'),
(1, 8, '总体项目计划', '', 1, 0, 1, 11, 8, 19, 8, 19, '3'),
(1, 9, '制定项目章程', '', 1, 0, 1, 4, 8, 12, 8, 12, '3.1'),
(1, 10, '填写项目章程表格', '', 0, 0, 1, 1, 8, 9, 8, 9, '3.1.1'),
(1, 11, '项目干系人许可', '', 0, 0, 1, 1, 9, 10, 9, 10, '3.1.2'),
(1, 12, '编制《项目章程》', '', 0, 0, 1, 2, 10, 12, 10, 12, '3.1.3'),
(1, 13, '制定项目总体计划', '', 1, 0, 1, 7, 12, 19, 12, 19, '3.2'),
(1, 14, '定义工作内容', '', 0, 0, 1, 1, 12, 13, 12, 13, '3.2.1'),
(1, 15, '明确验收标准', '', 0, 0, 1, 1, 13, 14, 13, 14, '3.2.2'),
(1, 16, '任务分解', '', 0, 0, 1, 2, 14, 16, 14, 16, '3.2.3'),
(1, 17, '划分组织和责任', '', 0, 0, 1, 1, 16, 17, 16, 17, '3.2.4'),
(1, 18, '编制《项目总体计划》', '', 0, 0, 1, 2, 17, 19, 17, 19, '3.2.5'),
(1, 19, '制定QA计划', '', 1, 0, 1, 4, 8, 12, 8, 12, '3.3'),
(1, 20, '项目风险分析', '', 0, 0, 1, 1, 8, 9, 8, 9, '3.3.1'),
(1, 21, '明确质量规范', '', 0, 0, 1, 1, 9, 10, 9, 10, '3.3.2'),
(1, 22, '编制《QA计划》', '', 0, 0, 1, 2, 10, 12, 10, 12, '3.3.3'),
(1, 23, '总体项目计划完成', '', 0, 1, 1, 0, 19, 19, 19, 19, '4'),
(1, 24, '需求计划', '', 1, 0, 1, 12, 19, 31, 19, 31, '5'),
(1, 25, '需求进度计划', '', 0, 0, 1, 2, 19, 21, 19, 21, '5.1'),
(1, 26, '费用成本估计', '', 0, 0, 1, 2, 21, 23, 21, 23, '5.2'),
(1, 27, '人力资源分配', '', 0, 0, 1, 2, 23, 25, 23, 25, '5.3'),
(1, 28, '变更管理计划', '', 0, 0, 1, 2, 25, 27, 25, 27, '5.4'),
(1, 29, '制定《需求工程计划》', '', 0, 0, 1, 3, 27, 30, 27, 30, '5.5'),
(1, 30, '计划评审', '', 0, 0, 1, 1, 30, 31, 30, 31, '5.6'),
(1, 31, '需求计划完成', '', 0, 1, 1, 0, 31, 31, 31, 31, '6'),
(1, 32, '需求分析', '', 1, 0, 1, 17, 31, 48, 31, 48, '7'),
(1, 33, '客户会议', '', 0, 0, 1, 5, 31, 36, 31, 36, '7.1'),
(1, 34, '绘制关联图', '', 0, 0, 1, 2, 36, 38, 36, 38, '7.2'),
(1, 35, '确定需求优先级', '', 0, 0, 1, 2, 36, 38, 36, 38, '7.3'),
(1, 36, '建立需求模型', '', 0, 0, 1, 3, 38, 41, 38, 41, '7.4'),
(1, 37, '编写数据字典', '', 0, 0, 1, 3, 41, 44, 41, 44, '7.5'),
(1, 38, '编制《软件需求规格说明书》', '', 0, 0, 1, 3, 44, 47, 44, 47, '7.6'),
(1, 39, '需求评审', '', 0, 0, 1, 1, 47, 48, 47, 48, '7.7'),
(1, 40, '需求分析完成', '', 0, 1, 1, 0, 48, 48, 48, 48, '8'),
(1, 41, '需求变更', '', 1, 0, 1, 5, 48, 53, 48, 53, '9'),
(1, 42, '建立变更控制委员会', '', 0, 0, 1, 1, 48, 49, 48, 49, '9.1'),
(1, 43, '进行变更影响分析', '', 0, 0, 1, 1, 49, 50, 49, 50, '9.2'),
(1, 44, '确定变更控制过程', '', 0, 0, 1, 1, 50, 51, 50, 51, '9.3'),
(1, 45, '编制《软件需求变更文档》', '', 0, 0, 1, 1, 51, 52, 51, 52, '9.4'),
(1, 46, '需求变更评审', '', 0, 0, 1, 1, 52, 53, 52, 53, '9.5'),
(1, 47, '需求变更完成', '', 0, 1, 1, 0, 53, 53, 53, 53, '10'),
(1, 48, '系统设计与实现', '', 1, 0, 1, 33, 53, 86, 53, 86, '11'),
(1, 49, '系统设计', '', 1, 0, 1, 16, 53, 69, 53, 69, '11.1'),
(1, 50, '系统整体设计', '', 0, 0, 1, 5, 53, 58, 53, 58, '11.1.1'),
(1, 51, '模块设计', '', 0, 0, 1, 5, 58, 63, 58, 63, '11.1.2'),
(1, 52, '编制《系统设计与实现计划》', '', 0, 0, 1, 3, 63, 66, 63, 66, '11.1.3'),
(1, 53, '编制《软件概要说明》', '', 0, 0, 1, 3, 66, 69, 66, 69, '11.1.4'),
(1, 54, '系统实现', '', 1, 0, 1, 17, 69, 86, 69, 86, '11.2'),
(1, 55, '编写代码', '', 0, 0, 1, 7, 69, 76, 69, 76, '11.2.1'),
(1, 56, '代码自测', '', 0, 0, 1, 4, 76, 80, 76, 80, '11.2.2'),
(1, 57, '单元测试', '', 0, 0, 1, 3, 80, 83, 80, 83, '11.2.3'),
(1, 58, '集成测试', '', 0, 0, 1, 3, 83, 86, 83, 86, '11.2.4'),
(1, 59, '系统设计与实现完成', '', 0, 1, 1, 0, 86, 86, 86, 86, '12'),
(1, 60, '软件测试、部署、培训和维护', '', 1, 0, 1, 9, 86, 95, 86, 95, '13'),
(1, 61, '编制《测试计划》', '', 0, 0, 1, 2, 86, 88, 86, 88, '13.1'),
(1, 62, '编制《安装部署计划》', '', 0, 0, 1, 3, 88, 91, 88, 91, '13.2'),
(1, 63, '编制《培训计划》', '', 0, 0, 1, 2, 91, 93, 91, 93, '13.3'),
(1, 64, '编制《系统维护计划》', '', 0, 0, 1, 2, 93, 95, 93, 95, '13.4'),
(1, 65, '软件测试、部署、培训和维护完成', '', 0, 1, 1, 0, 95, 95, 95, 95, '14'),
(1, 66, '项目收尾', '', 1, 0, 1, 7, 95, 102, 95, 102, '15'),
(1, 67, '答辩与评价', '', 0, 0, 1, 2, 95, 97, 95, 97, '15.1'),
(1, 68, '经验总结', '', 0, 0, 1, 2, 97, 99, 97, 99, '15.2'),
(1, 69, '编制《项目总结报告》', '', 0, 0, 1, 3, 99, 102, 99, 102, '15.3'),
(1, 70, '项目完成', '', 0, 1, 1, 0, 102, 102, 102, 102, '16'),
(2, 1, '可行性分析', '最初的可行性分析', 0, 1, 1, 7, 2, 4, 3, 4, '1.0'),
(2, 2, '需求分析', '最初的需求分析', 1, 1, 1, 8, 5, 13, 9, 14, '2.0'),
(2, 3, '开发需求分析', '软件工程师进行的需求分析', 0, 1, 1, 4, 11, 17, 12, 20, '3.0'),
(2, 4, '测试计划', '质量保证工程师进行测试计划的编写以及单元测试计划的编写', 0, 1, 1, 10, 20, 30, 23, 33, '4.0'),
(2, 5, '程序代码编写', '软件工程师编写代码', 0, 1, 1, 20, 30, 50, 25, 55, '5.0'),
(2, 6, '阿尔法测试', '内部测试', 0, 1, 1, 6, 50, 56, 52, 58, '6.0'),
(2, 7, 'beta测试', '外部测试', 0, 1, 1, 6, 70, 76, 78, 84, '7.0');

-- --------------------------------------------------------

--
-- 表的结构 `userinsrole`
--

DROP TABLE IF EXISTS `userinsrole`;
CREATE TABLE IF NOT EXISTS `userinsrole` (
  `userId` int(10) NOT NULL,
  `insId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `applyTime` datetime NOT NULL,
  `handleTime` datetime NOT NULL,
  PRIMARY KEY (`userId`,`insId`,`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `userinsrole`
--

INSERT INTO `userinsrole` (`userId`, `insId`, `roleId`, `status`, `applyTime`, `handleTime`) VALUES
(5, 1, 4, 5, '2010-02-21 06:34:21', '2010-02-21 06:34:36');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupid` int(10) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `registertime` datetime NOT NULL,
  `portraitpath` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `interests` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unreadedmessages` int(10) unsigned NOT NULL,
  `finisheds` int(10) unsigned NOT NULL,
  `ongoings` int(10) unsigned NOT NULL,
  `onlinetime` bigint(20) DEFAULT NULL,
  `score` int(32) DEFAULT NULL COMMENT '用户在系统中的积分',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `groupid`, `sex`, `registertime`, `portraitpath`, `interests`, `signature`, `qq`, `msn`, `email`, `homepage`, `unreadedmessages`, `finisheds`, `ongoings`, `onlinetime`, `score`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, NULL, 'admin@163.com', NULL, 0, 0, 0, 2917, 999, 0),
(2, 'yangcheng', 'c4ca4238a0b923820dcc509a6f75849b', 1, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, NULL, 'yangcheng@163.com', NULL, 0, 0, 0, NULL, 1999, 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, NULL, 'user@163.com', NULL, 0, 10, 0, 17825, 666, 1),
(4, 'xupengfey', 'c4ca4238a0b923820dcc509a6f75849b', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, NULL, 'xupengfey@163.com', NULL, 0, 5, 0, NULL, 555, 0),
(5, 'cendy', 'd964173dc44da83eeafa3aebbee9a1a0', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, NULL, 'cendy@163.com', NULL, 0, 0, 0, 27, 777, 0),
(6, 'wmc', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, '2009-10-28 11:11:56', NULL, 'programming', 'wmc', '282743146', NULL, 'wmc@163.com', NULL, 1, 55, 0, 23, 999, 1);

-- --------------------------------------------------------

--
-- 表的结构 `user_instance`
--

DROP TABLE IF EXISTS `user_instance`;
CREATE TABLE IF NOT EXISTS `user_instance` (
  `userid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `rolegroup` int(11) NOT NULL COMMENT '1==pm,2==nomal player,3==indicator,4==observer',
  `accepttime` datetime NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  PRIMARY KEY (`userid`,`instanceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- 转存表中的数据 `user_instance`
--

INSERT INTO `user_instance` (`userid`, `instanceid`, `rolegroup`, `accepttime`, `isvalid`) VALUES
(3, 1, 2, '2010-02-20 08:18:03', 1),
(3, 2, 1, '2010-02-23 07:10:17', 1),
(3, 3, 1, '2010-02-23 10:35:18', 1),
(3, 4, 1, '2010-02-23 10:42:12', 1),
(5, 1, 2, '2010-02-21 06:34:36', 1);

DELIMITER $$
--
-- 存储过程
--
DROP PROCEDURE IF EXISTS `checkMessageNum`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `checkMessageNum`(IN insId INT, IN max INT)
BEGIN
		DECLARE num INT;
		DECLARE del INT;
		DECLARE delNum INT;
		DECLARE v INT;
		SET num = (SELECT COUNT(time) FROM chat_room WHERE insId = insId);
		IF num > max THEN
			SET delNum = num - max;
			SET v = 0;
			WHILE v < delNum DO
				SET del = (SELECT time FROM chat_room WHERE insId=insId ORDER BY time ASC LIMIT 1);
				DELETE FROM chat_room WHERE time=del;
				SET v = v+1;
			END WHILE;
		END IF;
	END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
