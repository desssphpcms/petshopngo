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
class Cmsmart_UltraSlideshow_Block_Config extends Mage_Core_Block_Template
{
	public function getSlideshowCfg()
	{
		$h = Mage::helper('ultraslideshow');
		
		$cfg = array();
		$cfg['fx']			= "'" . $h->getCfg('general/fx') . "'";
		$cfg['easing']		= "'" . $h->getCfg('general/easing') . "'";
		$cfg['timeout']		= intval($h->getCfg('general/timeout'));
		$cfg['speed']		= intval($h->getCfg('general/speed'));
		$cfg['pause']		= $h->getCfg('general/pause');
		$cfg['loop']		= $h->getCfg('general/loop');
		
		return $cfg;
	}
}