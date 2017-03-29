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

class Cmsmart_ThemeSetting_Model_System_Config_Source_Jquery_Easing
{
    public function toOptionArray()
    {
        return array(
			//Ease in-out
			array('value' => 'easeInOutSine',	'label' => Mage::helper('themesetting')->__('easeInOutSine')),
			array('value' => 'easeInOutQuad',	'label' => Mage::helper('themesetting')->__('easeInOutQuad')),
			array('value' => 'easeInOutCubic',	'label' => Mage::helper('themesetting')->__('easeInOutCubic')),
			array('value' => 'easeInOutQuart',	'label' => Mage::helper('themesetting')->__('easeInOutQuart')),
			array('value' => 'easeInOutQuint',	'label' => Mage::helper('themesetting')->__('easeInOutQuint')),
			array('value' => 'easeInOutExpo',	'label' => Mage::helper('themesetting')->__('easeInOutExpo')),
			array('value' => 'easeInOutCirc',	'label' => Mage::helper('themesetting')->__('easeInOutCirc')),
			array('value' => 'easeInOutElastic','label' => Mage::helper('themesetting')->__('easeInOutElastic')),
			array('value' => 'easeInOutBack',	'label' => Mage::helper('themesetting')->__('easeInOutBack')),
			array('value' => 'easeInOutBounce',	'label' => Mage::helper('themesetting')->__('easeInOutBounce')),
			//Ease out
			array('value' => 'easeOutSine',		'label' => Mage::helper('themesetting')->__('easeOutSine')),
			array('value' => 'easeOutQuad',		'label' => Mage::helper('themesetting')->__('easeOutQuad')),
			array('value' => 'easeOutCubic',	'label' => Mage::helper('themesetting')->__('easeOutCubic')),
			array('value' => 'easeOutQuart',	'label' => Mage::helper('themesetting')->__('easeOutQuart')),
			array('value' => 'easeOutQuint',	'label' => Mage::helper('themesetting')->__('easeOutQuint')),
			array('value' => 'easeOutExpo',		'label' => Mage::helper('themesetting')->__('easeOutExpo')),
			array('value' => 'easeOutCirc',		'label' => Mage::helper('themesetting')->__('easeOutCirc')),
			array('value' => 'easeOutElastic',	'label' => Mage::helper('themesetting')->__('easeOutElastic')),
			array('value' => 'easeOutBack',		'label' => Mage::helper('themesetting')->__('easeOutBack')),
			array('value' => 'easeOutBounce',	'label' => Mage::helper('themesetting')->__('easeOutBounce')),
			//Ease in
			array('value' => 'easeInSine',		'label' => Mage::helper('themesetting')->__('easeInSine')),
			array('value' => 'easeInQuad',		'label' => Mage::helper('themesetting')->__('easeInQuad')),
			array('value' => 'easeInCubic',		'label' => Mage::helper('themesetting')->__('easeInCubic')),
			array('value' => 'easeInQuart',		'label' => Mage::helper('themesetting')->__('easeInQuart')),
			array('value' => 'easeInQuint',		'label' => Mage::helper('themesetting')->__('easeInQuint')),
			array('value' => 'easeInExpo',		'label' => Mage::helper('themesetting')->__('easeInExpo')),
			array('value' => 'easeInCirc',		'label' => Mage::helper('themesetting')->__('easeInCirc')),
			array('value' => 'easeInElastic',	'label' => Mage::helper('themesetting')->__('easeInElastic')),
			array('value' => 'easeInBack',		'label' => Mage::helper('themesetting')->__('easeInBack')),
			array('value' => 'easeInBounce',	'label' => Mage::helper('themesetting')->__('easeInBounce')),
			//No easing
			array('value' => 'null',			'label' => Mage::helper('themesetting')->__('No easing'))
        );
    }
}
