<?php
/**************************************************

* Name Extension:

* Author: The Cmsmart Development Team 

* Date Created:

* Websites: http://cmsmart.net

* Technical Support: Forum - http://cmsmart.net/support

* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)

* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.

***************************************************/
class Amasty_Shopby_Model_Filter extends Mage_Core_Model_Abstract
{
    public function _construct()
    {    
        $this->_init('amshopby/filter');
    }
    
    public function getDisplayTypeString()
    {
    	/* @var $helper Amasty_Shopby_Helper_Data */
    	$helper = Mage::helper('amshopby');
    	$options = array();
    	
    	if ($this->getBackendType() == 'decimal') {
    		$options = $helper->getDecimalDisplayTypes();
    	} else {
    		$options = $helper->getDisplayTypes();
    	}
    	
    	return $options[$this->getDisplayType()];
    }
}