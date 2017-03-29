<?php 
/**************************************************

* Name Theme

* Author: The Cmsmart Development Team 

* Date Created: 2013

* Websites: http://cmsmart.net

* Technical Support: Forum - http://cmsmart.net/support

* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)

* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.

***************************************************/
class Cmsmart_CloudZoom_Model_System_Config_Source_Position
{
    public function toOptionArray()
    {
        return array(
			array('value' => 'inside',		'label' => Mage::helper('cmsmart_cloudzoom')->__('Inside')),
			array('value' => 'right',		'label' => Mage::helper('cmsmart_cloudzoom')->__('Right')),
			array('value' => 'left',		'label' => Mage::helper('cmsmart_cloudzoom')->__('Left')),
			array('value' => 'top',			'label' => Mage::helper('cmsmart_cloudzoom')->__('Top')),
			array('value' => 'bottom',		'label' => Mage::helper('cmsmart_cloudzoom')->__('Bottom'))
        );
    }
}
