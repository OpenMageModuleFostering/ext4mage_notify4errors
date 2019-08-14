<?php

class Ext4mage_Notify4errors_Block_Adminhtml_Errorlog_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
	public function __construct()
	{
		parent::__construct();

		$helpLinkUrl = "http://ext4mage.com/gethelp/notify4errors/errorlog/view.html";

		$this->_objectId = 'id';
		$this->_blockGroup = 'notify4errors';
		$this->_controller = 'adminhtml_errorlog';

		$this->_formScripts[] = "
            $('page-help-link').href = '".$helpLinkUrl."';
		";
		
		$this->_removeButton('save');
		$this->_removeButton('reset');
	}

	public function getHeaderText()
	{
		return Mage::helper('notify4errors')->__("View errorlog #%s", $this->htmlEscape(Mage::registry('notify4errors_data')->getId()));
	}
}