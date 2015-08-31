/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : phalcon

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2015-09-01 00:27:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `phonebook`
-- ----------------------------
DROP TABLE IF EXISTS `phonebook`;
CREATE TABLE `phonebook` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '姓名',
  `phone` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号码',
  `addtime` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `updatetime` int(11) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of phonebook
-- ----------------------------
INSERT INTO `phonebook` VALUES ('1', '张三', '1316561526', '1441025272', '0');
INSERT INTO `phonebook` VALUES ('2', '李四', '1316561526', '1441025272', '0');
INSERT INTO `phonebook` VALUES ('3', '王五', '1316561526', '1441025272', '0');
INSERT INTO `phonebook` VALUES ('4', '赵六', '1316561526', '1441026510', '0');
INSERT INTO `phonebook` VALUES ('5', '张三', '15567677898', '1441028671', '0');
INSERT INTO `phonebook` VALUES ('6', '王二', '13315678909', '1441030153', '0');
INSERT INTO `phonebook` VALUES ('7', '李玖', '14788889999', '1441030155', '0');
INSERT INTO `phonebook` VALUES ('8', '赵本山', '18898976789', '1441032620', '0');
INSERT INTO `phonebook` VALUES ('9', '赵本山', '18898976789', '1441032785', '0');
INSERT INTO `phonebook` VALUES ('10', '赵本山', '18898976789', '1441032839', '0');
INSERT INTO `phonebook` VALUES ('11', '赵本山', '18898976789', '1441032849', '0');
INSERT INTO `phonebook` VALUES ('12', '习大大', '13898980909', '1441033123', '0');
