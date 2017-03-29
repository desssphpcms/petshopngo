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
class Amasty_Shopby_Model_Observer
{
    public function handleControllerFrontInitRouters($observer) 
    {
        $observer->getEvent()->getFront()
            ->addRouter('amshopby', new Amasty_Shopby_Controller_Router());
    }
    
    public function handleCatalogControllerCategoryInitAfter($observer)
    {
        if (!Mage::getStoreConfig('amshopby/seo/urls'))
            return;
            
        $controller = $observer->getEvent()->getControllerAction();
        $cat = $observer->getEvent()->getCategory();
        
        if (!Mage::helper('amshopby/url')->saveParams($controller->getRequest())){
            if ($cat->getId()  == Mage::app()->getStore()->getRootCategoryId()){
                $cat->setId(0);
                return;
            } 
            else { 
                // no way to tell controler to show 404, do it manually
                $controller->getResponse()->setHeader('HTTP/1.1','404 Not Found');
                $controller->getResponse()->setHeader('Status','404 File not found');
        
                $pageId = Mage::getStoreConfig(Mage_Cms_Helper_Page::XML_PATH_NO_ROUTE_PAGE);
                if (!Mage::helper('cms/page')->renderPage($controller, $pageId)) {
                    header('Location: /');
                    exit;
                }  
                $controller->getResponse()->sendResponse();
                exit;                
            }
        } 
        
        if ($cat->getDisplayMode() == 'PAGE' && Mage::registry('amshopby_current_params')){
            $cat->setDisplayMode('PRODUCTS');
        }  
    }
    
    public function handleLayoutRender()
    {
        $layout = Mage::getSingleton('core/layout');
        if (!$layout)
            return;
            
        $isAJAX = Mage::app()->getRequest()->getParam('is_ajax', false);
        $isAJAX = $isAJAX && Mage::app()->getRequest()->isXmlHttpRequest();
        if (!$isAJAX)
            return;
            
        $layout->removeOutputBlock('root');    
        Mage::app()->getFrontController()->getResponse()->setHeader('content-type', 'application/json');
            
        $page = $layout->getBlock('product_list');
        if (!$page){
            $page = $layout->getBlock('search_result_list');
        }
        
        if (!$page)
            return; 
            
        $blocks = array();
        foreach ($layout->getAllBlocks() as $b){
            if (!in_array($b->getNameInLayout(), array('amshopby.navleft','amshopby.navtop','amshopby.navright', 'amshopby.top'))){
                continue;
            }
            $b->setIsAjax(true);
            $blocks[$b->getBlockId()] = $this->_removeAjaxParam($b->toHtml());                        
        }
        
        if (!$blocks)
            return;

        $container = $layout->createBlock('core/template', 'amshopby_container');
        $container->setData('blocks', $blocks);
        $container->setData('page', $this->_removeAjaxParam($page->toHtml()));
        
        $layout->addOutputBlock('amshopby_container', 'toJson');
    }
    
    protected function _removeAjaxParam($html)
    {
        $html = str_replace('is_ajax=1&amp;', '', $html);
        $html = str_replace('is_ajax=1&',     '', $html);
        $html = str_replace('is_ajax=1',      '', $html);
        
        $html = str_replace('___SID=U', '', $html);
        
        return $html;
    }
    
}