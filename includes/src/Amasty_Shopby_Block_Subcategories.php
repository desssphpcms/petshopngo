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
class Amasty_Shopby_Block_Subcategories extends Mage_Core_Block_Template
{
    public function getSubcategories()
    {
        $orders = array('position', 'name');
        $order = $this->getOrder();
        if (!in_array($order, $orders)) {
            $order = current($orders);
        }
        
        $layer = Mage::getSingleton('catalog/layer');
        
        /* @var $category Mage_Catalog_Model_Category */
        $category = $layer->getCurrentCategory();
        
        $collection = $category->getCollection();
        $collection->addAttributeToSelect('url_key')
            ->addAttributeToSelect('name')
            ->addAttributeToSelect('thumbnail')
            ->addAttributeToSelect('image')
            ->addAttributeToFilter('is_active', 1)
            ->addIdFilter($category->getChildren())
            ->setOrder($order, Varien_Db_Select::SQL_ASC);
        /* @var $collection Mage_Catalog_Model_Resource_Category_Collection */
        if ($collection instanceof Mage_Catalog_Model_Resource_Category_Collection) {
            $collection->joinUrlRewrite();
        } else { /* @var $collection Mage_Catalog_Model_Resource_Category_Flat_Collection */
            $collection->addUrlRewriteToResult();
        }
        $collection->load();
        
        foreach ($collection as $cat) {
            if ($cat->getThumbnail()) {
                $image = Mage::getBaseUrl('media') . 'catalog/category/' . $cat->getThumbnail();
                $cat->setImage($image);
            } else if ($cat->getImage()) {
                $image = Mage::getBaseUrl('media') . 'catalog/category/' . $cat->getImage();
                $cat->setImage($image);
            }
        }
        
        return $collection;
    }
    
    public function getDivWidth()
    {
        if ($this->getColumns()) {
            $columns = $this->getColumns();
        } else {
            $columns = 3;
        }
        $result = round(100 / (int)$columns, 0);
        return $result;
    }
}
?>