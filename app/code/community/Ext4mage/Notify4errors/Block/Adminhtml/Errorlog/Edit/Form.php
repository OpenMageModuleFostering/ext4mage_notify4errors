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

class Ext4mage_Notify4errors_Block_Adminhtml_Errorlog_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _prepareForm()
    {
        $errorlog = Mage::registry('notify4errors_data');
        
        $form = new Varien_Data_Form(array(
            'id'     => 'edit_form',
        	'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
        	'method' => 'post'
        ));
        
		if(strlen($errorlog['mess_text'])>0){
        	$fieldsetMes = $form->addFieldset('notify4errors_mess', array('legend' => Mage::helper('notify4errors')->__('Notify4errors Message'), 'class' => 'fieldset-wide'));
	        
	        $fieldsetMes->addField('mess_text', 'note', array(
	        		'label'     => Mage::helper('notify4errors')->__('Message text'),
	        		'text'		=> $errorlog['mess_text'],
	        ));
	        
	        $fieldsetMes->addField('mess_type', 'note', array(
	        		'label'     => Mage::helper('notify4errors')->__('Message type'),
	        		'text'		=> $errorlog['mess_type'],
	        ));
	        
	        $fieldsetMes->addField('mess_class', 'note', array(
	        		'label'     => Mage::helper('notify4errors')->__('Message class'),
	        		'text'		=> $errorlog['mess_class'],
	        ));
	        
	        $fieldsetMes->addField('mess_method', 'note', array(
	        		'label'     => Mage::helper('notify4errors')->__('Message method'),
	        		'text'		=> $errorlog['mess_method'],
	        ));
		}
        
        
        $fieldset = $form->addFieldset('notify4errors_details', array('legend' => Mage::helper('notify4errors')->__('Notify4errors Details'), 'class' => 'fieldset-wide'));

        $fieldset->addField('errorlog_id', 'note', array(
            'label'     => Mage::helper('notify4errors')->__('ID'),
            'text'		=> $errorlog['errorlog_id'],
        ));

		$fieldset->addField('controller_module', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Controller Module'),
		    'text'		=> $errorlog['controller_module'],
		));
		
		$fieldset->addField('controller_name', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Controller Name'),
		    'text'		=> $errorlog['controller_name'],
		));
		
		$fieldset->addField('action_name', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Action Name'),
		    'text'		=> $errorlog['action_name'],
		));
		
		$fieldset->addField('layout', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Layout'),
		    'text'		=> $errorlog['layout'],
		));
		
		$fieldset->addField('before_forward_info', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Before Forward Info'),
		    'text'		=> print_r($errorlog['before_forward_info'],1),
		));
		
		$fieldset->addField('module_name', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Module Name'),
		    'text'		=> $errorlog['module_name'],
		));
		
		$fieldset->addField('direct_front_names', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Direct Front Names'),
		    'text'		=> print_r($errorlog['direct_front_names'],1),
		));
		
		$fieldset->addField('original_path_info', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Original Path Info'),
		    'text'		=> $errorlog['original_path_info'],
		));
		
		$fieldset->addField('route_name', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Route Name'),
		    'text'		=> $errorlog['route_name'],
		));
		
		$fieldset->addField('store_code_from_path', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('Store code from Path'),
		    'text'		=> $errorlog['store_code_from_path'],
		));
		
		$fieldset->addField('is_ajax', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('is Ajax'),
		    'text'		=> $errorlog['is_ajax']==0?"No":"Yes",
		));
		
// 		$fieldset->addField('is_javascript', 'note', array(
// 		    'label'     => Mage::helper('notify4errors')->__('is Javascript'),
// 		    'text'		=> $errorlog['is_javascript']==0?"No":"Yes",
// 		));
		
// 		$fieldset->addField('is_sent', 'note', array(
// 		    'label'     => Mage::helper('notify4errors')->__('Has been sent'),
// 		    'text'		=> $errorlog['is_sent']==0?"No":"Yes",
// 		));
		
		$fieldset->addField('creation_time', 'note', array(
		    'label'     => Mage::helper('notify4errors')->__('creation_time'),
		    'text'		=> $errorlog['creation_time'],
		));

		
		$fieldsetReq = $form->addFieldset('notify4errors_rew', array('legend' => Mage::helper('notify4errors')->__('Notify4errors Request information'), 'class' => 'fieldset-wide'));
		
		$fieldsetReq->addField('original_request', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Original Request'),
				'text'		=> $errorlog['original_request'],
		));
		
		$fieldsetReq->addField('requested_action_name', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Requested Action Name'),
				'text'		=> $errorlog['requested_action_name'],
		));
		
		$fieldsetReq->addField('requested_controller_name', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Requested Controller Name'),
				'text'		=> $errorlog['requested_controller_name'],
		));
		
		$fieldsetReq->addField('requested_route_name', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Requested Route Name'),
				'text'		=> $errorlog['requested_route_name'],
		));
		
		$fieldsetReq->addField('request_string', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Request String'),
				'text'		=> $errorlog['request_string'],
		));
		
		$fieldsetReq->addField('param', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Request parameters sent'),
				'text'		=> $errorlog['param'],
		));
		
		$fieldsetUser = $form->addFieldset('notify4errors_user', array('legend' => Mage::helper('notify4errors')->__('Notify4errors User information'), 'class' => 'fieldset-wide'));
		
		$fieldsetUser->addField('remote_addr_headers', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Remote Addr Headers'),
				'text'		=> print_r($errorlog['remote_addr_headers'],1),
		));
		
		$fieldsetUser->addField('http_user_agent', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Http User Agent'),
				'text'		=> $errorlog['http_user_agent'],
		));
		
		$fieldsetUser->addField('http_accept_language', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Http Accept Language'),
				'text'		=> $errorlog['http_accept_language'],
		));
		
		$fieldsetUser->addField('http_accept_charset', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Http Accept Charset'),
				'text'		=> $errorlog['http_accept_charset'],
		));
		
		$fieldsetUser->addField('http_referer', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Http Referer'),
				'text'		=> $errorlog['http_referer'],
		));
		
		$fieldsetUser->addField('http_host', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Http Host'),
				'text'		=> $errorlog['http_host'],
		));
		
		$fieldsetUser->addField('request_uri', 'note', array(
				'label'     => Mage::helper('notify4errors')->__('Request Uri'),
				'text'		=> $errorlog['request_uri'],
		));
		
		
		if(strlen($errorlog['stacktrace'])>0){
			$fieldsetStack = $form->addFieldset('notify4errors_stack', array('legend' => Mage::helper('notify4errors')->__('Notify4errors Stack'), 'class' => 'fieldset-wide'));
		
	        $fieldsetStack->addField('stacktrace', 'note', array(
	        		'label'     => Mage::helper('notify4errors')->__('Stacktrace'),
	        		'text'		=> $errorlog['stacktrace'],
	        ));
		}
        
        
        
        $form->setUseContainer(true);
        
        $this->setForm($form);
        return parent::_prepareForm();
    }
}
