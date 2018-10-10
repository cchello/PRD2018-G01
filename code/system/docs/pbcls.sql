-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2010 at 08:49 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pbcls`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
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
-- Dumping data for table `applications`
--


-- --------------------------------------------------------

--
-- Table structure for table `ban_emaillist`
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
-- Dumping data for table `ban_emaillist`
--

INSERT INTO `ban_emaillist` (`id`, `email`, `time`, `mark`) VALUES
(1, 'wngmngchng@hotmail.com', '2009-11-26 18:43:31', '违规发言次数较多'),
(4, 'wsm@163.com', '2009-11-30 18:46:13', '没有完成任何案例'),
(23, 'wsn@163.com', '2009-12-30 00:00:00', '乱发广告！'),
(24, 'lys@163.com', '2009-12-30 00:00:00', '测试');

-- --------------------------------------------------------

--
-- Table structure for table `ban_iplist`
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
-- Dumping data for table `ban_iplist`
--

INSERT INTO `ban_iplist` (`id`, `ip`, `time`, `mark`) VALUES
(1, '10.214.29.244', '2009-11-30 23:44:52', '有危险嫌疑！'),
(2, '10.10.0.22', '2009-11-30 17:44:42', '危险IP地址！'),
(4, '222.205.12.222', '2009-12-30 00:00:00', '测试');

-- --------------------------------------------------------

--
-- Table structure for table `ban_regnamelist`
--

DROP TABLE IF EXISTS `ban_regnamelist`;
CREATE TABLE IF NOT EXISTS `ban_regnamelist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `ban_regnamelist`
--

INSERT INTO `ban_regnamelist` (`id`, `name`, `mark`) VALUES
(4, '老师', '老师是特定的指导者！'),
(5, 'admin', '这个名称只能管理员使用！');

-- --------------------------------------------------------

--
-- Table structure for table `bbs_replys`
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
-- Dumping data for table `bbs_replys`
--


-- --------------------------------------------------------

--
-- Table structure for table `bbs_subjects`
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
-- Dumping data for table `bbs_subjects`
--


-- --------------------------------------------------------

--
-- Table structure for table `cases`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=17 ;

--
-- Dumping data for table `cases`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
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
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `dependencies`
--

DROP TABLE IF EXISTS `dependencies`;
CREATE TABLE IF NOT EXISTS `dependencies` (
  `caseid` int(11) NOT NULL,
  `predecessorid` int(11) NOT NULL,
  `successorid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`predecessorid`,`successorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dependencies`
--


-- --------------------------------------------------------

--
-- Table structure for table `evaluation_member`
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
-- Dumping data for table `evaluation_member`
--


-- --------------------------------------------------------

--
-- Table structure for table `evaluation_mutual`
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
-- Dumping data for table `evaluation_mutual`
--


-- --------------------------------------------------------

--
-- Table structure for table `evaluation_team`
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
-- Dumping data for table `evaluation_team`
--


-- --------------------------------------------------------

--
-- Table structure for table `inputs`
--

DROP TABLE IF EXISTS `inputs`;
CREATE TABLE IF NOT EXISTS `inputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `input` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `inputs`
--


-- --------------------------------------------------------

--
-- Table structure for table `instances`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `instances`
--


-- --------------------------------------------------------

--
-- Table structure for table `instance_role`
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
-- Dumping data for table `instance_role`
--


-- --------------------------------------------------------

--
-- Table structure for table `instance_task`
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
-- Dumping data for table `instance_task`
--


-- --------------------------------------------------------

--
-- Table structure for table `insTaskConfirm`
--

DROP TABLE IF EXISTS `insTaskConfirm`;
CREATE TABLE IF NOT EXISTS `insTaskConfirm` (
  `insId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `insTaskConfirm`
--


-- --------------------------------------------------------

--
-- Table structure for table `messages`
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
-- Dumping data for table `messages`
--


-- --------------------------------------------------------

--
-- Table structure for table `newsubmits`
--

DROP TABLE IF EXISTS `newsubmits`;
CREATE TABLE IF NOT EXISTS `newsubmits` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `instanceid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `submittime` datetime NOT NULL,
  `accepttime` datetime NOT NULL,
  `uploader` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;

--
-- Dumping data for table `newsubmits`
--


-- --------------------------------------------------------

--
-- Table structure for table `outputs`
--

DROP TABLE IF EXISTS `outputs`;
CREATE TABLE IF NOT EXISTS `outputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `output` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `outputs`
--


-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

DROP TABLE IF EXISTS `relations`;
CREATE TABLE IF NOT EXISTS `relations` (
  `caseid` int(11) NOT NULL,
  `childid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`childid`,`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `relations`
--


-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

DROP TABLE IF EXISTS `resources`;
CREATE TABLE IF NOT EXISTS `resources` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `resourceid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`taskid`,`resourceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `resources`
--


-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `caseid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `roles`
--


-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(32) CHARACTER SET latin1 NOT NULL,
  `session_last_access` int(10) unsigned DEFAULT NULL,
  `session_data` text CHARACTER SET latin1,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session_last_access`, `session_data`) VALUES
('30f863525675c6f1f82d3fd80f864c89', 1265459757, 'sess_last_access|i:1265459757;sess_ip_address|s:12:"10.214.29.11";sess_useragent|s:50:"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.3";sess_last_regenerated|i:1265459523;user_name|s:5:"admin";user_gid|s:1:"0";user_id|s:1:"1";score|s:3:"999";onlinetime|s:15:"0å°æ—¶0åˆ†0ç§’";grade|i:1;logintime|i:1265456666;'),
('31c1e642676b0834d2fcd100b7fbcbfc', 1265457781, 'sess_last_access|i:1265457781;sess_ip_address|s:12:"10.214.29.18";sess_useragent|s:7:"DavClnt";sess_last_regenerated|i:1265457781;'),
('bffb07e7a23eb12263d164e5dab92762', 1265460019, 'sess_last_access|i:1265460019;sess_ip_address|s:9:"127.0.0.1";sess_useragent|s:50:"Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.9.1.3";sess_last_regenerated|i:1265460012;user_name|s:5:"admin";user_gid|s:1:"0";user_id|s:1:"1";score|s:3:"999";onlinetime|s:16:"1å°æ—¶3åˆ†38ç§’";grade|i:1;logintime|i:1265460015;'),
('d98cf4047b14e63835e0210b804f3169', 1265457781, 'sess_last_access|i:1265457781;sess_ip_address|s:12:"10.214.29.18";sess_useragent|s:7:"DavClnt";sess_last_regenerated|i:1265457781;'),
('f632ac22576af9d11b2b57c0d1640cf0', 1265442589, 'sess_last_access|i:1265442589;sess_ip_address|s:12:"10.214.29.14";sess_useragent|s:50:"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap";sess_last_regenerated|i:1265442553;user_name|s:5:"admin";user_gid|s:1:"0";user_id|s:1:"1";score|s:3:"999";onlinetime|s:15:"0å°æ—¶0åˆ†0ç§’";grade|i:1;logintime|i:1265442576;');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
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
  `WBS` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`caseid`,`taskid`),
  KEY `caseid` (`caseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `userInsRole`
--

DROP TABLE IF EXISTS `userInsRole`;
CREATE TABLE IF NOT EXISTS `userInsRole` (
  `userId` int(10) NOT NULL,
  `insId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `applyTime` datetime NOT NULL,
  `handleTime` datetime NOT NULL,
  PRIMARY KEY (`userId`,`insId`,`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userInsRole`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `groupid` int(10) NOT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `registertime` datetime NOT NULL,
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `username`, `password`, `groupid`, `sex`, `registertime`, `interests`, `signature`, `qq`, `msn`, `email`, `homepage`, `unreadedmessages`, `finisheds`, `ongoings`, `onlinetime`, `score`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 0, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, 'admin@163.com', NULL, 0, 0, 0, 158, 999, 0),
(2, 'yangcheng', 'c4ca4238a0b923820dcc509a6f75849b', 1, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, 'yangcheng@163.com', NULL, 0, 0, 0, NULL, 1999, 1),
(3, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, 'user@163.com', NULL, 0, 10, 0, 80, 666, 1),
(4, 'xupengfey', 'c4ca4238a0b923820dcc509a6f75849b', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, 'xupengfey@163.com', NULL, 0, 5, 0, NULL, 555, 0),
(5, 'cendy', 'd964173dc44da83eeafa3aebbee9a1a0', 2, NULL, '2009-10-28 11:11:56', NULL, NULL, NULL, NULL, 'cendy@163.com', NULL, 0, 0, 0, 0, 777, 0),
(6, 'wmc', 'c4ca4238a0b923820dcc509a6f75849b', 2, 1, '2009-10-28 11:11:56', 'programming', 'wmc', '282743146', NULL, 'wmc@163.com', NULL, 1, 55, 0, 23, 999, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_instance`
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
-- Dumping data for table `user_instance`
--

