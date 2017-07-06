/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bnb_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-04 02:24:25
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `location`
-- ----------------------------
DROP TABLE IF EXISTS `location`;
CREATE TABLE `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of location
-- ----------------------------

-- ----------------------------
-- Table structure for `lodging`
-- ----------------------------
DROP TABLE IF EXISTS `lodging`;
CREATE TABLE `lodging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `long_description` text,
  `location` varchar(50) NOT NULL,
  `image_url` text NOT NULL,
  `availability` tinyint(1) DEFAULT '1' COMMENT '1 - available 0 - unavailable',
  `user_id` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lodging
-- ----------------------------
INSERT INTO `lodging` VALUES ('1', 'Ella Gold', '1000', 'Some Description', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Colombo', 'assets/img/lodgings/gbdnbgdn.jpg', '1', '1', '2017-05-20 12:50:23', '1');
INSERT INTO `lodging` VALUES ('2', 'Ella Silver', '1500', 'Test', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Colombo', 'assets/img/lodgings/brunch.jpg', '1', '2', '2017-05-20 14:36:41', '1');
INSERT INTO `lodging` VALUES ('3', 'Moon Beach Resort', '2500', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Colombo', 'assets/img/lodgings/RanveliBeachResort_MountLavinia_SriLanka_SH0134_18483.jpg', '1', '2', '2017-05-20 15:11:24', '1');
INSERT INTO `lodging` VALUES ('4', 'Shannara Resort', '2700', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry. ', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Colombo', 'assets/img/lodgings/H0134_18476.jpg', '1', '2', '2017-05-20 15:14:17', '1');
INSERT INTO `lodging` VALUES ('5', 'Show By \'O\'', '5000', 'Some Description', 'Ranveli Beach Resort Mount Lavinia has years of experience in the hospitality industry.', 'Kandy', 'assets/img/lodgings/bed-breakfast-software.jpg', '1', '2', '2017-05-20 15:52:28', '1');
INSERT INTO `lodging` VALUES ('6', 'City Bungalow', '4500', 'The right place to stay at heart of the Colombo city. The hotel located at just a few meters away from both Galle Road, Marine Drive and Kollupitiya junction.', 'The right place to stay at heart of the Colombo city. The hotel located at just a few meters away from both Galle Road, Marine Drive and Kollupitiya junction. Very close to leading super markets, , private hospitals, diplomatic offices, restaurant, casino & night clubs, railway station and public transport as well. \r\n\r\nThe hotel consists of 10 air conditioned twin/ double bedrooms. All en-suit bathrooms, hot water, free wi-fi, In-room satellite channels, common lobby and many other amenities available.', 'Colombo', 'assets/img/lodgings/Colombo House.jpg', null, '2', '2017-07-04 02:15:37', null);

-- ----------------------------
-- Table structure for `review`
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lodging_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `review` text,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of review
-- ----------------------------
INSERT INTO `review` VALUES ('1', '5', '3', 'This location was great. I would definitely come another time!', '2017-07-04 01:53:43', null, '1');
INSERT INTO `review` VALUES ('2', '5', '3', 'Great place ...!', '2017-07-04 01:54:36', null, '1');
INSERT INTO `review` VALUES ('3', '6', '3', 'This location was great. I would definitely come another time!', '2017-07-04 02:18:15', null, '1');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(50) NOT NULL,
  `district` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Anjalika', 'anji@gmail.com', '0771234567', 'RENTER', 'MALE', '123, Colombo, Sri Lanka.', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 09:31:31');
INSERT INTO `user` VALUES ('2', 'Sam', 'sam@gmail.com', '0778899456', 'RENTER', 'MALE', '12A, Colombo 07', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 09:38:20');
INSERT INTO `user` VALUES ('3', 'Vam', 'vam@gmail.com', '0112556489', 'TOURIST', 'MALE', 'Colombo 08', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 11:00:42');
INSERT INTO `user` VALUES ('4', 'Kane', 'kane@gmail.com', '0754512369', 'RENTER', 'MALE', 'Colombo 04', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 11:02:01');
INSERT INTO `user` VALUES ('5', 'Tim', 'tim@gmail.com', '0112356445', 'TOURIST', 'MALE', 'Colombo 03', '202cb962ac59075b964b07152d234b70', 'Colombo', '2017-05-20 11:04:25');
