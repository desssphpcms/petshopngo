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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Category_Grid_ColumnCount
{
    public function toOptionArray()
    {
        return array(
			array('value' => 2, 'label' => Mage::helper('themesetting')->__('2')),
			array('value' => 3, 'label' => Mage::helper('themesetting')->__('3')),
			array('value' => 4, 'label' => Mage::helper('themesetting')->__('4')),
			array('value' => 5, 'label' => Mage::helper('themesetting')->__('5')),
			array('value' => 6, 'label' => Mage::helper('themesetting')->__('6')),
            array('value' => 7, 'label' => Mage::helper('themesetting')->__('7'))
        );
    }
}