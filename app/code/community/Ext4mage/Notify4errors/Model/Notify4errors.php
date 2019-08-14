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
class Ext4mage_Notify4errors_Model_Notify4errors extends Mage_Core_Model_Abstract
{
    const XPATH_CONFIG_SETTINGS_IS_ACTIVE		= 'notify4errors/settings/is_active';
	const ENCLOSURE = '"';
    const DELIMITER = ',';

    /**
     * Main function being called
     *
     * @param $orders Orders (Mage_Sales_Model_Order) to be saved in file.
     * @return String filename
     */
    public function saveError($error = null){
//     	$mageCoreHttp = Mage::helper('core/http');
//     	$mageRequest = Mage::app()->getRequest();
//     	// 		print_r($mageRequest);
//     	echo "variables to use:";
//     	echo "<br>mageCoreHttp->getRemoteAddrHeaders(): ".print_r($mageCoreHttp->getRemoteAddrHeaders(),1);
//     	echo "<br>mageCoreHttp->getHttpUserAgent(): ".$mageCoreHttp->getHttpUserAgent();
//     	echo "<br>mageCoreHttp->getHttpAcceptLanguage(): ".$mageCoreHttp->getHttpAcceptLanguage();
//     	echo "<br>mageCoreHttp->getHttpAcceptCharset(): ".$mageCoreHttp->getHttpAcceptCharset();
//     	echo "<br>mageCoreHttp->getHttpReferer(): ".$mageCoreHttp->getHttpReferer();
//     	echo "<br>mageCoreHttp->getHttpHost(): ".$mageCoreHttp->getHttpHost();
//     	echo "<br>mageCoreHttp->getRequestUri(): ".$mageCoreHttp->getRequestUri();
//     	echo "<br>mageCoreHttp->getLayout(): ".$mageCoreHttp->getLayout();
//     	echo "<br>mageRequest->getActionName(): ".$mageRequest->getActionName();
//     	echo "<br>mageRequest->getBeforeForwardInfo(): ".print_r($mageRequest->getBeforeForwardInfo(),1);
//     	echo "<br>mageRequest->getControllerModule(): ".$mageRequest->getControllerModule();
//     	echo "<br>mageRequest->getModuleName(): ".$mageRequest->getModuleName();
//     	echo "<br>mageRequest->getControllerName(): ".$mageRequest->getControllerName();
//     	echo "<br>mageRequest->getDirectFrontNames(): ".print_r($mageRequest->getDirectFrontNames(), 1);
//     	echo "<br>mageRequest->getOriginalPathInfo(): ".$mageRequest->getOriginalPathInfo();
//     	echo "<br>mageRequest->getOriginalRequest(): ".$mageRequest->getOriginalRequest();
//     	echo "<br>mageRequest->getRequestedActionName(): ".$mageRequest->getRequestedActionName();
//     	echo "<br>mageRequest->getRequestedControllerName(): ".$mageRequest->getRequestedControllerName();
//     	echo "<br>mageRequest->getRequestedRouteName(): ".$mageRequest->getRequestedRouteName();
//     	echo "<br>mageRequest->getRequestString(): ".$mageRequest->getRequestString();
//     	echo "<br>mageRequest->getRouteName(): ".$mageRequest->getRouteName();
//     	echo "<br>mageRequest->getStoreCodeFromPath(): ".$mageRequest->getStoreCodeFromPath();
//     	echo "<br>mageRequest->isAjax(): ";
//     	echo $mageRequest->isAjax()==true?"true":"false";
//     	echo "<br><br><br>";
//     	exit;
    }

}
?>