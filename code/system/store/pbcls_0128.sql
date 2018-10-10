/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50133
Source Host           : localhost:3306
Source Database       : pbcls

Target Server Type    : MYSQL
Target Server Version : 50133
File Encoding         : 65001

Date: 2010-01-28 16:00:11
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

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
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ban_regnamelist
-- ----------------------------
INSERT INTO `ban_regnamelist` VALUES ('5', 'admin', '这个名称只能管理员使用！');
INSERT INTO `ban_regnamelist` VALUES ('4', '老师', '老师是特定的指导者！');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of cases
-- ----------------------------
INSERT INTO `cases` VALUES ('4', 'Teaching Assistant Website for software Engineering Course', '', 'PBCLS Group', 'pbcls@cs.zju.edu.cn', '1.0', '2009-10-27', '1', '2010-01-27 14:07:33', '0', '6', '0', '0', '0', '0', '0', '5', 'Teaching Assistant Website for software Engineering Course');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of dependencies
-- ----------------------------
INSERT INTO `dependencies` VALUES ('4', '1', '2');
INSERT INTO `dependencies` VALUES ('4', '2', '3');
INSERT INTO `dependencies` VALUES ('4', '3', '4');
INSERT INTO `dependencies` VALUES ('4', '3', '5');
INSERT INTO `dependencies` VALUES ('4', '5', '6');
INSERT INTO `dependencies` VALUES ('4', '6', '7');
INSERT INTO `dependencies` VALUES ('4', '6', '10');
INSERT INTO `dependencies` VALUES ('4', '7', '8');
INSERT INTO `dependencies` VALUES ('4', '8', '9');
INSERT INTO `dependencies` VALUES ('4', '9', '12');
INSERT INTO `dependencies` VALUES ('4', '10', '11');
INSERT INTO `dependencies` VALUES ('4', '12', '13');
INSERT INTO `dependencies` VALUES ('4', '13', '14');
INSERT INTO `dependencies` VALUES ('4', '14', '15');
INSERT INTO `dependencies` VALUES ('4', '15', '16');
INSERT INTO `dependencies` VALUES ('4', '16', '17');
INSERT INTO `dependencies` VALUES ('4', '17', '18');
INSERT INTO `dependencies` VALUES ('4', '18', '19');
INSERT INTO `dependencies` VALUES ('4', '19', '20');
INSERT INTO `dependencies` VALUES ('4', '20', '21');
INSERT INTO `dependencies` VALUES ('4', '21', '22');
INSERT INTO `dependencies` VALUES ('4', '21', '26');
INSERT INTO `dependencies` VALUES ('4', '22', '23');
INSERT INTO `dependencies` VALUES ('4', '23', '24');
INSERT INTO `dependencies` VALUES ('4', '24', '25');
INSERT INTO `dependencies` VALUES ('4', '25', '27');
INSERT INTO `dependencies` VALUES ('4', '27', '28');
INSERT INTO `dependencies` VALUES ('4', '27', '29');

-- ----------------------------
-- Table structure for `evaluation_mumber`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_mumber`;
CREATE TABLE `evaluation_mumber` (
  `instancename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `roleid` tinyint(10) DEFAULT NULL,
  `userid` tinyint(10) DEFAULT NULL,
  `taskstartedtime` datetime DEFAULT NULL COMMENT '任务开始做的时间',
  `taskfinishedtime` datetime DEFAULT NULL COMMENT '任务结束的时间',
  `taskacceptedno` int(10) DEFAULT NULL COMMENT '任务通过审核时的审核次数',
  `uploadno` int(10) DEFAULT NULL COMMENT '上传文件数量',
  `downno` int(10) DEFAULT NULL COMMENT '上传文件被下载次数',
  `bbsquantity` int(10) DEFAULT NULL COMMENT '提问或回复不同主题次数，即参与主题次数',
  `self_attitude` tinyint(10) DEFAULT NULL COMMENT '学习态度',
  `self_technique` tinyint(10) DEFAULT NULL COMMENT '专业能力',
  `self_communication` tinyint(10) DEFAULT NULL COMMENT '沟通能力',
  `self_cooperation` tinyint(10) NOT NULL COMMENT '协作能力',
  `self_achievement` tinyint(10) DEFAULT NULL COMMENT '取得成绩',
  `self_organization` tinyint(10) DEFAULT NULL COMMENT '如果角色是经理，则有组织能力这一项',
  `self_decision` tinyint(10) DEFAULT NULL COMMENT '如果角色是经理，则有决策能力这一项',
  `self_score` tinyint(10) DEFAULT NULL COMMENT '自评得分',
  `self_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '自我综合评价',
  `self_expectation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学习展望',
  `manager_attitude` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——学习态度',
  `manager_technique` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——专业能力',
  `manager_communication` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——沟通能力',
  `manager_cooperation` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——协作能力',
  `manager_docpasstime` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——文档通过时间',
  `manager_docpassrate` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——文档通过率',
  `manager_doccorrectness` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——文档正确度',
  `manager_docinnovation` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——文档创新情况',
  `manager_docstyle` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——文档风格',
  `manager_score` tinyint(10) DEFAULT NULL COMMENT '经理对组员评价中的——总得分',
  `manager_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '经理对组员评价中的——总体评价',
  `instructor_attitude` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的学习态度',
  `instructor_updownquantity` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的上传下载数量',
  `instructor_updownquality` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的上传下载质量',
  `instructor_bbsquantity` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的bbs讨论次数',
  `instructor_bbsquanlity` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的bbs讨论质量',
  `instructor_score` tinyint(10) DEFAULT NULL COMMENT '指导老师对个人评价中的总体得分',
  `instructor_mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '指导老师对个人评价中的总体评价'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='这个表用于存贮个人自评、经理对个人的评价和老师对个人的评价';

-- ----------------------------
-- Records of evaluation_mumber
-- ----------------------------
INSERT INTO `evaluation_mumber` VALUES ('testinstance', '1', '1', '3', '2010-01-20 20:07:35', '2010-01-25 20:07:39', '1', '3', '5', '10', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `evaluation_mumber` VALUES ('testinstance', '2', '2', '4', '2010-01-19 20:09:10', '2010-01-20 20:12:16', '3', '5', '10', '3', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `evaluation_mumber` VALUES ('testinstance', '3', '3', '5', '2010-01-18 20:15:50', '2010-01-19 20:15:58', '2', '8', '3', '5', null, null, null, '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `evaluation_mutual`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_mutual`;
CREATE TABLE `evaluation_mutual` (
  `instancename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `roleid` tinyint(10) DEFAULT NULL,
  `userid` tinyint(10) DEFAULT NULL,
  `touserid` tinyint(10) DEFAULT NULL,
  `attitude` tinyint(10) DEFAULT NULL,
  `technique` tinyint(10) DEFAULT NULL,
  `communication` tinyint(10) DEFAULT NULL,
  `cooperation` tinyint(10) DEFAULT NULL,
  `organization` tinyint(10) DEFAULT NULL,
  `decision` tinyint(10) DEFAULT NULL,
  `helpme` tinyint(10) DEFAULT NULL,
  `score` tinyint(10) DEFAULT NULL,
  `mark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='此表存贮组员之间互评的信息，包括组员对经理的评价';

-- ----------------------------
-- Records of evaluation_mutual
-- ----------------------------

-- ----------------------------
-- Table structure for `evaluation_team`
-- ----------------------------
DROP TABLE IF EXISTS `evaluation_team`;
CREATE TABLE `evaluation_team` (
  `instancename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `taskid` tinyint(10) DEFAULT NULL,
  `updownno` int(10) DEFAULT NULL COMMENT '学员上传下载次数',
  `downno` int(10) DEFAULT NULL COMMENT '上传的文档被下载次数',
  `bbsno` int(10) DEFAULT NULL COMMENT 'BBS回帖大于10的主体数量',
  `startedtime` datetime DEFAULT NULL COMMENT '项目开始时间',
  `finishedtime` datetime DEFAULT NULL COMMENT '项目结束时间',
  `updownquantity` tinyint(10) DEFAULT NULL COMMENT '传上下载数量的得分',
  `updownquality` tinyint(10) DEFAULT NULL COMMENT '上传下载质量的得分',
  `bbsquantity` tinyint(10) DEFAULT NULL COMMENT 'bbs讨论次数的得分',
  `bbsquality` tinyint(10) DEFAULT NULL COMMENT 'bbs讨论质量的得分',
  `docpasstime` tinyint(10) DEFAULT NULL COMMENT '所有文档提交时间得分',
  `docinnovation` tinyint(10) DEFAULT NULL COMMENT '创新情况得分',
  `doccorrectness` tinyint(10) DEFAULT NULL COMMENT '正确情况得分',
  `docstyle` tinyint(10) DEFAULT NULL COMMENT '文档风格得分',
  `score` tinyint(10) DEFAULT NULL COMMENT '总分',
  `remark` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '描述性评价'
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
  `input` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of inputs
-- ----------------------------

-- ----------------------------
-- Table structure for `instance_indicator`
-- ----------------------------
DROP TABLE IF EXISTS `instance_indicator`;
CREATE TABLE `instance_indicator` (
  `userid` int(11) NOT NULL,
  `instanceid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0:正在申请.Applying; \r\n1:已经处理，正担任指导者.Accepted',
  `applytime` datetime NOT NULL,
  `handletime` datetime NOT NULL,
  PRIMARY KEY (`userid`,`instanceid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of instance_indicator
-- ----------------------------

-- ----------------------------
-- Table structure for `instance_role`
-- ----------------------------
DROP TABLE IF EXISTS `instance_role`;
CREATE TABLE `instance_role` (
  `instanceid` int(10) unsigned NOT NULL,
  `roleid` int(10) unsigned NOT NULL,
  `actorid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'the uid of the actor, 0 means AI。',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT ' open | closed',
  PRIMARY KEY (`instanceid`,`roleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of instance_role
-- ----------------------------
INSERT INTO `instance_role` VALUES ('2', '1', '3', '0');
INSERT INTO `instance_role` VALUES ('2', '2', '4', '0');
INSERT INTO `instance_role` VALUES ('2', '3', '5', '0');
INSERT INTO `instance_role` VALUES ('2', '4', '6', '0');
INSERT INTO `instance_role` VALUES ('2', '5', '7', '0');
INSERT INTO `instance_role` VALUES ('3', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('3', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('3', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('3', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('3', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('4', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('4', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('4', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('4', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('4', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('5', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('5', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('5', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('5', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('5', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('6', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('6', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('6', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('6', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('6', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('7', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('7', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('7', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('7', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('7', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('8', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('8', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('8', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('8', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('8', '5', '0', '0');
INSERT INTO `instance_role` VALUES ('12', '1', '0', '0');
INSERT INTO `instance_role` VALUES ('12', '2', '0', '0');
INSERT INTO `instance_role` VALUES ('12', '3', '0', '0');
INSERT INTO `instance_role` VALUES ('12', '4', '0', '0');
INSERT INTO `instance_role` VALUES ('12', '5', '0', '0');

-- ----------------------------
-- Table structure for `instance_task`
-- ----------------------------
DROP TABLE IF EXISTS `instance_task`;
CREATE TABLE `instance_task` (
  `instanceid` int(10) unsigned NOT NULL,
  `taskid` int(10) unsigned NOT NULL,
  `starttime` datetime NOT NULL,
  `finishtime` datetime NOT NULL,
  `isready` tinyint(1) NOT NULL,
  `isstarted` tinyint(1) NOT NULL,
  `isfinished` tinyint(1) NOT NULL,
  `denies` int(11) NOT NULL,
  `reference` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suggestions` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`instanceid`,`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of instance_task
-- ----------------------------
INSERT INTO `instance_task` VALUES ('2', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('2', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('3', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('4', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('5', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('6', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('7', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('8', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '2', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '3', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '4', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '5', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '6', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '7', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '8', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '9', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '10', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '11', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '12', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '13', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '14', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '18', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '19', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '22', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '23', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '24', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '25', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '26', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '27', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '28', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);
INSERT INTO `instance_task` VALUES ('12', '29', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', null, null);

-- ----------------------------
-- Table structure for `instances`
-- ----------------------------
DROP TABLE IF EXISTS `instances`;
CREATE TABLE `instances` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `caseid` int(10) unsigned NOT NULL,
  `instancename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creatorid` int(10) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creationtime` datetime NOT NULL,
  `starttime` datetime NOT NULL,
  `finishtime` datetime NOT NULL,
  `progress` tinyint(4) DEFAULT '0',
  `isstarted` tinyint(1) NOT NULL,
  `isfinished` tinyint(1) NOT NULL,
  `acceptindicator` tinyint(1) NOT NULL,
  `acceptobserver` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of instances
-- ----------------------------
INSERT INTO `instances` VALUES ('3', '1', 'testinstance', '3', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0', '0', '0', '0', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of messages
-- ----------------------------

-- ----------------------------
-- Table structure for `newsubmits`
-- ----------------------------
DROP TABLE IF EXISTS `newsubmits`;
CREATE TABLE `newsubmits` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `instanceid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ischecked` tinyint(1) NOT NULL,
  `isaccepted` tinyint(1) NOT NULL,
  `submittime` datetime NOT NULL,
  `accepttime` datetime NOT NULL,
  `uploader` int(11) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
  `output` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of outputs
-- ----------------------------
INSERT INTO `outputs` VALUES ('4', '1', 'docs/Vision And Scope Document.docx');
INSERT INTO `outputs` VALUES ('4', '2', 'docs/Priority_of_teachers\'_requirements-feedback.doc');
INSERT INTO `outputs` VALUES ('4', '4', 'docs/Feasibility_Analysis.pdf');
INSERT INTO `outputs` VALUES ('4', '6', 'docs/Project Development Charter.pdf');
INSERT INTO `outputs` VALUES ('4', '7', 'docs/WBS2003.mpp');
INSERT INTO `outputs` VALUES ('4', '9', 'Project Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '9', 'Project Plan-Gant.mpp');
INSERT INTO `outputs` VALUES ('4', '10', 'Project Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '10', 'Project Plan-Gant.mpp');
INSERT INTO `outputs` VALUES ('4', '11', 'Quality Assurance Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '12', 'Quality Assurance Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '13', 'Software Requirement Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '15', 'docs/Requirements Change Control Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '17', 'docs/Software Requirements Specification-Version1.0.pdf');
INSERT INTO `outputs` VALUES ('4', '17', 'docs/DataDictionary1.doc');
INSERT INTO `outputs` VALUES ('4', '17', '');
INSERT INTO `outputs` VALUES ('4', '19', 'docs/Requirement Change Impact Analysis.pdf');
INSERT INTO `outputs` VALUES ('4', '19', 'docs/Requirement_Change_Apply_Table.pdf');
INSERT INTO `outputs` VALUES ('4', '19', 'docs/Requirement_Change_Record_Table.pdf');
INSERT INTO `outputs` VALUES ('4', '19', 'docs/Requirement_Traceability_Matrix.xls');
INSERT INTO `outputs` VALUES ('4', '21', 'docs/preliminary Design.pdf');
INSERT INTO `outputs` VALUES ('4', '21', 'docs/System Design and Implement.pdf');
INSERT INTO `outputs` VALUES ('4', '23', 'docs/System_Test_Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '25', 'cocs/System Deployment Plan.pdf');
INSERT INTO `outputs` VALUES ('4', '26', 'cocs/Users_Manual.pdf');
INSERT INTO `outputs` VALUES ('4', '28', 'docs/Software_Training_Plan.pdf');

-- ----------------------------
-- Table structure for `relations`
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations` (
  `caseid` int(11) NOT NULL,
  `childid` int(11) NOT NULL,
  `parentid` int(11) NOT NULL,
  PRIMARY KEY (`caseid`,`childid`,`parentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of resources
-- ----------------------------
INSERT INTO `resources` VALUES ('1', '1', '2');
INSERT INTO `resources` VALUES ('1', '2', '3');
INSERT INTO `resources` VALUES ('1', '3', '4');
INSERT INTO `resources` VALUES ('1', '4', '3');
INSERT INTO `resources` VALUES ('1', '5', '1');
INSERT INTO `resources` VALUES ('1', '6', '3');
INSERT INTO `resources` VALUES ('1', '7', '3');
INSERT INTO `resources` VALUES ('1', '8', '4');
INSERT INTO `resources` VALUES ('1', '9', '5');
INSERT INTO `resources` VALUES ('1', '10', '3');
INSERT INTO `resources` VALUES ('2', '1', '1');
INSERT INTO `resources` VALUES ('2', '1', '2');
INSERT INTO `resources` VALUES ('2', '1', '3');
INSERT INTO `resources` VALUES ('2', '1', '4');
INSERT INTO `resources` VALUES ('2', '1', '5');
INSERT INTO `resources` VALUES ('2', '2', '2');
INSERT INTO `resources` VALUES ('2', '2', '3');
INSERT INTO `resources` VALUES ('2', '3', '2');
INSERT INTO `resources` VALUES ('2', '3', '3');
INSERT INTO `resources` VALUES ('2', '4', '2');
INSERT INTO `resources` VALUES ('2', '4', '3');
INSERT INTO `resources` VALUES ('2', '5', '1');
INSERT INTO `resources` VALUES ('2', '5', '2');
INSERT INTO `resources` VALUES ('2', '5', '3');
INSERT INTO `resources` VALUES ('2', '5', '4');
INSERT INTO `resources` VALUES ('2', '5', '5');
INSERT INTO `resources` VALUES ('2', '6', '2');
INSERT INTO `resources` VALUES ('2', '6', '3');
INSERT INTO `resources` VALUES ('2', '7', '2');
INSERT INTO `resources` VALUES ('2', '7', '3');
INSERT INTO `resources` VALUES ('2', '8', '1');
INSERT INTO `resources` VALUES ('2', '8', '2');
INSERT INTO `resources` VALUES ('2', '8', '3');
INSERT INTO `resources` VALUES ('2', '8', '4');
INSERT INTO `resources` VALUES ('2', '8', '5');
INSERT INTO `resources` VALUES ('2', '9', '2');
INSERT INTO `resources` VALUES ('2', '9', '3');
INSERT INTO `resources` VALUES ('2', '10', '4');
INSERT INTO `resources` VALUES ('2', '10', '5');
INSERT INTO `resources` VALUES ('2', '11', '4');
INSERT INTO `resources` VALUES ('2', '11', '5');
INSERT INTO `resources` VALUES ('2', '12', '2');
INSERT INTO `resources` VALUES ('2', '12', '3');
INSERT INTO `resources` VALUES ('2', '13', '2');
INSERT INTO `resources` VALUES ('2', '13', '3');
INSERT INTO `resources` VALUES ('2', '14', '2');
INSERT INTO `resources` VALUES ('2', '14', '3');
INSERT INTO `resources` VALUES ('2', '15', '2');
INSERT INTO `resources` VALUES ('2', '15', '3');
INSERT INTO `resources` VALUES ('2', '16', '2');
INSERT INTO `resources` VALUES ('2', '16', '3');
INSERT INTO `resources` VALUES ('2', '17', '2');
INSERT INTO `resources` VALUES ('2', '17', '3');
INSERT INTO `resources` VALUES ('2', '18', '2');
INSERT INTO `resources` VALUES ('2', '18', '3');
INSERT INTO `resources` VALUES ('2', '19', '2');
INSERT INTO `resources` VALUES ('2', '19', '3');
INSERT INTO `resources` VALUES ('2', '20', '2');
INSERT INTO `resources` VALUES ('2', '20', '3');
INSERT INTO `resources` VALUES ('2', '21', '2');
INSERT INTO `resources` VALUES ('2', '21', '3');
INSERT INTO `resources` VALUES ('2', '22', '4');
INSERT INTO `resources` VALUES ('2', '22', '5');
INSERT INTO `resources` VALUES ('2', '23', '4');
INSERT INTO `resources` VALUES ('2', '23', '5');
INSERT INTO `resources` VALUES ('2', '24', '4');
INSERT INTO `resources` VALUES ('2', '24', '5');
INSERT INTO `resources` VALUES ('2', '25', '4');
INSERT INTO `resources` VALUES ('2', '25', '5');
INSERT INTO `resources` VALUES ('2', '26', '4');
INSERT INTO `resources` VALUES ('2', '26', '5');
INSERT INTO `resources` VALUES ('2', '27', '4');
INSERT INTO `resources` VALUES ('2', '27', '5');
INSERT INTO `resources` VALUES ('2', '28', '4');
INSERT INTO `resources` VALUES ('2', '28', '5');
INSERT INTO `resources` VALUES ('2', '29', '4');
INSERT INTO `resources` VALUES ('2', '29', '5');
INSERT INTO `resources` VALUES ('3', '1', '2');
INSERT INTO `resources` VALUES ('3', '2', '3');
INSERT INTO `resources` VALUES ('3', '3', '4');
INSERT INTO `resources` VALUES ('3', '4', '3');
INSERT INTO `resources` VALUES ('3', '5', '1');
INSERT INTO `resources` VALUES ('3', '6', '3');
INSERT INTO `resources` VALUES ('3', '7', '3');
INSERT INTO `resources` VALUES ('3', '8', '4');
INSERT INTO `resources` VALUES ('3', '9', '5');
INSERT INTO `resources` VALUES ('3', '10', '3');
INSERT INTO `resources` VALUES ('4', '1', '1');
INSERT INTO `resources` VALUES ('4', '1', '2');
INSERT INTO `resources` VALUES ('4', '1', '3');
INSERT INTO `resources` VALUES ('4', '1', '4');
INSERT INTO `resources` VALUES ('4', '1', '5');
INSERT INTO `resources` VALUES ('4', '2', '2');
INSERT INTO `resources` VALUES ('4', '2', '3');
INSERT INTO `resources` VALUES ('4', '3', '2');
INSERT INTO `resources` VALUES ('4', '3', '3');
INSERT INTO `resources` VALUES ('4', '4', '2');
INSERT INTO `resources` VALUES ('4', '4', '3');
INSERT INTO `resources` VALUES ('4', '5', '1');
INSERT INTO `resources` VALUES ('4', '5', '2');
INSERT INTO `resources` VALUES ('4', '5', '3');
INSERT INTO `resources` VALUES ('4', '5', '4');
INSERT INTO `resources` VALUES ('4', '5', '5');
INSERT INTO `resources` VALUES ('4', '6', '2');
INSERT INTO `resources` VALUES ('4', '6', '3');
INSERT INTO `resources` VALUES ('4', '7', '2');
INSERT INTO `resources` VALUES ('4', '7', '3');
INSERT INTO `resources` VALUES ('4', '8', '1');
INSERT INTO `resources` VALUES ('4', '8', '2');
INSERT INTO `resources` VALUES ('4', '8', '3');
INSERT INTO `resources` VALUES ('4', '8', '4');
INSERT INTO `resources` VALUES ('4', '8', '5');
INSERT INTO `resources` VALUES ('4', '9', '2');
INSERT INTO `resources` VALUES ('4', '9', '3');
INSERT INTO `resources` VALUES ('4', '10', '4');
INSERT INTO `resources` VALUES ('4', '10', '5');
INSERT INTO `resources` VALUES ('4', '11', '4');
INSERT INTO `resources` VALUES ('4', '11', '5');
INSERT INTO `resources` VALUES ('4', '12', '2');
INSERT INTO `resources` VALUES ('4', '12', '3');
INSERT INTO `resources` VALUES ('4', '13', '2');
INSERT INTO `resources` VALUES ('4', '13', '3');
INSERT INTO `resources` VALUES ('4', '14', '2');
INSERT INTO `resources` VALUES ('4', '14', '3');
INSERT INTO `resources` VALUES ('4', '15', '2');
INSERT INTO `resources` VALUES ('4', '15', '3');
INSERT INTO `resources` VALUES ('4', '16', '2');
INSERT INTO `resources` VALUES ('4', '16', '3');
INSERT INTO `resources` VALUES ('4', '17', '2');
INSERT INTO `resources` VALUES ('4', '17', '3');
INSERT INTO `resources` VALUES ('4', '18', '2');
INSERT INTO `resources` VALUES ('4', '18', '3');
INSERT INTO `resources` VALUES ('4', '19', '2');
INSERT INTO `resources` VALUES ('4', '19', '3');
INSERT INTO `resources` VALUES ('4', '20', '2');
INSERT INTO `resources` VALUES ('4', '20', '3');
INSERT INTO `resources` VALUES ('4', '21', '2');
INSERT INTO `resources` VALUES ('4', '21', '3');
INSERT INTO `resources` VALUES ('4', '22', '4');
INSERT INTO `resources` VALUES ('4', '22', '5');
INSERT INTO `resources` VALUES ('4', '23', '4');
INSERT INTO `resources` VALUES ('4', '23', '5');
INSERT INTO `resources` VALUES ('4', '24', '4');
INSERT INTO `resources` VALUES ('4', '24', '5');
INSERT INTO `resources` VALUES ('4', '25', '4');
INSERT INTO `resources` VALUES ('4', '25', '5');
INSERT INTO `resources` VALUES ('4', '26', '4');
INSERT INTO `resources` VALUES ('4', '26', '5');
INSERT INTO `resources` VALUES ('4', '27', '4');
INSERT INTO `resources` VALUES ('4', '27', '5');
INSERT INTO `resources` VALUES ('4', '28', '4');
INSERT INTO `resources` VALUES ('4', '28', '5');
INSERT INTO `resources` VALUES ('4', '29', '4');
INSERT INTO `resources` VALUES ('4', '29', '5');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `caseid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rolename` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('4', '1', 'PM', 'PM');
INSERT INTO `roles` VALUES ('4', '2', 'WORKER1', 'WORKER1');
INSERT INTO `roles` VALUES ('4', '3', 'WORKER2', 'WORKER2');
INSERT INTO `roles` VALUES ('4', '4', 'WORKER3', 'WORKER3');
INSERT INTO `roles` VALUES ('4', '5', 'WORKER4', 'WORKER4');

-- ----------------------------
-- Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `session_id` varchar(32) NOT NULL,
  `session_last_access` int(10) unsigned DEFAULT NULL,
  `session_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sessions
-- ----------------------------
INSERT INTO `sessions` VALUES ('1cf0b097dc198944c5cd5557e2ef8f76', '1264664691', 'sess_last_access|i:1264664691;sess_ip_address|s:13:\"10.214.29.112\";sess_useragent|s:50:\"Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1;\";sess_last_regenerated|i:1264664554;user_name|s:4:\"user\";user_gid|s:1:\"2\";user_id|s:1:\"3\";score|s:3:\"666\";onlinetime|s:8:\"19:45:36\";grade|i:3;time|i:1264660035;instancename|s:12:\"testinstance\";instanceid|s:1:\"2\";');

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
  PRIMARY KEY (`caseid`,`taskid`),
  KEY `caseid` (`caseid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of tasks
-- ----------------------------
INSERT INTO `tasks` VALUES ('4', '1', 'Boundary Definition', '', '0', '0', '1', '3', '0', '3', '0', '3');
INSERT INTO `tasks` VALUES ('4', '2', 'Requirements Gathering', '', '0', '0', '1', '9', '3', '12', '3', '12');
INSERT INTO `tasks` VALUES ('4', '3', 'Feasibility Analysis', '', '0', '0', '1', '6', '12', '18', '12', '18');
INSERT INTO `tasks` VALUES ('4', '4', 'Handling Feasibility Analysis', '', '0', '0', '0', '1', '18', '19', '119', '120');
INSERT INTO `tasks` VALUES ('4', '5', 'Develop Project Charter', '', '0', '0', '1', '5', '18', '23', '18', '23');
INSERT INTO `tasks` VALUES ('4', '6', 'Handing Project Charter', '', '0', '1', '1', '1', '23', '24', '23', '24');
INSERT INTO `tasks` VALUES ('4', '7', 'Create WBS', '', '0', '0', '1', '2', '24', '26', '24', '26');
INSERT INTO `tasks` VALUES ('4', '8', 'Software Integration Plan', '', '0', '0', '1', '8', '26', '34', '26', '34');
INSERT INTO `tasks` VALUES ('4', '9', 'Handling Software Integration Plan', '', '0', '1', '1', '1', '34', '35', '34', '35');
INSERT INTO `tasks` VALUES ('4', '10', 'Software Quality Assurance Plan', '', '0', '0', '0', '2', '24', '26', '117', '119');
INSERT INTO `tasks` VALUES ('4', '11', 'Handling Software Quality Assurance Plan', '', '0', '1', '0', '1', '26', '27', '119', '120');
INSERT INTO `tasks` VALUES ('4', '12', 'Requirement Development Plan', '', '0', '0', '1', '5', '35', '40', '35', '40');
INSERT INTO `tasks` VALUES ('4', '13', 'Handling Requirement Development Plan', '', '0', '0', '1', '2', '40', '42', '40', '42');
INSERT INTO `tasks` VALUES ('4', '14', 'Requirement Alteration Control Plan', '', '0', '0', '1', '5', '42', '47', '42', '47');
INSERT INTO `tasks` VALUES ('4', '15', 'Handling Requirement Alteration Control Plan', '', '0', '1', '1', '1', '47', '48', '47', '48');
INSERT INTO `tasks` VALUES ('4', '16', 'Requirement Specification', '', '0', '0', '1', '10', '48', '58', '48', '58');
INSERT INTO `tasks` VALUES ('4', '17', 'Handling Requirement Specification', '', '0', '1', '1', '2', '58', '60', '58', '60');
INSERT INTO `tasks` VALUES ('4', '18', 'Requirement Alteration Document', '', '0', '0', '1', '7', '60', '67', '60', '67');
INSERT INTO `tasks` VALUES ('4', '19', 'Handling Requirement Alteration Document', '', '0', '1', '1', '3', '67', '70', '67', '70');
INSERT INTO `tasks` VALUES ('4', '20', 'System Design and Implement', '', '0', '0', '1', '30', '70', '100', '70', '100');
INSERT INTO `tasks` VALUES ('4', '21', 'System Design and Implement Finished', '', '0', '1', '1', '7', '100', '107', '100', '107');
INSERT INTO `tasks` VALUES ('4', '22', 'Testing Plan', '', '0', '0', '1', '4', '107', '111', '107', '111');
INSERT INTO `tasks` VALUES ('4', '23', 'Handling Testing Plan', '', '0', '1', '1', '1', '111', '112', '111', '112');
INSERT INTO `tasks` VALUES ('4', '24', 'Deployment Report', '', '0', '0', '1', '2', '112', '114', '112', '114');
INSERT INTO `tasks` VALUES ('4', '25', 'Handling Deployment Report', '', '0', '0', '1', '1', '114', '115', '114', '115');
INSERT INTO `tasks` VALUES ('4', '26', 'Make User Mannual', '', '0', '0', '0', '2', '107', '109', '118', '120');
INSERT INTO `tasks` VALUES ('4', '27', 'Training Plan', '', '0', '0', '1', '2', '115', '117', '115', '117');
INSERT INTO `tasks` VALUES ('4', '28', 'Handing Training Plan', '', '0', '0', '0', '1', '117', '118', '119', '120');
INSERT INTO `tasks` VALUES ('4', '29', 'Training', '', '0', '0', '1', '3', '117', '120', '117', '120');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=FIXED;

-- ----------------------------
-- Records of user_instance
-- ----------------------------
INSERT INTO `user_instance` VALUES ('3', '2', '1', '0000-00-00 00:00:00', '1');
INSERT INTO `user_instance` VALUES ('4', '2', '2', '0000-00-00 00:00:00', '0');
INSERT INTO `user_instance` VALUES ('5', '2', '2', '0000-00-00 00:00:00', '0');

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
  `interests` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signature` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `msn` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `homepage` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unreadedmessages` int(10) unsigned NOT NULL,
  `finisheds` int(10) unsigned NOT NULL,
  `ongoings` int(10) unsigned NOT NULL,
  `onlinetime` time DEFAULT NULL,
  `score` int(32) DEFAULT NULL COMMENT '用户在系统中的积分',
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', null, '2009-10-28 11:11:56', null, null, null, null, 'admin@163.com', null, '0', '0', '1', '15:40:53', '999', '0');
INSERT INTO `users` VALUES ('2', 'yangcheng', 'c4ca4238a0b923820dcc509a6f75849b', '1', null, '2009-10-28 11:11:56', null, null, null, null, 'yangcheng@163.com', null, '0', '0', '0', '18:41:00', '1999', '1');
INSERT INTO `users` VALUES ('3', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '2', null, '2009-10-28 11:11:56', null, null, null, null, 'user@163.com', null, '0', '10', '0', '19:45:36', '666', '1');
INSERT INTO `users` VALUES ('4', 'xupengfey', 'c4ca4238a0b923820dcc509a6f75849b', '2', null, '2009-10-28 11:11:56', null, null, null, null, 'xupengfey@163.com', null, '0', '5', '0', '25:41:07', '555', '0');
INSERT INTO `users` VALUES ('5', 'cendy', 'd964173dc44da83eeafa3aebbee9a1a0', '2', null, '2009-10-28 11:11:56', null, null, null, null, 'cendy@163.com', null, '0', '0', '0', '00:45:25', '777', '0');
INSERT INTO `users` VALUES ('6', 'wmc', 'c4ca4238a0b923820dcc509a6f75849b', '2', '1', '2009-10-28 11:11:56', 'programming', 'wmc', '282743146', null, 'wmc@163.com', null, '1', '55', '0', '23:45:20', '999', '1');
INSERT INTO `users` VALUES ('7', 'wsn', 'c4ca4238a0b923820dcc509a6f75849b', '2', null, '2010-01-28 13:40:17', null, null, null, null, 'wsn@163.com', null, '0', '8', '1', '13:40:49', '347', '1');
