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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Design_Font_Size_Basic
{
    public function toOptionArray()
    {
		return array(
			array('value' => '12px',	'label' => Mage::helper('themesetting')->__('12 px')),
			array('value' => '13px',	'label' => Mage::helper('themesetting')->__('13 px')),
            array('value' => '14px',	'label' => Mage::helper('themesetting')->__('14 px'))
        );
    }
}