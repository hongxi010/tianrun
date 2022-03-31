DROP TABLE IF EXISTS `bc_tags`;
CREATE TABLE IF NOT EXISTS `bc_tags` (
  `tagid` smallint(5) unsigned NOT NULL auto_increment,
  `tag` char(80) NOT NULL,
  `title` varchar(180) NOT NULL default '',
  `tagdir` varchar(80) NOT NULL,
  `keywords` varchar(255) NOT NULL default '',
  `description` text NOT NULL,
  `thumb` varchar(180) NOT NULL default '',
  `content` mediumtext,
  `style` char(5) NOT NULL,
  `usetimes` smallint(5) unsigned NOT NULL default '0',
  `lastusetime` int(10) unsigned NOT NULL default '0',
  `hits` mediumint(8) unsigned NOT NULL default '0',
  `lasthittime` int(10) unsigned NOT NULL default '0',
  `listorder` tinyint(3) unsigned NOT NULL default '0',
  `status` TINYINT(2) UNSIGNED NOT NULL DEFAULT '99',
  PRIMARY KEY  (`tagid`),
  UNIQUE KEY `tag` (`tag`),
  KEY `usetimes` (`usetimes`,`listorder`),
  KEY `hits` (`hits`,`listorder`)
) TYPE=MyISAM;