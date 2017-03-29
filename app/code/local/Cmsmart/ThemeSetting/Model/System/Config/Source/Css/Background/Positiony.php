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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Css_Background_Positiony
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'top',		'label' => Mage::helper('themesetting')->__('top')),
            array('value' => 'center',	'label' => Mage::helper('themesetting')->__('center')),
            array('value' => 'bottom',	'label' => Mage::helper('themesetting')->__('bottom'))
        );
    }
}