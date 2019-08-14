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
require_once BP.'/app/code/core/Mage/Cms/controllers/IndexController.php';

class Ext4mage_Notify4errors_IndexController extends Mage_Cms_IndexController{
    
	const XPATH_CONFIG_SETTINGS_ROUTE		= 'notify4errors/settings/capture_route';
	const XPATH_CONFIG_SETTINGS_COOKIE		= 'notify4errors/settings/capture_cookie';
	
    /**
     * Default index action (with 404 Not Found headers)
     * Used if default page don't configure or available
     *
     */
    public function defaultIndexAction()
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_ROUTE) > 0){
    		$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
    		$errorLog->cms404('defaultIndex not found');
    	}

    	parent::defaultIndexAction();
    }

    /**
     * Render CMS 404 Not found page
     *
     * @param string $coreRoute
     */
    public function noRouteAction($coreRoute = null)
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_ROUTE) > 0){
    		$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
    		$errorLog->cms404('No route - soft 404');
    	}

    	parent::noRouteAction($coreRoute);
    }

    /**
     * Default no route page action
     * Used if no route page don't configure or available
     *
     */
    public function defaultNoRouteAction()
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_ROUTE) > 0){
    		$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
    		$errorLog->cms404('No route and not default - soft 404');
    	}

    	parent::defaultNoRouteAction();
    }

    /**
     * Render Disable cookies page
     *
     */
    public function noCookiesAction()
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_COOKIE) > 0){
    		$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
    		$errorLog->cms404('Cookie not allowed');
    	}

    	parent::noCookiesAction();
    }

    /**
     * Default no cookies page action
     * Used if no cookies page don't configure or available
     *
     */
    public function defaultNoCookiesAction()
    {
        if(Mage::getStoreConfig(self::XPATH_CONFIG_SETTINGS_COOKIE) > 0){
    		$errorLog = new Ext4mage_Notify4errors_Model_Errorlog();
    		$errorLog->cms404('Cookie not allowed - no default');
    	}

    	parent::defaultNoCookiesAction();    	
    }
}
