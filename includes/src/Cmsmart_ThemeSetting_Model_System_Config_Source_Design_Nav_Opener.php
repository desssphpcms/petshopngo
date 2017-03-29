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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Design_Nav_Opener
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'b',		'label' => Mage::helper('themesetting')->__('Black')),
            array('value' => 'w',		'label' => Mage::helper('themesetting')->__('White'))
        );
    }
}