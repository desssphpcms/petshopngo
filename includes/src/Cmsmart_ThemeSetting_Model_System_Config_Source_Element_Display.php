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

?>
<?php

class Cmsmart_ThemeSetting_Model_System_Config_Source_Element_Display
{
    public function toOptionArray()
    {
		return array(
			array('value' => 0, 'label' => Mage::helper('themesetting')->__('Don\'t Display')),
            array('value' => 1, 'label' => Mage::helper('themesetting')->__('Display On Hover')),
            array('value' => 2, 'label' => Mage::helper('themesetting')->__('Display'))
        );
    }
}