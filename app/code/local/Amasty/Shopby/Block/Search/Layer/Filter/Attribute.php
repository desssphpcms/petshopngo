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
class Amasty_Shopby_Block_Search_Layer_Filter_Attribute extends Amasty_Shopby_Block_Catalog_Layer_Filter_Attribute
{
    public function __construct()
    {
        parent::__construct();
        $this->_filterModelName = 'catalogsearch/layer_filter_attribute';  
    }
}
?>