<?php
/**
* Ext4mage Notify4errors Module
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to Henrik Kier <info@ext4mage.com> so we can send you a copy immediately.
*
* @category   Ext4mage
* @package    Ext4mage_Notify4errors
* @copyright  Copyright (c) 2012 Ext4mage (http://ext4mage.com)
* @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
* @author     Henrik Kier <info@ext4mage.com>
* */

class Ext4mage_Notify4errors_Model_Core_Message extends Mage_Core_Model_Message{
	
	const XPATH_CONFIG_SETTINGS_MESSAGES		= 'notify4errors/settings/messages';
	
	public function error($code, $class='', $method='')
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_MESSAGES) > 0){
        	$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
        	$errorLog->logMessage($code, self::ERROR, $class, $method);	
        }
    	return parent::error($code, $class, $method);
    }

    public function warning($code, $class='', $method='')
    {
    	if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_MESSAGES) > 1){
        	$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
        	$errorLog->logMessage($code, self::WARNING, $class, $method);	
        }
//         return parent::warning($code, $class, $method);
        return $this->_factory($code, self::WARNING, $class, $method);
    }

    public function notice($code, $class='', $method='')
    {
    	if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_MESSAGES) > 2){
        	$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
        	$errorLog->logMessage($code, self::NOTICE, $class, $method);	
        }
    	return parent::notice($code, $class, $method);
    }
}
