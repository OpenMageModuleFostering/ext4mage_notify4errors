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
class Ext4mage_Notify4errors_Model_Errorlog extends Mage_Core_Model_Abstract
{
	public function _construct()
	{
		parent::_construct();
		$this->_init('notify4errors/errorlog');
	}
	
	private function _logUserInfo(){
		//collect all user info
		$mageCoreHttp = Mage::helper('core/http');
		$mageRequest = Mage::app()->getRequest();
		// 		print_r($mageRequest);
		$this->setControllerModule($mageRequest->getControllerModule());
		$this->setControllerName($mageRequest->getControllerName());
		$this->setActionName($mageRequest->getActionName());
		$this->setStacktrace('');
		$this->setRemoteAddrHeaders(print_r($mageCoreHttp->getRemoteAddrHeaders(),1));
		$this->setHttpUserAgent($mageCoreHttp->getHttpUserAgent());
		$this->setHttpAcceptLanguage($mageCoreHttp->getHttpAcceptLanguage());
		$this->setHttpAcceptCharset($mageCoreHttp->getHttpAcceptCharset());
		$this->setHttpReferer($mageCoreHttp->getHttpReferer());
		$this->setHttpHost($mageCoreHttp->getHttpHost());
		$this->setRequestUri($mageCoreHttp->getRequestUri());
		$this->setLayout($mageCoreHttp->getLayout());
		$this->setBeforeForwardInfo(print_r($mageRequest->getBeforeForwardInfo(),1));
		$this->setModuleName($mageRequest->getModuleName());
		$this->setDirectFrontNames(print_r($mageRequest->getDirectFrontNames(),1));
		$this->setOriginalPathInfo($mageRequest->getOriginalPathInfo());
		$this->setOriginalRequest($mageRequest->getOriginalRequest());
		$this->setRequestedActionName($mageRequest->getRequestedActionName());
		$this->setRequestedControllerName($mageRequest->getRequestedControllerName());
		$this->setRequestedRouteName($mageRequest->getRequestedRouteName());
		$this->setRequestString($mageRequest->getRequestString());
		$this->setRouteName($mageRequest->getRouteName());
		$this->setStoreCodeFromPath($mageRequest->getStoreCodeFromPath());
		$this->setParam(print_r($mageRequest->getParams(),1));
		$this->setIsAjax($mageRequest->isAjax());
		// 		$this->setIsJavascript(0);
		$this->save();
	}
	
	public function logMessage($code, $type, $class='', $method=''){
		//add included info
		$this->setMessText($code);
		$this->setMessType($type);
		$this->setMessClass($class);
		$this->setMessMethod($method);
		
		$this->_logUserInfo();
	}

	public function cms404($type){
		//add included info
		$this->setCmsType($type);
	
		$this->_logUserInfo();
	}

	public function logJs(){
		//add included info
		
		$this->_logUserInfo();
	}
}