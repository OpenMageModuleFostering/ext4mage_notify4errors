<?php

$installer = $this;

$installer->startSetup();

$installString = <<<EOT
DROP TABLE IF EXISTS {$installer->getTable('notify4errors/errorlog')};
CREATE TABLE {$installer->getTable('notify4errors/errorlog')} (
  `errorlog_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `controller_module` varchar(255) DEFAULT NULL COMMENT 'comment',
  `controller_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `action_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `stacktrace` mediumtext COMMENT 'Stack trace of error',
  `remote_addr_headers` varchar(255) DEFAULT NULL COMMENT 'comment',
  `http_user_agent` varchar(255) DEFAULT NULL COMMENT 'comment',
  `http_accept_language` varchar(255) DEFAULT NULL COMMENT 'comment',
  `http_accept_charset` varchar(255) DEFAULT NULL COMMENT 'comment',
  `http_referer` varchar(255) DEFAULT NULL COMMENT 'comment',
  `http_host` varchar(255) DEFAULT NULL COMMENT 'comment',
  `request_uri` varchar(255) DEFAULT NULL COMMENT 'comment',
  `layout` varchar(255) DEFAULT NULL COMMENT 'comment',
  `before_forward_info` varchar(255) DEFAULT NULL COMMENT 'comment',
  `module_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `direct_front_names` varchar(255) DEFAULT NULL COMMENT 'comment',
  `original_path_info` varchar(255) DEFAULT NULL COMMENT 'comment',
  `original_request` varchar(255) DEFAULT NULL COMMENT 'comment',
  `requested_action_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `requested_controller_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `requested_route_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `request_string` varchar(255) DEFAULT NULL COMMENT 'comment',
  `route_name` varchar(255) DEFAULT NULL COMMENT 'comment',
  `store_code_from_path` varchar(255) DEFAULT NULL COMMENT 'comment',
  `param` mediumtext COMMENT 'parameters on request',
  `mess_text` text COMMENT 'message',
  `mess_type` varchar(255) DEFAULT NULL COMMENT 'message',
  `mess_class` varchar(255) DEFAULT NULL COMMENT 'message',
  `mess_method` varchar(255) DEFAULT NULL COMMENT 'message',
  `cms_type` varchar(255) DEFAULT NULL COMMENT 'cms type',
  `is_ajax` smallint(6) NOT NULL DEFAULT '0' COMMENT 'comment',
  `is_javascript` smallint(6) NOT NULL DEFAULT '0' COMMENT 'comment',
  `is_sent` smallint(6) NOT NULL DEFAULT '0' COMMENT 'has been sent on notification',
  `creation_time` timestamp NULL DEFAULT NULL COMMENT 'Creation Time',
  PRIMARY KEY (`errorlog_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Log of all errors that has happend' ;
EOT;
$installer->run($installString);
$installer->endSetup();