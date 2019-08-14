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
class Ext4mage_Notify4errors_Adminhtml_ErrorlogController extends Mage_Adminhtml_Controller_action
{

	protected function _initAction() {
		$this->loadLayout()
		->_setActiveMenu('notify4errors/errorlog')
		->_addBreadcrumb(Mage::helper('adminhtml')->__('Notify4errors Errorlog structure'), Mage::helper('adminhtml')->__('Notify4errors Errorlog structure'));

		return $this;
	}

	public function indexAction() {
		$this->_initAction()
		->renderLayout();
	}

	public function editAction() {
		$id     = $this->getRequest()->getParam('id');
		$model  = Mage::getModel('notify4errors/errorlog')->load($id);

		if ($model->getId() || $id == 0) {
			$data = Mage::getSingleton('adminhtml/session')->getFormData(true);
			if (!empty($data)) {
				$model->setData($data);
			}

			Mage::register('notify4errors_data', $model);

			$this->loadLayout();
			$this->_setActiveMenu('notify4errors/errorlog');
			$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Errorlog element content'), Mage::helper('adminhtml')->__('Errorlog element content'));
			$this->_addContent($this->getLayout()->createBlock('notify4errors/adminhtml_errorlog_edit'));
			$this->renderLayout();
		} else {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('notify4errors')->__('Element does not exist'));
			$this->_redirect('*/*/');
		}
	}

	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('notify4errors/errorlog');
					
				$model->setId($this->getRequest()->getParam('id'))
				->delete();
				
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('html2pdf')->__('Errorlog was successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/index');
	}
	
	
	public function massDeleteAction() {
		$errorlogIds = $this->getRequest()->getParam('errorlog');
		if(!is_array($errorlogIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('notify4errors')->__('Please select errorlog element(s)'));
		} else {
			try {
				foreach ($errorlogIds as $errorlogId) {
					$errorlog = Mage::getModel('notify4errors/errorlog')->load($errorlogId);
					$errorlog->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('notify4errors')->__('Total of %d errorlog element(s) were successfully deleted', count($errorlogIds))
				);
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}
}