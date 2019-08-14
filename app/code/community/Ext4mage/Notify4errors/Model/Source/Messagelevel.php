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
class Ext4mage_Notify4errors_Model_Source_Messagelevel
{
    public function toOptionArray()
    {
        return array(
            0  => Mage::helper('notify4errors')->__('Disabled'),
        	1  => Mage::helper('notify4errors')->__('Error'),
        	2  => Mage::helper('notify4errors')->__('Error and Warning'),
        	3  => Mage::helper('notify4errors')->__('Error, Warning and Notice')        		
        );
    }
}
