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
class Ext4mage_Notify4errors_Block_Adminhtml_Errorlog_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
	public function __construct()
	{
		parent::__construct();
		$this->setId('errorlogGrid');
		$this->setDefaultSort('errorlog_id');
		$this->setDefaultDir('ASC');
		$this->setSaveParametersInSession(true);
 	}

	protected function _prepareCollection()
	{
		$collection = Mage::getModel('notify4errors/errorlog')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareColumns()
	{
		$this->addColumn('errorlog_id', array(
          'header'    => Mage::helper('notify4errors')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'errorlog_id',
		));

		$this->addColumn('controller_module', array(
          'header'    => Mage::helper('notify4errors')->__('Controller Module'),
          'align'     =>'left',
          'index'     => 'controller_module',
		));

		$this->addColumn('controller_name', array(
          'header'    => Mage::helper('notify4errors')->__('Controller Name'),
          'align'     =>'left',
          'index'     => 'controller_name',
		));

		$this->addColumn('action_name', array(
          'header'    => Mage::helper('notify4errors')->__('Action Name'),
          'align'     =>'left',
          'index'     => 'action_name',
		));
		
		$this->addColumn('mess_text', array(
				'header'    => Mage::helper('notify4errors')->__('Messages text'),
				'align'     =>'left',
				'index'     => 'mess_text',
		));
		
		$this->addColumn('is_ajax', array(
          'header'    => Mage::helper('notify4errors')->__('Is ajax'),
          'align'     => 'left',
          'width'     => '60px',
          'index'     => 'is_ajax',
          'type'      => 'options',
          'options'   => array(
		1 => 'Yes',
		0 => 'No',
		),
		));
		
// 		$this->addColumn('is_javascript', array(
// 			'header'    => Mage::helper('notify4errors')->__('Is javascript'),
// 			'align'     => 'left',
// 			'width'     => '60px',
// 			'index'     => 'is_javascript',
// 			'type'      => 'options',
// 			'options'   => array(
// 					1 => 'Yes',
// 					0 => 'No',
// 			),
// 		));
		
// 		$this->addColumn('is_sent', array(
//           'header'    => Mage::helper('notify4errors')->__('Is sent'),
//           'align'     => 'left',
//           'width'     => '60px',
//           'index'     => 'is_sent',
//           'type'      => 'options',
//           'options'   => array(
// 		1 => 'Yes',
// 		0 => 'No',
// 		),
// 		));
		
		$this->addColumn('creation_time', array(
			'header'    => Mage::helper('notify4errors')->__('Created at'),
			'align'     => 'left',
			'width'     => '160px',
			'type'      => 'datetime',
			'default'   => '--',
			'index'     => 'creation_time',
		));

		 
		return parent::_prepareColumns();
	}

	protected function _prepareMassaction()
	{
		$this->setMassactionIdField('errorlog_id');
		$this->getMassactionBlock()->setFormFieldName('errorlog');

		$this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('notify4errors')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('notify4errors')->__('Are you sure?')
		));

		return $this;
	}

	public function getRowUrl($row)
	{
		return $this->getUrl('*/*/edit', array('id' => $row->getId()));
	}
}