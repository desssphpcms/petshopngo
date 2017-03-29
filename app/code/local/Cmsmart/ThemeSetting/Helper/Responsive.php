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
class Cmsmart_ThemeSetting_Helper_Responsive extends Mage_Core_Helper_Abstract
{
	/**
	 * Retrieve maximum page width from the config
	 *
	 * @return int
	 */
	public function getMaxWidth($storeCode = NULL)
	{
		$w = Mage::helper('themesetting')->getLayoutCfg('responsive/max_width', $storeCode);
		if ($w == 'custom')
		{
			return intval(Mage::helper('themesetting')->getLayoutCfg('responsive/max_width_custom', $storeCode));
		}
		else
		{
			return intval($w);
		}
	}
	
	/**
	 * Retrieve custom page width from the config.
	 * Custom width is returned only if predefined max width is not selected.
	 *
	 * @return int
	 */
	public function getCustomWidth($storeCode = NULL)
	{
		$w = Mage::helper('themesetting')->getLayoutCfg('responsive/max_width', $storeCode);
		if ($w == 'custom')
		{
			return intval(Mage::helper('themesetting')->getLayoutCfg('responsive/max_width_custom', $storeCode));
		}
		else
		{
			return 0;
		}
	}
	
	/**
	 * Estimate maximum responsive layout breakpoint
	 *
	 * @return int
	 */
	public function getMaxBreakpoint($storeCode = NULL)
	{
		//Get maximum page width
		$w = $this->getMaxWidth($storeCode);
		
		//Estimate max break point
		if ($w < 1280)
			$maxBreak = 960;
		elseif ($w < 1360)
			$maxBreak = 1280;
		elseif ($w < 1440)
			$maxBreak = 1360;
		elseif ($w < 1680)
			$maxBreak = 1440;
		else
			$maxBreak = 1680;
		
		return $maxBreak;
	}
}
