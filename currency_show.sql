CREATE TABLE IF NOT EXISTS `currency_show` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `code` varchar(3) NOT NULL,
  `value` decimal(15,4) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '0',
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=181 ;
