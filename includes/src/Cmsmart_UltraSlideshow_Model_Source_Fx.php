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
class Cmsmart_UltraSlideshow_Model_Source_Fx
{
    public function toOptionArray()
    {
        return array(
			array('value' => 'slide',	'label' => Mage::helper('ultraslideshow')->__('Slide')),
			array('value' => 'fade',	'label' => Mage::helper('ultraslideshow')->__('Fade'))
        );
    }
}
