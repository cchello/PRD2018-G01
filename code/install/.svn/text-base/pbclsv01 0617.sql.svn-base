/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : pbclsv01

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2010-06-17 12:18:32
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `applications`
-- ----------------------------
DROP TABLE IF EXISTS `applications`;
CREATE TABLE `applications` (
  `userid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `isindicator` tinyint(1) NOT NULL,
  `isobserver` tinyint(1) NOT NULL,
  `applytime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ischecked` tinyint(1) NOT NULL,
  `isaccepted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of applications
-- ----------------------------

-- ----------------------------
-- Table structure for `ban_emaillist`
-- ----------------------------
DROP TABLE IF EXISTS `ban_emaillist`;
CREATE TABLE `ban_emaillist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ban_emaillist
-- ----------------------------
INSERT INTO `ban_emaillist` VALUES ('1', 'wngmngchng@hotmail.com', '2009-11-26 18:43:31', '违规发言次数较多');
INSERT INTO `ban_emaillist` VALUES ('4', 'wsm@163.com', '2009-11-30 18:46:13', '没有完成任何案例');
INSERT INTO `ban_emaillist` VALUES ('23', 'wsn@163.com', '2009-12-30 00:00:00', '乱发广告！');
INSERT INTO `ban_emaillist` VALUES ('24', 'lys@163.com', '2009-12-30 00:00:00', '测试');

-- ----------------------------
-- Table structure for `ban_iplist`
-- ----------------------------
DROP TABLE IF EXISTS `ban_iplist`;
CREATE TABLE `ban_iplist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `ip` varchar(32) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ban_iplist
-- ----------------------------
INSERT INTO `ban_iplist` VALUES ('1', '10.214.29.244', '2009-11-30 23:44:52', '有危险嫌疑！');
INSERT INTO `ban_iplist` VALUES ('2', '10.10.0.22', '2009-11-30 17:44:42', '危险IP地址！');
INSERT INTO `ban_iplist` VALUES ('4', '222.205.12.222', '2009-12-30 00:00:00', '测试');

-- ----------------------------
-- Table structure for `ban_regnamelist`
-- ----------------------------
DROP TABLE IF EXISTS `ban_regnamelist`;
CREATE TABLE `ban_regnamelist` (
  `id` int(32) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `mark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ban_regnamelist
-- ----------------------------
INSERT INTO `ban_regnamelist` VALUES ('4', '老师', '老师是特定的指导者！');
INSERT INTO `ban_regnamelist` VALUES ('5', 'admin', '这个名称只能管理员使用！');

-- ----------------------------
-- Table structure for `bbs_replys`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_replys`;
CREATE TABLE `bbs_replys` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `subjectid` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `authorid` int(11) NOT NULL,
  `submittime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_replys
-- ----------------------------

-- ----------------------------
-- Table structure for `bbs_subjects`
-- ----------------------------
DROP TABLE IF EXISTS `bbs_subjects`;
CREATE TABLE `bbs_subjects` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `authorid` int(11) NOT NULL,
  `submittime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `caseid` int(11) NOT NULL,
  `clicks` int(11) NOT NULL,
  `replys` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of bbs_subjects
-- ----------------------------

-- ----------------------------
-- Table structure for `cases`
-- ----------------------------
DROP TABLE IF EXISTS `cases`;
CREATE TABLE `cases` (
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of cases
-- ----------------------------
INSERT INTO `cases` VALUES ('8', 'DS_Project_1_Performance Measurement', '', 'PBCLS', 'PBCLS@zju.edu.name', '1.0', '2010-03-02', '1', '2010-06-11 08:42:17', '0', '2', '0', '0', '0', '0', '0', '3', 'DS_Project_1_Performance Measurement');
INSERT INTO `cases` VALUES ('9', 'DS_Project_2_Sort Poems', '', 'PBCLS', 'PBCLS@zju.edu.name', '1.0', '2010-03-02', '1', '2010-06-13 00:54:46', '0', '0', '0', '0', '0', '0', '0', '3', 'DS_Project_2_Sort Poems');

-- ----------------------------
-- Table structure for `chat_room`
-- ----------------------------
DROP TABLE IF EXISTS `chat_room`;
CREATE TABLE `chat_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insId` int(10) NOT NULL,
  `time` int(32) unsigned NOT NULL,
  `senderId` int(10) NOT NULL,
  `message` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chat_room
-- ----------------------------

-- ----------------------------
-- Table structure for `comments`
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cotent` text COLLATE utf8_unicode_ci NOT NULL,
  `author` int(10) unsigned NOT NULL,
  `caseid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `posttime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of comments
-- ----------------------------

-- ----------------------------
-- Table structure for `dependencies`
-- ----------------------------
DROP TABLE IF EXISTS `dependencies`;
CREATE TABLE `dependencies` (
  `caseid` int(11) NOT NULL,
  `predecessorid` int(11) NOT NULL,
  `successorid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`predecessorid`,`successorid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of dependencies
-- ----------------------------
INSERT INTO `dependencies` VALUES ('8', '0', '1');
INSERT INTO `dependencies` VALUES ('8', '0', '2');
INSERT INTO `dependencies` VALUES ('8', '1', '3');
INSERT INTO `dependencies` VALUES ('8', '2', '3');
INSERT INTO `dependencies` VALUES ('9', '0', '1');
INSERT INTO `dependencies` VALUES ('9', '0', '2');
INSERT INTO `dependencies` VALUES ('9', '1', '3');
INSERT INTO `dependencies` VALUES ('9', '2', '3');

-- ----------------------------
-- Table structure for `evaluation_member`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_member`;
CREATE TABLE `evaluation_member` (
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

-- ----------------------------
-- Records of evaluation_member
-- ----------------------------

-- ----------------------------
-- Table structure for `evaluation_mutual`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_mutual`;
CREATE TABLE `evaluation_mutual` (
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

-- ----------------------------
-- Records of evaluation_mutual
-- ----------------------------

-- ----------------------------
-- Table structure for `evaluation_team`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_team`;
CREATE TABLE `evaluation_team` (
  `instanceid` tinyint(10) DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `updownno` int(10) DEFAULT '0' COMMENT '学员上传下载次数',
  `downno` int(10) DEFAULT '0' COMMENT '上传的文档被下载次数',
  `bbsno` int(10) DEFAULT '0' COMMENT 'BBS回帖大于10的主体数量',
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

-- ----------------------------
-- Records of evaluation_team
-- ----------------------------

-- ----------------------------
-- Table structure for `inputs`
-- ----------------------------
DROP TABLE IF EXISTS `inputs`;
CREATE TABLE `inputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `input` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of inputs
-- ----------------------------
INSERT INTO `inputs` VALUES ('8', '1', '0', 'P1.pdf');
INSERT INTO `inputs` VALUES ('8', '2', '0', 'P1.pdf');
INSERT INTO `inputs` VALUES ('8', '3', '3', 'Requirements.doc');
INSERT INTO `inputs` VALUES ('9', '1', '0', 'P2.pdf');
INSERT INTO `inputs` VALUES ('9', '2', '0', 'P2.pdf');
INSERT INTO `inputs` VALUES ('9', '3', '3', 'Requirements.doc');

-- ----------------------------
-- Table structure for `ins_task_confirm`
-- ----------------------------
DROP TABLE IF EXISTS `ins_task_confirm`;
CREATE TABLE `ins_task_confirm` (
  `insId` int(10) NOT NULL,
  `taskId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `isConfirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ins_task_confirm
-- ----------------------------

-- ----------------------------
-- Table structure for `instance_role`
-- ----------------------------
DROP TABLE IF EXISTS `instance_role`;
CREATE TABLE `instance_role` (
  `instanceid` int(10) unsigned NOT NULL,
  `roleid` int(10) unsigned NOT NULL,
  `actorid` int(10) NOT NULL DEFAULT '-1' COMMENT 'the uid of the actor,99  means AI, 0 means instructor, 1 means PM',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT ' open | closed',
  PRIMARY KEY (`instanceid`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of instance_role
-- ----------------------------

-- ----------------------------
-- Table structure for `instance_task`
-- ----------------------------
DROP TABLE IF EXISTS `instance_task`;
CREATE TABLE `instance_task` (
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

-- ----------------------------
-- Records of instance_task
-- ----------------------------

-- ----------------------------
-- Table structure for `instances`
-- ----------------------------
DROP TABLE IF EXISTS `instances`;
CREATE TABLE `instances` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caseid` int(10) unsigned NOT NULL,
  `instancename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creatorid` int(10) unsigned NOT NULL,
  `status` int(10) NOT NULL,
  `creationtime` datetime NOT NULL,
  `starttime` datetime NOT NULL,
  `tasksfinishtime` datetime DEFAULT NULL,
  `finishtime` datetime NOT NULL,
  `progress` tinyint(4) DEFAULT '0',
  `evaluationtype` tinyint(10) NOT NULL,
  `evaluationstatus` tinyint(4) NOT NULL DEFAULT '0',
  `lastevataskid` tinyint(4) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of instances
-- ----------------------------

-- ----------------------------
-- Table structure for `messages`
-- ----------------------------
DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `uid` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `sendtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isreaded` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of messages
-- ----------------------------
INSERT INTO `messages` VALUES ('2', 'user', '3', '3', 'ddd', '2010-06-11 09:53:22', '1');
INSERT INTO `messages` VALUES ('3', 'user', '3', '3', 'user', '2010-06-11 09:53:56', '1');
INSERT INTO `messages` VALUES ('4', 'user', '3', '3', 'user', '2010-06-11 09:54:16', '1');
INSERT INTO `messages` VALUES ('5', 'user', '3', '3', 'user', '2010-06-11 09:54:24', '1');

-- ----------------------------
-- Table structure for `news_table`
-- ----------------------------
DROP TABLE IF EXISTS `news_table`;
CREATE TABLE `news_table` (
  `insId` int(10) NOT NULL,
  `taskId` int(10) NOT NULL,
  `time` int(32) unsigned NOT NULL,
  `recRoleId` int(10) NOT NULL,
  `newsContent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `docId` int(10) NOT NULL DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of news_table
-- ----------------------------

-- ----------------------------
-- Table structure for `newsubmits`
-- ----------------------------
DROP TABLE IF EXISTS `newsubmits`;
CREATE TABLE `newsubmits` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `instanceid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `standardfileid` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `denyReason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `denySuggestions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `submittime` datetime NOT NULL,
  `accepttime` datetime NOT NULL,
  `uploader` int(11) NOT NULL,
  `uploaderCurRole` int(10) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of newsubmits
-- ----------------------------

-- ----------------------------
-- Table structure for `outputs`
-- ----------------------------
DROP TABLE IF EXISTS `outputs`;
CREATE TABLE `outputs` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `fileid` int(10) NOT NULL,
  `output` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of outputs
-- ----------------------------
INSERT INTO `outputs` VALUES ('8', '1', '1', 'solution.cpp');
INSERT INTO `outputs` VALUES ('8', '2', '2', 'testcases.txt');
INSERT INTO `outputs` VALUES ('8', '3', '4', 'report.pdf');
INSERT INTO `outputs` VALUES ('9', '1', '1', 'solution.cpp');
INSERT INTO `outputs` VALUES ('9', '2', '2', 'testcases.txt');
INSERT INTO `outputs` VALUES ('9', '3', '4', 'report.pdf');

-- ----------------------------
-- Table structure for `ref_contribute`
-- ----------------------------
DROP TABLE IF EXISTS `ref_contribute`;
CREATE TABLE `ref_contribute` (
  `fileId` int(10) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `refName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaderId` int(10) NOT NULL,
  `uploadTime` datetime NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caseId` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `downloadedTimes` int(10) NOT NULL,
  PRIMARY KEY (`fileId`),
  UNIQUE KEY `fileId` (`fileId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ref_contribute
-- ----------------------------

-- ----------------------------
-- Table structure for `ref_download`
-- ----------------------------
DROP TABLE IF EXISTS `ref_download`;
CREATE TABLE `ref_download` (
  `fileId` int(10) NOT NULL,
  `downloadTime` datetime NOT NULL,
  `downloadUserId` int(10) NOT NULL,
  UNIQUE KEY `fileId` (`fileId`),
  CONSTRAINT `ref_download_ibfk_1` FOREIGN KEY (`fileId`) REFERENCES `ref_contribute` (`fileId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of ref_download
-- ----------------------------

-- ----------------------------
-- Table structure for `relations`
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations` (
  `caseid` int(11) NOT NULL,
  `childid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`childid`,`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of relations
-- ----------------------------

-- ----------------------------
-- Table structure for `resources`
-- ----------------------------
DROP TABLE IF EXISTS `resources`;
CREATE TABLE `resources` (
  `caseid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `resourceid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`taskid`,`resourceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of resources
-- ----------------------------
INSERT INTO `resources` VALUES ('8', '1', '1');
INSERT INTO `resources` VALUES ('8', '2', '2');
INSERT INTO `resources` VALUES ('8', '3', '3');
INSERT INTO `resources` VALUES ('9', '1', '1');
INSERT INTO `resources` VALUES ('9', '2', '2');
INSERT INTO `resources` VALUES ('9', '3', '3');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `caseid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('8', '0', 'instructor', '指导者', '');
INSERT INTO `roles` VALUES ('8', '1', 'PM', 'Programmer', '');
INSERT INTO `roles` VALUES ('8', '2', 'Member', 'Tester', '');
INSERT INTO `roles` VALUES ('8', '3', 'Member', 'Writer', '');
INSERT INTO `roles` VALUES ('9', '0', 'instructor', '指导者', '');
INSERT INTO `roles` VALUES ('9', '1', 'PM', 'Programmer', '');
INSERT INTO `roles` VALUES ('9', '2', 'Member', 'Tester', '');
INSERT INTO `roles` VALUES ('9', '3', 'Member', 'Writer', '');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(32) CHARACTER SET latin1 NOT NULL,
  `session_last_access` int(10) unsigned DEFAULT NULL,
  `session_data` text CHARACTER SET latin1,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('02l7f4qci7p70mdj59e8d4rng4', '1276435115', 'sess_last_access|i:1276435115;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435115;');
INSERT INTO `sessions` VALUES ('0opgvmtli6t1s7lp107lu45721', '1276435048', 'sess_last_access|i:1276435048;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435048;');
INSERT INTO `sessions` VALUES ('27o9qe6jqaed75dnun4uacbdc3', '1276503100', 'sess_last_access|i:1276503100;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276503100;');
INSERT INTO `sessions` VALUES ('2dh8172fq23gv5oautd5trihq4', '1276681308', 'sess_last_access|i:1276681308;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276681308;');
INSERT INTO `sessions` VALUES ('373qdt0gu2pbn6ke2n7l4pbhf4', '1276435055', 'sess_last_access|i:1276435055;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435055;');
INSERT INTO `sessions` VALUES ('3tfp4a4keh2kddi6na4ju09qc6', '1276435016', 'sess_last_access|i:1276435016;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435016;');
INSERT INTO `sessions` VALUES ('4t3qhqbl8955b1vusq65m90qe7', '1276591969', 'sess_last_access|i:1276591969;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276591969;');
INSERT INTO `sessions` VALUES ('6o31000fspv6eqkiajh9co1205', '1276390688', 'sess_last_access|i:1276390688;sess_ip_address|s:12:\"10.214.29.12\";sess_useragent|s:50:\"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;\";sess_last_regenerated|i:1276390684;user_name|s:5:\"admin\";user_gid|s:1:\"0\";user_id|s:1:\"1\";score|s:3:\"999\";onlinetime|s:16:\"1å°æ—¶12åˆ†0ç§’\";grade|i:1;logintime|i:1276390387;');
INSERT INTO `sessions` VALUES ('70dgids86hpdcs12lbg8r7uc71', '1276677055', 'sess_last_access|i:1276677055;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276677055;');
INSERT INTO `sessions` VALUES ('71fss57knm7evc4ntarhmfe0j5', '1276435073', 'sess_last_access|i:1276435073;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435073;');
INSERT INTO `sessions` VALUES ('8mqdjtcunevj9vpurt3n72cuj6', '1276390489', 'sess_last_access|i:1276390489;sess_ip_address|s:12:\"10.214.29.12\";sess_useragent|s:50:\"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) Ap\";sess_last_regenerated|i:1276390467;user_name|s:3:\"wsn\";user_gid|s:1:\"2\";user_id|s:1:\"7\";score|N;onlinetime|s:16:\"0å°æ—¶12åˆ†0ç§’\";grade|i:1;logintime|i:1276390469;');
INSERT INTO `sessions` VALUES ('8nkt3jhlb2hmbcohcrrfop1il1', '1276521767', 'sess_last_access|i:1276521767;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276521767;');
INSERT INTO `sessions` VALUES ('9h1avi96id2rhv3e45qgppdjf6', '1276435133', 'sess_last_access|i:1276435133;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435133;');
INSERT INTO `sessions` VALUES ('a84na7t3tbqgo99lam87i449a2', '1276435097', 'sess_last_access|i:1276435097;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435097;');
INSERT INTO `sessions` VALUES ('adgnh0minj4anlsklc8hda8v12', '1276589535', 'sess_last_access|i:1276589535;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276589535;');
INSERT INTO `sessions` VALUES ('b0vbncuruhc5d09iufjpd2fui3', '1276688999', 'sess_last_access|i:1276688999;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276688999;');
INSERT INTO `sessions` VALUES ('c1vos49rpf64uiks8h02kr22k4', '1276677068', 'sess_last_access|i:1276677068;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276677068;');
INSERT INTO `sessions` VALUES ('c7n7qftiu9r4svnncpkrnlu931', '1276516455', 'sess_last_access|i:1276516455;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276516455;');
INSERT INTO `sessions` VALUES ('dg9h89iucccula596c7tqhjkc6', '1276435101', 'sess_last_access|i:1276435101;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435101;');
INSERT INTO `sessions` VALUES ('dgntf4mar49oqcteauhqkms2b7', '1276435039', 'sess_last_access|i:1276435039;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435039;');
INSERT INTO `sessions` VALUES ('f2ukve1ksijmd9510dpfo085e7', '1276501426', 'sess_last_access|i:1276501426;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276501426;');
INSERT INTO `sessions` VALUES ('hp80gc1hlf33jlv8ktret940e1', '1276501323', 'sess_last_access|i:1276501323;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276501323;');
INSERT INTO `sessions` VALUES ('ihf5se3jj5dge7faiq8ltp7v43', '1276733180', 'sess_last_access|i:1276733180;sess_ip_address|s:12:\"10.214.29.12\";sess_useragent|s:50:\"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;\";sess_last_regenerated|i:1276733180;');
INSERT INTO `sessions` VALUES ('l9qkfdgg94rs06nn72e18o2dn2', '1276435016', 'sess_last_access|i:1276435016;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435016;');
INSERT INTO `sessions` VALUES ('le66h0f65oa8sdcjkci7qedd71', '1276733181', 'sess_last_access|i:1276733181;sess_ip_address|s:9:\"127.0.0.1\";sess_useragent|s:50:\"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.1;\";sess_last_regenerated|i:1276733173;');
INSERT INTO `sessions` VALUES ('m7pnuhn3c8nkospkffciubmad1', '1276501405', 'sess_last_access|i:1276501405;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276501405;');
INSERT INTO `sessions` VALUES ('m9ukruara0um9vkochu8vka027', '1276521771', 'sess_last_access|i:1276521771;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276521771;');
INSERT INTO `sessions` VALUES ('mk7i8a2k03hf33th35h1aqkrr0', '1276435062', 'sess_last_access|i:1276435062;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435062;');
INSERT INTO `sessions` VALUES ('mufietbe1scd32mli9ea08n377', '1276435107', 'sess_last_access|i:1276435107;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435107;');
INSERT INTO `sessions` VALUES ('nm1npp2o429lldr6g01p49rn71', '1276521807', 'sess_last_access|i:1276521807;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276521807;');
INSERT INTO `sessions` VALUES ('outgm7v2qssivfhlkf2mm0ifu4', '1276435138', 'sess_last_access|i:1276435138;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276435138;');
INSERT INTO `sessions` VALUES ('pqimhd1en66s0ochjch4f6hp70', '1276436955', 'sess_last_access|i:1276436955;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276436955;');
INSERT INTO `sessions` VALUES ('rrdjbm2kp12g03fdnov6c559a3', '1276590092', 'sess_last_access|i:1276590092;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276590092;');
INSERT INTO `sessions` VALUES ('vlhafvpmg03ho3dfiv8g2dijv3', '1276521794', 'sess_last_access|i:1276521794;sess_ip_address|s:13:\"10.61.201.172\";sess_useragent|s:47:\"Mozilla/4.0 (compatible; MSIE 4.01; Windows 98)\";sess_last_regenerated|i:1276521794;');

-- ----------------------------
-- Table structure for `tasks`
-- ----------------------------
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE `tasks` (
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

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('8', '1', 'Programming', 'Implement the three functions (30 pts.) and a testing program (20 pts.) with sufficient comments.', '0', '0', '1', '9', '0', '9', '0', '9', '1');
INSERT INTO `tasks` VALUES ('8', '2', 'Testing', 'Decide the iteration number K for each test case and fill in the table of results (8 pts.).  Plot the run times of the functions (12 pts.).  Write analysis and comments (10 pts.).', '0', '0', '1', '9', '0', '9', '0', '9', '2');
INSERT INTO `tasks` VALUES ('8', '3', 'Report Writing', 'Write Chapter 1 (6 pts.), Chapter 2 (12 pts.), and finally a complete report (2 pts. for overall style of documentation).', '0', '0', '1', '5', '9', '14', '9', '14', '3');
INSERT INTO `tasks` VALUES ('9', '1', 'Programming', 'Write the program (50 pts.) with sufficient comments.', '0', '0', '1', '9', '0', '9', '0', '9', '1');
INSERT INTO `tasks` VALUES ('9', '2', 'Testing', 'Provide a set of test cases to fill in a test report (20 pts.).  Note that the tester is responsible, as well as the programmer is, for any bug later found by Judge.  Write analysis and comments (10 pts.).', '0', '0', '1', '9', '0', '9', '0', '9', '2');
INSERT INTO `tasks` VALUES ('9', '3', 'Report Writing', 'Write Chapter 1 (6 pts.), Chapter 2 (12 pts.), and finally a complete report (2 pts. for overall style of documentation).', '0', '0', '1', '5', '9', '14', '9', '14', '3');

-- ----------------------------
-- Table structure for `user_instance`
-- ----------------------------
DROP TABLE IF EXISTS `user_instance`;
CREATE TABLE `user_instance` (
  `userid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `rolegroup` int(11) NOT NULL COMMENT '1==pm,2==nomal player,3==indicator,4==observer',
  `accepttime` datetime NOT NULL,
  `isvalid` tinyint(1) NOT NULL,
  PRIMARY KEY (`userid`,`instanceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of user_instance
-- ----------------------------

-- ----------------------------
-- Table structure for `userinsrole`
-- ----------------------------
DROP TABLE IF EXISTS `userinsrole`;
CREATE TABLE `userinsrole` (
  `userId` int(10) NOT NULL,
  `insId` int(10) NOT NULL,
  `roleId` int(10) NOT NULL,
  `status` int(10) NOT NULL,
  `applyTime` datetime NOT NULL,
  `handleTime` datetime NOT NULL,
  PRIMARY KEY (`userId`,`insId`,`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of userinsrole
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', null, '2009-10-28 11:11:56', null, null, null, null, null, 'admin@163.com', null, '0', '0', '0', '4320', '999', '0');
INSERT INTO `users` VALUES ('2', 'yangcheng', 'c4ca4238a0b923820dcc509a6f75849b', '1', null, '2009-10-28 11:11:56', null, null, null, null, null, 'yangcheng@163.com', null, '0', '0', '0', '8163', '1999', '1');
INSERT INTO `users` VALUES ('3', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2', null, '2009-10-28 11:11:56', '.\\system\\application\\uploadedfile\\portrait\\CR-f7vAA6CrIq.jpg', null, null, null, null, 'user@163.com', null, '0', '10', '0', '66977', '666', '1');
INSERT INTO `users` VALUES ('4', 'xupengfey', 'c4ca4238a0b923820dcc509a6f75849b', '2', null, '2009-10-28 11:11:56', null, null, null, null, null, 'xupengfey@163.com', null, '0', '5', '0', '1228', '555', '0');
INSERT INTO `users` VALUES ('5', 'cendy', 'd964173dc44da83eeafa3aebbee9a1a0', '2', null, '2009-10-28 11:11:56', null, null, null, null, null, 'cendy@163.com', null, '0', '0', '0', '8115', '777', '0');
INSERT INTO `users` VALUES ('6', 'wmc', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1', '2009-10-28 11:11:56', null, 'programming', 'wmc', '282743146', null, 'wmc@163.com', null, '1', '55', '0', '6779', '999', '1');
INSERT INTO `users` VALUES ('7', 'wsn', 'c4ca4238a0b923820dcc509a6f75849b', '2', null, '0000-00-00 00:00:00', null, null, null, null, null, 'wsn@163.com', null, '0', '0', '0', '720', null, '0');

-- ----------------------------
-- Procedure structure for `checkMessageNum`
-- ----------------------------
DROP PROCEDURE IF EXISTS `checkMessageNum`;
DELIMITER ;;
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
	END;;
DELIMITER ;
