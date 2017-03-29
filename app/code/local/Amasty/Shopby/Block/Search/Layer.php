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
class Amasty_Shopby_Block_Search_Layer extends Amasty_Shopby_Block_Catalog_Layer_View
{
    /**
     * Internal constructor
     */
    protected function _construct()
    {
        parent::_construct();
        Mage::register('current_layer', $this->getLayer(), true);
    } 
    
    /**
     * Get attribute filter block name
     *
     * @return string
     */
    protected function _getAttributeFilterBlockName()
    {
        return 'catalogsearch/layer_filter_attribute';
    }

    /**
     * Get layer object
     *
     * @return Mage_Catalog_Model_Layer
     */
    public function getLayer()
    {
        return Mage::getSingleton('catalogsearch/layer');
    }

    
    public function canShowBlock()
    {
        if (!Mage::helper('amshopby')->isVersionLessThan(1, 4, 2)){
            $_isLNAllowedByEngine = Mage::helper('catalogsearch')->getEngine()->isLeyeredNavigationAllowed();
            if (!$_isLNAllowedByEngine) {
                return false;
            }
        }
        
        $availableResCount = (int) Mage::app()->getStore()
            ->getConfig(Mage_CatalogSearch_Model_Layer::XML_PATH_DISPLAY_LAYER_COUNT);

        if (!$availableResCount
            || ($availableResCount>=$this->getLayer()->getProductCollection()->getSize())) {
            return parent::canShowBlock();
        }
        return false;
    } 
    
     
}
?>