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
class Cmsmart_UltraSlideshow_Helper_Data extends Mage_Core_Helper_Abstract
{
	/**
	 * Get settings
	 *
	 * @return string
	 */
	public function getCfg($optionString)
    {
        return Mage::getStoreConfig('ultraslideshow/' . $optionString);
    }
}
?>