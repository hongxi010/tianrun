CREATE TABLE IF NOT EXISTS `bc_tags_content` (
  `id` mediumint(12) unsigned NOT NULL,
  `tag` char(20) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(80) DEFAULT NULL,
  `thumb` varchar(100) NOT NULL DEFAULT '',
  `siteid` tinyint(3) unsigned NOT NULL,
  `modelid` tinyint(3) unsigned NOT NULL,
  `contentid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` smallint(5) unsigned NOT NULL,
  `inputtime` int(10) unsigned NOT NULL,
  `updatetime` int(10) unsigned NOT NULL,
  `status` TINYINT(2) UNSIGNED NOT NULL DEFAULT '99'
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

ALTER TABLE `bc_tags_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modelid` (`modelid`,`siteid`,`contentid`),
  ADD KEY `tag` (`tag`),
  ADD KEY `id` (`id`);
ALTER TABLE `bc_tags_content`
  MODIFY `id` mediumint(12) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;