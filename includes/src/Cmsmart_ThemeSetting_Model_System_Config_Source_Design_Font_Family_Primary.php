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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Design_Font_Family_Primary
{
    public function toOptionArray()
    {
		return array(
			array('value' => 'Rokkitt',		'label' => Mage::helper('themesetting')->__('Rokkitt')),
			array('value' => 'Bitter',		'label' => Mage::helper('themesetting')->__('Bitter')),
			array('value' => 'Arvo',		'label' => Mage::helper('themesetting')->__('Arvo')),
			array('value' => 'Lora',		'label' => Mage::helper('themesetting')->__('Lora')),
			array('value' => 'Droid Serif',	'label' => Mage::helper('themesetting')->__('Droid Serif')),
			array('value' => 'Philosopher',	'label' => Mage::helper('themesetting')->__('Philosopher')),
			array('value' => 'Open Sans',	'label' => Mage::helper('themesetting')->__('Open Sans')),
			array('value' => 'Ubuntu',		'label' => Mage::helper('themesetting')->__('Ubuntu')),
			array('value' => 'Lato',		'label' => Mage::helper('themesetting')->__('Lato')),
			array('value' => 'Droid Sans',	'label' => Mage::helper('themesetting')->__('Droid Sans')),
			array('value' => 'Play',		'label' => Mage::helper('themesetting')->__('Play')),
			array('value' => 'Oswald',		'label' => Mage::helper('themesetting')->__('Oswald'))
        );
    }
}