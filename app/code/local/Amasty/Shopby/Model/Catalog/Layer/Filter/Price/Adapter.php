<?php
/**************************************************

* Name Extension:

* Author: The Cmsmart Development Team 

* Date Created:

* Websites: http://cmsmart.net

* Technical Support: Forum - http://cmsmart.net/support

* GNU General Public License v3 (http://opensource.org/licenses/GPL-3.0)

* Copyright © 2011-2013 Cmsmart.net. All Rights Reserved.

***************************************************/
if (method_exists('Mage', 'getEdition')) { // CE 1.7+, EE 1.12+
	class Amasty_Shopby_Model_Catalog_Layer_Filter_Price_Adapter extends Amasty_Shopby_Model_Catalog_Layer_Filter_Price_Price17ce
	{
	   public function _construct()
	   {
			parent::_construct();
	   }
	}
} 
else { // CE 1.3.2 - 1.6.2 
    
	class Amasty_Shopby_Model_Catalog_Layer_Filter_Price_Adapter extends Amasty_Shopby_Model_Catalog_Layer_Filter_Price_Price14ce
	{
	   public function _construct()
	   {
	   		parent::_construct();
	   }
	}
}