<?php

$installer = $this;

$installer->startSetup();

/**
 * Create table 'notify4errors/errorlog'
 */
  $table = $installer->getConnection()
	->newTable($installer->getTable('notify4errors/errorlog'))
	->addColumn('errorlog_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
        'identity'  => true,
        'nullable'  => false,
        'primary'   => true
	), 'ID')
	->addColumn('controller_module', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('controller_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('action_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('stacktrace', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(), 'Stack trace of error')
	->addColumn('remote_addr_headers', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('http_user_agent', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('http_accept_language', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('http_accept_charset', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('http_referer', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('http_host', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('request_uri', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('layout', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('before_forward_info', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('module_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('direct_front_names', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('original_path_info', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('original_request', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('requested_action_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('requested_controller_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('requested_route_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('request_string', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('route_name', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('store_code_from_path', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'comment')
	->addColumn('param', Varien_Db_Ddl_Table::TYPE_TEXT, '2M', array(), 'parameters on request')
	->addColumn('mess_text', Varien_Db_Ddl_Table::TYPE_TEXT, '64k', array(), 'message')
	->addColumn('mess_type', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'message')
	->addColumn('mess_class', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'message')
	->addColumn('mess_method', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'message')
	->addColumn('cms_type', Varien_Db_Ddl_Table::TYPE_TEXT, 255, array(), 'cms type')
	->addColumn('is_ajax', Varien_Db_Ddl_Table::TYPE_SMALLINT, NULL, array('nullable' => false, 'default' => '0'), 'comment')
	->addColumn('is_javascript', Varien_Db_Ddl_Table::TYPE_SMALLINT, NULL, array('nullable' => false, 'default' => '0'), 'comment')
	->addColumn('is_sent', Varien_Db_Ddl_Table::TYPE_SMALLINT, NULL, array('nullable' => false, 'default' => '0'), 'has been sent on notification')
	->addColumn('creation_time', Varien_Db_Ddl_Table::TYPE_TIMESTAMP, null, array(), 'Creation Time')
	->setComment('Log of all errors that has happend');
  
  $installer->getConnection()->createTable($table);

$installer->endSetup();