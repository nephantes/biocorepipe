USE biocorepipe;
CREATE TABLE IF NOT EXISTS `amazon_credentials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `amz_acc_key` varchar(100) DEFAULT NULL,
  `amz_suc_key` varchar(100) DEFAULT NULL,
  `amz_def_reg` varchar(45) DEFAULT NULL,
  `owner_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `perms` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `last_modified_user` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

