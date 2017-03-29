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
class Amasty_Shopby_Block_Catalog_Product_List_Toolbar extends Mage_Catalog_Block_Product_List_Toolbar
{
    public function getPagerUrl($params=array())
    {
        if ($this->skip())
            return parent::getPagerUrl($params);
            
        return Mage::helper('amshopby/url')->getFullUrl($params);
    } 
    
    public function getPagerHtml()
    {
        if ($this->skip())
            return parent::getPagerHtml();
            
        $alias = 'product_list_toolbar_pager';
        $oldPager   = $this->getChild($alias);

        if ($oldPager instanceof Varien_Object){
            $newPager = $this->getLayout()->createBlock('amshopby/catalog_pager')
                ->setArea('frontend')
                ->setTemplate($oldPager->getTemplate());
           //@todo assign other params if needed     
                
            $newPager->assign('_type', 'html')
                     ->assign('_section', 'body');
                     
            $this->setChild($alias, $newPager);
        }
        return parent::getPagerHtml();
    }
    
    private function skip()
    {
        $r = Mage::app()->getRequest();
        // todo add more conditions if needed   
        if (in_array($r->getModuleName(), array('supermenu', 'supermenuadmin', 'catalogsearch','tag', 'catalogsale','catalognew')))
            return true;
            
        return false;
    }
}
?>