-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 27, 2014 at 01:13 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `curd`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `sort_id` int(11) NOT NULL default '0',
  `username` varchar(32) character set utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=89 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (49, 4, 'PHP', '0000-00-00 00:00:00', '2014-05-27 00:16:41');
INSERT INTO `users` VALUES (51, 6, 'Ruby on Rails', '0000-00-00 00:00:00', '2014-05-27 00:16:35');
INSERT INTO `users` VALUES (74, 5, 'Mysql', '0000-00-00 00:00:00', '2014-05-27 00:16:35');
INSERT INTO `users` VALUES (75, 7, 'ubuntu', '0000-00-00 00:00:00', '2014-05-27 00:16:31');
INSERT INTO `users` VALUES (76, 2, 'dteout@gmail.com', '0000-00-00 00:00:00', '2014-05-27 00:22:34');
INSERT INTO `users` VALUES (77, 3, 'www', '0000-00-00 00:00:00', '2014-05-27 00:16:30');
INSERT INTO `users` VALUES (79, 0, 'æž—å»ºçŽ„', '0000-00-00 00:00:00', '2014-05-27 01:02:48');
INSERT INTO `users` VALUES (80, 0, '123', '0000-00-00 00:00:00', '2014-05-27 02:02:40');
INSERT INTO `users` VALUES (81, 0, '2222', '0000-00-00 00:00:00', '2014-05-27 03:15:30');
